<!doctype html>
<html lang="fr">
<?php  include 'Head.php';
       include 'menu.php';
	
     
		  
		include_once("../controllers/DTOabsence.php");
		//affichage date depuis absence
		$dates=get_absence_all_dates();
		
	   ?>
<body>

  

  <script src="../js/ajax.js"></script>

  <!--- CONTENT AREA -->

  <div class="content container_12">
      
  </div>



</body>


</html>