<?php 
require("../includes/config.php");

require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

$encryptPass = md5($_POST['password'] . _SALT . $_POST['password'] . _SALT . $_POST['password'] . _SALT);

//$userLogin = $login->execute_sql($_POST['username'], $encryptPass);

$userLogin = $conn->execute_sql("select", array("ul_id", "ul_username", "ul_password", "ul_forename", "ul_surname", "ul_company_title", "ul_breakdown", "ul_accident_recovery", "ul_fnol"), "user_login", "ul_username=LOWER(?) AND ul_password=?", array("s1" => strtolower($_POST['username']), "s2" => $encryptPass));

//var_dump($userLogin);

if(!empty($userLogin)) {
	//setcookie("username", strtoupper($_POST['username']), strtotime('today 08:00'));
	
	session_start();
	
	setcookie("userID",$userLogin[0]['ul_id'], strtotime('today 08:00'));
}
else {
	echo "There has been a problem logging you in ";	
	
	//var_dump($userLogin[0]);
	
	//echo $encryptPass;
}

?>