<?php 

require("includes/config.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Portal</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo _ROOT ?>/css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo _ROOT ?>/css/theme.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet' type='text/css'>

</head>

<body>


<?php include('includes/nav.php'); 

//$password = "Tolkien1971";

//$encryptKey = "rE!wec#PpcnDK7*&5S#V87kRc69G2zVe";

//$encrypted = md5($password . $encryptKey . $password . $encryptKey . $password . $encryptKey);

//echo $encrypted;

?>
	
<div class="container">   

	<div class = "middle col-xl-12">
			<img src="img/logo.jpg">
	</div>
	<div class = "col-xl-12">
	<?php
	
		if($_COOKIE["username"] == "") {

		require('pages/login.php');
	
		}
		
		var_dump($_COOKIE["username"]);
	?>
		
	</div>
</div>

<script src="<?php echo _ROOT ?>/js/jquery-2.1.3.min.js"></script>
<script src="<?php echo _ROOT ?>/js/custom.js"></script>

</body>
</html>