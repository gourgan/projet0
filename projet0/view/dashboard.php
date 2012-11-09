<!doctype html>
<html lang="fr">

 <?php  include 'Head.php';  ?>
<body>

  <!--- HEADER -->
      
	   <?php 
	   include 'menu.php';  
	   include_once '../controllers/DTOEleve.php';
	   $eleve=afficher_eleves();
	   ?>
	

  <!--- CONTENT AREA -->

  <div class="content container_12">
       
		 
		 <div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Les derniers absents</h2></div>
			<div class="box-content">
				
					<div class="form-row">
						
					</div>
													
			</div>
		</div> 
     	 <div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>charte des absences</h2></div>
			<div class="box-content">
				
					<div class="form-row">
						
					</div>
													
			</div>
		</div> 
	
  </div>





</body>


</html>