<?php

$_POST['fnol--f_reporting_user'] = $_SESSION['userName'];
$_POST['fnol--f_policy_number'] = $_POST[''];
$_POST['fnol--f_policy_holder'] = $_POST[''];
$_POST['fnol--f_vehicle_reg'] = $_POST[''];
$_POST['fnol--f_incident_date'] = date("Y-m-d");
$_POST['fnol--f_vehicle_storage'] = $_POST[''];
$_POST['fnol--f_vehicle_location'] = $_POST[''];
$_POST['fnol--f_circumstances'] = $_POST[''];
$_POST['fnol--f_vehicles_involved'] = $_POST[''];
$_POST['fnol--f_injured_parties'] = $_POST[''];
$_POST['fnol--f_circumstance_details'] = $_POST[''];
$_POST['fnol--f_other_info'] = $_POST[''];

$formVals = array();

foreach($_POST as $key => $value) {
	$fieldSplit = explode("--", $key);
	$formVals[$fieldSplit[0]][$fieldSplit[1]] = $value;
}

$tables = array("fnol" => "f_reporting_user");

foreach($tables as $table => $field) {
	// header = table name, value = primary key set above
	$insertFields = array();
	
	$cp = $conn->execute_sql("insert", $insertFields, $table, "", array(""));
	
}


?>