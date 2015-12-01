<?php
require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

require("../includes/email_class.php");

$policyInfo = $conn->execute_sql("select", array("*"), "policy", "p_id=?", array("i" => $_POST['p_id']));

if(!empty($policyInfo)) {
	$policyholderInfo = $conn->execute_sql("select", array("*"), "policy_holders", "ph_p_id=?", array("i" => $_POST['p_id']));
	$vehicleInfo = $conn->execute_sql("select", array("*"), "vehicles", "v_p_id=?", array("i" => $_POST['p_id']));
	
	$breakdownInfo = $conn->execute_sql("select", array('a_description'), "addons", "a_addon_type=? and a_policy_number=? and (a_cancel_date IS NULL OR a_cancel_date = '0000-00-00') and a_renewal_date >= '" . date('Y-m-d') . "'", array("s1" => "CBA", "s2" => $policyInfo[0]['p_policy_number']));
	if(!empty($breakdownInfo)) {
		switch($breakdownInfo[0]['a_description']) {
			case "RAC EU Breakdown":
				$cover = "";
				break;
			default:
				$cover = "Gold";
		}
	}
	else {
		$cover = "Basic";	
	}
	
	switch($vehicleInfo[0]['v_transmission']) {
		case "M":
			$transmission = "Manual";
			break;
		case "A":
			$transmission = "Automatic";
			break;
	}
	
	switch($vehicleInfo[0]['v_fuel_type']) {
		case "P":
			$fuel = "Petrol";
			break;
		case "D":
			$fuel = "Diesel";
			break;
		case "E":
			$fuel = "Hybrid";
			break;
		default:
			$fuel = "Unknown";
	}
	
	//extract data from the post
	//set POST variables
	//$url = 'https://activejobs.ncigroup.local/onecall/index.aspx';
	$url = "http://activejobs.ncigroup.local/onecall/index.aspx";
	$fields = array(
		'CustomerTitle' => urlencode($policyholderInfo[0]['ph_title']),
		'CustomerForename' => urlencode(ucwords(strtolower($policyholderInfo[0]['ph_forename']))),
		'CustomerSurname' => urlencode(ucwords(strtolower($policyholderInfo[0]['ph_surname']))),
		'Postcode' => urlencode($policyholderInfo[0]['ph_postcode']),
		'TelephoneNumber' => urlencode($policyholderInfo[0]['ph_telephone']),
		'LandlineNumber' => urlencode($policyholderInfo[0]['ph_telephone_other']),
		'PolicyNumber' => urlencode($policyInfo[0]['p_policy_number']),
		'InceptionDate' => urlencode(date("d/m/Y", strtotime($policyInfo[0]['p_inception_date']))),
		'Cover' => urlencode($cover),
		'VehicleReg' => urlencode($vehicleInfo[0]['v_reg']),
		'VehicleMake' => urlencode($vehicleInfo[0]['v_make']),
		'VehicleModel' => urlencode($vehicleInfo[0]['v_model']),
		'VehicleFuelType' => urlencode($fuel),
		'VehicleTransmission' => urlencode($transmission)
	);
	
	//url-ify the data for the POST
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');
	
	$postID = $conn->execute_sql("insert", array("np_p_id" => $_POST['p_id'], "np_postValues" => "", "np_timestamp" => date("Y-m-d H:i:s")), "nci_post", "", "");
	
	var_dump($postID);
	break;
	
	//open connection
	$ch = curl_init();
	
	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
	//execute post
	$result = curl_exec($ch);
	
	if(curl_errno($ch))
	{
		$conn->execute_sql("insert", array("np_p_id" => $_POST['p_id'], "np_status" => "ERROR", "np_c_error" => curl_error($c), "np_timestamp" => date("Y-m-d H:i:s")), "nci_post", "", "");
	}
	else {
		$conn->execute_sql("insert", array("np_p_id" => $_POST['p_id'], "np_status" => "SUCCESS", "np_c_error" => curl_error($c), "np_timestamp" => date("Y-m-d H:i:s")), "nci_post", "", "");	
	}
			
	//close connection
	curl_close($ch);		
}

?>