<?php 
require("../includes/config.php");

require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

$userLogin = $conn->execute_sql("select", array("ul_id", "ul_username", "ul_password", "ul_forename", "ul_surname", "ul_company_title", "ul_breakdown", "ul_accident_recovery", "ul_fnol"), "user_login", "ul_id=?", array("i" => $_SESSION['userID']));

if(!empty($userLogin)) {
	//setcookie("username", strtoupper($_POST['username']), strtotime('today 08:00'));
	
	$_SESSION['userName'] = $userLogin[0]['ul_username'];
	$_SESSION['userID'] = $userLogin[0]['ul_id'];
	$_SESSION['companyTitle'] = $userLogin[0]['ul_company_title'];
	$_SESSION['permissions']['breakdown'] = $userLogin[0]['ul_breakdown'];
	$_SESSION['permissions']['accident_recovery'] = $userLogin[0]['ul_accident_recovery'];
	$_SESSION['permissions']['fnol'] = $userLogin[0]['ul_fnol'];
}

?>