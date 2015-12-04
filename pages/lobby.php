<div class="col-md-12 mb25">        
    <div class="col-md-2 logobg"></div>
    <div class="col-md-10"><h3>Home</h3><div class="title-divider"></div></div>
    <div class="col-md-2">&nbsp;</div>
    <div class="col-md-10 mb25"><p>Please select an action.</p></div>
    	<?php 
		if($userLogin[0]['ul_accident_recovery'] == "Y") {
        	echo "<a href=\"". _ROOT . "/?displayPage=incident_recovery\"><button type=\"button\" 
			class=\"w100 btn btn-purp navbar-btn btn-lg mr5 p25 h150 col-md-12\">Incident Recovery</button></a><br>";
         } 
		 if($userLogin[0]['ul_breakdown'] == "Y") { 
        	echo "<a href=\"". _ROOT . "/?displayPage=breakdown_assistance\"><button type=\"button\" 
			class=\"w100 btn btn-yellow navbar-btn btn-lg mr5 p25 h150 col-md-12 greytext\">Breakdown Assistance</button></a><br>";
         } 
        if($userLogin[0]['ul_fnol'] == "Y") { 
			echo "<a href=\"". _ROOT . "/?displayPage=fnol\"><button type=\"button\" 
			class=\"w100 btn btn-primary navbar-btn btn-lg mr5 p25 h150 col-md-12\">FNOL</button></a><br>";
        }
		if($userLogin[0]['ul_windscreen'] == "Y") { 
			echo "<a href=\"". _ROOT . "/?displayPage=windscreen\"><button type=\"button\" 
			class=\"w100 btn btn-success navbar-btn btn-lg mr5 p25 h150 col-md-12\">Windscreen</button></a><br>";
        }
		?>
</div> 