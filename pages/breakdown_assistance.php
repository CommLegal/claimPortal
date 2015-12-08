<!-- SEARCH -->

<div class="col-md-12 mb10">              
    <h3>Breakdown Assistance</h3><div class="title-divider"></div>
    
    <div class="well">
    	<h4>For more information regarding our policies or terms and conditions please download and inspect the documents below.</h4>
        <div class="btn-group" role="group">
          <a href="<?php echo _ROOT ?>/pdf-docs/breakdown-terms-of-business-agreement.pdf" target="_blank"><button type="button" class="btn btn-default">Breakdown Terms of Business Agreement</button></a>
          <a href="<?php echo _ROOT ?>/pdf-docs/one-call-insurance-services-breakdown.pdf" target="_blank"><button type="button" class="btn btn-default">OneCall Insurance Breakdown Services</button></a>
          <a href="<?php echo _ROOT ?>/pdf-docs/frequently-asked-questions-breakdown.pdf" target="_blank"><button type="button" class="btn btn-default">Frequently Asked Questions</button></a>
        </div>
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
    	<form method="post" enctype="multipart/form-data" id="bd_unassisted">
        
        	<div id = "reasonbox">
                <label>Details of breakdown:</label>
                <textarea type="text" name ="breakdown_assistance--bd_further_info" rows = "10" cols="70" class="form-control mb25" placeholder="" > </textarea>
            </div>
            
            <label>Reason for Unassisted:</label>
            <select id = "breakdown_assistance--bd_unassist_reason" name="breakdown_assistance--bd_unassist_reason">
                <option value="1">Wrong fuel</option>
                <option value="2">Tyre related on basic</option>
                <option value="3">Key related</option>
                <option value="4">Cancelled</option>
                <option value="5">Same breakdown fault as previous</option>
                <option value="5">Commercial vehicle policy</option>
                <option value="O">Other</option>
            </select>
            
            <br /><br />
        
            <div id="reasonbox">
                <label>More Details:</label>
                <textarea type="text" name ="breakdown_assistance--bd_unassist_desc" rows = "10" cols="70" class="form-control mb25" placeholder="" > </textarea>
            </div>
        
        	<input type="hidden" id="claimType" name="claimType" value="breakdown_recovery"  />
            <input type="hidden" id="breakdown_assistance--bd_assisted_unassisted" name="breakdown_assistance--bd_assisted_unassisted" value="Unassisted"  />
            
            <button class = "btn btn-lg btn-success mb25" id ="bd_unassisted_submit">Accept & Save &nbsp;<i class="fa fa-lg fa-floppy-o"></i></button>
            <button class = "btn btn-lg btn-danger mb25 cancel pull-right">Cancel &nbsp;<i class="fa fa-lg fa-times"></i></button>
            
        </form>
    </div>
    
    <div class="fnol-assisted" id="fnol_dataisted" style="display:none"><!-- FNOL UNASSISTED -->	
		<form method="post" enctype="multipart/form-data" id="bd_assisted">
        
            <div id = "reasonbox">
                <label>Details of breakdown:</label>
                <textarea type="text" name ="breakdown_assistance--bd_further_info" rows = "10" cols="70" class="form-control mb25" placeholder="" > </textarea>
            </div>
        
        	<input type="hidden" id="claimType" name="claimType" value="breakdown_recovery"  />
            <input type="hidden" id="breakdown_assistance--bd_assisted_unassisted" name="breakdown_assistance--bd_assisted_unassisted" value="Assisted"  />
            
            <button class = "btn btn-lg btn-success mb25" id = "bd_assisted_submit">Accept & Save &nbsp;<i class="fa fa-lg fa-floppy-o"></i></button>
            <button class = "btn btn-lg btn-danger mb25 cancel pull-right">Cancel &nbsp;<i class="fa fa-lg fa-times"></i></button>
            
        </form>
    </div>
        
    </div>
        <!-- /.DETAILS -->	 
</div>