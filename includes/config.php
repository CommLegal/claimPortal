<?php
/*function __autoload($className) {
	require "./includes/" . $className . '.php';
}*/

error_reporting(E_ERROR);
ini_set('display_errors', 1);

date_default_timezone_set('Europe/London');

session_start();

define("_SERVER_ROOT", "http://192.168.3.215/");
define("_ROOT", "http://192.168.3.215/claimPortal");
define("_SITEROOT", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

define("_CME_HOSTNAME", "192.168.3.214");
define("_CME_USERNAME", "claimPortal");
define("_CME_PASSWORD", "claimPortal001!");
define("_CME_DATABASE", "claimPortal");

//define("_PWD_SALT", "'RDYOVKL5CTRLYANJTXKVZ9OHPW98ES'");

define("_EMAIL_SERVER", "192.168.2.150");
define("_EMAIL_USER", "noreply");
define("_EMAIL_PASSWORD", "direct987*");
define("_EMAIL_ADDRESS", "noreply@commercial-legal.co.uk");

?>