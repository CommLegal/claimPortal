// JavaScript Document
$( document ).ready(function() {

//$.sessionTimeout();
							 
$("#existing-venue-add").click(function(e) {
	//e.preventDefault();
	var data = $("#existing-venue-add").serializeArray();
	//data.push({name: 'e_venue_id', value: $("#e_venue_id :selected").attr("name")});
		
	//alert($("#claimForm").serialize());
	$.post(
	   'includes/ some file to submit data',
		data,
		function(data){
		  $("#modal-form-venue").html(data);  
		}
	  );
});

//Third Party adder

$('#tp_box').hide();						 
						 
$('#btn_new_tp').click(function(e) {
	$('#tp_box').show();							
			
});


//Get option of reason type box, show reasontype input box if 'other' is chosen

/*
var reason = document.getElementById("reasontype");
	reason.onchange = function(){
	var hiddenDiv = document.getElementById("reasonbox");
	hiddenDiv.style.display = (this.value == "") ? "none":"block";
};

$('#reasontype').change(function(e) {
	var selected = $('#reasontype option:selected');
	alert("this ->" + selected.html());
});
*/



$('#btn-login').click(function(e) {
  e.preventDefault();
  
  var form = $(this).closest('form');
  var formName = form.attr("id");

  if (formName == "loginForm") {

    var data = $(formName).serializeArray();
    data.push({
      name: 'username',
      value: $('#login-username').val()
    });
    data.push({
      name: 'password',
      value: $('#login-password').val()
    });
    $.post(
      'functions/check-user.php',
      data,
      function(data) {
        $(".panel-body").html(data);
		//window.location.reload();
        window.location.replace("https://portal.commercial-legal.co.uk");
      }
    );
  }
});

$('.cancel').click(function(e) {
	e.preventDefault();
	
	window.location.replace("https://portal.commercial-legal.co.uk");
});

$('#submit-form').click(function(e) {
  e.preventDefault();
  
  /*var form = $(this).closest('form');
  var formName = form.attr("id");

  if (formName == "loginForm") {

    var data = $(formName).serializeArray();
    data.push({
      name: 'username',
      value: $('#login-username').val()
    });
    data.push({
      name: 'password',
      value: $('#login-password').val()
    });
    $.post(
      'functions/check-user.php',
      data,
      function(data) {
        $(".panel-body").html(data);
		window.location.reload();
        //window.location.replace("http://192.168.3.215/claimPortal/index.php");
      }
    );
  }*/
});

$('#sign-out').click(function(e) {
	window.location.replace("https://portal.commercial-legal.co.uk/includes/end_session.php");				  
});

$("#submit_form_assisted").click(function(e) {
	e.preventDefault();
	
	var data = $("#ar_assisted").serializeArray();

	$.post(
	   'pages/formUpload.php',
		data,
		function(data){
		  $(".save-result").html(data);  
		}
	  );
});

$("#submit_form_unassisted").click(function(e) {
	e.preventDefault();
									   
	var data = $("#ar_unassisted").serializeArray();

	$.post(
	   'pages/formUpload.php',
		data,
		function(data){
		  $(".save-result").html(data); 
		  window.location.replace("https://portal.commercial-legal.co.uk/?displayPage=success"); 
		}
	  );

});

$("#fnol_submit").click(function(e) {
	e.preventDefault();
								 
	var data = $("#fnolForm").serializeArray();

	$.post(
	   'pages/formUpload.php',
		data,
		function(data){
		  $(".save-result").html(data);  
		  window.location.replace("https://portal.commercial-legal.co.uk/?displayPage=success");
		}
	  );
	
	
	
});

$("#bd_assisted_submit").click(function(e) {
	e.preventDefault();
								 
	var data = $("#bd_assisted").serializeArray();

	$.post(
	   'pages/formUpload.php',
		data,
		function(data){
		  $(".save-result").html(data); 
		  window.location.replace("https://portal.commercial-legal.co.uk/?displayPage=success");
		}
	  );
});

$("#bd_unassisted_submit").click(function(e) {
	e.preventDefault();
								 
	var data = $("#bd_unassisted").serializeArray();

	$.post(
	   'pages/formUpload.php',
		data,
		function(data){
		  $(".save-result").html(data); 
		  window.location.replace("https://portal.commercial-legal.co.uk/?displayPage=success"); 
		}
	  );	
});

$("#ws_assisted_submit").click(function(e) {
	e.preventDefault();
								 
	var data = $("#ws_assisted").serializeArray();

	$.post(
	   'pages/formUpload.php',
		data,
		function(data){
		  $(".save-result").html(data); 
		  window.location.replace("https://portal.commercial-legal.co.uk/?displayPage=success");
		}
	  );
});

$("#ws_unassisted_submit").click(function(e) {
	e.preventDefault();
								 
	var data = $("#ws_unassisted").serializeArray();

	$.post(
	   'pages/formUpload.php',
		data,
		function(data){
		  $(".save-result").html(data); 
		  window.location.replace("https://portal.commercial-legal.co.uk/?displayPage=success"); 
		}
	  );	
});

$("#he_assisted_submit").click(function(e) {
	e.preventDefault();
								 
	var data = $("#he_assisted").serializeArray();

	$.post(
	   'pages/formUpload.php',
		data,
		function(data){
		  $(".save-result").html(data); 
		  window.location.replace("https://portal.commercial-legal.co.uk/?displayPage=success");
		}
	  );
});

$("#he_unassisted_submit").click(function(e) {
	e.preventDefault();
								 
	var data = $("#he_unassisted").serializeArray();

	$.post(
	   'pages/formUpload.php',
		data,
		function(data){
		  $(".save-result").html(data); 
		  window.location.replace("https://portal.commercial-legal.co.uk/?displayPage=success");
		}
	  );
});

$("#hc_submit").click(function(e) {
	e.preventDefault();
								 
	var data = $("#hc_form").serializeArray();

	$.post(
	   'pages/formUpload.php',
		data,
		function(data){
		  $(".save-result").html(data); 
		  window.location.replace("https://portal.commercial-legal.co.uk/?displayPage=success");
		}
	  );
});


// START NEW CLAIM ON CLICK OF "ADD CLAIM" //

$("a.btn.btn-success.w100.mt25.createNewClaim").click(function(e) {
	e.preventDefault();
	alert("true");
							
	//var data = $("#hiddenClaimType").serializeArray();				
	
	$.post('pages/accident_recovery_upload.php', {
		claimType: $(this).attr("claimType"),
		claimTimestamp: $(this).attr("claimTimestamp"),
		policyId: $(this).attr("policyId"),
		policyHolderId: $(this).attr("policyHolderId")
	})
	.done(function( data ) {
		  $(".hiddenClaimType").html(data);
		  $('#createNewClaim').hide();
		  $(".firstStep").show();
		  //$("#fnol_data_assisted").show();
		  $(".bd-assisted-unassisted").show();
		  $(".hcDisplay").show();
	});
});

$("#passFormToNCI").click(function(e) {
	//e.preventDefault();
							
	$.post( "functions/nci_form_log.php", { 
		p_id: $(this).attr("PID"),
		href: $(this).attr("href")
	})
	.done(function( data ) {
		$(".nci_message").html(data);
	});
		
});

/*$("#passToNCI").click(function(e) {
	e.preventDefault();
							
	$.post( "functions/nci_form_send.php", { 
		p_id: $(this).attr("PID")
	})
	.done(function( data ) {
		$(".nci_message").html(data);
	});
		
});*/

// END NEW CLAIM ADD FUNCTION //

	$('#fnol .input-group.date').datepicker({
		todayBtn: "linked",
		format: 'dd-mm-yyyy',
		todayHighlight: true
	});
	
	$('#fnol .input-group.date-book').datepicker({
		todayBtn: "linked",
		format: 'dd-mm-yyyy',
		todayHighlight: true
	});
	
	$(".show-overlay").click(function(e) {
		$("#overlay").show();
		//$(".rounded-container.policy-view.claimInformation").show();
		$("#overlay #overlay-content #overlay-title").text($(this).attr("title"));
		var pageValues = $(this).attr("id").split(":");
		
		var callPage = pageValues[0];
		var callValues = pageValues[1];
		
		$.post( "pages/popup-call.php", { 
			callPage: callPage,   
			callValues: callValues
		})
		.done(function( data ) {
			$("#overlay #overlay-content #overlay-text").html(data);
		});
	});
	
	$( ".datepicker" ).datepicker({
      	dateFormat: 'yy-mm-dd', 
		changeMonth: true,
		changeYear: true
	});
	
	$(".faultclaimButton").click(function(e) {
		$('.assisted-unassisted').hide();
		$('.faultClaim').show();	
		$(".fnol-assisted").hide();						
		$(".fnol-unassisted").hide();
	});
	
	$(".nonfaultclaimButton").click(function(e) {
		$('.faultClaim').hide();
		$('.assisted-unassisted').show();
		$(".fnol-assisted").show();
	});
});

