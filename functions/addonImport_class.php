<?php
//require_once('../includes/config.php');
error_reporting(E_ALL);
set_time_limit(0);
ini_set('display_errors', 1);
ini_set('max_execution_time', '-1');

define("_CME_HOSTNAME", "192.168.3.214");
define("_CME_USERNAME", "claimPortal");
define("_CME_PASSWORD", "claimPortal001!");
define("_CME_DATABASE", "claimPortal");

@$foebis = new mysqli(_CME_HOSTNAME, _CME_USERNAME, _CME_PASSWORD, _CME_DATABASE);
if(mysqli_connect_errno()) {
	echo "Error connecting DB, please try again later HERE.";
	exit;
}
$foebis->select_db(_CME_DATABASE);

class addonImport_class {
	
	function __CONSTRUCT() {		
		global $foebis;
		
		// map the CSV columns to database fields
		//$columns = $this->feedColumns();
		
		//$this->getFile(date("Y.m.d")."CSV");
		//$lastDay = date("d") - 1;

		//$file = "/feed/addbord_" . date("dmY") . ".csv";
		$file = "files/Add On Data.csv";
		
		// run through the CSV and pass back the results
		$data = $this->parseCSV($file);
		
		// pass the results for splitting into database calls
		//$dataRows = $this->analyseData($columns, $data);
		//var_dump($dataRows);
		mysql_close($foebis);
	}
	
	private function feedColumns(){
		/* seperate table name and column name with a :
			maps each column in the spreadsheet with a database table and field
		*/
		
		$columns = array(
			0 => array("Cust Num", ""),	
			1 => array("Title", "addon_policy_holders:aph_title"),
			2 => array("Original", ""),
			3 => array("Firstname(s)", "addon_policy_holders:aph_forename"),
			4 => array("Surname", "addon_policy_holders:aph_surname"),
			5 => array("Address1", "addon_policy_holders:aph_address1"),
			6 => array("Address2", "addon_policy_holders:aph_address2"),
			7 => array("Address3", "addon_policy_holders:aph_address3"),
			8 => array("Address4", "addon_policy_holders:aph_address4"),
			9 => array("Post Code", "addon_policy_holders:aph_postcode"),
			10 => array("Home Tel", "addon_policy_holders:aph_telephone"),
			11 => array("Work Tel", "addon_policy_holders:aph_telephone_other"),
			12 => array("E-Mail", "addon_policy_holders:aph_email"),
			13=> array("Policy Id", ""),
			14 => array("PolicyType", ""),
			15 => array("PolicyNumber", "addons:a_policy_number"),
			16 => array("Insurer", "addons:a_broker"),
			17 => array("Status", ""),
			18 => array("Inception", "addons:a_effective_date"),
			19 => array("Renewal", "addons:a_renewal_date"),
			20 => array("Quote", ""),
			21 => array("SaleMethod", ""),
			22 => array("Advised", ""),
			23 => array("User", ""),
			24 => array("Branch", ""),
			25 => array("Agent", ""),
			26 => array("Scheme", ""),
			27 => array("Instl. Plan", ""),
			28 => array("Acc. Type", ""),
			29 => array("Source", ""),
			30 => array("SaleType", ""),
			31 => array("Campaign", ""),
			32 => array("Period", ""),
			33 => array("lx Insurer", ""),
			34 => array("lx Scheme", ""),
			35 => array("lx Pol Num", ""),
			36 => array("lx Prem.", ""),
			37 => array("lx Inception", ""),
			38 => array("lx Renewal", ""),
			39 => array("Scheme", ""),
			40 => array("PostDate", ""),
			41 => array("Protected", ""),
			42 => array("GrossPremium", ""),
			43 => array("DriverDOB", ""),
			44 => array("Vehicle", "addon_vehicles:av_long_desc"),
			45 => array("VehValue", "addon_vehicles:av_value"),
			46 => array("Registration", "addon_vehicles:av_reg"),
			47 => array("P_Canc", ""),
			48 => array("P_Code", ""),			
			49 => array("P_Description", "addons:a_description"),
			50 => array("P_Insurer", "addons:a_insurer"),
			51 => array("P_PolType", "addons:a_addon_type"),
			52 => array("P_Prem", "addons:a_gross_premium"),
			53 => array("P_Scheme", "addons:a_scheme")
		);
		
		return $columns;
	}
	
