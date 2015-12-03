<?php 
require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

$string = "";

$user = $_POST['user'];
$after = $_POST['after'];
$interactionID = $_POST['i_id'];

$table = $_POST['table'];
//$sql = "update " . $table . " set ";
$callType = $_POST['db_callType'];
//$where = " where " . $_POST['where'];
$where = $_POST['where'];
		
if($_POST['buttonClicked'] == "save") {
	unset($_POST['buttonClicked']);
	unset($_POST['database']);
	unset($_POST['table']);
	unset($_POST['where']);
	unset($_POST['db_callType']);
	unset($_POST['user']);
	unset($_POST['after']);
	
	// -1 becaue the 
	$postCount = count($_POST);
	
	// run queries
	if($table == "third_party") {
		if($callType == "update") {
			$tp_id = $_POST['tp_id'];
			unset($_POST['tp_id']);
			unset($_POST['tp_c_id']);
			unset($_POST['claimTimestamp']);
			unset($_POST['policyId']);
			unset($_POST['policyHolderId']);
			
			$conn->execute_sql("update", $_POST, $table, "tp_id=?", array("i" => $tp_id));	
		}
		else {
			$conn->execute_sql("insert", $_POST, $table, "", array());
		}
		echo "Record has been saved";
	}
	elseif($table == "breakdown_assistance") {
		if($callType == "update") {
			$bd_id = $_POST['bd_id'];
			unset($_POST['bd_id']);
			
			$conn->execute_sql("update", $_POST, $table, "bd_id=?", array("i" => $bd_id));	
		}
		else {
			$conn->execute_sql("insert", $_POST, $table, "", array());
		}
		echo "Record has been saved";
	}
}

elseif($_POST['buttonClicked'] == "complete") {
	unset($_POST['buttonClicked']);	
	if($_POST['db_callType'] == "update") {
		$table = $_POST['table'];
		$conn->execute_sql("update", array("de_complete_date" => date("Y-m-d H:i:s"), "de_status" => "complete", "de_complete_user" => $_COOKIE['username']), $table, "de_id=?", array("i" => $_POST['de_id']));
	}
}
elseif($_POST['buttonClicked'] == "delete") {
	unset($_POST['buttonClicked']);	
	$conn->execute_sql("delete", "", $table, $where, "");
	echo "Action deleted";
}

?>