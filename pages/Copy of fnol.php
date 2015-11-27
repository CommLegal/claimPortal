	
    
    <div id="overlay" >
        <div id="overlay-content" class="ro">
            <div id="close"><button type="button" class="close" >Close <i class= "fa fa-lg fa-times"></i></button></div>
            
                <div id="overlay-title">
                    <p>MODAL</p>
                </div>
                
                <div id="overlay-text">
                    <p>WEHEYYYY</p>
                </div>
                
                <div style="clear: both;"></div>
                
        </div>
        <div style="clear: both;"></div>
    </div>
    


    <!-- SEARCH -->   
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
                
            <form>
                    
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
                     <div class="input-group date mb10">
                        <input class="form-control" required id="date-picker-ven" value="<?php echo date("d-m-Y");?>" type="text">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                     </div>
                     
                    <label>Vehicle(s) in Storage:</label>
                    <input type="text" id="fnol--f_vehicle_storage" class="form-control mb10" placeholder="" >
                    
                    <label>Location if Stored:</label>
                    <input type="text" id="fnol--f_vehicle_location" class="form-control mb25" placeholder="" >
                    
                    <input type="hidden" id="claims--c_claim_type" value="<?php echo $_REQUEST['displayPage']; ?>"  />
                    
                    <?php // echo $_REQUEST['displayPage']; ?>
                
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
				
                <div class = "col-md-12">
                    <label>Circumstance Details:</label>
                    <input type="text" id="accident_recovery--ar_circumstance_details" class="form-control mb10" placeholder=""  />
    
                   <!-- <label>Injury Details (if applicable):</label>
                    <input type="text" id="accident_recovery--ar_injury_details" class="form-control mb10" placeholder=""  /> -->
                    
                    <label>Other Info:</label>
                    <input type="text" id="accident_recovery--ar_other_info" class="form-control mb10" placeholder=""  />
				</div>
                
			</div><!-- /.Mid Col -->	
			
			<div class = "col-md-4">
                <!--
                    <label>Policy Holder Vehicle Damage:</label>
                    <p>Vehicle damage diagram.</p>								
                -->
			</div>	
            		
		</div>

		<div class="col-md-12">
        
            <h4 class="mb25">Third Party Data</h4>
            <span class = "btn btn-default mb25" id="btn_new_tp">Add Third Party &nbsp;<i class="fa fa-lg fa-plus"></i></span>
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
            
			<!--
                <div class = "col-md-8">
                    <label>TP Vehicle Damage:</label>
                    <p>Vehicle damage diagram.</p>
                </div>
			-->
        
		</div>
			<button id="fnol_submit" class = "btn btn-success mb25 btn-lg ">Accept & Save &nbsp;<i class="fa fa-lg fa-floppy-o"></i></button>
		</form>
	</div>
		
        
<script>


	$(".show-overlay").click(function(e) {
				$("#overlay").show();
				$("#overlay #overlay-content #overlay-title").text($(this).attr("title"));
				
				var pageValues = $(this).attr("id").split(":");
				
				var callPage = pageValues[0];
				var callValues = pageValues[1];
				
				$.post( "pages/popup-call.php", { 
								callPage: callPage,   
								callValues: callValues
				})
				.done(function( data ) {
								$("#overlay #overlay-content #overlay-text").html(data);
				});
			});
	
			$("#close").click(function(e) {
						$("#overlay").hide();	
						
	});
</script>


