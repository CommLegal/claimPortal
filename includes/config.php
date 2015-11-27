<?php
/*function __autoload($className) {
	require "./includes/" . $className . '.php';
}*/

error_reporting(E_ERROR);
ini_set('display_errors', 1);

date_default_timezone_set('Europe/London');

session_start();

define("_SERVER_ROOT", "https://portal.commercial-legal.co.uk/");
define("_ROOT", "https://portal.commercial-legal.co.uk");
define("_SITEROOT", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

define("_CME_HOSTNAME", "5.159.226.131");
define("_CME_USERNAME", "claimPortal");
define("_CME_PASSWORD", "CLadmin001!");
define("_CME_DATABASE", "claimPortal");

//define("_PWD_SALT", "'RDYOVKL5CTRLYANJTXKVZ9OHPW98ES'");

define("_SALT", "rE!wec#PpcnDK7*&5S#V87kRc69G2zVe");

$allowed = 0;
$allowed_ips = array("OneCall" => "212.250.30.242");
foreach($allowed_ips as $company => $ip) {
	if($_SERVER['REMOTE_ADDR'] == $ip) {
		$allowed = 1;
	}
}
if($allowed == 0) {
	echo "<h3>You are not authorised to view this page</h3>";	
	break;
}


?>