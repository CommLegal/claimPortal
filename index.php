<?php 
require("includes/config.php");

require("includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Commercial Legal Portal</title>

<link rel="shortcut icon" type="image/png" href="favicon.ico"/>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo _ROOT ?>/css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo _ROOT ?>/css/smoothness/jquery-ui.css">
    <link href="<?php echo _ROOT ?>/css/theme.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <script src="<?php echo _ROOT ?>/js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo _ROOT ?>/js/jquery-ui.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
<!-- start of popup overlay !-->
	<div id="overlay">
    	<div id="overlay-content">
        	<div id="close">X</div>
            <div id="overlay-title"></div>
            <div id="overlay-text"></div>
            <div style="clear: both;"></div>
        </div>
        <div style="clear: both;"></div>
    </div>
    <!-- end of popup overlay !-->
    
<?php 
require('pages/nav.php'); 
?>    
<div class="container">   
	<?php 
		switch($_REQUEST['displayPage']) {
			case "incident_recovery":
				echo "<h3>Incident Recovery</h3><div class=\"title-divider\"></div>";
				$bgcolor = "#863A84";
				$fontcolor = "white";
				$breakcolor = "#CCC";
				break;
			case "breakdown_assistance":
				echo "<h3>Breakdown</h3><div class=\"title-divider\"></div>";
				?>
                <div class="well">
                    <h4>For more information regarding our policies or terms and conditions please download and inspect the documents below.</h4>
                    <div class="btn-group" role="group">
                      <a href="<?php echo _ROOT ?>/pdf-docs/breakdown-terms-of-business-agreement.pdf" target="_blank"><button type="button" class="btn btn-default">Breakdown Terms of Business Agreement</button></a>
                      <a href="<?php echo _ROOT ?>/pdf-docs/one-call-insurance-services-breakdown.pdf" target="_blank"><button type="button" class="btn btn-default">OneCall Insurance Breakdown Services</button></a>
                      <a href="<?php echo _ROOT ?>/pdf-docs/frequently-asked-questions-breakdown.pdf" target="_blank"><button type="button" class="btn btn-default">Frequently Asked Questions</button></a>
                    </div>
                    <div style="clear: both;"</div>
                </div>
                <?php
				$bgcolor = "#f0AD4E";
				$fontcolor = "#333";
				$breakcolor = "#333";
				break;
			case "fnol":
				echo "<h3>FNOL</h3><div class=\"title-divider\"></div>";
				$bgcolor = "#337AB7";
				$fontcolor = "white	";
				$breakcolor = "#CCC";
				break;
		}
		if(empty($_REQUEST['displayPage'])) {
		
			if($_SESSION["userName"] == "") {
				require('pages/login.php');
			}
			else {
				require("pages/lobby.php");	
			}	
		}
		elseif($_REQUEST['displayPage'] == "lobby") {
			require("pages/lobby.php");
		}
		elseif($_REQUEST['displayPage'] == "incident_recovery") {

			?>
				<script src="<?php echo _ROOT ?>/js/jquery.jeditable.js"></script>
				<script src="<?php echo _ROOT ?>/js/jquery.jeditable.datepicker.js"></script>
			<?php

			//$_SESSION['claim_type'] = "ct_accident_recovery";
			require("pages/search.php");
			require("pages/accident_recovery.php");
		}
		elseif($_REQUEST['displayPage'] == "breakdown_assistance") {
			//$_SESSION['claim_type'] = "ct_breakdown_assistance";

			?>
				<script src="<?php echo _ROOT ?>/js/jquery.jeditable.js"></script>
				<script src="<?php echo _ROOT ?>/js/jquery.jeditable.datepicker.js"></script>
			<?php
			
			require("pages/search.php");
			require("pages/breakdown_assistance.php");
		}
		elseif($_REQUEST['displayPage'] == "fnol") {
			?>
				<script src="<?php echo _ROOT ?>/js/jquery.jeditable.js"></script>
				<script src="<?php echo _ROOT ?>/js/jquery.jeditable.datepicker.js"></script>
			<?php
			//$_SESSION['claim_type'] = "ct_fnol";
			require("pages/search.php");
			require("pages/fnol.php");
		}
		elseif($_REQUEST['displayPage'] == "success") {
			?>
            <div class="alert alert-success middle" role="alert">Your claim has been successfully submitted.</div>
            <?php
			unset($_SESSION['claimID']);
			require("pages/lobby.php");	
		}
		
	?>
	
</div>
<script src="<?php echo _ROOT ?>/js/custom.js"></script>
<script src="<?php echo _ROOT ?>/js/script.js"></script>
</body>
</html>