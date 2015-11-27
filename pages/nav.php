<?php
//session_start();
?>

<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    
	<!--  
	<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Portal</a>
    </div>
	-->

    <!-- Collect the nav links, forms, and other content for toggling -->
	
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
		<li><a href="index.php" class="whitetext"><img src = "img/minicar.png">&nbsp;&nbsp;Commercial Legal Portal</a></li>


			<!-- <li><a href="#">Link</a></li> -->
            
			<!-- 
            
                <li><button type="button" class="btn btn-danger navbar-btn mr5">Accident Recovery</button></li>
                <li><button type="button" class="btn btn-warning navbar-btn mr5">Breakdown Assistance</button></li>
                <li><button type="button" class="btn btn-primary navbar-btn mr5">FNOL</button></li>
			
			-->
            
		</ul>
		
		<ul class="nav navbar-nav navbar-right mt5">
        <?php
			if($_SESSION['userName'] != "") { 
		?>
			<li><a href="#" class="whitetext">Signed in as <?php echo $_SESSION["userName"] . " - " . $_SESSION['companyTitle'];?></a>
			<li><button type="button" id="sign-out" class="btn btn-default navbar-btn mr10">Sign out</button></li>
        <?php } ?>
		</ul>
		
    </div><!-- /.navbar-collapse -->
	
  </div><!-- /.container-fluid -->
  
</nav><!-- /.nav navbar-default -->