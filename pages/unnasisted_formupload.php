<?php

//if(empty($_SESSION['claimID'])) {
	require("../includes/mysqlwrapper_class.php");
	$conn = new mysqlwrapper_class;
	
	$checkValues = $conn->execute_sql("update", array("ar_assisted_unassisted" => $_POST['accident_recovery--ar_assisted_unassisted']), "accident_recovery", "ar_c_id=?", array("i" => $_SESSION['claimID']));
	
	
	//$_SESSION['claimID'] = $insertValues;
	
	//echo $insertValues;
	
	unset($_SESSION['claimID']);
//}
			
?>