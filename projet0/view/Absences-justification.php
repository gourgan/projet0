<!doctype html>
<html lang="fr">

 <?php  include 'Head.php';  ?>
 <script src="../../js/ajax.js"></script>
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
				
					<div class="form-row">
							<label class="form-label"> Justificatif de l'absence </label>
         
							<div class="form-item">
								<select name="eleve" onchange="showUser(this.value,'dates_absence')">
								<option value="Selectionner l'etudiant" selected>Selectionner l'etudiant</option>

								<?php
									while($lignes=$eleve->fetch(PDO::FETCH_OBJ))
									{
										echo "<option value='".$lignes->id."'>".$lignes->nom." ".$lignes->prenom."</option>";

									}
									
								?>	
								</select>
					
							</div>
							<input type="hidden" name="quoi" value="justificatif"/>
					</div>
													
			</div>
      </div>
	  
	  <div id="ajax_form">
       
   
	  </div>
  
     </form>
  </div>





</body>


</html>