<?php
require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

var_dump($_POST);
	
$conn->execute_sql("insert", array("np_p_id" => $_POST['p_id'], "np_postValues" => $_POST['href'], "np_timestamp" => date("Y-m-d H:i:s")), "nci_post", "", "");

?>