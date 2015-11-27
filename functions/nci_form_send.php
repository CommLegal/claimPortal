<?php
require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

session_start();
echo $_SESSION['claimID'];

$claimInfo = $conn->execute_sql("select", array("*"), "claims", "c_id=?", array("i" => $_SESSION['claimID']));
if($claimInfo[0]['c_claim_type'] !== "fnol") {
	$policyInfo = $conn->execute_sql("select", array("*"), "policy", "p_id=?", array("i" => $claimInfo[0]['c_p_id']));
	$policyholderInfo = $conn->execute_sql("select", array("*"), "policy_holders", "ph_p_id=?", array("i" => $claimInfo[0]['c_p_id']));
	$vehicleInfo = $conn->execute_sql("select", array("*"), "vehicles", "v_p_id=?", array("i" => $claimInfo[0]['c_p_id']));
	
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
	
	
}


?>

Form POST over SSL to https://activejobs.ncigroup.local/onecall/index.aspx (Available internally only)
 
CustomerTitle        
CustomerForename
CustomerSurname
Postcode
TelephoneNumber
LandlineNumber
PolicyNumber  
InceptionDate        dd/mm/yyyy        
Cover                Please pass one of the following values;     [Basic, Gold]
VehicleReg
VehicleMake
VehicleModel
VehicleYear
VehicleColour
VehicleType          Please pass one of the following values;     [Car, Bike, Van, HGV]
VehicleFuelType      Please pass one of the following values;     [Petrol, Diesel, Hybrid, Unknown]
VehicleTranmission   Please pass one of the following values;     [Manual, Automatic]
