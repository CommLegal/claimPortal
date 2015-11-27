	<!-- SEARCH -->

	<div class="col-md-12 mb10">              
		<h3>Accident Recovery</h3><div class="title-divider"></div>
	</div> 

	<div class="col-md-12 mb25"> <!-- TOP--> 

    <div class="col-md-12 mt15">
    
			<div class="well">
				<!-- If Insurer is not OIL -->
				<b>Non-OIL Insurer Script:</b> <br><br>
				 <p>I see you are insured with XXX. I will need to give you a contact number for them as they are your insurer and will deal with your claim or recovery.</p>
				 <button class="btn btn-default">View Numbers <i class="fa fa-lg fa-phone-square"></i></a></button>
			</div>	

     <div class="ass-unass">
    <label>If the insurer is OIL show these buttons and show the FNOL Divs according to the selection.</label><br />

			<button type="button" class="whitegap btn btn-success navbar-btn btn-lg col-md-5" id = "assistedbutt">Assisted</button>
            <div class = "col-md-2"></div>
			<button type="button" class="whitegap btn btn-danger navbar-btn btn-lg col-md-5" id = "unassistedbutt">Unassisted</button>

    </div>
    </div>	
	 
	</div>	<!-- /.TOP -->
    
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
			 
		<form method="post" enctype="multipart/form-data" id="accident_recovery">
				
				<label>Policy Number:</label>
				<input disabled type="text" id="accident_recovery--ar_policy_number" class="form-control mb10" placeholder="" value="<?php echo $policyInfo[$header]['p_policy_number'] ?>">
				
				<label>Driver Name:</label>
				<input required type="text" id="accident_recovery--ar_policy_holder" class="form-control mb10" placeholder="">
				
				<label>Vehicle Registration:</label>
				<input disabled type="text" id="accident_recovery--ar_vehicle_reg" class="form-control mb10" placeholder="" value="<?php echo $policyInfo[$header]['v_reg'] ?>"   >
				
				<label>Date of Incident:</label>
				<input required type="text" id="accident_recovery--ar_incident_date" class="form-control mb10" placeholder="">
                
				<label>Vehicle(s) in Storage:</label>
				<input type="text" id="accident_recovery--ar_vehicle_storage" class="form-control mb10" placeholder="">
				
				<label>Location if Stored:</label>
				<input type="text" id="accident_recovery--ar_vehicle_location" class="form-control mb25" placeholder="">
                
                
					
			</div><!-- /.Left Col -->


			<div class="col-md-4"><!-- Mid Col -->

				<!-- Rightbox Circ-->
				<div class = "col-md-6">
					<label>Circumstances:</label>
					<table width="230" border="0" class="mb50";>
					  <tr>
						<th scope="row">Fire:</th>
						<td><input id="accident_recovery--ar_circumstances" type="checkbox"  name="1" value="1"></td>
					  </tr>
					  <tr>
						<th scope="row">Theft:</th>
						<td><input id="accident_recovery--ar_circumstances" type="checkbox" name="2" value=""></td>
					  </tr>
					  <tr>
						<th scope="row">Vandalism:</th>
						<td><input id="accident_recovery--ar_circumstances" type="checkbox" name="3" value=""></td>
					  </tr>
					  <tr>
						<th scope="row">Accident:</th>
						<td><input id="accident_recovery--ar_circumstances" type="checkbox" name="4" value=""></td>
					  </tr>
					</table>
				</div>
				<!-- /. Rightbox Circ -->


                
				<!-- /.Leftbox Circ-->
                
                <div class = "col-md-12">
                    <label>Circumstance Details:</label>
                    <input type="text" id="accident_recovery--ar_circumstance_details" class="form-control mb10" placeholder=""  />
    
                    <label>Injury Details (if applicable):</label>
                    <input type="text" id="accident_recovery--ar_injury_details" class="form-control mb10" placeholder=""  />
                    
                    <label>Other Info:</label>
                    <input type="text" id="accident_recovery--ar_other_info" class="form-control mb10" placeholder=""  />
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
                    <input required type="text" class="form-control mb10" placeholder="" />

				<label>TP Type: &nbsp;</label>
                    <select>
                        <option value="tp_type">Motorist</option>
                        <option value="tp_type">Motorcyclist</option>
                        <option value="tp_type">Cyclist</option>
                        <option value="tp_type">Pedestrian</option>
                        <option value="tp_type">Other</option>
                    </select>
                    
				<span id = "add_tp" class = "btn btn-warning mt50 pull-right">Add TP &nbsp;<i class="fa fa-lg fa-plus"></i></span>

			</div>

			
			<div class = "col-md-4">
				
			</div>


		</div>

		
		<div class = "col-md-12">
			<button class = "btn btn-success mb25 mt50">Accept & Save &nbsp;<i class="fa fa-lg fa-floppy-o"></i></button>
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
				<input disabled type="text" id="accident_recovery--ar_policy_number" class="form-control mb10" placeholder="" value="<?php echo $policyInfo[$header]['p_policy_number'] ?>">
				
				<label>Driver Name:</label>
				<input required type="text" id="accident_recovery--ar_policy_holder" class="form-control mb10" placeholder="">
				
				<label>Vehicle Registration:</label>
				<input disabled type="text" id="accident_recovery--ar_vehicle_reg" class="form-control mb10" placeholder="" value="<?php echo $policyInfo[$header]['v_reg'] ?>">
				
				<label>Date of Incident:</label>
				<input required type="text" id="accident_recovery--ar_incident_date" class="form-control mb10" placeholder="">
                
				<label>Vehicle(s) in Storage:</label>
				<input type="text" id="accident_recovery--ar_vehicle_storage" class="form-control mb10" placeholder="">
				
				<label>Location if Stored:</label>
				<input type="text" id="accident_recovery--ar_vehicle_location" class="form-control mb25" placeholder="">
					
					
			</div><!-- /.Left Col -->

			<div class="col-md-4"><!-- Mid Col -->
				
				<!-- Rightbox Circ-->
				<div class = "col-md-6">
					<label>Circumstances:</label>

				</div>
				<!-- /. Rightbox Circ -->
				
				<!-- Leftbox Circ-->
				<div class = "col-md-6">
                    <label>Vehicles Involved:</label>
                            <input type="number" id="accident_recovery--ar_vehicles_involved" class="form-control mb10" placeholder=""   >
                            
                    <label>Number of Injured Parties:</label>	
                            <input type="number" id="accident_recovery--ar_injured_parties" class="form-control mb10" placeholder=""   >
				</div>
                
				<!-- /.Leftbox Circ-->

                <div class = "col-md-12">
                    
                    <label>Circumstance Details:</label>
                    <input type="text" id="accident_recovery--ar_circumstance_details" class="form-control mb10" placeholder=""  />
    
                    <label>Injury Details (if applicable):</label>
                    <input type="text" id="accident_recovery--ar_injury_details" class="form-control mb10" placeholder=""  />
                    
                    <label>Other Info:</label>
                    <input type="text" id="accident_recovery--ar_other_info" class="form-control mb10" placeholder=""  />
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

			</div>
			
			<div class = "col-md-8">
				<label>TP Vehicle Damage:</label>
				<p>Vehicle damage diagram.</p>
			</div>

		</div>
        
	<div class = "col-lg-12 controls">	
            <label>Reason for unassist:</label>
				<textarea required type="text" name ="description" rows = "10" cols="70" class="form-control mt10 mb25" placeholder="" > </textarea>
                <input type="hidden" name="claimType" value="accident_recovery"  />
				<button class="btn btn-success mb25" id="submit-form">Accept & Save &nbsp;<i class="fa fa-lg fa-floppy-o"></i></button>
			</div>
        </form>
	</div>
	<!-- /FNOL unass -->	