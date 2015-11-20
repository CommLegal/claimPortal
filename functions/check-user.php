<?php 

require("../includes/config.php");

require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

$encryptKey = "rE!wec#PpcnDK7*&5S#V87kRc69G2zVe";

$encryptPass = $_POST['password'] . $encryptKey . $_POST['password'] . $encryptKey . $_POST['password'] . $encryptKey;

//$userLogin = $login->execute_sql($_POST['username'], $encryptPass);

$userLogin = $conn->execute_sql("select", array("ul_name", "ul_password"), "user_login", "ul_name=? AND ul_password=?", array("s1" => $_POST['username'], "s2" => $encryptPass));


if($userLogin) {
	setcookie("username",strtoupper($_POST['username']), strtotime('today 08:00'));

session_start();

	var_dump($login);
}
else {
	echo "There has been a problem logging you in";	
}

?>