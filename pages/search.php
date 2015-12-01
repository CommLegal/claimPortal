<?php 
	if(!empty($_SESSION['claimID'])) {
		/*$conn->execute_sql("delete", "", "claims", "c_id=?", array("i" => $_SESSION['claimID']));
		$conn->execute_sql("delete", "", "third_party", "tp_c_id=?", array("i" => $_SESSION['claimID']));
		unset($_SESSION['claimID']);*/
	} 
	?> 
<!-- DETAILS -->
	<div class="details">
		<div class="col-md-12">
				<div class="col-md-12 mb25" id ="searchbox" style= "background-color: <?php echo $bgcolor ?>; color:<?php echo $fontcolor ?>; ">
				<h4>Customer Search</h4><div class="title-divider" style= "background-color: <?php echo $breakcolor ?>; "></div>
                
                <form method="post" enctype="multipart/form-data" id="policySearch">
                       
                        <div class ="col-md-4">
                            <p>Vehicle registration:</p><input type="text" name="reg" class="form-control mb10" 
                            placeholder="" aria-describedby="basic-addon2" value="<?php echo $_POST['reg'] ?>">
                        </div>	
                        <div class ="col-md-1">&nbsp;</div>
                        <div class ="col-md-4">
                            <p>Postcode:</p><input type="text" name="postcode" class="form-control mb10" 
                            placeholder="" aria-describedby="basic-addon2" value="<?php echo $_POST['postcode'] ?>">
                        </div>
                        <div class ="col-md-1">&nbsp;</div>
                        <button class = "mt25 btn-lg btn btn-default col-md-2">Search &nbsp;<i class="fa fa-lg fa-search"></i></button>
				</div>
                </form>
                
                <?php 
				if(!empty($_POST['reg']) || !empty($_POST['postcode'])) { 
					
					/*if(!empty($_POST['name'])) {
						$nameSplit = explode(" ", $_POST['name']);
						$policyInfo = $conn->execute_sql("select", array('*'), "policy JOIN policy_holders ON p_id = ph_p_id join vehicles on v_p_id = p_id", "p_ph_forename=LOWER(?) AND p_ph_surname=LOWER(?) and (p_cancel_date IS NULL OR p_cancel_date = '0000-00-00') and p_renewal_date >= '" . date('Y-m-d') . "'", array("s1" => strtolower($nameSplit[0]), "s2" => strtolower($nameSplit[1])));
					}*/
					if(!empty($_POST['reg'])) {
						$policyInfo = $conn->execute_sql("select", array('v_p_id, v_id'), "vehicles", "v_reg=?", array("s" => $_POST['reg']));
						if(!empty($policyInfo[0])) {
							$policyInfo = $conn->execute_sql("select", array('*'), "policy JOIN policy_holders ON p_id = ph_p_id join vehicles on v_p_id = p_id", "p_id=? and (p_cancel_date IS NULL OR p_cancel_date = '0000-00-00') and p_renewal_date >= '" . date('Y-m-d') . "'", array("i" => $policyInfo[0]['v_p_id']));
						}
					}
					elseif(!empty($_POST['postcode'])) {
						$policyInfo = $conn->execute_sql("select", array('ph_id, ph_p_id'), "policy_holders", "ph_postcode=?", array("s" => $_POST['postcode']));
						if(!empty($policyInfo[0])) {
							$policyInfo = $conn->execute_sql("select", array('*'), "policy JOIN policy_holders ON p_id = ph_p_id join vehicles on v_p_id = p_id", "p_id=? and (p_cancel_date IS NULL OR p_cancel_date = '0000-00-00') and p_renewal_date >= '" . date('Y-m-d') . "'", array("i" => $policyInfo[0]['ph_p_id']));
						}
					}
					//$p_id = $policyInfo[0]['p_id'];
					
					if(empty($policyInfo)) {
						echo "<div class=\"col-md-12\"><h4>No policies found...</h4></div>";
					}
				
					foreach($policyInfo as $header => $value) {
						$breakdownInfo = $conn->execute_sql("select", array('a_scheme', 'a_description'), "addons", "a_addon_type=? and a_policy_number=? and (a_cancel_date IS NULL OR a_cancel_date = '0000-00-00') and a_renewal_date >= '" . date('Y-m-d') . "'", array("s1" => "CBA", "s2" => $policyInfo[$header]['p_policy_number']));
						if(!empty($breakdownInfo)) {
							switch($breakdownInfo[0]['a_description']) {
								case "RAC EU Breakdown":
									$cover = "<span style=\"color: #f00; font-weight: bold;\">Please Refer to RAC</span>";
									break;
								default:
									$cover = "Gold Breakdown";
							}
						}
						else {
							$cover = "Basic Breakdown";	
						}
						// get previous claims
				?>
                
                <!-- OS90101589193 -->
				<div class="col-md-6">
                <!--<div id="hidden_claim_type" class="hidden"><?php echo $_REQUEST['displayPage']; ?>" /></div>-->
				<h4>Vehicle Information</h4><div class="title-divider"></div>
                        <table width="600" border="0">
                          <tr>
                            <th scope="row"><b>Policy Number:</b></th>
                            <td><?php echo $policyInfo[$header]['p_policy_number'] ?></td>
                          </tr>
                          <tr>
                            <th scope="row"><b>Insurer:</b></th>
                            <td><?php echo $policyInfo[$header]['p_broker'] ?></td>
                          </tr>
                          <?php if($_REQUEST['displayPage'] !== "fnol") { ?>
                          <tr>
                            <th scope="row"><b>Cover:</b></th>
                            <td><?php echo $cover ?></td>
                          </tr>
                          <?php } ?>
                          <tr>
                            <th scope="row"><b>Vehicle Reg:</b></th>
                            <td><?php echo $policyInfo[$header]['v_reg'] ?></td>
                          </tr>
                          <tr>
                            <th scope="row"><b>Vehicle Details:</b></th>
                            <td><?php echo $policyInfo[$header]['v_make'] . " " . $policyInfo[$header]['v_model'] ?></td>
                          </tr>
                        </table>		
				</div>
                
                
				<!-- OS90101589193 -->
				<div class="col-md-6">
				<h4>Policy Holder Information</h4><div class="title-divider"></div>
                        <table width="600" border="0">
                          <tr>
                            <th scope="row"><b>Customer Name:</b></th>
                            <td><?php echo ucwords(strtolower($policyInfo[$header]['ph_forename'] . " " . $policyInfo[$header]['ph_surname'])) ?></td>
                          </tr>
                          <tr>
                            <th scope="row"><b>Address:</b></th>
                            <td><?php echo $policyInfo[$header]['ph_address1'] ?></td>
                          </tr>
                          <tr>
                            <th scope="row"><b>Postcode:</b></th>
                            <td><?php echo $policyInfo[$header]['ph_postcode'] ?></td>
                          </tr>
                          <tr>
                            <th scope="row"><b>Telephone Number:</b></th>
                            <td><?php echo $policyInfo[$header]['ph_telephone'] ?></td>
                          </tr>
                          <tr>
                            <th scope="row"><b>Landline Number:</b></th>
                            <td><?php echo $policyInfo[$header]['ph_telephone_other'] ?></td>
                          </tr>
                        </table>
                </div>
                	
                <div class="col-md-6">
                    <?php if($_REQUEST['displayPage'] == "breakdown_assistance") { ?>
                    <h4>Previous Breakdowns</h4><div class="title-divider"></div>  
                    	<?php
						$previousBreakdowns = $conn->execute_sql("select", array('c_id, c_timestamp, bd_assisted_unassisted, bd_further_info'), "claims JOIN breakdown_assistance ON c_bd_id = bd_id", "bd_assisted_unassisted = 'Assisted' AND c_p_id = ?", array("i" => $policyInfo[0]['p_id']));
						$i=0;
						foreach($previousBreakdowns as $header => $record) {
							$i++;
							?>
							<table width="100%" border="0">
							  <tr>
								<th width="40">#<?php echo $i ?></th>
								<th>Date</th>
								<th>Ref No.</td>
								<th>Status</td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td><?php echo date("d/m/Y", strtotime($previousBreakdowns[$header]['c_timestamp'])) ?></th>
								<td>#<?php echo $previousBreakdowns[$header]['c_id'] ?></td>
								<td><?php echo $previousBreakdowns[$header]['bd_assisted_unassisted'] ?></td>
							  </tr>
							  <tr>
								<th width="40">&nbsp;</th>
								<th colspan="3">Details:</td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td colspan="3"><?php echo $previousBreakdowns[$header]['bd_further_info'] ?></td>
							  </tr>
							</table>
                            <div class="title-divider"></div>
							<?php 
							}
						} ?>
                </div>
                
                <div class="col-md-6">
                    <form id="hiddenClaimType" method="post" action="pages/accident_recovery_upload.php">
                        <input id="claims--c_claim_type" name="claimType" type="hidden" value="<?php echo $_REQUEST['displayPage']; ?>" />
                        <input id="claims--c_timestamp" name="claimTimestamp" type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>" />
                        <input id="claims--c_p_id" name="policyId" type="hidden" value="<?php echo $policyInfo[$header]['p_id'] ?>" />
                        <input id="claims--c_ph_id" name="policyHolderId" type="hidden" value="<?php echo $policyInfo[$header]['p_ph_id'] ?>" />
                        
                        <button id="passToNCI" class = "btn btn-success w100 mt25" PID="<?php echo $policyInfo[0]['p_id'] ?>">Pass to NCI &nbsp;<i class="fa fa-lg fa-plus-circle"></i></button>
                        <button id="createNewClaim" class = "btn btn-success w100 mt25">Add Claim &nbsp;<i class="fa fa-lg fa-plus-circle"></i></button>	
                        
                    </form>	
                    <div class="hiddenClaimType" style="display: none;"><?php echo ((!empty($_SESSION['claimID'])) ? trim($_SESSION['claimID']) : "") ?></div>
                </div>
                
				<?php 
					} 
				}
				?>
				
		</div>
			
	</div><!-- /.DETAILS -->