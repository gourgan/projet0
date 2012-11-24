<!doctype html>
<html lang="fr">
<?php   
	//INCLUDES ET GET MATIERES
   include 'Head.php'; 
   include 'menu.php'; 
   include_once '../controllers/DTOutilisateur.php';
  
?>
<body>
<?php afficher_message(); ?>
  <div class="content container_12">
  	<form id="add_utilisateur" name="add_utilisateur"  enctype="multipart/form-data"  action="../fonction/ajout.php" method="POST" >

		<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Information Personnelles</h2></div>
			<div class="box-content">
                                        
                                        <div class="form-row">
						<label class="form-label"> Login </label>
						<input type="text" name="login" placeholder="Veuillez saisir le login" size="100"  pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required /> 
					</div>
                                        <div class="form-row">
						<label class="form-label"> Mot de Passe </label>
						<input type="password" name="mdp" placeholder="Veuillez saisir le mot de passe " size="100"  pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required /> 
					</div>
                    
					<div class="form-row">
						<label class="form-label"> Nom </label>
						<input type="text" name="nom" placeholder="Veuillez saisir le nom" size="100"  pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required /> 
					</div>
					
					<div class="form-row">
							<label class="form-label"> Pr&eacute;nom  </label>
							<input type="text" name="prenom" placeholder="saisir le Pr&eacute;nom" size="100" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required />
					</div>
					
					<div class="form-row">
							<label class="form-label"> E-mail  </label>
							<input type="email" name="email" placeholder="saisir l'E-mail" size="100" required />
					</div>
					
					<div class="form-row">
							<label class="form-label"> Telephone  </label>
							<input type="text" name="tel" placeholder="saisir Telephone" size="100" pattern="^\d{10}$" />
							
					</div>
                                        
                            
                                          
					<div class="form-row">
							<label class="form-label"> Alias  </label>
							<input type="text" name="alias" placeholder="saisir l'Alias" size="100"  required />
							<input type="hidden" name="quoi" value="utilisateur"/>
					</div>
					
					
				
			</div>
		  </div>
	
      <div class="box grid_12">
        <div class="box-head"><h2>Identit&eacute; visuelle</h2></div>
        <div class="box-content">
			
			<div class="form-row">
				<label class="form-label"> Photo Utilisateur  </label>
				<input type="file" name="pic_uti" />
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