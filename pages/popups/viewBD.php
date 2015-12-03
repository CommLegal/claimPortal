<?php
require("../includes/config.php");
if(!empty($_POST['callValues'])) {
	require("../includes/mysqlwrapper_class.php");
	$conn = new mysqlwrapper_class;
	
	$insertValues = $conn->execute_sql("select", array("*"), "breakdown_assistance", "bd_id=?", array("i" => $_POST['callValues']));
}

echo $_POST['callValues'];
?>
<form action="" method="post" enctype="multipart/form-data" name="viewBD" id="viewBD">
    <div class="left"><label>Details of breakdown:</label></div>
    <div class="right"><textarea type="text" name ="breakdown_assistance--bd_further_info" rows = "10" cols="70" class="form-control mb25" placeholder="" disabled> </textarea></div>
    
    <div class="left"><label>Status:</label></div>
    <div class="right"><select id = "breakdown_assistance--bd_assisted_unassisted" name="breakdown_assistance--bd_assisted_unassisted">
        <option value="">Select</option>
        <option value="Assisted">Assisted</option>
        <option value="Unassisted">Unassisted</option>
    </select></div>
    
    <div class="left"><label>Reason for Unassisted (if applicable):</label></div>
    <div class="right"><select id = "breakdown_assistance--bd_unassist_reason" name="breakdown_assistance--bd_unassist_reason">
        <option value="0">Select</option>
        <option value="1">Wrong fuel</option>
        <option value="2">Tyre related on basic</option>
        <option value="3">Key related</option>
        <option value="4">Cancelled</option>
        <option value="5">Same breakdown fault as previous</option>
        <option value="Other">Other</option>
    </select></div>
    
    <div class="left"><label>More Details:</label></div>
    <div class="right"><textarea type="text" name ="breakdown_assistance--bd_unassist_desc" rows = "10" cols="70" class="form-control mb25" placeholder="" > </textarea></div>

<input type="hidden" name="table" id="table" value="breakdown_assistance" />
<?php if(!empty($_POST['callValues'])) { ?>
<input type="hidden" name="bd_id" id="bd_id" value="<?php echo $_POST['callValues'] ?>" />
<input type="hidden" name="db_callType" id="db_callType" value="update" />
<?php } ?>
<div class="left">&nbsp;</div><div class="right"><input type="submit" class = "btn btn-primary" name="save" id="save" value = "Save" /></div>
<div class="left">&nbsp;</div><div class="right"><div id="popup-results"></div></div>
</form>
<script src="<?php echo _ROOT ?>/js/popups.js"></script>