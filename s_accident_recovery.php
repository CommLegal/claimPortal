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

<?php include('includes/nav.php'); 

require("includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

$password = "Tolkien1971";

$encryptionKey =  "rE!wec#PpcnDK7*&5S#V87kRc69G2zVe";

//echo $encryption . " " . $encryptionKey;

$encryptedPass =  md5($password . $encryptionKey . $password . $encryptionKey . $password . $encryptionKey . $password . $encryptionKey);


echo $encryptedPass;

?>


<div class="container">


	<!-- SEARCH -->
	
	<div class="col-md-12 mb10">              
		<h3>Accident Recovery</h3><div class="title-divider"></div>
	</div> 

	<div class="col-md-12 mb25"> <!-- TOP--> 
		
		<!-- DETAILS -->
	<div class="details">
		<div class="col-md-12">
				<div class="col-md-4">
				<h4>Customer Search</h4><div class="title-divider"></div>
                
                <form action="#" method="post" enctype="multipart/form-data" id="customer-search" >
					<label>Policy holder name:</label>
							<input type="text" class="form-control mb10" name="ph_name" id="ph_name" placeholder="" aria-describedby="basic-addon1">
					
					<label>Vehicle registration:</label>
							<input type="text" class="form-control mb10" name="ph_reg" id="ph_reg" placeholder="" aria-describedby="basic-addon2">
						
					<label>Policy number:</label>
							<input type="text" class="form-control mb10" name="ph_p_no" id="ph_p_no" placeholder="" aria-describedby="basic-addon2">

					<button class = "btn btn-primary">Search &nbsp;<i class="fa fa-lg fa-search"></i></button>
                </form>
				</div>
				
				
				<div class="col-md-4">
                    <h4>Search Results</h4><div class="title-divider"></div>
                        <table width="260" border="0">
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
    <label>If the insurer is OIL show these buttons and show the FNOL Divs according to the selection.</label><br />

				<button type="button" class="btn btn-primary navbar-btn btn-lg mr5 col-md-3 assist-btn">Assisted&nbsp; <i class="fa fa-lg fa-arrow-right"></i></button>
                <button type="button" class="btn btn-primary navbar-btn btn-lg mr5 col-md-3 unassist-btn">Unassisted <i class="fa fa-lg fa-arrow-right"></i></button>
    
    </div>	
	
	</div>	<!-- /.TOP -->

	
	<div class = "dpa">	<!-- DPA -->
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
    
    
    

	<div class = "fnol-ass"><!-- FNOL ASSISTED -->		
		<div class="col-md-12">
			<h3>FNOL - Assisted</h3>
            <p>If the insurer is OIL and we choose ASSISTED after searching, this div will show.</p>
			<div class="title-divider"></div>
		</div>
		
		<div class="col-md-12">
		<h4 class="mb25">Customer Data</h4>
			<!-- Left Col -->
		
			<div class="col-md-4">
			
				<label>Refrence:</label>
				<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1">
				
				<label>Policy Number:</label>
				<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1">
				
				<label>Customer Name:</label>
				<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1">
				
				<label>Contact Number:</label>
				<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1">
				
				<label>Alternative Number:</label>
				<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1">
				
				<label>Vehicle Registration:</label>
				<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1">
				
				<label>Date of Incident:</label>
				<input type="text" class="form-control mb25" placeholder="" aria-describedby="basic-addon1">
					
			</div><!-- /.Left Col -->


			<div class="col-md-4"><!-- Mid Col -->
				
				<label>Vehicle(s) in storage:</label>
				<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1">
				
				<label>Location if Stored:</label>
				<input type="text" class="form-control mb25" placeholder="" aria-describedby="basic-addon1">
				
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
						<th scope="row">Breakdown:</th>
						<td><input type="checkbox" name="" value=""></td>
					  </tr>
					  <tr>
						<th scope="row">Etc:</th>
						<td><input type="checkbox" name="" value=""></td>
					  </tr>
					</table>
				</div>
				<!-- /. Rightbox Circ -->
				
				<!-- Leftbox Circ-->
				<div class = "col-md-6">
				<label>Injuries:</label>
					<br>
						<select class="mb25">
						  <option value="1">0</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						  <option value="over5">More than 5</option>
						</select>
					<br>
					
				<label>Number of TP Involved:</label>
					<br>
						<select class="mb10">
						  <option value="1">0</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						  <option value="over5">More than 5</option>
						</select>
					<br>
				</div>
				<!-- /.Leftbox Circ-->

				<label>Injury Details (if applicable):</label>
				<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1" />
				
				<label>Other Info:</label>
				<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1" />

		
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
					<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1" />
					
					<label>Type:</label>
					<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1" />
					
					<label>Registration:</label>
					<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1" />
					
					<label>Make & Model:</label>
					<input type="text" class="form-control mb25" placeholder="" aria-describedby="basic-addon1" />

			</div>
			
			<div class = "col-md-8">
				<label>Policy Holder Vehicle Damage:</label>
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
		
	</div>
	<!-- /FNOL ass -->	
	
		
	<div class = "fnol-unass"><!-- FNOL UNASSISTED -->		
		<div class="col-md-12">
			<h3>FNOL - Unassisted</h3>
            <p>If the insurer is OIL and we choose UNASSISTED after searching, this div will show.</p>
			<div class="title-divider"></div>
		</div>
		
		<div class="col-md-12">
		<h4 class="mb25">Customer Data</h4>
			<!-- Left Col -->
		
			<div class="col-md-4">
			
				<label>Refrence:</label>
				<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1">
				
				<label>Policy Number:</label>
				<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1">
				
				<label>Customer Name:</label>
				<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1">
				
				<label>Contact Number:</label>
				<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1">
				
				<label>Alternative Number:</label>
				<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1">
				
				<label>Vehicle Registration:</label>
				<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1">
				
				<label>Date of Incident:</label>
				<input type="text" class="form-control mb25" placeholder="" aria-describedby="basic-addon1">
					
			</div><!-- /.Left Col -->


			<div class="col-md-4"><!-- Mid Col -->
				
				<label>Vehicle(s) in storage:</label>
				<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1">
				
				<label>Location if Stored:</label>
				<input type="text" class="form-control mb25" placeholder="" aria-describedby="basic-addon1">
				
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
						<th scope="row">Breakdown:</th>
						<td><input type="checkbox" name="" value=""></td>
					  </tr>
					  <tr>
						<th scope="row">Etc:</th>
						<td><input type="checkbox" name="" value=""></td>
					  </tr>
					</table>
				</div>
				<!-- /. Rightbox Circ -->
				
				<!-- Leftbox Circ-->
				<div class = "col-md-6">
				<label>Injuries:</label>
					<br>
						<select class="mb25">
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						  <option value="over5">More than 5</option>
						</select>
					<br>
					
				<label>Number of TP Involved:</label>
					<br>
						<select class="mb10">
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						  <option value="over5">More than 5</option>
						</select>
					<br>
				</div>
				<!-- /.Leftbox Circ-->

				<label>Injury Details (if applicable):</label>
				<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1" />
				
				<label>Other Info:</label>
				<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1" />

		
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
					<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1" />
					
					<label>Type:</label>
					<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1" />
					
					<label>Registration:</label>
					<input type="text" class="form-control mb10" placeholder="" aria-describedby="basic-addon1" />
					
					<label>Make & Model:</label>
					<input type="text" class="form-control mb25" placeholder="" aria-describedby="basic-addon1" />
			</div>
			
			<div class = "col-md-8">
				<label>Policy Holder Vehicle Damage:</label>
				<p>Vehicle damage diagram.</p>
			</div>
			

		</div>
        
<div class = "col-lg-12">	
            <label>Reason for unassist:</label>
				<textarea type="text" name ="description" rows = "10" cols="70" class="form-control mt10 mb25" placeholder="" aria-describedby="basic-addon1"> </textarea>
				<button class = "btn btn-success mb25">Accept & Save &nbsp;<i class="fa fa-lg fa-floppy-o"></i></button>
			</div>
        
        
        
        
	</div>
	<!-- /FNOL unass -->	

	



	

</div>


</body>
</html>