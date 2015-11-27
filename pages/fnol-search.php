<!-- DETAILS -->
	<div class="details">
		<div class="col-md-12">
				<div class="col-md-12 mb25" id ="searchbox">
				<h4>Customer Search</h4><div class="title-divider"></div>
                
                <form method="post" enctype="multipart/form-data" id="policySearch">
                       
                        <div class ="col-md-6">
                            <p>Vehicle registration:</p><input type="text" name="reg" class="form-control mb10" placeholder="" aria-describedby="basic-addon2" value="<?php echo $_POST['reg'] ?>">
                        </div>	
                        
                        <div class ="col-md-6">
                            <p>Policy number:</p><input type="text" name="postcode" class="form-control mb10" placeholder="" aria-describedby="basic-addon2" value="<?php echo $_POST['postcode'] ?>">
                        </div>
                        
                        <button class = "btn btn-success mt10 mb25">Search &nbsp;<i class="fa fa-lg fa-search"></i></button>
				</div>
                </form>
                
                <?php 
				if(!empty($_POST['reg']) || !empty($_POST['postcode'])) { 
					
					/*if(!empty($_POST['name'])) {
						$nameSplit = explode(" ", $_POST['name']);
						$policyInfo = $conn->execute_sql("select", array('*'), "policy JOIN policy_holders ON p_id = ph_p_id join vehicles on v_p_id = p_id", "p_ph_forename=LOWER(?) AND p_ph_surname=LOWER(?) and (p_cancel_date IS NULL OR p_cancel_date = '0000-00-00') and p_renewal_date >= '" . date('Y-m-d') . "'", array("s1" => strtolower($nameSplit[0]), "s2" => strtolower($nameSplit[1])));
					}*/
					
					if(!empty($_POST['reg'])) {
						$policyInfo = $conn->execute_sql("select", array('*'), "policy JOIN policy_holders ON p_id = ph_p_id join vehicles on v_p_id = p_id", "v_reg=? and (p_cancel_date IS NULL OR p_cancel_date = '0000-00-00') and p_renewal_date >= '" . date('Y-m-d') . "'", array("s" => $_POST['reg']));
					}
					elseif(!empty($_POST['postcode'])) {
						$policyInfo = $conn->execute_sql("select", array('*'), "policy JOIN policy_holders ON p_id = ph_p_id join vehicles on v_p_id = p_id", "ph_postcode=? and (p_cancel_date IS NULL OR p_cancel_date = '0000-00-00') and p_renewal_date >= '" . date('Y-m-d') . "'", array("s" => $_POST['postcode']));
					}
					
				
					foreach($policyInfo as $header => $value) {
						// get previous claims
				?>
                
                <!-- OS90101589193 -->
				<div class="col-md-6">
               	<div id="thisClaimType" class="hidden"><input type="hidden" id="hidden_claim_type" value="<?php echo $_REQUEST['displayPage']; ?>" /></div>
				<h4>Vehicle Information</h4><div class="title-divider"></div>
                        <table width="600" border="0">
                          <tr>
                            <th scope="row"><b>Policy Number:</b></th>
                            <td><?php echo $policyInfo[$header]['p_policy_number'] ?></td>
                          </tr>
                          <tr>
                            <th scope="row"><b>Insurer:</b></th>
                            <td>OneCall Insurance LTD</td>
                          </tr>
                          <tr>
                            <th scope="row"><b>Cover:</b></th>
                            <td><?php echo $policyInfo[$header]['p_cover'] ?></td>
                          </tr>
                            <th scope="row"><b>Vehicle Reg:</b></th>
                            <td><?php echo $policyInfo[$header]['v_reg'] ?></td>
                          </tr>
                        </table>		
				</div>
                
                
				<!-- OS90101589193 -->
				<div class="col-md-6">
				<h4>Policy Holder Information</h4><div class="title-divider"></div>
                        <table width="600" border="0">
                          <tr>
                            <th scope="row"><b>Customer Name:</b></th>
                            <td><?php echo $policyInfo[$header]['ph_forename'] . " " . $policyInfo[$header]['ph_surname'] ?></td>
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
                          <tr>
                            <th scope="row"><b>Date of Birth:</b></th>
                            <td><?php echo date("d/m/Y", strtotime($policyInfo[$header]['ph_dob'])) ?></td>
                          </tr>
                        </table>
                        
                        <button id="add_fnol_claim" class="btn btn-success w100 mt25">Add Claim &nbsp;<i class="fa fa-lg fa-plus-circle"></i></button>		
				</div>
                
                
                
                <?php if($_REQUEST['displayPage'] == "breakdown") { ?>
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
                <?php 
						}
					} 
				}
				?>
				
		</div>
				
			
	</div><!-- /.DETAILS -->