<!-- SEARCH -->

<div class="col-md-12 mb10"> <!-- TOP--> 

<div class="well">
        <div class="btn-group" role="group">
          <a href="<?php _ROOT ?>pdf-docs/Household Contact numbers for Insurers.xlsx" target="_blank"><button type="button" class="btn btn-default">Contact numbers for insurers</button></a>
          <a href="https://www.onecalldirect.co.uk/existingCustomers/policy-downloads.php" target="_blank"><button type="button" class="btn btn-default">Home Insurance Information Book</button></a>
        </div>
        <div style="clear: both;"></div>
    </div>

<div class="details mb100">
    <div class = "col-lg-12">	  
    
    <div class = "hcDisplay" id = "hcDisplay" style="display:none"><!-- FNOL UNASSISTED -->	
    	<form method="post" enctype="multipart/form-data" id="hc_form" data-toggle="validator" role="form">
            <div class="form-group">
            <label>Date of Claim:</label>
            <div class="input-group mb10">
            <input required type="text" name="household_claim--hc_date" id="household_claim--hc_date" class="form-control mb10 datepicker" placeholder="" value="">
                <span class="input-group-addon"><i class = "fa fa-calendar"></i></span>
            </div>
            
            <br />
                
            <label>Claim Type:</label>
            <select id = "household_claim--hc_claim_type" name="household_claim--hc_claim_type" class="form-control">
                <option value="1">Accidental Damage</option>
                <option value="2">Accidental Loss</option>
                <option value="3">Escape of Water</option>
                <option value="4">Storm</option>
                <option value="5">Flood</option>
                <option value="6">Fire</option>
                <option value="7">Theft</option>
                <option value="8">Malicious Damage/Vandalism</option>
                <option value="9">Other</option>
            </select>
            
            <br /><br />
        
            <div id="reasonbox">
                <label>More Details:</label>
                <textarea name ="household_claim--hc_desc" rows = "10" cols="70" class="form-control mb25" placeholder="" required> </textarea>
            </div>
        
        	<input type="hidden" id="claimType" name="claimType" value="household_claim"  />
            
            <button class = "btn btn-lg btn-success mb25" id ="hc_submit">Accept & Save &nbsp;<i class="fa fa-lg fa-floppy-o"></i></button>
            <button class = "btn btn-lg btn-danger mb25 cancel pull-right">Cancel &nbsp;<i class="fa fa-lg fa-times"></i></button>
            </div>
        </form>
    </div>
        
    </div>
        <!-- /.DETAILS -->	 
</div>
<div class="save-result"></div>