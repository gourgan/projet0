<!doctype html>
<html lang="fr">

 <?php  include 'Head.php';  ?>
 <script src="../js/ajax.js"></script>
<body>

  <!--- HEADER -->
      
	   <?php 
	   include 'menu.php';  
	   include_once '../controllers/DTOEleve.php';
	   $eleve=afficher_eleves(); 
   
	   ?>
	

  <!--- CONTENT AREA -->

  <div class="content container_12">
  	<form id="modif_eleve" name="modif_eleve" enctype="multipart/form-data" action="../fonction/modification.php" method="POST" >
         
		 
	<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Justifier l'absence</h2></div>
			<div class="box-content">
				<form id="modif_absence" name="modif_absence" enctype="multipart/form-data" action="../fonction/modification.php" method="POST" >
					<div class="form-row">
							<label class="form-label"> Selectionner l'etudiant </label>
         
							<div class="form-item">
								<select name="absence" onchange="showUser(this.value,'dates_absence')">
								<option value="Selectionner l'etudiant" selected>Selectionner l'etudiant</option>

								<?php
									while($lignes=$eleve->fetch(PDO::FETCH_OBJ))
									{
										echo "<option value='".$lignes->id."'>".$lignes->nom." ".$lignes->prenom."</option>";

									}
									
								?>	
								</select>
					
							</div>
							<input type="hidden" name="quoi" value="justification"/>
					</div>
													
			</div>
      </div>
	  
	  <div id="ajax_form">
       
   
	  </div>
  
     </form>
  </div>





</body>


</html>