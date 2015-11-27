<?php
require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

$tps = $conn->execute_sql("select", array('*'), "third_party", "tp_c_id=?", array("i" => $_SESSION['claimID'])); 
foreach($tps as $header => $value)  {
	echo "<a title=\"Edit third party\" class=\"show-overlay\" id=\"addTP:" . $tps[$header]['tp_id'] . "\"><span class=\"btn btn-default \" id=\"" . $tps[$header]['tp_id'] . "\">" . $tps[$header]['tp_name'] . "</span></a>";
}
?>
<script>
	$(".show-overlay").click(function(e) {
		$("#overlay").show();
		//$(".rounded-container.policy-view.claimInformation").show();
		$("#overlay #overlay-content #overlay-title").text($(this).attr("title"));
		var pageValues = $(this).attr("id").split(":");
		
		var callPage = pageValues[0];
		var callValues = pageValues[1];
		var claim_ref = $("#hiddenClaimType").html();
		
		$.post( "pages/popup-call.php", { 
			callPage: callPage,   
			callValues: callValues,
			claim_ref: claim_ref
		})
		.done(function( data ) {
			$("#overlay #overlay-content #overlay-text").html(data);
		});
	});
</script>