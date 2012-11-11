<!doctype html>
<html lang="fr">

 <?php  
	include 'Head.php';  
	include 'menu.php';  
	include_once '../controllers/DTOacteur.php';
	$acteur=afficher_acteurs();
 ?>
 <script src="../js/ajax.js"></script>
<body>
  <?php afficher_message(); ?>
  <div class="content container_12">
  	<form id="modif_acteur" name="modif_acteur" enctype="multipart/form-data" action="../fonction/modification.php" method="POST" >
         
		 
	<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Modifier Acteur</h2></div>
			<div class="box-content">
				
					<div class="form-row">
							<label class="form-label"> Selectionnez l'Acteur </label>
         
							<div class="form-item">
								<select name="acteur" onchange="showUser(this.value,'acteur')">
								<option value="Selectionner l'Acteur" selected>Selectionner l'Acteur</option>

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
	  <div id="ajax_form">

   
	  </div>
  
     </form>
  </div>





</body>


</html>