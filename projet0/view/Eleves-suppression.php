<!doctype html>
<html lang="fr">
<?php 
	include 'Head.php'; 
	include 'menu.php';  
	include_once '../controllers/DTOEleve.php';
	$eleve=afficher_eleves();
?>
<body>
  <?php afficher_message(); ?>
  <div class="content container_12">
  	<form id="supprimer_eleve" name="supprimer_eleve" enctype="multipart/form-data" action="../fonction/supprimer.php" method="POST" >
         
		 
		 <div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Supprimer un Etudiant</h2></div>
			<div class="box-content">
				
					<div class="form-row">
							<label class="form-label"> Selectionnez l'Etudiant </label>
         
							<div class="form-item">
								<select name="eleve">
								<option value="Selectionner l'etudiant" selected>Selectionner l'&eacute;tudiant</option>

								<?php
									while($lignes=$eleve->fetch(PDO::FETCH_OBJ))
									{
										echo "<option value='".$lignes->id."/".$lignes->photo."'>".$lignes->nom." ".$lignes->prenom."</option>";
				
									}
									
								?>	
								</select>
							</div>
							<input type="hidden" name="quoi" value="eleve"/>					
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