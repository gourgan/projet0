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
  	<form id="add_entreprise" name="add_entreprise" enctype="multipart/form-data" action="../fonction/ajout.php" method="POST" >
		
		 <div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Choisir Etudiant</h2></div>
			<div class="box-content">
				
					<div class="form-row">
							<label class="form-label"> Selectionnez l'Etudiant </label>
         
							<div class="form-item">
								<select name="eleve">
								<option value="Selectionner l'etudiant" selected>Selectionner l'etudiant</option>

								<?php
									while($lignes=$eleve->fetch(PDO::FETCH_OBJ))
									{
										echo "<option value='".$lignes->id."'>".$lignes->nom." ".$lignes->prenom."</option>";

									}
									
								?>	
								</select>
							</div>
					</div>
													
			</div>
      </div>
		 <div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Informations entreprise d'acceuil</h2></div>
			<div class="box-content">
				
					<div class="form-row">
							<label class="form-label"> Intitulé de l'entreprise </label>
							<input type="text" name="intitule" placeholder="Veuillez saisir l'intitulé" size="100" /> 
					</div>
					<div class="form-row">
							<label class="form-label"> Adresse de l'entreprise </label>
							<input type="text" name="adresse" placeholder="Veuillez saisir l'adresse" size="100" /> 
					</div>	
					<div class="form-row">
							<label class="form-label"> Numéro de telephone  </label>
							<input type="text" name="tel_entreprise" placeholder="saisir le Tél" size="100" />
					</div>
					
					<div class="form-row">
							<label class="form-label"> E-mail Entreprise  </label>
							<input type="text" name="email_entreprise" placeholder="saisir l'E-mail entreprise" size="100" />
							<input type="hidden" name="quoi" value="entreprise"/>
					</div>
					
									
			</div>
      </div>
	  
    
		<div class="class_button">
			<input type="submit" value="Valider" class="button big black">
			<input type="reset" value="Vider" class="button big red">
		</div>
     </form>
  </div>





</body>


</html>