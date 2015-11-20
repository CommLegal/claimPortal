// JavaScript Document
$("#existing-venue-add").click(function(e) {
	//e.preventDefault();

	alert("B-b-b-b-b-bird bird bird");
	
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


$('#btn-login').click(function(e) {
  e.preventDefault();
  
	alert("hello");
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
        //window.location.replace("http://192.168.3.215/claimPortal/lobby.php");
      }
    );
  }
});