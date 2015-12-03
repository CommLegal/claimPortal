<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_POST['callPage'] == "addTP") {	
	require("popups/addTP.php");
}
elseif($_POST['callPage'] == "viewBD") {	
	require("popups/viewBD.php");
}

?>