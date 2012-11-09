<!doctype html>
<html lang="fr">
<?php  include 'head3.php';  ?>
	

<body>

  
<?php  include 'menu.php';  ?>
  <script src="../js/ajax.js"></script>

  <!--- CONTENT AREA -->

  <div class="content container_12">
      
	  
	  <div class="box grid_12">
        <div class="box-head"><h2>Les  absents Selon Une date</h2></div>
        <div class="box-content no-pad">
			<table class="display" id="example" height="100">
				<div class="form-row">
							<label class="form-label"> Selectionnez une date  </label>
							<input type="text" name="la_date" id="datepicker"/> 
				</div>
			</table>
			<input type="hidden" name="absent"/>
        </div>
		
       
     

     
  </div>

  <div id="ajax_form">
       
   
	  </div>



</body>


</html>