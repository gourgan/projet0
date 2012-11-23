<!doctype html>
<html lang="fr">
<?php  
	include '../Head.php'; 
	include '../menu.php';  
	include_once '../controllers/DTOintervenant.php';
	$intervenant=afficher_intervenants();
?>
<body>

  <?php afficher_message(); ?>
  <div class="content container_12">
  	<form id="supprimer_intervenant" name="supprimer_intervenant" enctype="multipart/form-data" action="../fonction/supprimer.php" method="POST" >
         
		 
		 <div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Supprimer un Intervenant</h2></div>
			<div class="box-content">
				
					<div class="form-row">
							<label class="form-label"> Selectionnez l'Intervenant </label>
         
							<div class="form-item">
								<select name="intervenant">
								<option value="Selectionner l'etudiant" selected>Selectionner l'Intervenant</option>

								<?php
									while($lignes=$intervenant->fetch(PDO::FETCH_OBJ))
									{
										echo "<option value='".$lignes->id."/".$lignes->picture."'>".$lignes->nom." ".$lignes->prenom."</option>";
				
									}
									
								?>	
								</select>
							</div>
							<input type="hidden" name="quoi" value="intervenant"/>					
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