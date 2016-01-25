<?php
//require_once('../includes/config.php');
error_reporting(E_ERROR);
set_time_limit(0);
ini_set('display_errors', 1);
ini_set('max_execution_time', '-1');

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

class cancelledAddonImport_class {
	
	function __CONSTRUCT() {		
		global $foebis;
		
		// map the CSV columns to database fields
		//$columns = $this->feedColumns();
		
		//$this->getFile(date("Y.m.d")."CSV");
		//$lastDay = date("d") - 1;

		//$file = "/feed/addbord_" . date("dmY") . ".csv";
		$file = "files/cancelled_addons.csv";
		
		if (($handle = fopen($file, "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
				$num = count($data);
				$i++;
				if($i > 1) {
					$policyNo = trim((string)$data[0]);
					echo $policyNo . "<br />";
					//$this->execute_sql("update", array("a_cancel_date" => date("Y-m-d")), "addons", "a_policy_number='" . $policyNo . "' and a_addon_type = 'HEC'");					
				}
				if($i == 50) {
					//break;
				}

			}
		}
		mysql_close($foebis);
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
					//echo $foebis->error;
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
		$file = '../logs/errors-' . date('Y-m-d') . '.txt';

		$output = "Timestamp: " . date("d-m-Y H:i:s") .  "\n";
		$output .= "Error: " . $err . "\n";
		$output .= "SQL: " . $sql . "\n\n";
		$output .= "------------------------------------------------------------------------------------------\n\n";
		
		file_put_contents($file, $output, FILE_APPEND | LOCK_EX);
		
		/* END WRITING TO ERROR LOG */
	}
}

?>