	private function parseCSV($filename) {
		$columns = $this->feedColumns();
		
		//$parseArray = array();
		$i=0;

		if (($handle = fopen($filename, "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
				$num = count($data);
				$i++;
				if($i > 2) {
					$policyNo = $data[15];
					//echo $data[$c];
					$parseArray = array();
					for ($c=0; $c < $num; $c++) {
						$parseArray[$policyNo][$c] = $data[$c];
					}
					$this->analyseData($columns, $parseArray);
					//var_dump($parseArray[$policyNo]);
					unset($parseArray);
				}
				if($i == 370) {
					//break;
				}
			}
		}
			
		fclose($handle);
		unset($data);
		return $parseArray;
	}
	
	private function analyseData($columns, $data) {
		$tableArray = array();
		
		foreach($data as $dataColumn => $value) {
			// get data
			$rowData = $data[$dataColumn];	
			//$tableArray[$rowData[1]]['info']['import_type'] = $rowData[0];
		
			$i = 0;
			foreach($rowData as $column => $row) {
				//$tableData = $rowData[$i];
				//get column name
				$array = explode(":", $columns[$i][1]);
				if(!empty($array[0])) {
					$tableArray[$rowData[15]][$array[0]][$array[1]] = $rowData[$i];
				}
				$i++;
			}

			$this->buildQueries($tableArray);
			unset($rowData);
			unset($tableArray);
		}
		
		return $tableArray;
	}
	
	private function checkPolicyNo($policyNumber) {
		$checkresult = $this->execute_sql("select", array("a_id"), "addons", "a_policy_number = '" . $policyNumber . "'");
		//var_dump($checkresult[0]['p_id']) . "<br />";
		if(!empty($checkresult[0]['a_id'])) {
			return $checkresult[0]['a_id'];	
		}
		else {
			return false;	
		}
	}
	
	private function checkKey($field, $table, $where) {
		$checkresult = $this->execute_sql("select", array($field), $table, $where);
		//var_dump($checkresult[0]['p_id']) . "<br />";
		if(!empty($checkresult[0][$field])) {
			return $checkresult[0][$field];	
		}
		else {
			return false;	
		}
	}
	
	private function buildQueries($dataRows) {
		//var_dump($dataRows);
		foreach($dataRows as $column => $row) {
			$policyNumber = $row['addons']['a_policy_number'];
			
			// get all addons data
			$policyData = array();
			$policyData = $dataRows[$column]['addons'];
			/*foreach ($row['addons'] as $header => $value) {
				//$$header = ($row['addons'][$header]);
				if(!empty($row['addons'])) {
					$policyData = $row['addons'][$header];
				}
			}*/		
			
			$effective = str_replace("/", "-", $policyData['a_effective_date']);
			$effective = date("Y-m-d", strtotime($effective));
			$renewal = str_replace("/", "-", $policyData['a_renewal_date']);
			$renewal = date("Y-m-d", strtotime($renewal));
			$policyData['a_renewal_date'] = $renewal;
			$policyData['a_effective_date'] = $effective;
			$policyData['a_inception_date'] = $effective;
			
			$a_id = $this->execute_sql("insert", $policyData, "addons", "");	
												   
			//$this->execute_sql($action, $policyData, "addons", $whereStatement);
			unset($policyData);
			unset($whereStatement);
					
			// get policy_holders			
			$policyholderData = array();
			foreach ($row['addon_policy_holders'] as $header => $value) {
				//$$header = ($row['addons'][$header]);
				if(!empty($row['addon_policy_holders'][$header])) {
					$policyholderData[$header] = $row['addon_policy_holders'][$header];
				}
			}
			
			$policyholderData['aph_p_id'] = $a_id;
		
			$aph_id = $this->execute_sql("insert", $policyholderData, "addon_policy_holders", "");
			$this->execute_sql("update", array("a_aph_id" => $aph_id), "addons", "a_id=" . $a_id);									  
			
			unset($phDriver);
			unset($policyholderData);
			unset($whereStatement);
			
			//break;
			
			//var_dump($policyholderData);
			
			// get vehicles			
			$vehicleData = array();
			$vehicleData['av_p_id'] = $a_id;
			foreach ($row['addon_vehicles'] as $header => $value) {
				//$$header = ($row['addons'][$header]);
				if(!empty($row['addon_vehicles'][$header])) {
					$vehicleData[$header] = $row['addon_vehicles'][$header];
				}
			}
			$vehicle = $row['addon_vehicles']['av_long_desc'];
			$makemodel = explode(",", $vehicle);
			$extrainfo = explode(" ", $makemodel[3]);
			
			$vehicleData['av_make'] = ucwords(strtolower(trim($makemodel[0])));
			$vehicleData['av_model'] = ucwords(strtolower(trim($makemodel[1])));
			$vehicleData['av_cc'] = ucwords(strtolower(trim($makemodel[2])));
			$vehicleData['av_fuel_type'] = ucwords(strtolower(trim($extrainfo[2])));
			$vehicleData['av_transmission'] = ucwords(strtolower(trim($extrainfo[3])));
			
			$av_id = $this->execute_sql("insert", $vehicleData, "addon_vehicles", "");
			
			//$v_id = $this->checkKey("v_id", "vehicles", "v_p_id = '" . $p_id . "'");
			$policyArray = array();
			$policyArray['a_av_id'] = $av_id;
			$this->execute_sql("update", $policyArray, "addons", "a_id=" . $a_id);
			unset($policyArray);
							
			unset($vehicleData);
			unset($whereStatement);
		}
	}
	
	private function returnTableStructure($table) {
		return $this->get_table_structure($table);
	}
	
	private function get_table_structure($table) {
		// called in the construct to save time and database calls. It builds a snapshot of the table in an array
		global $foebis;
		$tableArray = array();
		
		$sql = "SHOW FIELDS FROM " . $table;
		$result = $foebis->query($sql);
		if($result->num_rows > 0){
			$i=0;
			while($row = $result->fetch_assoc()){ 
			   $tableArray[$row['Field']] = $this->get_field_type($row['Field'], $table);
			   //array_push($tableArray, $this->get_field_type($row['Field'], $table));
			}
		}
		
		//print_r($this->tableArray);
		unset($result);
		unset($row);
		
		if(!empty($table)) {
			return $tableArray;
		}
		else {
			return false;
		}
	}
	
	private function get_field_type($field, $table) {
		// called  by the get_table_structure function above to get the field type so the import knows whether or not to add quotes.
		global $foebis;
		
		$sql = "SELECT DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '" . $table . "' AND COLUMN_NAME = '" . $field . "'";
		$result = $foebis->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){ 
			   return $row['DATA_TYPE'];		  
			}
			unset($row);
		}
		unset($result);
		
