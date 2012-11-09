<!doctype html>
<html lang="fr">

 <?php  include 'Head.php';  ?>
 
<body>

  <!--- HEADER -->
      
	   <?php 
	   include 'menu.php';  
	   include_once '../controllers/DTOacteur.php';
	   $acteur=afficher_acteurs();
	   ?>
	

  <!--- CONTENT AREA -->

  <div class="content container_12">
  	<form id="supprimer_entreprise" name="supprimer_entreprise" enctype="multipart/form-data" action="../fonction/supprimer.php" method="POST" >
		
		 <div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Supprimer Acteur</h2></div>
			<div class="box-content">
				
						<div class="form-row">
							<label class="form-label"> Selectionnez l'Acteur </label>
         
							<div class="form-item">
								<select name="acteur">
								<option value="Selectionner l'etudiant" selected>Selectionner l'Acteur</option>

								<?php
									while($lignes=$acteur->fetch(PDO::FETCH_OBJ))
									{
										echo "<option value='".$lignes->id."'>".$lignes->login."</option>";
				
									}
									
								?>	
								</select>
							</div>
							<input type="hidden" name="quoi" value="acteur"/>					
					</div>
													
			</div>
      </div> 
     
		<div class="class_button" style="width:110px;">
			<input type="submit" value="Supprimer" class="button big red">
		</div>
     </form>
  </div>





</body>


</html>