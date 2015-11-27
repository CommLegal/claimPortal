<?php

$_POST['accident_recovery--ar_reporting_user'] = $_SESSION['userName'];
$_POST['accident_recovery--ar_policy_number'] = $_POST[''];
$_POST['accident_recovery--ar_policy_holder'] = $_POST[''];
$_POST['accident_recovery--ar_vehicle_reg'] = $_POST[''];
$_POST['accident_recovery--ar_incident_date'] = date("Y-m-d");
$_POST['accident_recovery--ar_vehicle_storage'] = $_POST[''];
$_POST['accident_recovery--ar_vehicle_location'] = $_POST[''];
$_POST['accident_recovery--ar_circumstances'] = $_POST[''];
$_POST['accident_recovery--ar_vehicles_involved'] = $_POST[''];
$_POST['accident_recovery--ar_injured_parties'] = $_POST[''];
$_POST['accident_recovery--ar_circumstance_details'] = $_POST[''];
$_POST['accident_recovery--ar_other_info'] = $_POST[''];

$formVals = array();

foreach($_POST as $key => $value) {
	$fieldSplit = explode("--", $key);
	$formVals[$fieldSplit[0]][$fieldSplit[1]] = $value;
}

$tables = array("accident_recovery" => "ar_reporting_user");

foreach($tables as $table => $field) {
	// header = table name, value = primary key set above
	$insertFields = array();
	
	$cp = $conn->execute_sql("insert", $insertFields, $table, "", array(""));
	
}


?>