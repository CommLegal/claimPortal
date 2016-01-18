<?php
if(empty($_SESSION['claimID'])) {
	require("../includes/mysqlwrapper_class.php");
	$conn = new mysqlwrapper_class;
	
	$insertValues = $conn->execute_sql("insert", array("c_claim_type" => $_POST['claimType'], "c_timestamp" => $_POST['claimTimestamp'], "c_p_id" => $_POST['policyId'], "c_ph_id" => $_POST['policyHolderId'], "c_ul_id" => $_SESSION['userID']), "claims", "", "");
	
	$_SESSION['claimID'] = trim($insertValues);
	echo trim($insertValues);
}
else {
	echo $_SESSION['claimID'];	
}
			
?>