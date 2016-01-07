<!-- SEARCH -->

<div class="col-md-12 mb25"> <!-- TOP--> 

<div class="details mb100">
    <div class = "col-lg-12">	  
    
    <div class="well bd-assisted-unassisted" style="display: none;">
        <button type="button" class="btn btn-success navbar-btn btn-lg col-md-5" id="assistedbutt">Assisted</button>
        <div class = "col-md-2"></div>
        <button type="button" class="btn btn-danger navbar-btn btn-lg col-md-5" id="unassistedbutt">Unassisted</button>
        <div style="clear: both;"></div>
    </div> 
    
    <div class = "fnol-unassisted" id = "fnol_data_unassisted" style="display:none"><!-- FNOL UNASSISTED -->	
    	<form method="post" enctype="multipart/form-data" id="he_unassisted">
            
            <label>Reason for Unassisted:</label>
            <select id = "home_emergency--he_unassist_reason" name="home_emergency--he_unassist_reason">
                <option value="1">Reoccurring issue</option>
                <option value="2">Mechanical/Electrical Failure</option>
                <option value="3">Accidental Damage</option>
                <option value="4">Contents only cover</option>
                <option value="5">More than 3 claims in one year</option>
                <option value="6">Within 14 days</option>
                <option value="7">Not informed within 24 hours</option>
                <option value="8">Boilers</option>
                <option value="9">Trace & Access</option>
                <option value="10">Other – Out of Criteria</option>
            </select>
            
            <br /><br />
        
            <div id="reasonbox">
                <label>More Details:</label>
                <textarea type="text" name ="home_emergency--he_unassist_desc" rows = "10" cols="70" class="form-control mb25" placeholder="" > </textarea>
            </div>
        
        	<input type="hidden" id="claimType" name="claimType" value="home_emergency"  />
            <input type="hidden" id="home_emergency--he_assisted_unassisted" name="home_emergency--he_assisted_unassisted" value="Unassisted"  />
            
            <button class = "btn btn-lg btn-success mb25" id ="he_unassisted_submit">Accept & Save &nbsp;<i class="fa fa-lg fa-floppy-o"></i></button>
            <button class = "btn btn-lg btn-danger mb25 cancel pull-right">Cancel &nbsp;<i class="fa fa-lg fa-times"></i></button>
            
        </form>
    </div>
    
    <div class="fnol-assisted" id="fnol_dataisted" style="display:none"><!-- FNOL UNASSISTED -->	
		<form method="post" enctype="multipart/form-data" id="he_assisted">
            
            <label>Reason for Assisted:</label>
            <select id = "home_emergency--he_assist_reason" name="home_emergency--he_assist_reason">
                <option value="1">Burst/Blocked Pipes</option>
                <option value="2">Fire</option>
                <option value="3">Burglary/attempted burglary</option>
                <option value="4">Storm damage</option>
                <option value="5">Removal of wasps/hornet nests</option>
                <option value="6">Damage to locks/Entrance</option>
                <option value="7">Damage to bricks/doors/windows</option>
                <option value="8">Guttering - Upgrade Only</option>
            </select>
     
            <br /><br />
            
            <div id="reasonbox">
                <label>More Details:</label>
                <textarea type="text" name ="home_emergency--he_assist_desc" rows = "10" cols="70" class="form-control mb25" placeholder="" > </textarea>
            </div>
        
        	<input type="hidden" id="claimType" name="claimType" value="home_emergency"  />
            <input type="hidden" id="home_emergency--he_assisted_unassisted" name="home_emergency--he_assisted_unassisted" value="Assisted"  />
            
            <button class = "btn btn-lg btn-success mb25" id="he_assisted_submit">Accept & Save &nbsp;<i class="fa fa-lg fa-floppy-o"></i></button>
            <button class = "btn btn-lg btn-danger mb25 cancel pull-right">Cancel &nbsp;<i class="fa fa-lg fa-times"></i></button>
            
        </form>
    </div>
        
    </div>
        <!-- /.DETAILS -->	 
</div>
<div class="save-result"></div>