<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

if($_POST['claim_ref1']) {
	$_POST['claim_ref'] = $_POST['claim_ref1'];
	unset($_POST['claim_ref1']);
}

$claim_number = trim($_SESSION['claimID']);
if($_POST['claimType'] == "incident_recovery") {
	$_POST['accident_recovery--ar_c_id'] = $claim_number;
}
if($_POST['claimType'] == "breakdown_assistance") {
	$_POST['breakdown_assistance--bd_c_id'] = $claim_number;
}
if($_POST['claimType'] == "fnol") {
	$_POST['fnol--f_c_id'] = $claim_number;
}
unset($_POST['claim_ref']);
unset($_POST['claimType']);
			 
$formVals = array();

foreach($_POST as $key => $value) {
	$fieldSplit = explode("--", $key);
	//$formFields[$fieldSplit[0]][] = $fieldSplit[1];
	$formVals[$fieldSplit[0]][$fieldSplit[1]] = $value;
}

$tables = array("accident_recovery" => "ar_c_id", "breakdown_assistance" => "db_c_id", "fnol" => "f_c_id");

foreach($tables as $table => $field) {
	// header = table name, value = primary key set above
	$insertFields = array();

	$exists = $conn->execute_sql("select", array('count(*) as row_count'), $table, $field . "=?", array("i" => $claim_number));
	$cpExists = $exists[0]['row_count'];
	
	if(!empty($formVals[$table])) {
		foreach($formVals[$table] as $key => $value) {
			$insertFields[$key] = $value;
		}
		
		if($cpExists == 0) {
			if($table == "accident_recovery"){
				if($insertFields['ar_incident_date_0']) {
					$insertFields['ar_incident_date'] = $insertFields['ar_incident_date_0'];
					unset($insertFields['ar_incident_date_0']);
				}
				if($insertFields['ar_incident_date_1']) {
					$insertFields['ar_incident_date'] = $insertFields['ar_incident_date_1'];
					unset($insertFields['ar_incident_date_1']);
				}
				unset($insertFields['ar_incident_date_0']);
				unset($insertFields['ar_incident_date_1']);
				
				$cp = $conn->execute_sql("insert", $insertFields, $table, "", "");
				$conn->execute_sql("update", array("c_ar_id" => $cp), "claims", "c_id=?", array("i" => $claim_number));
			}
			elseif($table == "breakdown_assistance"){
				$cp = $conn->execute_sql("insert", $insertFields, $table, "", "");
				$conn->execute_sql("update", array("c_bd_id" => $cp), "claims", "c_id=?", array("i" => $claim_number));
			}
			elseif($table == "fnol"){
				$cp = $conn->execute_sql("insert", $insertFields, $table, "", "");
				$conn->execute_sql("update", array("c_f_id" => $cp), "claims", "c_id=?", array("i" => $claim_number));
			}
		}
		else {	
			$cp = $conn->execute_sql("update", $insertFields, $table, $field . "=?", array("i" => $claim_number));
		}
	}
}

?>