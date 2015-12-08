<!-- SEARCH -->

<div class="col-md-12 mb10">              
    <h3>Windscreen</h3><div class="title-divider"></div>
    
    <div class="well">
    	<h4>For more information regarding our policies or terms and conditions please visit the following webpage.</h4>
        <div class="btn-group" role="group">
          <a href="http://www.onecalldirect.co.uk/existingCustomers/policy-downloads.php" target="_blank"><button type="button" class="btn btn-default">Policy Booklet</button></a>
        </div>
        <div style="clear: both;"</div>
    </div>
    
    <div class="well mt25 warning">
    	<h4>Please Note.</h4>
        <p>If the customer fails DPA or their information is not up to date, please tell them to contact their broker, OneCall Insurance Services on 01302 554 015</p>
        <p>If the customer is claiming for multiple windows, please tell them to call the claims team to validate on 0203 738 7300 and choose option 5 (General Enquiries)</p>
        <div style="clear: both;"</div>
    </div>
</div> 

<div class="col-md-12 mb25"> <!-- TOP--> 

<div class="details mb100">
    <div class = "col-lg-12">	  
    
    <div class="well bd-assisted-unassisted" style="display: none;">
        <button type="button" class="btn btn-success navbar-btn btn-lg col-md-5" id = "assistedbutt">Assisted</button>
        <div class = "col-md-2"></div>
        <button type="button" class="btn btn-danger navbar-btn btn-lg col-md-5" id = "unassistedbutt">Unassisted</button>
        <div style="clear: both;"></div>
    </div> 
    
    <div class = "fnol-unassisted" id = "fnol_data_unassisted" style="display:none"><!-- FNOL UNASSISTED -->	
     
    	<form method="post" enctype="multipart/form-data" id="ws_unassisted">
        
        	<div id = "reasonbox">
                <label>Claim details:</label>
                <textarea type="text" name ="windscreen--w_further_info" rows = "10" cols="70" class="form-control mb25" placeholder="" > </textarea>
            </div>
            
            <br />
            
            <label>Repair/Replace:</label>
            <select id = "windscreen--w_repair_replace" name="windscreen--w_repair_replace">
                <option value="">Select</option>
                <option value="Repair">Repair</option>
                <option value="Replace">Replace</option>
            </select>
            
            <br /><br />
            
            <label>Reason for Unassisted:</label>
            <select id = "windscreen--w_unassist_reason" name="windscreen--w_unassist_reason">
            	<option value="">Select</option>
                <option value="1">Vandalism damage</option>
                <option value="2">Sunroof damage</option>
                <option value="3">Customer inflicted damage</option>
                <option value="4">Customer unwilling to pay excess</option>
                <option value="5">Manufacturers glass</option>
                <option value="6">Policy exclusion</option>
                <option value="7">Other</option>

            </select>
            
            <br /><br />
        
        	<input type="hidden" id="claimType" name="claimType" value="windscreen"  />
            <input type="hidden" id="windscreen--w_assisted_unassisted" name="windscreen--w_assisted_unassisted" value="Unassisted"  />
            
            <button class = "btn btn-lg btn-success mb25" id ="ws_unassisted_submit">Accept & Save &nbsp;<i class="fa fa-lg fa-floppy-o"></i></button>
            <button class = "btn btn-lg btn-danger mb25 cancel pull-right">Cancel &nbsp;<i class="fa fa-lg fa-times"></i></button>
            
        </form>
    </div>
    
    <div class="fnol-assisted" id="fnol_dataisted" style="display:none"><!-- FNOL UNASSISTED -->	
		<form method="post" enctype="multipart/form-data" id="ws_assisted">
                
            <div id = "reasonbox">
                <label>Claim details:</label>
                <textarea type="text" name ="windscreen--w_further_info" rows = "10" cols="70" class="form-control mb25" placeholder="" > </textarea>
            </div>
            
            <br />
            
            <label>Repair/Replace:</label>
            <select id = "windscreen--w_repair_replace" name="windscreen--w_repair_replace">
                <option value="">Select</option>
                <option value="Repair">Repair</option>
                <option value="Replace">Replace</option>
            </select>
            
            <br /><br />
        	
            <label>Window</label>
            <select id = "windscreen--w_windscreen" name="windscreen--w_windscreen">
                <option value="">Select</option>
                <option value="1">Front</option>
                <option value="2">Front Nearside</option>
                <option value="3">Front Offside</option>
                <option value="4">Rear Nearside</option>
                <option value="5">Rear Offside</option>
                <option value="6">Rear Windscreen</option>
            </select>
            
            <br /><br />
            
        	<input type="hidden" id="claimType" name="claimType" value="windscreen"  />
            <input type="hidden" id="windscreen--w_assisted_unassisted" name="windscreen--w_assisted_unassisted" value="Assisted"  />
            
            <button class = "btn btn-lg btn-success mb25" id = "ws_assisted_submit">Accept & Save &nbsp;<i class="fa fa-lg fa-floppy-o"></i></button>
            <button class = "btn btn-lg btn-danger mb25 cancel pull-right">Cancel &nbsp;<i class="fa fa-lg fa-times"></i></button>
            
        </form>
    </div>
        
    </div>
        <!-- /.DETAILS -->	 
</div>
<div class="save-result"></div>