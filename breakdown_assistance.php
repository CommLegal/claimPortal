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
		</div> 

		<div class="col-md-12 mb25"> <!-- TOP--> 
			
		<!-- DETAILS -->
	<div class="details">
		<div class="col-md-12">
				<div class="col-md-12 mb25" id ="searchbox">
				<h4>Customer Search</h4><div class="title-divider"></div>
					<form>
                    <div class ="col-md-4">
						<p>Policy holder name:</p><input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1">
					</div>
                    
                    <div class ="col-md-4">
						<p>Vehicle registration:</p><input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon2">
					</div>	
                    
                    <div class ="col-md-4">
						<p>Policy number:</p><input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon2">
					</div>
                    
					<button class = "btn btn-success mt10 mb25">Search &nbsp;<i class="fa fa-lg fa-search"></i></button>
                    </form>
                    
				</div>
				
				
				<div class="col-md-6">
                    <h4>Search Results</h4><div class="title-divider"></div>
                        <table width="600" border="0">
                          <tr>
                            <th scope="row"><b>Customer Name:</b></th>
                            <td>Elliot Rushforth</td>
                          </tr>
                          <tr>
                            <th scope="row"><b>Policy Number:</b></th>
                            <td>UR192383231</td>
                          </tr>
                          <tr>
                            <th scope="row"><b>Insurer:</b></th>
                            <td>OneCall Insurance LTD</td>
                          </tr>
                          <tr>
                            <th scope="row"><b>Cover:</b></th>
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
                
				<div class="col-md-6">
                    <h4>Previous Claims</h4><div class="title-divider"></div>
                        <div class="scroll mh300">
                        	
                            <table width="450" border="0";>
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
                              <tr>
                                <th scope="row"><b>31-02-2000:</b></th>
                                <td>#77314</td>
                                <td><button class = "btn btn-default">View</button></td>
                              </tr>
                            </table>
                    </div>		
				</div>
				
		</div>
				
			
	</div><!-- /.DETAILS -->


<div class="col-md-12 mt50">
    <label>If the insurer is OIL show these buttons and set a value to "assist" or "unassist" depending on the selection. It submits below.</label><br />
            <button type="button" class="btn btn-primary navbar-btn btn-lg mr5 col-md-3 assist-btn">Assisted&nbsp; <i class="fa fa-lg fa-arrow-right"></i></button>
            <button type="button" class="btn btn-primary navbar-btn btn-lg mr5 col-md-3 unassist-btn">Unassisted <i class="fa fa-lg fa-arrow-right"></i></button>
    </div>	

		<div class="details mb100">
		
			<div class="col-md-12 mb10">              
				<h3>Breakdown Assistance</h3><div class="title-divider"></div>
			</div>
			<div class = "col-lg-12">	
            
            <form>
            
            <form action=""> <!-- This will probably auto-detect and can be removed, maybe -->
            <input type="radio" name="ass" value="ass" checked> Assisted<br>
            <input type="radio" name="ass" value="unass"> Unassisted<br /><br />
            

            
            <label>Reason:</label>
				<textarea required type="text" name ="description" rows = "10" cols="70" class="form-control mt10 mb25" placeholder="" aria-describedby="basic-addon1"> </textarea>
				<button class = "btn btn-success">Confirm <i class = "fa fa-lg fa-check"></i></button>
                
                </form>
                
			</div>
				<!-- /.DETAILS -->	 
		</div>

</div>


</body>
</html>