<!doctype html>
<html lang="fr">
<?php 
	include 'Head.php';  
	include 'menu.php';  
	include_once '../controllers/DTOentreprise.php';
	$entreprise=afficher_entreprises();
 ?>
<body>
  <?php afficher_message(); ?>
  <div class="content container_12">
  	<form id="supprimer_entreprise" name="supprimer_entreprise" enctype="multipart/form-data" action="../fonction/supprimer.php" method="POST" >
		
		 <div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Supprimer entreprise</h2></div>
			<div class="box-content">
				
						<div class="form-row">
							<label class="form-label"> Selectionnez l'Entreprise </label>
         
							<div class="form-item">
								<select name="entreprise">
								<option value="Selectionner l'etudiant" selected>Selectionner l'entreprise</option>

								<?php
									while($lignes=$entreprise->fetch(PDO::FETCH_OBJ))
									{
										echo "<option value='".$lignes->id."'>".$lignes->nom_entreprise."</option>";
				
									}
									
								?>	
								</select>
							</div>
							<input type="hidden" name="quoi" value="entreprise"/>					
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