	<link href="css/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- SEARCH -->   
	<script>
	$(document).ready(function() {
		$('#fnol #input-group-date').datepicker({
		todayBtn: "linked",
		format: 'dd-mm-yyyy',
		todayHighlight: true
	});
});
	</script>
    <div class = "fnol-ass" id="fnol_data"><!-- FNOL ASSISTED -->		
		<div class="col-md-12">
			<h3>FNOL</h3>
            <p>If the insurer is OIL and we choose ASSISTED after searching, this div will show.</p><!-- remove this p after implementation -->
			<div class="title-divider"></div>
		</div>
		
		<div class="col-md-12">
            <h4 class="mb25">Customer Data for (Customer Name here)</h4>
                <!-- Left Col -->
              
            
                <div class="col-md-4">
                
            <form name="fnol" id="fnol" role="form">
                    
                    <label>Policy Number:</label>
                    <input disabled type="text" id="fnol--f_policy_number" class="form-control mb10" placeholder="" value="<?php echo $policyInfo[$header]['p_policy_number'] ?>">
                    
                    <label>Driver Name:</label>
                    <input required type="text" id="fnol--f_policy_holder" class="form-control mb10" placeholder="">
                    
                    <label>Vehicle Registration:</label>
                    <input disabled type="text" id="fnol--f_vehicle_reg" class="form-control mb10" placeholder=""  value="<?php echo $policyInfo[$header]['v_reg'] ?>" >
                    
                    <!-- 
                        <label>Date of Incident:</label>
                        <input required type="text" id="fnol--f_incident_date" class="form-control mb10" placeholder="" >
                    -->
                     <label>Date of Incident:</label>

                     </div>
                    
                     <label>Vehicle(s) in Storage:</label>
                    <input type="text" id="fnol--f_vehicle_storage" class="form-control mb10" placeholder="" >
                    
                    <label>Location if Stored:</label>
                    <input type="text" id="fnol--f_vehicle_location" class="form-control mb25" placeholder="" >
                    
                   
                    
                    <?php  echo $_REQUEST['displayPage']; ?>
                
			</div><!-- /.Left Col -->


			<div class="col-md-4"><!-- Mid Col -->

				<!-- Rightbox Circ-->
				<div class = "col-md-6">
					<label>Circumstances:</label>
					<table width="150" border="0" class="mb50";>
					  <tr>
						<th scope="row">Fire:</th>
						<td><input type="checkbox" id="fnol--f_circumstances" name="" value=""></td>
					  </tr>
					  <tr>
						<th scope="row">Theft:</th>
						<td><input type="checkbox" id="fnol--f_circumstances" name="" value=""></td>
					  </tr>
					  <tr>
						<th scope="row">Vandalism:</th>
						<td><input type="checkbox" id="fnol--f_circumstances" name="" value=""></td>
					  </tr>
					  <tr>
						<th scope="row">Accident:</th>
						<td><input type="checkbox" id="fnol--f_circumstances" name="" value=""></td>
					  </tr>
					</table>
				</div>
				<!-- /. Rightbox Circ -->
				
				<!-- Leftbox Circ-->
				<div class = "col-md-6">
                    <label>Vehicles Involved:</label>
                            <input type="number" id="fnol--f_vehicles_involved" class="form-control mb10" placeholder=""   >
                            
                    <label>Number of Injured Parties:</label>	
                            <input type="number" id="fnol--f_injured_parties" class="form-control mb10" placeholder=""   >
				</div>
                
				<!-- /.Leftbox Circ-->
                
                <div class = "col-md-12">
                    <label>Circumstance Details:</label>
                    <input type="text" id="fnol--f_circumstance_details" class="form-control mb10" placeholder=""  />
    
                    <label>Injury Details (if applicable):</label>
                    <input type="text" id="fnol--f_injury_details" class="form-control mb10" placeholder=""  />
                    
                    <label>Other Info:</label>
                    <input type="text" id="fnol--f_other_info" class="form-control mb10" placeholder=""  />
				</div>
		
			</div><!-- /.Mid Col -->	
			
			<div class = "col-md-4">
				<label>Policy Holder Vehicle Damage:</label>
				<p>Vehicle damage diagram.</p>
			</div>
			
		</div>

		<div class="col-md-12">
        
        <!--
        
            <h4 class="mb25">Third Party Data</h4>
            <span class = "btn btn-warning mb50 btn-lg" id="btn_new_tp">Add Third Party&nbsp; &nbsp;<i class="fa fa-lg fa-plus"></i></span>
            <div id = "tp_box">
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
            </div>
            
        -->
        
			<!--
			<div class = "col-md-8">
				<label>TP Vehicle Damage:</label>
				<p>Vehicle damage diagram.</p>
			</div>
		-->
        
		</div>

			<button id="fnol_submit" class = "btn btn-success mb25">Accept & Save &nbsp;<i class="fa fa-lg fa-floppy-o"></i></button>
		</form>
	</div>
		

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>-->