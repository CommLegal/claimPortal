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
    
    <!-- JS file-->
    <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
    <!--JS File--->
    
    <!--Main JS Script--->
    <script type="text/javascript" src="js/script.js"></script>
    <!--Main JS Script--->

</head>

<body>

<?php include('includes/nav.php'); ?>


<div class="container">


	<!-- SEARCH -->
	
	<div class="col-md-12 mb10">              
		<h3>Accident Recovery</h3><div class="title-divider"></div>
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
				</div>
                
                </form>
                
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
                        <div class="scroll mh">
                        	
                            <table width="450" border="0";>
                              <tr>
                                <th scope="row"><b>Date</b></th>
                                <td>Ref No.</td>
                                <td>&nbsp;</td>
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
                                <th scope="row"><b>02-03-2006:</b></th>
                                <td>#62147</td>
                                <td><button class = "btn btn-default">View</button></td>
                              </tr>
                              <tr>
                                <th scope="row"><b>02-03-2006:</b></th>
                                <td>#62147</td>
                                <td><button class = "btn btn-default">View</button></td>
                              </tr>
                              <tr>
                                <th scope="row"><b>02-03-2006:</b></th>
                                <td>#62147</td>
                                <td><button class = "btn btn-default">View</button></td>
                              </tr>
                              <tr>
                                <th scope="row"><b>02-03-2006:</b></th>
                                <td>#62147</td>
                                <td><button class = "btn btn-default">View</button></td>
                              </tr>
                            </table>
                    </div>		
				</div>
				
		</div>
				
			
	</div><!-- /.DETAILS -->
    
    <!-- TEMPORARY BUTTONS UNTIL PHP DETECTS IF INSURER IS OIL OR NOT -->
    <label class="mt25">These buttons represent the automatic detection of the insurer (if it's OIL or not) click accordingly</label><br />
    	<button type="button" class="btn btn-primary navbar-btn btn-lg mr5 col-md-3 assist-btn" id="OIL">OIL&nbsp; <i class="fa fa-lg fa-arrow-right"></i></button>
        <button type="button" class="btn btn-primary navbar-btn btn-lg mr5 col-md-3 unassist-btn" id="nonOIL">Non-OIL <i class="fa fa-lg fa-arrow-right"></i></button>

    <div class="col-md-12 mt50">
    
			<div class="well" style="display:none">
				<!-- If Insurer is not OIL -->
				<b>Non-OIL Insurer Script:</b> <br><br>
				 <p>I see you are insured with XXX. I will need to give you a contact number for them as they are your insurer and will deal with your claim or recovery.</p>
				 <button class="btn btn-default">View Numbers <i class="fa fa-lg fa-phone-square"></i></a></button>
			</div>	

     <div class="ass-unass" style="display:none;">
    <label>If the insurer is OIL show these buttons and show the FNOL Divs according to the selection.</label><br />

			<button type="button" class="whitegap btn btn-success navbar-btn btn-lg col-md-6" id = "assistedbutt">Assisted</button>
			<button type="button" class="whitegap btn btn-danger navbar-btn btn-lg col-md-6" id = "unassistedbutt">Unassisted</button>

    </div>
    </div>	
	
	</div>	<!-- /.TOP -->
	
	<div class = "dpa hidden">	<!-- DPA -->
		<div class="col-md-12">
			<h3>Customer Details (we may not need this)</h3><div class="title-divider"></div>
			<p>Complete the DPA details below.</p>
			<div class="col-md-6 mb10 mt10">   

					<table width="400" border="0";>
					  <tr>
						<th scope="row"><b>Name:</b></th>
						<td>Elliot Rushforth</td>
					  </tr>
					  <tr>
						<th scope="row"><b>Date of Birth:</b></th>
						<td>25/11/1989</td>
					  </tr>
					  <tr>
						<th scope="row"><b>Reg:</b></th>
						<td>ELZ959</td>
					  </tr>
					  <tr>
						<th scope="row"><b>Postcode:</b></th>
						<td>S706JL</td>
					  </tr>
					  <tr>
						<th scope="row"><b>Mobile:</b></th>
						<td>07853 286756</td>
					  </tr>
					  <tr>
						<th scope="row"><b>Landline:</b></th>
						<td>01226 286756</td>
					  </tr>
					  <tr>
						<th scope="row"><b>Level of Cover:</b></th>
						<td>First Class</td>				
					  </tr>
					</table>
					
					<!-- 
						<button class = "btn btn-danger mt10">Decline &nbsp;<i class="fa fa-lg fa-times "></i></button>
						<button class = "btn btn-success mt10">Accept &nbsp;<i class="fa fa-lg fa-check"></i></button>
					-->

			
			</div>
		</div>
	</div><!-- /DPA -->
    
	<div class = "fnol-ass" style="display:none"><!-- FNOL ASSISTED -->		
		<div class="col-md-12">
			<h3>FNOL - Assisted</h3>
            <p>If the insurer is OIL and we choose ASSISTED after searching, this div will show.</p><!-- remove this p after implementation -->
			<div class="title-divider"></div>
		</div>
		
		<div class="col-md-12">
		<h4 class="mb25">Customer Data for (Customer Name here)</h4>
			<!-- Left Col -->
		
			<div class="col-md-4">
			
		<form>
				
				<label>Policy Number:</label>
				<input disabled type="text" class="form-control mb10" placeholder=""  >
				
				<label>Driver Name:</label>
				<input required type="text" class="form-control mb10" placeholder=""   >
				
				<label>Vehicle Registration:</label>
				<input disabled type="text" class="form-control mb10" placeholder=""   >
				
				<label>Date of Incident:</label>
				<input required type="text" class="form-control mb10" placeholder=""   >
                
				<label>Vehicle(s) in Storage:</label>
				<input type="text" class="form-control mb10" placeholder=""   >
				
				<label>Location if Stored:</label>
				<input type="text" class="form-control mb25" placeholder=""   >
                
                
					
			</div><!-- /.Left Col -->


			<div class="col-md-4"><!-- Mid Col -->

				<!-- Rightbox Circ-->
				<div class = "col-md-6">
					<label>Circumstances:</label>
					<table width="150" border="0" class="mb50";>
					  <tr>
						<th scope="row">Fire:</th>
						<td><input type="checkbox" name="" value=""></td>
					  </tr>
					  <tr>
						<th scope="row">Theft:</th>
						<td><input type="checkbox" name="" value=""></td>
					  </tr>
					  <tr>
						<th scope="row">Vandalism:</th>
						<td><input type="checkbox" name="" value=""></td>
					  </tr>
					  <tr>
						<th scope="row">Accident:</th>
						<td><input type="checkbox" name="" value=""></td>
					  </tr>
					</table>
				</div>
				<!-- /. Rightbox Circ -->
				
				<!-- Leftbox Circ-->
				<div class = "col-md-6">
                    <label>Vehicles Involved:</label>
                            <input type="number" class="form-control mb10" placeholder=""   >
                            
                    <label>Number of Injured Parties:</label>	
                            <input type="number" class="form-control mb10" placeholder=""   >
				</div>
                
				<!-- /.Leftbox Circ-->
                
                <div class = "col-md-12">
                    <label>Circumstance Details:</label>
                    <input type="text" class="form-control mb10" placeholder=""  />
    
                    <label>Injury Details (if applicable):</label>
                    <input type="text" class="form-control mb10" placeholder=""  />
                    
                    <label>Other Info:</label>
                    <input type="text" class="form-control mb10" placeholder=""  />
				</div>
		
			</div><!-- /.Mid Col -->	
			
			<div class = "col-md-4">
				<label>Policy Holder Vehicle Damage:</label>
				<p>Vehicle damage diagram.</p>
			</div>
			
		</div>
		
			
		<div class="col-md-12">
		<h4 class="mb25">Third Party Data</h4>
			<div class="col-md-4">
				
					<label>Name:</label>
					<input required type="text" class="form-control mb10" placeholder=""  />
					
					<label>Registration:</label>
					<input required type="text" class="form-control mb10" placeholder=""  />
					
					<label>Make & Model:</label>
					<input required type="text" class="form-control mb10" placeholder=""  />
                    
                    <label>Contact Number:</label>
                    <input required type="text" class="form-control mb10" placeholder="" />
                    
                    <label>Alternative Number:</label>
                    <input required type="text" class="form-control mb25" placeholder="" />

			</div>
			
			<div class = "col-md-8">
				<label>TP Vehicle Damage:</label>
				<p>Vehicle damage diagram.</p>
			</div>
			
		</div>
		
		<div class = "col-md-12">
			<div class="well">
				<!-- If Insurer is not OIL -->
				<b>Non-OIL Insurer Script:</b> <br><br> 
				 <p>I see you are insured with XXX. I will need to give you a contact number for them as they are your insurer and will deal with your claim or recovery.</p>
				 <button class="btn btn-default">View Numbers <i class="fa fa-lg fa-phone-square"></i></a>
			</div>	
			<button class = "btn btn-success mb25">Accept & Save &nbsp;<i class="fa fa-lg fa-floppy-o"></i></button>
		</div>
		</form>
	</div>
	<!-- /FNOL ass -->	
	
		
	<div class = "fnol-unass" style="display:none"><!-- FNOL UNASSISTED -->		
		<div class="col-md-12">
			<h3>FNOL - Unassisted</h3>
            <p>If the insurer is OIL and we choose UNASSISTED after searching, this div will show.</p> <!-- remove this p after implementation -->
			<div class="title-divider"></div>
		</div>
		
		<div class="col-md-12">
		<h4 class="mb25">Customer Data</h4>
			<!-- Left Col -->
		
			<div class="col-md-4">
			<form>
				<label>Policy Number:</label>
				<input disabled type="text" class="form-control mb10" placeholder=""   >
				
				<label>Driver Name:</label>
				<input required type="text" class="form-control mb10" placeholder=""   >
				
				<label>Vehicle Registration:</label>
				<input disabled type="text" class="form-control mb10" placeholder=""   >
				
				<label>Date of Incident:</label>
				<input required type="text" class="form-control mb10" placeholder=""   >
                
				<label>Vehicle(s) in Storage:</label>
				<input type="text" class="form-control mb10" placeholder=""   >
				
				<label>Location if Stored:</label>
				<input type="text" class="form-control mb25" placeholder=""   >
					
					
			</div><!-- /.Left Col -->

			<div class="col-md-4"><!-- Mid Col -->
				
				<!-- Rightbox Circ-->
				<div class = "col-md-6">
					<label>Circumstances:</label>
					<table width="150" border="0" class="mb50";>
					  <tr>
						<th scope="row">Fire:</th>
						<td><input type="checkbox" name="" value=""></td>
					  </tr>
					  <tr>
						<th scope="row">Theft:</th>
						<td><input type="checkbox" name="" value=""></td>
					  </tr>
					  <tr>
						<th scope="row">Vandalism:</th>
						<td><input type="checkbox" name="" value=""></td>
					  </tr>
					  <tr>
						<th scope="row">Accident:</th>
						<td><input type="checkbox" name="" value=""></td>
					  </tr>
					</table>
				</div>
				<!-- /. Rightbox Circ -->
				
				<!-- Leftbox Circ-->
				<div class = "col-md-6">
                    <label>Vehicles Involved:</label>
                            <input type="number" class="form-control mb10" placeholder=""   >
                            
                    <label>Number of Injured Parties:</label>	
                            <input type="number" class="form-control mb10" placeholder=""   >
				</div>
                
				<!-- /.Leftbox Circ-->

                <div class = "col-md-12">
                    <label>Circumstance Details:</label>
                    <input type="text" class="form-control mb10" placeholder=""  />
    
                    <label>Injury Details (if applicable):</label>
                    <input type="text" class="form-control mb10" placeholder=""  />
                    
                    <label>Other Info:</label>
                    <input type="text" class="form-control mb10" placeholder=""   />
				</div>
		
			</div><!-- /.Mid Col -->	
			
			<div class = "col-md-4">
				<label>Policy Holder Vehicle Damage:</label>
				<p>Vehicle damage diagram.</p>
			</div>
			
		</div>
		
			
		<div class="col-md-12">
		<h4 class="mb25">Third Party Data</h4>
			<div class="col-md-4">
				
					<label>Name:</label>
					<input required type="text" class="form-control mb10" placeholder=""  />
					
					<label>Registration:</label>
					<input required type="text" class="form-control mb10" placeholder=""  />
					
					<label>Make & Model:</label>
					<input required type="text" class="form-control mb10" placeholder=""  />
                    
                    <label>Contact Number:</label>
                    <input required type="text" class="form-control mb10" placeholder="" />
                    
                    <label>Alternative Number:</label>
                    <input required type="text" class="form-control mb25" placeholder="" />

			</div>
			
			<div class = "col-md-8">
				<label>TP Vehicle Damage:</label>
				<p>Vehicle damage diagram.</p>
			</div>

		</div>
        
	<div class = "col-lg-12">	
            <label>Reason for unassist:</label>
				<textarea required type="text" name ="description" rows = "10" cols="70" class="form-control mt10 mb25" placeholder="" > </textarea>
				<button class = "btn btn-success mb25">Accept & Save &nbsp;<i class="fa fa-lg fa-floppy-o"></i></button>
			</div>
        </form>
	</div>
	<!-- /FNOL unass -->	

</div>


</body>
</html>