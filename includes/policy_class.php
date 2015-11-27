<?php
class policy_class {
	
	function __construct() {
		//$this->getTableStructures();
	}
	
	function __destruct() {
		global $conn;
		
		$conn->close();
	}
	
	public function search_policy($name, $policy, $reg) {
		require_once('mysqlwrapper_class.php');
		$conn = new mysqlwrapper_class;

		if(!empty($name)) {
			$nameSplit = explode(" ", $name);
			$policyInfo = $conn->execute_sql("select", array('*'), "policy JOIN policy_holders ON p_id = ph_p_id join vehicles on v_p_id = p_id", "p_ph_forename=LOWER(?) AND p_ph_surname=LOWER(?)", array("s1" => strtolower($nameSplit[0]), "s2" => strtolower($nameSplit[1])));
		}
		elseif(!empty($policy)) {
			$policyInfo = $conn->execute_sql("select", array('*'), "policy JOIN policy_holders ON p_id = ph_p_id join vehicles on v_p_id = p_id", "p_policy_number=? and p_cancel_date is NULL and p_renewal_date >= '" . date('Y-m-d') . "'", array("s" => $policy));
		}
		elseif(!empty($reg)) {
			$policyInfo = $conn->execute_sql("select", array('*'), "policy JOIN policy_holders ON p_id = ph_p_id join vehicles on v_p_id = p_id", "v_reg=? and p_cancel_date is NULL and p_renewal_date >= '" . date('Y-m-d') . "'", array("s" => $reg));
		}
		
		return $policyInfo;
		
	}
	
}
?>