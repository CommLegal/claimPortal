<!-- SEARCH -->
	<div class="container">

	<div class="col-md-12 mb25 mt25"> <!-- TOP--> 
    
    <div class="col-md-12 mt15 firstStep" style="display: none;">
    		<?php
				$proceed = 1;
				$dow = date("N");
				$time = strtotime(date("Y-m-d H:i:s")); 
				//date("G") . date("i");

				if($dow >= 1 && $dow <= 5) {
					$open = strtotime(date("Y-m-d 07:30:00"));
					$close = strtotime(date("Y-m-d 21:00:00"));
					
					if($time >= $open && $time <= $close) { 
						if($policyInfo[$header]['p_broker'] !== "ONE Insurance Limited") {
							echo "<div class=\"well\"><h3>Within Normal Operating Hours</h3>Please inform the customer that they need to contact their insurance company 'Commercial Legal' and they will assist.<h3>Please call 0203 738 7300</h3></div>";
						}
						else {
							echo "<div class=\"well\"><h3>Within Normal Operating Hours</h3>Please inform the customer that they need to contact their insurance company 'One Insurance Limited' on <h3>0203 738 7301</h3> to process their claim</div>";
						}
						$proceed = 0; 
					}
					else {
						if($policyInfo[$header]['p_broker'] !== "ONE Insurance Limited") {
								echo "<div class=\"faultclaimButton btn btn-default col-md-5 col-xs-12\">Yes</div><div class=\"col-md-2\"></div>
							<div class=\"well mb25 pb50 ntp\"><h3>Does the consumer deem the accident to be their fault?</h3>

								<div class=\"nonfaultclaimButton btn btn-default col-md-5 col-xs-12\">No</div>
							</div>";
							$proceed = 0;
						}
						else {
							echo "
							<div class=\"well mb25 pb50 ntp\"><h3>Proceed to add claim?</h3>
								<div class=\"nonfaultclaimButton btn btn-default col-md-5 col-xs-12\">Yes</div><div class=\"col-md-2\"></div>
								<div class=\"cancel btn btn-default col-md-5 col-xs-12\">No</div>
							</div>";	
						}
						//<!--If the consumer states no – assist the recovery and complete the FNOL form.
					}
				}
				elseif($dow >= 6 && $dow <= 7) {
					$open = strtotime(date("Y-m-d 09:00:00"));
					$close = strtotime(date("Y-m-d 17:30:00"));

					if($time >= $open && $time <= $close) { 
						if($policyInfo[$header]['p_broker'] !== "ONE Insurance Limited") {
								echo "<div class=\"faultclaimButton btn btn-default col-md-5 col-xs-12\">Yes</div><div class=\"col-md-2\"></div>
							<div class=\"well mb25 pb50 ntp\"><h3>Does the consumer deem the accident to be their fault?</h3>

								<div class=\"nonfaultclaimButton btn btn-default col-md-5 col-xs-12\">No</div>
							</div>";
							$proceed = 0;
						}
						else {
							echo "
							<div class=\"well mb25 pb50 ntp\"><h3>Proceed to add claim?</h3>
								<div class=\"nonfaultclaimButton btn btn-default col-md-5 col-xs-12\">Yes</div><div class=\"col-md-2\"></div>
								<div class=\"cancel btn btn-default col-md-5 col-xs-12\">No</div>
							</div>";	
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
    </div>	
	 
	</div>	<!-- /.TOP -->
    
	<div class = "fnol-assisted" id = "fnol_data_assisted" style="display: none;"><!-- FNOL ASSISTED -->		
		<div class="col-md-12">
			<h3>FNOL</h3>
			<div class="title-divider"></div>
		</div>
		
		<div class="col-md-12">
		<!-- <h4 class="mb25">Customer Data for <?php echo ucwords(strtolower($policyInfo[$header]['ph_forename'] . " " . $policyInfo[$header]['ph_surname'])) ?></h4> -->
			<!-- Left Col -->
		

        
			<div class="col-md-4">
			 
		<form method="post" enctype="multipart/form-data" id="fnolForm">
				
				<label>Policy Number:</label>
				<input disabled type="text" name="fnol--f_policy_number" id="fnol--f_policy_number" class="form-control mb10" placeholder="" 
                value="<?php echo $policyInfo[$header]['p_policy_number'] ?>">
				
				<label>Driver Name:</label>
				<input required type="text" name="fnol--f_policy_holder" id="fnol--f_policy_holder" class="form-control mb10" placeholder="" 
                value="<?php echo ucwords(strtolower($policyInfo[$header]['ph_forename'] . " " . $policyInfo[$header]['ph_surname'])) ?>">
				
				<label>Vehicle Registration:</label>
				<input disabled type="text" name="fnol--f_vehicle_reg" id="fnol--f_vehicle_reg" class="form-control mb10" placeholder="" 
                value="<?php echo $policyInfo[$header]['v_reg'] ?>"   >
				
				<label>Date of Incident:</label>
                <div class="input-group mb10">
					<input required type="text" name="fnol--f_incident_date" id="fnol--f_incident_date" class="form-control mb10 datepicker" placeholder="">
                    <span class="input-group-addon"><i class = "fa fa-calendar"></i></span>
                </div>
                
                
                <table width="230" border="0">
                  <tr>
                    <th scope="row">Vehicle(s) in Storage:</th>
                    <td><input name="fnol--f_vehicle_storage" id="fnol--f_vehicle_storage" type="checkbox"  name="fnol--f_vehicle_storage" value="Y" /></td>
                  </tr>
                </table>
				
				<label id="location-label" class="mt10" style="display:none;">Vehicle Storage Location:</label>
				<input type="text" name="fnol--f_vehicle_location" id="fnol--f_vehicle_location" class="form-control mb25" placeholder="" style="display:none;">
                
                <input type="hidden" name="claims--c_claim_type" id="claims--c_claim_type" value="<?php echo $_REQUEST['displayPage']; ?>"  />
                
					
			</div><!-- /.Left Col -->


			<div class="col-md-8"><!-- Mid Col -->

				<!-- Rightbox Circ-->
				<div class = "col-md-6">
					<label>Circumstances:</label>
					<table width="230" border="0" class="mb25">
                    	<tr>
						<th scope="row">Accident:</th>
						<td><input name="fnol--f_circumstances" id="fnol--f_circumstances" type="radio" value="Accident"></td>
					  </tr>
					  <tr>
						<th scope="row">Fire:</th>
						<td><input name="fnol--f_circumstances" id="fnol--f_circumstances" type="radio" value="Fire"></td>
					  </tr>
                    </table>
                </div>
                <div class = "col-md-6">
                	<label>&nbsp;</label>
                    <table width="230" border="0" class="mb25">
                      <tr>
						<th scope="row">Theft:</th>
						<td><input name="fnol--f_circumstances" id="fnol--f_circumstances" type="radio" value="Theft"></td>
					  </tr>
					  <tr>
						<th scope="row">Vandalism:</th>
						<td><input name="fnol--f_circumstances" id="fnol--f_circumstances" type="radio" value="Vandalism"></td>
					  </tr>
					  
					</table>
				</div>
				<!-- /. Rightbox Circ -->
		
        		<div class = "col-md-12">
                    <div class = "col-md-12">
                        <label>Circumstance Details:</label>
                        <textarea name="fnol--f_circumstance_details" id="fnol--f_circumstance_details" cols="45" rows="3" class="form-control mb10"></textarea>
                    </div>
                    <div class = "col-md-12">
                        <label>Damage Description:</label>
                        <textarea name="fnol--f_vehicle_damage" id="fnol--f_vehicle_damage" cols="45" rows="3" class="form-control mb10"></textarea>
                    </div>
                   <!-- <label>Injury Details (if applicable):</label>
                    <input type="text" id="fnol--f_injury_details" class="form-control mb10" placeholder=""  /> -->
                    <div class = "col-md-12">
                        <label>Other Info:</label>
                        <textarea name="fnol--f_other_info" id="fnol--f_other_info" cols="45" rows="2" class="form-control mb10"></textarea>
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
						echo "<a title=\"Edit third party\" class=\"show-overlay\" id=\"addTP:" . $tps[$header]['tp_id'] . "\">
						<span class=\"btn btn-default \" id=\"" . $tps[$header]['tp_id'] . "\">" .$tps[$header]['tp_name'] . "</span></a>";
					}	
				?>
				</div>
            	<div style="clear:both"></div>
			</div>	
            <input type="hidden" id="claimType" name="claimType" value="fnol"  />

		<div class = "col-md-12">
			<button class = "btn btn-lg btn-success mb25 mt50" id ="fnol_submit">Accept & Save &nbsp;<i class="fa fa-lg fa-floppy-o"></i></button>
            <button class = "btn btn-lg btn-danger mb25 mt50 cancel pull-right">Cancel &nbsp;<i class="fa fa-lg fa-times"></i></button>
		</div>
        
        </div>
		</form>
        <div class="save-result"></div>
	</div>
	<!-- /FNOL ass -->	