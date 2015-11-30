$(document).ready(function() {
	$("#OIL").click(function() {
		$(".well").hide();
		$(".assisted-unassisted").show();
	});
	
	$("#assistedbutt").click(function() {			  
		$(".fnol-unassisted").hide();
		$(".fnol-assisted").show();					  
	});
	
	$("#unassistedbutt").click(function() {
		$(".fnol-assisted").hide();						
		$(".fnol-unassisted").show();
	});
		
	$("#nonOIL").click(function() {
		$(".assisted-unassisted").hide();
		$(".fnol-assisted").hide();
		$(".fnol-unassisted").hide();
		$(".well").show();
	});
	
	$("#OIL1").click(function() {
	 $(".assisted-unassisted-buttons").show();
	 $(".details").show();
	 });
});   