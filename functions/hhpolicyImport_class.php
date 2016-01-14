<?php
//require_once('../includes/config.php');
error_reporting(E_ERROR);
set_time_limit(0);
ini_set('display_errors', 1);
ini_set('max_execution_time', '-1');

/*define("_CME_HOSTNAME", "192.168.3.214");
define("_CME_USERNAME", "claimPortal");
define("_CME_PASSWORD", "claimPortal001!");
define("_CME_DATABASE", "claimPortal");*/

define("_CME_HOSTNAME", "5.159.226.131");
define("_CME_USERNAME", "claimPortal");
define("_CME_PASSWORD", "CLadmin001!");
define("_CME_DATABASE", "claimPortal");

@$foebis = new mysqli(_CME_HOSTNAME, _CME_USERNAME, _CME_PASSWORD, _CME_DATABASE);
if(mysqli_connect_errno()) {
	echo "Error connecting DB, please try again later HERE.";
	exit;
}
$foebis->select_db(_CME_DATABASE);

class hhpolicyImport_class {
	
	function __CONSTRUCT() {		
		global $foebis;
		
		//$file = "/feed/addbord_" . date("dmY") . ".csv";
		$file = "files/hhpolicies.csv";
		
		// run through the CSV and pass back the results
		$data = $this->parseCSV($file);
		
		// pass the results for splitting into database calls
		//$dataRows = $this->analyseData($data);
		//var_dump($dataRows);
		mysql_close($foebis);
	}
	
	private function feedColumns(){
		/* seperate table name and column name with a :
			maps each column in the spreadsheet with a database table and field
		*/

		$columns = array(
			0 => array("Cust Num", "policy_holders:ph_customerNo"),
			1 => array("Title", "policy_holders:ph_title"),
			2 => array("Surname", "policy_holders:ph_surname"),
			3 => array("Firstname", "policy_holders:ph_forename"),
			4 => array("Address1", "policy_holders:ph_address1"),
			5 => array("Address2", "policy_holders:ph_address2"),
			6 => array("Address3", "policy_holders:ph_address3"),
			7 => array("Address4", "policy_holders:ph_address4"),
			8 => array("Post Code", "policy_holders:ph_postcode"),
			9 => array("Home Tel", "policy_holders:ph_telephone"),
			10 => array("Work Tel", "policy_holders:ph_telephone_other"),
			11 => array("E-Mail", "policy_holders:ph_email"),
			12 => array("Policy Id", ""),
			13 => array("PolicyType", ""),
			14 => array("PolicyNumber", "policy:p_policy_number"),
			15 => array("Insurer", "policy:p_broker"),
			16 => array("Status", ""),
			17 => array("Inception", "policy:p_inception_date"),
			18 => array("Renewal", "policy:p_renewal_date"),
			19 => array("Quote", ""),
			20 => array("SaleMethod", ""),
			21 => array("Advised", ""),
			22 => array("User", ""),
			23 => array("Branch", ""),
			24 => array("Agent", ""),
			25 => array("Scheme", ""),
			26 => array("Instl. Plan", ""),
			27 => array("Acc. Type", ""),
			28 => array("Source", ""),
			29 => array("SaleType", ""),
			30 => array("Campaign", ""),
			31 => array("Period", ""),
			32 => array("lx Insurer", ""),
			33 => array("lx Scheme", ""),
			34 => array("lx Pol Num", ""),
			35 => array("lx Prem.", ""),
			36 => array("lx Inception", ""),
			37 => array("lx Renewal", ""),
			38 => array("Scheme", ""),
			39 => array("PostDate", ""),
			40 => array("Protected", ""),
			41 => array("GrossPremium", ""),
			42 => array("DriverDOB", ""),
			43 => array("Vehicle", ""),
			44 => array("VehValue", ""),
			45 => array("Registration", ""),
			46 => array("P_Canc", ""),
			47 => array("P_Code", ""),
			48 => array("P_Description", ""),
			49 => array("P_Insurer", ""),
			50 => array("P_PolType", ""),
			51 => array("P_Prem", ""),
			52 => array("P_Scheme", "")
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
				if($i > 1) {
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
				if($i == 10) {
					break;
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
		$checkresult = $this->execute_sql("select", array("p_id"), "policy", "p_policy_number = '" . $policyNumber . "' and p_policy_type = 'HOUSEHOLD'");
		//var_dump($checkresult[0]['p_id']) . "<br />";
		if(!empty($checkresult[0]['p_id'])) {
			return $checkresult[0]['p_id'];	
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
			$policyNumber = $row['policy']['p_policy_number'];
			
			// get all addons data
			$policyData = array();
			$policyData = $dataRows[$column]['policy'];
			/*foreach ($row['addons'] as $header => $value) {
				//$$header = ($row['addons'][$header]);
				if(!empty($row['addons'])) {
					$policyData = $row['addons'][$header];
				}
			}*/		
			
			$p_id = $this->checkKey("p_id", "policy", "p_policy_number = '" . $policyNumber . "' and p_broker = '" . $row['policy']['p_broker'] . "'");
			
			$inception = str_replace("/", "-", $policyData['p_inception_date']);
			$inception = date("Y-m-d", strtotime($inception));
			$renewal = str_replace("/", "-", $policyData['p_renewal_date']);
			$renewal = date("Y-m-d", strtotime($renewal));
			
			$policyData['p_renewal_date'] = $renewal;
			$policyData['p_effective_date'] = $inception;
			$policyData['p_inception_date'] = $inception;
			$policyData['p_policy_type'] = "HOUSEHOLD";
			
			if($p_id) {
				$action = "update";
				$whereStatement = "p_id = " . $p_id;
				$this->execute_sql($action, $policyData, "policy", $whereStatement);
			}
			else {
				$action = "insert";	
				$p_id = $this->execute_sql($action, $policyData, "policy", "");	
			}
												   
			//$this->execute_sql($action, $policyData, "addons", $whereStatement);
			unset($policyData);
			unset($whereStatement);
					
			// get policy_holders			
			$policyholderData = array();
			foreach ($row['policy_holders'] as $header => $value) {
				//$$header = ($row['addons'][$header]);
				if(!empty($row['policy_holders'][$header])) {
					$policyholderData[$header] = $row['policy_holders'][$header];
				}
			}
			
			$ph_id = $this->checkKey("p_ph_id", "policy", "p_id = " . $p_id);
			$policyholderData['ph_p_id'] = $p_id;
		
			if($ph_id) {
				$action = "update";
				$whereStatement = "ph_id = " . $ph_id;
				$this->execute_sql($action, $policyholderData, "policy_holders", $whereStatement);
			}
			else {
				$action = "insert";	
				$ph_id = $this->execute_sql($action, $policyholderData, "policy_holders", "");
				$this->execute_sql("update", array("p_ph_id" => $ph_id), "policy", "p_id=" . $p_id);
			}												  
			
			unset($phDriver);
			unset($policyholderData);
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
			//echo $query . "<br /><br />";	

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