		return true;
	}
	
	public function execute_sql($dbCallType, $selectArray, $dbCallTable, $whereStatement) {
		global $foebis;
		
		$arrayCount = count($selectArray);
		
		/* build up query */
		$query = $dbCallType . " ";
		
		if($dbCallType == "select") {
			if(!empty($selectArray)) {
				$i = 0;
				/* add select {value}, {value1} etc */
				foreach($selectArray as $value){
					$query .= $value;
					if($i < ($arrayCount - 1)) {
						$query .= ", ";
					}
					$i++;
				}
			}
			else {
				$query .= "*";		
			}
			$query .= " from " . $dbCallTable;
		}
		elseif($dbCallType == "update") {
			$tableFieldArray = $this->get_table_structure($dbCallTable);
			$query .= $dbCallTable . " set ";
			if(!empty($selectArray)) {
				$i = 0;
				/* build update fields */
				foreach($selectArray as $key => $value){
					$query .= $key . " = " ;
					
					if(($tableFieldArray[$key] == "int") || ($tableFieldArray[$key] == "decimal") || ($tableFieldArray[$key] == "float") || ($tableFieldArray[$key] == "tinyint")) {
						if(!empty($value)) {
							$query .= mysqli_real_escape_string($foebis, $value);
						}
						else {
							$query .= 0;	
						}
					}
					elseif(($tableFieldArray[$key] == "varchar") || ($tableFieldArray[$key] == "enum") || ($tableFieldArray[$key] == "time") || ($tableFieldArray[$key] == "timestamp") || ($tableFieldArray[$key] == "text") || ($tableFieldArray[$key] == "char") || ($tableFieldArray[$key] == "mediumtext")) {
						if(!empty($value)) {
							$query .= "'" . mysqli_real_escape_string($foebis, $value) . "'";
						}
						else {
							$query .= "(null)";	
						}
					}
					elseif($tableFieldArray[$key] == "date") {
						if(!empty($value)) {
							$query .= "'" . mysqli_real_escape_string($foebis, date("Y-m-d", strtotime(str_replace("/", "-",$value)))) . "'";
						}
						else {
							$query .= "(null)";	
						}
					}
					elseif($tableFieldArray[$key] == "datetime") {
						if(!empty($value)) {
							$query .= "'" . mysqli_real_escape_string($foebis, date("Y-m-d H:i:s", strtotime(str_replace("/", "-",$value)))) . "'";
						}
						else {
							$query .= "(null)";	
						}
					}					
					
					 /* add trailing commas if it's not the last field in the array */ 
					if($i < ($arrayCount - 1)) {
						$query .= ", ";
					}
					$i++;
				}
			}
		}
		elseif($dbCallType == "insert") {
			$tableFieldArray = $this->get_table_structure($dbCallTable);
			$query .= "into " . $dbCallTable . " ";
			if(!empty($selectArray)) {
				$i = 0;
				/* build insert query */
				foreach($selectArray as $key => $value){
					$intoField .= $key;
					if(($tableFieldArray[$key] == "int") || ($tableFieldArray[$key] == "decimal") || ($tableFieldArray[$key] == "float") || ($tableFieldArray[$key] == "tinyint")) {
						if(!empty($value)) {
							$valueField .= mysqli_real_escape_string($foebis, trim($value));
						}
						else {
							$valueField .= 0;	
						}
					}
					elseif(($tableFieldArray[$key] == "varchar") || ($tableFieldArray[$key] == "enum") || ($tableFieldArray[$key] == "time") || ($tableFieldArray[$key] == "timestamp") || ($tableFieldArray[$key] == "text") || ($tableFieldArray[$key] == "char") || ($tableFieldArray[$key] == "mediumtext")) {
						if(!empty($value)) {
							$valueField .= "'" . mysqli_real_escape_string($foebis, trim($value)) . "'";
						}
						else {
							$valueField .= "(null)";	
						}
					}
					elseif($tableFieldArray[$key] == "date") {
						if(!empty($value)) {
							$valueField .= "'" . mysqli_real_escape_string($foebis, date("Y-m-d", strtotime(str_replace("/", "-", trim($value))))) . "'";
						}
						else {
							$valueField .= "(null)";	
						}
					}
					elseif($tableFieldArray[$key] == "datetime") {
						if(!empty($value)) {
							$valueField .= "'" . mysqli_real_escape_string($foebis, date("Y-m-d H:i:s", strtotime(str_replace("/", "-", trim($value))))) . "'";
						}
						else {
							$valueField .= "(null)";	
						}
					}
					
					/* add trailing commas if it's not the last field in the array */
					if($i < ($arrayCount - 1)) {
						$intoField .= ", ";
						$valueField .= ", ";
					}
					$i++;
				}
			}
			$query .= "(" . $intoField . ") values (" . $valueField . ")";
		}
				
		/* add where statement onto the query */
		if(!empty($whereStatement)) {
			$query .= " where " . $whereStatement;
		}
		
		//echo $query;
				
		if($dbCallType == "select") {
			/* run query and return the result to the calling page */
			//echo $query . "<br /><br />";
			$result = $foebis->query($query);
			if($result) {
				$array = array();
				while($row = $result->fetch_assoc()){
					$array[] = $row;
				}
				unset($result);
				unset($row);
				return $array;
			}
			else {
				unset($result);
				if($foebis->error) {
					$this->writeErrorLog($foebis->error, $query);
					//return json_encode(array('success'=>'false'));
				}
			}
		}
		elseif($dbCallType == "update" || $dbCallType == "insert") {
			/* run query and return the result to the calling page, upon error write to error log */
			echo $query . "<br /><br />";	

			$result = $foebis->query($query);
			if($result) {
				unset($result);
				if($dbCallType == "insert") {	
					return $foebis->insert_id;
				}
				else {
					return true;	
				}
			}
			else {
				unset($result);
				if($foebis->error) {
					$this->writeErrorLog($foebis->error, $query);
					//return json_encode(array('success'=>'false'));
				}	
			}
		}
		return false;			
	}
	
	private function writeErrorLog($err, $sql) {
		global $conn;
		
		/* WRITE TO THE ERROR LOG - JS9 */
		$file = './logs/errors-' . date('Y-m-d') . '.txt';

		$output = "Timestamp: " . date("d-m-Y H:i:s") .  "\n";
		$output .= "Error: " . $err . "\n";
		$output .= "SQL: " . $sql . "\n\n";
		$output .= "------------------------------------------------------------------------------------------\n\n";
		
		file_put_contents($file, $output, FILE_APPEND | LOCK_EX);
		
		/* END WRITING TO ERROR LOG */
	}
}

?>