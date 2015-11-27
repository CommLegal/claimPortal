$( document ).ready(function() {
	/*$.getScript("js/jquery.validate.js");
	$("#addTP").validate();*/
							 
	$("#overlay-text form input[type=submit]").click(function(e) {
		e.preventDefault();	
														
		var form = $(this).closest('form');
		var formName = "#"+form.attr("name");
		
		var data = $(formName).serializeArray();
		data.push({name: 'buttonClicked', value: $(this).attr("name")});
		//data.push({name: 'database', value: $("#database").val()});
		data.push({name: 'table', value: $("#table").val()});
					
		//alert($("#claimForm").serialize());
		$.post(
		   'pages/popupformupload.php',
			data,
			function(data){
			    $("#popup-results").html(data);
				if(formName == "#addTP") {
					$(".tpReload").load("functions/refreshTps.php");	
				}
			}
		  );
		
		  return false; 
	});
	
	$("#overlay-content #close").click(function() {							
		$("#overlay #overlay-content #overlay-text").empty();
		$("#overlay").hide();		
	});
	
});