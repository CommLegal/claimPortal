<?php
if (!empty($_SESSION['claimID'])) {
    /* $conn->execute_sql("delete", "", "claims", "c_id=?", array("i" => $_SESSION['claimID']));
      $conn->execute_sql("delete", "", "third_party", "tp_c_id=?", array("i" => $_SESSION['claimID']));
      unset($_SESSION['claimID']); */
}
?> 
<!-- DETAILS -->
<div class="details">
    <div class="col-md-12">
        <div class="col-md-12 mb25" id ="searchbox" style= "background-color: <?php echo $bgcolor ?>; color:<?php echo $fontcolor ?>; ">
            <h4>Customer Search</h4><div class="title-divider" style= "background-color: <?php echo $breakcolor ?>; "></div>

            <form method="post" enctype="multipart/form-data" id="policySearch">

                <?php if (($_REQUEST['displayPage'] !== "home_emergency") && ($_REQUEST['displayPage'] !== "household_claim")) { ?>
                    <div class ="col-md-4">
                        <p>Vehicle registration:</p><input type="text" name="reg" class="form-control mb10" 
                                                           placeholder="" aria-describedby="basic-addon2" value="<?php echo $_POST['reg'] ?>">
                    </div>	
                    <div class ="col-md-1">&nbsp;</div>
                <?php } ?>
                <div class ="col-md-4">
                    <p>Postcode:</p><input type="text" name="postcode" class="form-control mb10" 
                                           placeholder="" aria-describedby="basic-addon2" value="<?php echo $_POST['postcode'] ?>">
                </div>
                <div class ="col-md-1">&nbsp;</div>
                <button class = "mt25 btn-lg btn btn-default col-md-2">Search &nbsp;<i class="fa fa-lg fa-search"></i></button>
        </div>
        </form>

        <?php
        if (!empty($_POST['reg']) || !empty($_POST['postcode'])) {

            if (!empty($_POST['reg'])) {
                $policyInfo = $conn->execute_sql("select", array('v_p_id, v_id'), "vehicles", "REPLACE(v_reg, ' ', '')=?", array("s" => str_replace(" ", "", $_POST['reg'])));
                if (!empty($policyInfo)) {
                    $conn->execute_sql("insert", array('sl_ul_id' => $_SESSION['userID'], 'sl_page' => $_REQUEST['displayPage'], 'sl_postcode' => $_POST['postcode'], 'sl_reg' => $_POST['reg'], 'sl_p_id' => $policyInfo[0]['v_p_id'], 'sl_timestamp' => date("Y-m-d H:i:s"), 'sl_ip' => $_SERVER['REMOTE_ADDR']), "search_list", "", "");
                } else {
                    $conn->execute_sql("insert", array('sl_ul_id' => $_SESSION['userID'], 'sl_page' => $_REQUEST['displayPage'], 'sl_postcode' => $_POST['postcode'], 'sl_reg' => $_POST['reg'], 'sl_timestamp' => date("Y-m-d H:i:s"), 'sl_ip' => $_SERVER['REMOTE_ADDR']), "search_list", "", "");
                }
            } elseif (!empty($_POST['postcode'])) {
                if (($_REQUEST['displayPage'] !== "home_emergency") && ($_REQUEST['displayPage'] !== "household_claim")) {
                    $policyType = " AND (p_policy_type in('PRIVATE', 'COMMERCIAL') or p_policy_type is NULL)";
                } else {
                    $policyType = " AND p_policy_type = 'HOUSEHOLD'";
                }
                $policyInfo = $conn->execute_sql("select", array('ph_id, ph_p_id'), "policy_holders JOIN policy ON ph_p_id = p_id", "REPLACE(ph_postcode, ' ', '')=?" . $policyType, array("s" => str_replace(" ", "", $_POST['postcode'])));
                if (!empty($policyInfo)) {
                    $conn->execute_sql("insert", array('sl_ul_id' => $_SESSION['userID'], 'sl_page' => $_REQUEST['displayPage'], 'sl_postcode' => $_POST['postcode'], 'sl_reg' => $_POST['reg'], 'sl_p_id' => $policyInfo[0]['ph_p_id'], 'sl_timestamp' => date("Y-m-d H:i:s"), 'sl_ip' => $_SERVER['REMOTE_ADDR']), "search_list", "", "");
                } else {
                    $conn->execute_sql("insert", array('sl_ul_id' => $_SESSION['userID'], 'sl_page' => $_REQUEST['displayPage'], 'sl_postcode' => $_POST['postcode'], 'sl_reg' => $_POST['reg'], 'sl_timestamp' => date("Y-m-d H:i:s"), 'sl_ip' => $_SERVER['REMOTE_ADDR']), "search_list", "", "");
                }
            }

            if (empty($policyInfo)) {
                echo "<div class=\"col-md-12\"><h4>No policies found...</h4></div><div class=\"col-md-12 mb25\" style=\"height: 10px; background-color:#EBEBEB;\"></div>";
            } else {
                if (count($policyInfo) == 1) {
                    $term = "policy";
                } else {
                    $term = "policies";
                }
                echo "<div class=\"col-md-12\"><h4>" . count($policyInfo) . " " . $term . " found...</h4></div>
			<div class=\"col-md-12 mb25\" style=\"height: 10px; background-color:#EBEBEB;\"></div>";
            }

            $i = 0;

            foreach ($policyInfo as $header => $value) {
                $i++;
                $fields_string = NULL;
                if (!empty($_POST['reg'])) {
                    $policyDetail = $conn->execute_sql("select", array('*'), "policy JOIN policy_holders ON p_id = ph_p_id join vehicles on v_p_id = p_id left join abi on abi_code = v_abi", "v_id=? and (p_cancel_date IS NULL OR p_cancel_date = '0000-00-00') and p_renewal_date >= '" . date('Y-m-d') . "'", array("i" => $policyInfo[$header]['v_id']));
                } elseif (!empty($_POST['postcode'])) {
                    if (($_REQUEST['displayPage'] !== "home_emergency") && ($_REQUEST['displayPage'] !== "household_claim")) {
                        $policyDetail = $conn->execute_sql("select", array('*'), "policy JOIN policy_holders ON p_id = ph_p_id join vehicles on v_p_id = p_id left join abi on abi_code = v_abi", "p_id=? and (p_cancel_date IS NULL OR p_cancel_date = '0000-00-00') and p_renewal_date >= '" . date('Y-m-d') . "'", array("i" => $policyInfo[$header]['ph_p_id']));
                    } else {
                        $policyDetail = $conn->execute_sql("select", array('*'), "policy JOIN policy_holders ON p_id = ph_p_id", "p_id=? and (p_cancel_date IS NULL OR p_cancel_date = '0000-00-00') and p_renewal_date >= '" . date('Y-m-d') . "'", array("i" => $policyInfo[$header]['ph_p_id']));
                    }
                }

                if ($_REQUEST['displayPage'] == "windscreen") {
                    if ($_SESSION['userID'] == 4) {
                        $brokerArray = array("Ageas", "Ageas - Grp", "Ageas Insurance", "Ageas KC", "Ageas KC Telematics", "Ageas Telematic", "Groupama", "GROUPAMA Insurance Company Limited", "Groupama KC", "Groupama Key Choice", "KGM @ Lloyds", "KGM Motor Policies at Lloyd's", "Sabre", "Sabre Insurance Company Limited", "Sabre Telemati", "Sabre Telematics - Soteria Drive");
                        if (!in_array($policyDetail[0]['p_broker'], $brokerArray)) {
                            if ($policyDetail[0]['p_renewal_date'] >= date("Y-m-d")) {
                                echo "<h4 style=\"clear:both; color: #000;\">" . $policyDetail[0]['p_policy_number'] . " - Please refer the claim back to Commercial Legal on 0203 7387300 option 2</h4><div class=\"col-md-12 mb25\" style=\"height: 10px; background-color:#EBEBEB;\"></div>";
                                $ignore = 1;
                            }
                            unset($policyDetail[0]);
                        }
                    }
                    if($_SESSION['userID'] == 10 || $_SESSION['userID'] == 2) {
                        $brokerArray = array("Ageas", "Ageas - Grp", "Ageas Insurance", "Ageas KC", "Ageas KC Telematics", "Ageas Telematic", "Groupama", "GROUPAMA Insurance Company Limited", "Groupama KC", "Groupama Key Choice", "KGM @ Lloyds", "KGM Motor Policies at Lloyd's", "Sabre", "Sabre Insurance Company Limited", "Sabre Telemati", "Sabre Telematics - Soteria Drive");
                        if (in_array($policyDetail[0]['p_broker'], $brokerArray)) {
                            if ($policyDetail[0]['p_renewal_date'] >= date("Y-m-d")) {
                                echo "<h4 style=\"clear:both; color: #000;\">" . $policyDetail[0]['p_policy_number'] . " - Please refer the claim to National Windscreens on 01827 338727</h4><div class=\"col-md-12 mb25\" style=\"height: 10px; background-color:#EBEBEB;\"></div>";
                                $ignore = 1;
                            }
                            unset($policyDetail[0]);
                        }                        
                    }
                    
                    $brokerArray = array("XSD");
                    if (in_array($policyDetail[0]['p_broker'], $brokerArray)) {
                        if ($policyDetail[0]['p_renewal_date'] >= date("Y-m-d")) {
                            echo "<h4 style=\"clear:both; color: #000;\">" . $policyDetail[0]['p_policy_number'] . " - Please refer the claim to XSD on 03333 443 018</h4><div class=\"col-md-12 mb25\" style=\"height: 10px; background-color:#EBEBEB;\"></div>";
                            $ignore = 1;
                        }
                        unset($policyDetail[0]);
                    } 
                }

                if (empty($policyDetail[0])) {
                    if (empty($ignore)) {
                        $policyDetail = $conn->execute_sql("select", array('p_policy_number'), "policy", "p_id=? or p_ph_id=?", array("i1" => $policyInfo[$header]['v_p_id'], "i2" => $policyInfo[$header]['ph_id']));
                        echo "<h4 style=\"clear:both; color: #ccc;\">Policy no: " . $policyDetail[0]['p_policy_number'] . " is no longer valid...</h4><div class=\"col-md-12 mb25\" style=\"height: 10px; background-color:#EBEBEB;\"></div>";
                    }
                } else {
                      if($policyDetail[0]['p_scheme'] == "RENEWAL") {
                        $policyDetail[0]['p_policy_newrnwl'] = "Renewed Policy";
                      }
                      else {
                        $interval = date_diff(date_create($policyDetail[0]['p_inception_date']), date_create($policyDetail[0]['p_renewal_date']));
                        if($interval->format("%a") < 370) { 
                            $policyDetail[0]['p_policy_newrnwl'] = "New Policy";
                        } 
                        else {
                            $policyDetail[0]['p_policy_newrnwl'] = "Renewed Policy";
                        }
                      } 
                    //$policyDetail[0]['p_policy_newrnwl'] = 
                    if (empty($policyDetail[0]['p_broker']) || $policyDetail[0]['p_broker'] == 'MLT' || $policyDetail[0]['p_broker'] == 'WHS' || $policyDetail[0]['p_broker'] == 'TPS' || $policyDetail[0]['p_broker'] == 'SCR') {
                        $policyDetail[0]['p_broker'] = "ONE Insurance Limited";
                    }
                    if ($_REQUEST['displayPage'] !== "fnol" && $_REQUEST['displayPage'] !== "windscreen") {
                        if (!empty($policyDetail[0]['v_fleet'])) {
                            $cover = "Fleet Cover";
                        } else {
                            if ($_REQUEST['displayPage'] == "breakdown_assistance") {
                                $breakdownInfo = $conn->execute_sql("select", array('a_scheme', 'a_description', 'a_inception_date'), "addons", "a_addon_type=? and a_policy_number=? and (a_cancel_date IS NULL OR a_cancel_date = '0000-00-00') and a_renewal_date >= '" . date('Y-m-d') . "'", array("s1" => "CBA", "s2" => $policyDetail[0]['p_policy_number']));
                                if (!empty($breakdownInfo)) {
                                    switch ($breakdownInfo[0]['a_description']) {
                                        case "RAC EU Breakdown":
                                            $cover = "<span style=\"color: #f00; font-weight: bold;\">Please Refer to RAC</span>";
                                            break;
                                        default:
                                            $cover = "Gold Breakdown (Inception - " . date("d/m/Y", strtotime($breakdownInfo[0]['a_inception_date'])) . ")";
                                    }
                                } else {
                                    $cover = "Basic Breakdown";
                                }
                            } elseif ($_REQUEST['displayPage'] == "home_emergency") {
                                $householdInfo = $conn->execute_sql("select", array('a_scheme', 'a_description', 'a_inception_date'), "addons", "a_addon_type=? and a_policy_number=? and (a_cancel_date IS NULL OR a_cancel_date = '0000-00-00') and a_renewal_date >= '" . date('Y-m-d') . "'", array("s1" => "HEC", "s2" => $policyDetail[0]['p_policy_number']));
                                if (!empty($householdInfo)) {
                                    $cover = "Gold Cover (Inception - " . date("d/m/Y", strtotime($householdInfo[0]['a_inception_date'])) . ")";
                                } else {
                                    $cover = "Basic Cover";
                                }
                            }
                        }
                    }

                    if ($_REQUEST['displayPage'] == "windscreen") {
                        $wsexcessInfo = $conn->execute_sql("select", array('ic_windscreen_replace_xs', 'ic_windscreen_repair_xs'), "insurer_contacts", "ic_title=? ", array("s" => $policyDetail[0]['p_broker']));
                    }

                    if (empty($policyDetail[0]['v_make'])) {
                        $policyDetail[0]['v_make'] = $policyDetail[0]['abi_make'];
                    }
                    if (empty($policyDetail[0]['v_model'])) {
                        $policyDetail[0]['v_model'] = $policyDetail[0]['abi_model'];
                    }
                    if (empty($policyDetail[0]['v_transmission'])) {
                        $policyDetail[0]['v_transmission'] = $policyDetail[0]['abi_transmission'];
                    }
                    if (empty($policyDetail[0]['v_fuel_type'])) {
                        $policyDetail[0]['v_fuel_type'] = $policyDetail[0]['abi_fuel_type'];
                    }


                    switch ($policyDetail[0]['v_transmission']) {
                        case "M":
                            $transmission = "Manual";
                            break;
                        case "A":
                            $transmission = "Automatic";
                            break;
                    }

                    switch ($policyDetail[0]['v_fuel_type']) {
                        case "P":
                            $fuel = "Petrol";
                            break;
                        case "D":
                            $fuel = "Diesel";
                            break;
                        case "E":
                            $fuel = "Hybrid";
                            break;
                        default:
                            $fuel = "Unknown";
                    }

                    $url = "http://activejobs.ncigroup.local/onecall/index.aspx";
                    $fields = array(
                        'CustomerTitle' => urlencode($policyDetail[0]['ph_title']),
                        'CustomerForename' => urlencode(ucwords(strtolower($policyDetail[0]['ph_forename']))),
                        'CustomerSurname' => urlencode(ucwords(strtolower($policyDetail[0]['ph_surname']))),
                        'AddressLine1' => urlencode($policyDetail[0]['ph_address1']),
                        'Postcode' => urlencode($policyDetail[0]['ph_postcode']),
                        'TelephoneNumber' => urlencode($policyDetail[0]['ph_telephone']),
                        'LandlineNumber' => urlencode($policyDetail[0]['ph_telephone_other']),
                        'PolicyNumber' => urlencode($policyDetail[0]['p_policy_number']),
                        'InceptionDate' => urlencode(date("d/m/Y", strtotime($policyDetail[0]['p_inception_date']))),
                        'Cover' => urlencode($cover),
                        'VehicleReg' => urlencode($policyDetail[0]['v_reg']),
                        'VehicleMake' => urlencode($policyDetail[0]['v_make']),
                        'VehicleModel' => urlencode($policyDetail[0]['v_model']),
                        'VehicleFuelType' => urlencode($fuel),
                        'VehicleTransmission' => urlencode($transmission)
                    );

                    //url-ify the data for the POST
                    foreach ($fields as $key => $value) {
                        $fields_string .= $key . '=' . $value . '&';
                    }
                    rtrim($fields_string, '&');
                    // get previous claims
                    ?>

                    <!-- OS90101589193 -->
                    <div class="col-md-6">
            <!--<div id="hidden_claim_type" class="hidden"><?php echo $_REQUEST['displayPage']; ?>" /></div>-->
                        <h4><?php if (($_REQUEST['displayPage'] !== "home_emergency") && ($_REQUEST['displayPage'] !== "household_claim")) { ?>Vehicle Information<?php } else { ?>Policy Information<?php } ?></h4><div class="title-divider"></div>
                        <table width="600" border="0">
                            <tr>
                                <th scope="row"><b>Policy Number:</b></th>
                                <td><?php echo $policyDetail[0]['p_policy_number'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><b>Policy Type:</b></th>
                                <td><?php echo $policyDetail[0]['p_policy_newrnwl']  ?></td>
                            </tr>
                            <tr>
                            <th scope="row"><b>Inception Date:</b></th>
                            <td><?php echo date("d/m/Y", strtotime($policyDetail[0]['p_inception_date'])) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><b>Insurer:</b></th>
                                <td><?php echo $policyDetail[0]['p_broker'] ?></td>
                            </tr>
                            <?php if (($_REQUEST['displayPage'] !== "fnol") && ($_REQUEST['displayPage'] !== "windscreen") && ($_REQUEST['displayPage'] !== "household_claim")) { ?>
                                <tr>
                                    <th scope="row"><b>Cover:</b></th>
                                    <td><?php echo $cover ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($_REQUEST['displayPage'] == "windscreen") { ?>
                                <tr>
                                    <th scope="row"><b>Windscreen excess:</b></th>
                                    <td><?php echo "Replace: &pound;" . $wsexcessInfo[0]['ic_windscreen_replace_xs'] . " / Repair: &pound;" . $wsexcessInfo[0]['ic_windscreen_repair_xs'] ?></td>
                                </tr>
                            <?php } ?>
                            <?php if (($_REQUEST['displayPage'] !== "home_emergency") && ($_REQUEST['displayPage'] !== "household_claim")) { ?>
                                <tr>
                                    <th scope="row"><b>Vehicle Reg:</b></th>
                                    <td><?php echo $policyDetail[0]['v_reg'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>Vehicle Details:</b></th>
                                    <td><?php echo $policyDetail[0]['v_make'] . " " . $policyDetail[0]['v_model'] ?></td>
                                </tr>
                            <?php } ?>
                        </table>		
                    </div>


                    <!-- OS90101589193 -->
                    <div class="col-md-6">
                        <h4>Policy Holder Information</h4><div class="title-divider"></div>
                        <table width="600" border="0">
                            <tr>
                                <th scope="row"><b>Customer Name:</b></th>
                                <td><?php echo ucwords(strtolower($policyDetail[0]['ph_forename'] . " " . $policyDetail[0]['ph_surname'])) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><b>Address:</b></th>
                                <td><?php echo $policyDetail[0]['ph_address1'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><b>Postcode:</b></th>
                                <td><?php echo $policyDetail[0]['ph_postcode'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><b>Telephone Number:</b></th>
                                <td><?php echo $policyDetail[0]['ph_telephone'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><b>Landline Number:</b></th>
                                <td><?php echo $policyDetail[0]['ph_telephone_other'] ?></td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-6 mt25" style="clear:both;">
                        <?php if ($_REQUEST['displayPage'] == "breakdown_assistance") { ?>
                            <h4>Previous Breakdowns</h4><div class="title-divider"></div>  
                            <?php
                            $date = new DateTime(date("Y-m-d"));
                            $date->sub(new DateInterval('P7D'));
                            $last_week = $date->format('dmY');

                            $previousBreakdowns = $conn->execute_sql("select", array('c_id, c_timestamp, bd_assisted_unassisted, bd_further_info, c_ul_id', 'bd_id'), "claims JOIN breakdown_assistance ON c_bd_id = bd_id", "c_p_id = ?", array("i" => $policyDetail[0]['p_id']));
                            //echo $policyInfo[$header]['p_id'];
                            $i = 0;
                            foreach ($previousBreakdowns as $header => $record) {
                                $i++;
                                ?>
                                <a title="View Breakdown" <?php if (($previousBreakdowns[$header]['c_ul_id'] == $_SESSION['userID']) && ((int) date("dmY", strtotime($previousBreakdowns[$header]['c_timestamp'])) > (int) $last_week)) { ?> class="show-overlay" id="viewBD:<?php echo $previousBreakdowns[$header]['bd_id'] ?>" <?php } ?>style="color: #333; text-decoration:none;"><table width="100%" border="0">
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
                                    </table></a>
                                <div class="title-divider"></div>
                                <?php
                            }
                        }
                        ?>
                    </div>

                    <div class="col-md-6">

                        <?php if ($_SESSION['userID'] == 2 || ($_SESSION['userID'] == 3)) { ?>
                            <a id="passFormToNCI" class = "btn btn-default w100 mt25" PID="<?php echo $policyDetail[0]['p_id'] ?>" href="<?php echo $url . "?" . $fields_string ?>" target="_blank">Pass to NCI &nbsp;<i class="fa fa-lg fa-plus-circle"></i></a>
                            <div class="nci_message"></div>
                        <?php } ?>
                        <button class="btn btn-success w100 mt25 createNewClaim" claimType="<?php echo $_REQUEST['displayPage']; ?>" claimTimestamp="<?php echo date("Y-m-d H:i:s"); ?>" policyId="<?php echo $policyDetail[0]['p_id'] ?>" policyHolderId="<?php echo $policyDetail[0]['p_ph_id'] ?>">Add Claim &nbsp;<i class="fa fa-lg fa-plus-circle"></i></button>	

                        <div class="hiddenClaimType" style="display: none;"><?php echo ((!empty($_SESSION['claimID'])) ? trim($_SESSION['claimID']) : "") ?></div>
                    </div>

                    <div class="col-md-12 mt25 mb25" style="height: 20px; background-color:#EBEBEB;"></div>

                    <?php
                }
            }
        }
        ?>

    </div>

</div><!-- /.DETAILS -->