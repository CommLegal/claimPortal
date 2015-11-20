$(document).ready(function() {
		$("#OIL").click(function() {
			$(".well").hide();
			$(".ass-unass").show();
				$("#assistedbutt").click(function() {
							$(".fnol-unass").hide();
							$(".fnol-ass").show();					  
												  });
				$("#unassistedbutt").click(function() {
							$(".fnol-ass").hide();						
							$(".fnol-unass").show();
													});
				});
		$("#nonOIL").click(function() {
									$(".ass-unass").hide();
									$(".fnol-ass").hide();
									$(".fnol-unass").hide();
									$(".well").show();
									});
		$("#OIL1").click(function() {
								 $(".ass-unass-buttons").show();
								 $(".details").show();
								 });
});   