$("#submitUnassisted").click(function(e) {
	e.preventDefault();
									   
	var data = $("#confirmUnassist").serializeArray();
	//data.push({name: 'claim_ref', value: $("#hiddenClaimType").html()});

	$.post(
	   'pages/unassisted_formupload.php',
		data,
		function(data){
		  $(".save-result").html(data);  
		}
	  );
	window.location.replace("https://portal.commercial-legal.co.uk");
});

$("#accident_recovery--ar_vehicle_storage").bind('change', function () {

	if($('#accident_recovery--ar_vehicle_storage').is(':checked')) {
		$("#accident_recovery--ar_vehicle_location").show();
		$("#location-label").show();
	}
	else {
		$("#accident_recovery--ar_vehicle_location").hide();
		$("#location-label").hide();
	}
	
});

$("#accident_recovery--ar_vehicle_storage1").bind('change', function () {

	if($('#accident_recovery--ar_vehicle_storage1').is(':checked')) {
		$("#accident_recovery--ar_vehicle_location1").show();
		$("#location-label1").show();
	}
	else {
		$("#accident_recovery--ar_vehicle_location1").hide();
		$("#location-label1").hide();
	}
	
});

$("#fnol--f_vehicle_storage").bind('change', function () {

	if($('#fnol--f_vehicle_storage').is(':checked')) {
		$("#fnol--f_vehicle_location").show();
		$("#location-label").show();
	}
	else {
		$("#fnol--f_vehicle_location").hide();
		$("#location-label").hide();
	}
	
});