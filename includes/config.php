<?php
/*function __autoload($className) {
	require "./includes/" . $className . '.php';
}*/

error_reporting(E_ERROR);
ini_set('display_errors', 1);

date_default_timezone_set('Europe/London');

session_start();

if($_SERVER['SERVER_ADDR'] == "192.168.3.215") {
	define("_SERVER_ROOT", "http://192.168.3.215/claimPortal/");
	define("_ROOT", "http://192.168.3.215/claimPortal");
	define("_CME_HOSTNAME", "5.159.226.131");
	define("_CME_USERNAME", "claimPortal");
	define("_CME_PASSWORD", "CLadmin001!");
	define("_CME_DATABASE", "claimPortal");
	
	define("_EMAIL_SERVER", "192.168.2.150");
	define("_EMAIL_USER", "noreply");
	define("_EMAIL_PASSWORD", "direct987*");
	define("_EMAIL_ADDRESS", "noreply@commercial-legal.co.uk");
}
elseif($_SERVER['SERVER_ADDR'] == "5.159.226.131") {
	define("_SERVER_ROOT", "https://portal.commercial-legal.co.uk/");
	define("_ROOT", "https://portal.commercial-legal.co.uk");
	define("_CME_HOSTNAME", "5.159.226.131");
	define("_CME_USERNAME", "claimPortal");
	define("_CME_PASSWORD", "CLadmin001!");
	define("_CME_DATABASE", "claimPortal");
}
define("_SITEROOT", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

//define("_PWD_SALT", "'RDYOVKL5CTRLYANJTXKVZ9OHPW98ES'");

define("_SALT", "rE!wec#PpcnDK7*&5S#V87kRc69G2zVe");

if($_SERVER['SERVER_ADDR'] == "5.159.226.131") {
	$allowed = 0;
	$allowed_ips = array("OneCall" => "212.250.30.242", "NCI" => "188.39.142.171", "National Windscreens" => "88.98.181.29", "NEG" => "79.78.61.186", "Nationwide Windscreens" => "109.151.79.226", "Nationwide Windscreens 1" => "5.179.75.66", "Nationwide Windscreens 2" => "81.149.92.46", "Nationwide Windscreens 3" => "88.211.106.82");
	foreach($allowed_ips as $company => $ip) {
		if($_SERVER['REMOTE_ADDR'] == $ip) {
			$allowed = 1;
		}
	}
	if($allowed == 0) {
		echo "<h3>You are not authorised to view this page</h3>";	
		exit;
	}
}


?>