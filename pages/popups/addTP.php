<?php
require("../includes/config.php");
if(!empty($_POST['callValues'])) {
	require("../includes/mysqlwrapper_class.php");
	$conn = new mysqlwrapper_class;
	
	$insertValues = $conn->execute_sql("select", array("*"), "third_party", "tp_id=?", array("i" => $_POST['callValues']));
}

echo $_POST['callValues'];
?>
<form action="" method="post" enctype="multipart/form-data" name="addTP" id="addTP">
<div class="left"><label>Name:</label></div>
<div class="right"><input name="tp_name" type="text" id="tp_name" size="30" placeholder="" value="<?php echo $insertValues[0]['tp_name'] ?>" required /></div>

<div class="left"><label>Registration:</label></div>
<div class="right"><input name="tp_v_reg" type="text" id="tp_v_reg" size="30" placeholder="" value="<?php echo $insertValues[0]['tp_v_reg'] ?>" required /></div>

<div class="left"><label>Make & Model:</label></div>
<div class="right"><input name="tp_make_model" type="text" id="tp_make_model" size="30" placeholder="" value="<?php echo $insertValues[0]['tp_make_model'] ?>" /></div>

<div class="left"><label>Contact Number:</label></div>
<div class="right"><input name="tp_contact_number" type="text" id="tp_contact_number" size="30" placeholder="" value="<?php echo $insertValues[0]['tp_contact_number'] ?>" required /></div>

<div class="left"><label>Alternative Number:</label></div>
<div class="right"><input name="tp_contact_alternative" type="text" id="tp_contact_alternative" size="30" placeholder="" value="<?php echo $insertValues[0]['tp_contact_alternative'] ?>"/></div>

<div class="left"><label>TP Type: &nbsp;</label></div>
<div class="right"><select name="tp_type" id ="tp_type">
  <option selected="selected">Select</option>
    <option value="Motorist"<?php echo (($insertValues[0]['tp_type'] == "Motorist") ? " selected=selected" : "") ?>>Motorist</option>
    <option value="Motorcyclist"<?php echo (($insertValues[0]['tp_type'] == "Motorcyclist") ? " selected=selected" : "") ?>>Motorcyclist</option>
    <option value="Cyclist"<?php echo (($insertValues[0]['tp_type'] == "Cyclist") ? " selected=selected" : "") ?>>Cyclist</option>
    <option value="Pedestrian"<?php echo (($insertValues[0]['tp_type'] == "Pedestrian") ? " selected=selected" : "") ?>>Pedestrian</option>
    <option value="Other"<?php echo (($insertValues[0]['tp_type'] == "Other") ? " selected=selected" : "") ?>>Other</option>
</select>
</div>
<input type="hidden" name="tp_c_id" id="tp_c_id" value="<?php echo $_SESSION['claimID'] ?>" />
<input type="hidden" name="table" id="table" value="third_party" />
<?php if(empty($_POST['callValues'])) { ?>
<input type="hidden" name="db_callType" id="db_callType" value="insert" />
<?php } else { ?>
<input type="hidden" name="tp_id" id="tp_id" value="<?php echo $_POST['callValues'] ?>" />
<input type="hidden" name="db_callType" id="db_callType" value="update" />
<?php } ?>
<div class="left">&nbsp;</div><div class="right"><input type="submit" class = "btn btn-primary" name="save" id="save" value = "Save" /></div>
<div class="left">&nbsp;</div><div class="right"><div id="popup-results"></div></div>
</form>
<script src="<?php echo _ROOT ?>/js/popups.js"></script>