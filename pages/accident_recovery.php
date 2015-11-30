	<!-- SEARCH -->  
	<div class="container">

	<div class="col-md-12 mb25 mt25"> <!-- TOP--> 
    
    <div class="col-md-12 mt15 firstStep" style="display: none;">
    		<?php
				$proceed = 1;
				$dow = date("N");
				$time = date("H") . date("m");
				
				if($dow >= 1 && $dow <= 5) {
					if($time >= 0730 && $time <= 0800) { 
						if($policyInfo[$header]['p_broker'] !== "ONE Insurance Limited") {
							echo "<div class=\"well\"><h3>Within Normal Operating Hours</h3>Please inform the customer that they need to contact their insurance company 'Commercial Legal' and they will assist recovery. <h3>Please call 0203 738 7300</h3></div>";
						}
						else {
							echo "<div class=\"well\"><h3>Within Normal Operating Hours</h3>Please assist recovery and inform the customer that they need to contact their insurance company 'One Insurance Limited' on the below number to process their claim.<h3>0203 738 7301</h3></div>";
						}
						$proceed = 0; 
					}
					else {
						if($policyInfo[$header]['p_broker'] !== "ONE Insurance Limited") {
							echo "
							<div class=\"well mb25 pb50 ntp\"><h3>Does the consumer deem the accident to be their fault?</h3>
								<div class=\"faultclaimButton btn btn-default col-md-5 col-xs-12\">Yes</div><div class=\"col-md-2\"></div>
								<div class=\"nonfaultclaimButton btn btn-default col-md-5 col-xs-12\">No</div>
							</div>";
							$proceed = 0;
						}
						//<!--If the consumer states no – assist the recovery and complete the FNOL form.
					}
				}
				elseif($dow >= 6 && $dow <= 7) {
					if($time >= 0900 && $time <= 1730) { 
						if($policyInfo[$header]['p_broker'] !== "ONE Insurance Limited") {
							echo "<div class=\"well\"><h3>Within Normal Operating Hours</h3>Please inform the customer that they need to contact their insurance company 'Commercial Legal' and they will assist recovery.<h3>Please call 0203 738 7300</h3></div>";
						}
						else {
							echo "<div class=\"well\"><h3>Within Normal Operating Hours</h3>Please assist recovery and inform the customer that they need to contact their insurance company 'One Insurance Limited' on <br /><h3>0203 738 7301</h3> to process their claim</div>";
						}
						$proceed = 0;
					}
					else {
						if($policyInfo[$header]['p_broker'] !== "ONE Insurance Limited") {
							echo "<div class=\"well\"><h3>Does the consumer deem the accident to be their fault?</h3><div class=\"faultclaimButton\">Yes</div><div class=\"nonfaultclaimButton\">No</div></div>";
							$proceed = 0;
						}
						//<!--If the consumer states no – assist the recovery and complete the FNOL form.
					}
				}

			?>
			<div class="well faultClaim ntp" style="display: none;">
				<!-- If Insurer is not OIL -->
                <?php $brokerNumber = $conn->execute_sql("select", array('ic_number'), "insurer_contacts", "ic_title=?", array("s" => $policyInfo[$header]['p_broker'])); ?>
                <h3>This claim needs to be referred to the consumers insurance company, please read the following script:</h3>
				 <h4 style="padding-top: 15px;">"I see you are insured with <?php echo $policyInfo[$header]['p_broker'] ?>. I will need to give you a contact number 
                 for them as they are your insurer and will deal with your claim or recovery.
				 <br /><br />Please contact your insurer on <b><?php echo $brokerNumber[0]['ic_number'] ?></b>"</h4>
                 <form id="confirmUnassist" method="post" action="">
                 	<input type="hidden" id="accident_recovery--ar_assisted_unassisted" name="accident_recovery--ar_assisted_unassisted" value="Unassisted"/>
                 	<button type="button" id="submitUnassisted" class="btn btn-success navbar-btn btn-lg col-md-5" >OK</button>
                 </form>
                 <div style="clear: both;"></div>
			</div>	
			
            <div class="well assisted-unassisted" <?php if($proceed == 0) { echo "style=\"display: none;\""; } ?>>
                <button type="button" class="btn btn-success navbar-btn btn-lg col-md-5" id = "assistedbutt">Assisted</button>
                <div class = "col-md-2"></div>
                <button type="button" class="btn btn-danger navbar-btn btn-lg col-md-5" id = "unassistedbutt">Unassisted</button>
            	<div style="clear: both;"></div>
            </div> 
 
    </div>	
	 
	</div>	<!-- /.TOP -->
    
	<div class = "fnol-assisted" id = "fnol_data_assisted" style="display:none"><!-- FNOL ASSISTED -->		
		<div class="col-md-12 mb25">
			<h3>Incident Recovery - Assisted</h3>
			<div class="title-divider"></div>
		</div>
		
		<div class="col-md-12">
		
        
        <!--  <h4 class="mb25">Customer Data for <?php echo ucwords(strtolower($policyInfo[$header]['ph_forename'] . " " . $policyInfo[$header]['ph_surname'])) ?></h4> -->
			<!-- Left Col -->
		

        
			<div class="col-md-4">
			 
		<form method="post" enctype="multipart/form-data" id="ar_assisted">
				
				<label>Policy Number:</label>
				<input disabled type="text" name="accident_recovery--ar_policy_number" id="accident_recovery--ar_policy_number" class="form-control mb10" placeholder="" value="<?php echo $policyInfo[$header]['p_policy_number'] ?>">
				
				<label>Driver Name:</label>
				<input required type="text" name="accident_recovery--ar_policy_holder" id="accident_recovery--ar_policy_holder" class="form-control mb10" placeholder="" value="<?php echo ucwords(strtolower($policyInfo[$header]['ph_forename'] . " " . $policyInfo[$header]['ph_surname'])) ?>">
				
				<label>Vehicle Registration:</label>
				<input disabled type="text" name="accident_recovery--ar_vehicle_reg" id="accident_recovery--ar_vehicle_reg" class="form-control mb10" placeholder="" value="<?php echo $policyInfo[$header]['v_reg'] ?>"   >
				
				<label>Date of Incident:</label>
                <div class="input-group mb10">
				<input required type="text" name="accident_recovery--ar_incident_date_0" id="accident_recovery--ar_incident_date_0" class="form-control mb10 datepicker" placeholder="" value="<?php date("Y-m-d"); ?>">
                    <span class="input-group-addon"><i class = "fa fa-calendar"></i></span>
                </div>
                
                <table width="230" border="0">
                  <tr>
                    <th scope="row">Vehicle(s) in Storage:</th>
                    <td>
                    	<input name="accident_recovery--ar_vehicle_storage" id="accident_recovery--ar_vehicle_storage" type="checkbox" 
                    	name="accident_recovery--ar_vehicle_storage" value="Y" / >
                    </td>
                  </tr>
                </table>
				
				<label id="location-label" class="mt10" style="display:none;">Vehicle Storage Location:</label>
				<input type="text" name="accident_recovery--ar_vehicle_location" id="accident_recovery--ar_vehicle_location" class="form-control mb25" placeholder="" style="display:none;">
                
                <input type="hidden" name="claims--c_claim_type" id="claims--c_claim_type" value="<?php echo $_REQUEST['displayPage']; ?>"  />
                
					
			</div><!-- /.Left Col -->


			<div class="col-md-8"><!-- Mid Col -->

				<!-- Rightbox Circ-->
				<div class = "col-md-6">
					<label>Circumstances:</label>
					<table width="230" border="0" class="mb25">
                    	<tr>
						<th scope="row">Accident:</th>
						<td><input name="accident_recovery--ar_circumstances" id="accident_recovery--ar_circumstances" type="radio" value="Accident"></td>
					  </tr>
					  <tr>
						<th scope="row">Fire:</th>
						<td><input name="accident_recovery--ar_circumstances" id="accident_recovery--ar_circumstances" type="radio" value="Fire"></td>
					  </tr>
                    </table>
                </div>
                <div class = "col-md-6">
                	<label>&nbsp;</label>
                    <table width="230" border="0" class="mb25">
                      <tr>
						<th scope="row">Theft:</th>
						<td><input name="accident_recovery--ar_circumstances" id="accident_recovery--ar_circumstances" type="radio" value="Theft"></td>
					  </tr>
					  <tr>
						<th scope="row">Vandalism:</th>
						<td><input name="accident_recovery--ar_circumstances" id="accident_recovery--ar_circumstances" type="radio" value="Vandalism"></td>
					  </tr>
					  
					</table>
				</div>
				<!-- /. Rightbox Circ -->
		
        		<div class = "col-md-12">
                    <div class = "col-md-12">
                        <label>Circumstance Details:</label>
                        <textarea name="accident_recovery--ar_circumstance_details" id="accident_recovery--ar_circumstance_details" cols="45" rows="3" class="form-control mb10"></textarea>
                    </div>
                    <div class = "col-md-12">
                        <label>Damage Description:</label>
                        <textarea name="accident_recovery--ar_vehicle_damage" id="accident_recovery--ar_vehicle_damage" cols="45" rows="3" class="form-control mb10"></textarea>
                    </div>
                   <!-- <label>Injury Details (if applicable):</label>
                    <input type="text" id="accident_recovery--ar_injury_details" class="form-control mb10" placeholder=""  /> -->
                    <div class = "col-md-12">
                        <label>Other Info:</label>
                        <textarea name="accident_recovery--ar_other_info" id="accident_recovery--ar_other_info" cols="45" rows="3" class="form-control mb10"></textarea>
                    </div>
                </div>
            
			</div><!-- /.Mid Col -->	

			
		</div>
		
			
		<div class="col-md-12">
		<h4 class="mb25">Third Party Data</h4>
        <div class="well">
			<div class="col-md-4">
            	<a title="Add a new third party" class="show-overlay" id="addTP"><span class = "btn btn-warning col-md-6 mb25">Add TP &nbsp;<i class="fa fa-lg fa-plus"></i></span></a>
                
			</div>
	
			<div class = "col-md-4 tpReload">
				<?php 
				$tps = $conn->execute_sql("select", array('*'), "third_party", "tp_c_id=?", array("i" => $_SESSION['claimID'])); 
				foreach($tps as $header => $value)  {
					echo "<a title=\"Edit third party\" class=\"show-overlay\" id=\"addTP:" . $tps[$header]['tp_id'] . "\"><span class=\"btn btn-default \" id=\"" . $tps[$header]['tp_id'] . "\">" . $tps[$header]['tp_name'] . "</span></a>";
				}	
				?>
			</div>	
            <input type="hidden" id="claimType" name="claimType" value="incident_recovery"  />
            <input type="hidden" id="accident_recovery--ar_assisted_unassisted" name="accident_recovery--ar_assisted_unassisted" value="Assisted"  />
            
            <div style="clear:both"></div>
            
            </div>
            
            
		<div class = "col-md-12">
			<button class = "btn btn-lg btn-success mb25" id="submit_form_assisted">Accept & Save &nbsp;<i class="fa fa-lg fa-floppy-o"></i></button>
            <button class = "btn btn-lg btn-danger mb25 cancel">Cancel &nbsp;<i class="fa fa-lg fa-times"></i></button>
		</div>
        
        </div>
		</form>
	</div>
	<!-- /FNOL ass -->	
	
		
	<div class = "fnol-unassisted" id = "fnol_data_unassisted" style="display:none"><!-- FNOL UNASSISTED -->		
		<div class="col-md-12 mb25">
			<h3>Incident Recovery - Unassisted</h3>
			<div class="title-divider"></div>
		</div>
		
		<div class= "col-md-12">
	<!--	<h4 class="mb25">Customer Data for <?php echo ucwords(strtolower($policyInfo[$header]['ph_forename'] . " " . $policyInfo[$header]['ph_surname'])) ?></h4> -->
			<!-- Left Col -->
		
			<div class= "col-md-4">
			 
		<form method="post" enctype="multipart/form-data" id="ar_unassisted">
				
				<label>Policy Number:</label>
				<input disabled type="text" name="accident_recovery--ar_policy_number" id="accident_recovery--ar_policy_number" 
                class="form-control mb10" placeholder="" value="<?php echo $policyInfo[$header]['p_policy_number'] ?>">
				
				<label>Driver Name:</label>
				<input required type="text" name="accident_recovery--ar_policy_holder" id="accident_recovery--ar_policy_holder" 
                class="form-control mb10" placeholder="" value="<?php echo ucwords(strtolower($policyInfo[$header]['ph_forename'] . " " . $policyInfo[$header]['ph_surname'])) ?>">
				
				<label>Vehicle Registration:</label>
				<input disabled type="text" name="accident_recovery--ar_vehicle_reg" id="accident_recovery--ar_vehicle_reg" 
                class="form-control mb10" placeholder="" value="<?php echo $policyInfo[$header]['v_reg'] ?>"   >
				
				<label>Date of Incident:</label>
                <div class="input-group mb10">
				<input required type="text" name="accident_recovery--ar_incident_date_1" id="accident_recovery--ar_incident_date_1" 
                class="form-control mb10 datepicker" placeholder="" value="<?php date("Y-m-d"); ?>">
                    <span class="input-group-addon"><i class = "fa fa-calendar"></i></span>
                </div>
                
				<table width="230" border="0">
                  <tr>
                    <th scope="row">Vehicle(s) in Storage:</th>
                    <td>
                    	<input name="accident_recovery--ar_vehicle_storage" id="accident_recovery--ar_vehicle_storage" type="checkbox" 
                    	name="accident_recovery--ar_vehicle_storage" value="Y" / >
                    </td>
                  </tr>
                </table>
				
				<label id="location-label" class="mt10" style="display:none;">Vehicle Storage Location:</label>
				<input type="text" name="accident_recovery--ar_vehicle_location" id="accident_recovery--ar_vehicle_location" class="form-control mb25" placeholder="" style="display:none;">
                
                <input type="hidden" name="claims--c_claim_type" id="claims--c_claim_type" value="<?php echo $_REQUEST['displayPage']; ?>"  />
					
			</div><!-- /.Left Col -->


			<div class="col-md-8"><!-- Mid Col -->

				<!-- Rightbox Circ-->
				<div class = "col-md-6">
					<label>Circumstances:</label>
					<table width="230" border="0" class="mb25">
                    	<tr>
						<th scope="row">Accident:</th>
						<td><input name="accident_recovery--ar_circumstances" id="accident_recovery--ar_circumstances" type="radio" value="Accident"></td>
					  </tr>
					  <tr>
						<th scope="row">Fire:</th>
						<td><input name="accident_recovery--ar_circumstances" id="accident_recovery--ar_circumstances" type="radio" value="Fire"></td>
					  </tr>
                    </table>
                </div>
                <div class = "col-md-6">
                	<label>&nbsp;</label>
                    <table width="230" border="0" class="mb25">
                      <tr>
						<th scope="row">Theft:</th>
						<td><input name="accident_recovery--ar_circumstances" id="accident_recovery--ar_circumstances" type="radio" value="Theft"></td>
					  </tr>
					  <tr>
						<th scope="row">Vandalism:</th>
						<td><input name="accident_recovery--ar_circumstances" id="accident_recovery--ar_circumstances" type="radio" value="Vandalism"></td>
					  </tr>
					  
					</table>
				</div>
				<!-- /. Rightbox Circ -->
		
        		<div class = "col-md-12">
                    <div class = "col-md-12">
                        <label>Circumstance Details:</label>
                        <textarea name="accident_recovery--ar_circumstance_details" id="accident_recovery--ar_circumstance_details" cols="45" rows="3" class="form-control mb10"></textarea>
                    </div>
                    <div class = "col-md-12">
                        <label>Damage Description:</label>
                        <textarea name="accident_recovery--ar_vehicle_damage" id="accident_recovery--ar_vehicle_damage" cols="45" rows="3" class="form-control mb10"></textarea>
                    </div>
                   <!-- <label>Injury Details (if applicable):</label>
                    <input type="text" id="accident_recovery--ar_injury_details" class="form-control mb10" placeholder=""  /> -->
                    <div class = "col-md-12">
                        <label>Other Info:</label>
                        <textarea name="accident_recovery--ar_other_info" id="accident_recovery--ar_other_info" cols="45" rows="2" class="form-control mb10"></textarea>
                    </div>
                </div>
            
			</div><!-- /.Mid Col -->	
			
		</div>
		
			
		<div class="col-md-12">
		<h4 class="mb25">Third Party Data</h4>
        <div class="well">
			<div class="col-md-4">	
				<a title="Add a new third party" class="show-overlay" id="addTP"><span class = "btn btn-warning col-md-6 mb25">Add TP &nbsp;<i class="fa fa-lg fa-plus"></i></span></a>
			</div>	
 			<div class = "col-md-4 tpReload">
				<?php 
				$tps = $conn->execute_sql("select", array('*'), "third_party", "tp_c_id=?", array("i" => $_SESSION['claimID'])); 
				foreach($tps as $header => $value)  {
					echo "<a title=\"Edit third party\" class=\"show-overlay\" id=\"addTP:" . 
					$tps[$header]['tp_id'] . "\"><span class=\"btn btn-default \" id=\"" . $tps[$header]['tp_id'] . "\">" . $tps[$header]['tp_name'] . "</span></a>";
				}	
				?>
			</div>
            <div style="clear:both"></div>
		</div>
 	</div>
	<div class = "col-lg-12 controls mt25">	
    
			<label>Reason for Unassisted:</label>
                    <select id = "accident_recovery--ar_unassist_reason" name="accident_recovery--ar_unassist_reason">
                        <option value="1">Fault Claim</option>
                        <option value="2">In office hours</option>
                        <option value="3">Assisted Direct – Pay In use</option>
                        <option value="4">Other</option>
                    </select>
                    
                    <br /><br />

                    <div id = "reasonbox">
                        <label>Other:</label>
                        <textarea type="text" name ="accident_recovery--ar_unassist_desc" rows = "10" cols="70" class="form-control mt10 mb25" placeholder="" > </textarea>
                    </div>
                    
            	<input type="hidden" id="claimType" name="claimType" value="incident_recovery" />
                <input type="hidden" id="accident_recovery--ar_assisted_unassisted" name="accident_recovery--ar_assisted_unassisted" value="Unassisted"  />
                
            
				<button class="btn btn-lg btn-success mb25" id="submit_form_unass">Accept & Save &nbsp;<i class="fa fa-lg fa-floppy-o"></i></button>
                <button class = "btn btn-lg btn-danger mb25 cancel">Cancel &nbsp;<i class="fa fa-lg fa-times"></i></button>
                
			</div>
        </form>
	</div>
    <div class="save-result"></div>
    </div>
	<!-- /FNOL unass -->	