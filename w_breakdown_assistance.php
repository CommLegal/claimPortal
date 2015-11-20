<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Portal</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/theme.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet' type='text/css'>

</head>

<body>

<?php include('includes/nav.php'); ?>


<div class="container">
		<!-- SEARCH -->
		
		<div class="col-md-12 mb10">              
			<h3>Breakdown Assistance</h3><div class="title-divider"></div>
			<p>Enter customer data below.</p>
		</div> 

		<div class="col-md-12 mb25"> <!-- TOP--> 
			
		<!-- DETAILS -->
	<div class="details">
		<div class="col-md-12">
				<div class="col-md-4">
				<h4>Customer Search</h4><div class="title-divider"></div>
					
					<label>Policy holder name:</label>
							<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1">
					
					<label>Vehicle registration:</label>
							<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon2">
						
					<label>If Insurer = "OIL":</label>
						<br>
							<select class="mb25 assbox">
							  <option value="unass">Unassisted</option>
							  <option value="ass">Assisted</option>
							</select>
						<br>

					<button class = "btn btn-primary">Search &nbsp;<i class="fa fa-lg fa-search"></i></button>
				</div>
				
				
				<div class="col-md-4">
				
				<h4>Search Results</h4><div class="title-divider"></div>
					<table width="260" border="0";>
					  <tr>
						<th scope="row"><b>Customer Name:</b></th>
						<td>Elliot Rushforth</td>
					  </tr>
					  <tr>
						<th scope="row"><b>Insurer:</b></th>
						<td>OneCall Insurance LTD</td>
					  </tr>
					  <tr>
						<th scope="row"><b>Level of Breakdown Cover:</b></th>
						<td>TP Fire & Theft</td>
					  </tr>
					  <tr>
						<th scope="row"><b>Postcode:</b></th>
						<td>DN59SQ</td>
					  </tr>
					  <tr>
						<th scope="row"><b>Mobile Number:</b></th>
						<td>07837859117</td>
					  </tr>
					  <tr>
						<th scope="row"><b>Landline Number:</b></th>
						<td>01227 637463</td>
					  </tr>
					  <tr>
						<th scope="row"><b>Date of Birth:</b></th>
						<td>25-11-1989</td>
					  </tr>

					</table>
								
				</div>
                
                
				<div class="col-md-4">
                    <h4>Previous Claims</h4><div class="title-divider"></div>
                        <div class="scroll mh300">
                            <table width="260" border="0";>
                              <tr>
                                <th scope="row"><b>Date</b></th>
                                <td>Ref No.</td>
                                <td></td>
                              </tr>
                              <tr>
                              <tr>
                                <th scope="row"><b>23-09-2011:</b></th>
                                <td>#42096</td>
                                <td><button class = "btn btn-default">View</button></td>
                              </tr>
                              <tr>
                                <th scope="row"><b>02-03-2006:</b></th>
                                <td>#62147</td>
                                <td><button class = "btn btn-default">View</button></td>
                              </tr>
                              <tr>
                                <th scope="row"><b>27-07-2005:</b></th>
                                <td>#77314</td>
                                <td><button class = "btn btn-default">View</button></td>
                              </tr>


                            </table>
                    </div>		
				</div>
                
                
                
				
		</div>
				
			
	</div><!-- /.DETAILS -->	
		
	 
		<div class="details mb100">
		
			<div class="col-md-12 mb10">              
				<h3>Breakdown Assistance</h3><div class="title-divider"></div>
				<p>Select assisted or unassisted and fill in the box with required details.</p>
			</div>
			<div class = "col-lg-12">
				<button class = "btn btn-default">Assisted</button> <button class = "btn btn-default">Unassisted</button> <br><br>
				<label>Reason:</label><br>		
				<textarea type="text" name ="description" rows = "10" cols="70" class="form-control mt10 mb25" placeholder="" aria-describedby="basic-addon1"> </textarea>
				
				<button class = "btn btn-success">Confirm <i class = "fa fa-lg fa-check"></i></button>
			</div>
				<!-- /.DETAILS -->	
			
			
			
		</div>

</div>


</body>
</html>