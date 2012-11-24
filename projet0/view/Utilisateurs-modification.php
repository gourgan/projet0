<!doctype html>
<html lang="fr">

 <?php  
	include 'Head.php';  
	include 'menu.php';  
	include_once '../controllers/DTOutilisateur.php';
	$utilisateur=afficher_utilisateurs();
 ?>
 <script src="../../js/ajax.js"></script>
<body>
  <?php afficher_message(); ?>
  <div class="content container_12">
  	<form id="modif_utilisateur" name="modif_utilisateur" enctype="multipart/form-data" action="../fonction/modification.php" method="POST" >
         
		 
	<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Modifier utilisateur</h2></div>
			<div class="box-content">
				
					<div class="form-row">
							<label class="form-label"> Selectionnez l'utilisateur </label>
         
							<div class="form-item">
								<select name="utilisateur" onchange="showUser(this.value,'utilisateur')">
								<option value="Selectionner l'utilisateur" selected>Selectionner l'utilisateur</option>

								<?php
									while($lignes=$utilisateur->fetch(PDO::FETCH_OBJ))
									{
										echo "<option value='".$lignes->id."'>".$lignes->nom." ".$lignes->prenom."</option>";

									}
									
								?>	
								</select>
							</div>
					</div>
													
			</div>
      </div>
	  <div id="ajax_form">

   
	  </div>
  
     </form>
  </div>





</body>


</html>