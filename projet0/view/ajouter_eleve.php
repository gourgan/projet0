<!doctype html>
<html lang="fr">

 <?php  
	//includes entete page ;
	include 'Head.php'; 
	include 'menu.php'; 
 ?>
<body>
<?php afficher_message(); ?>
  <div class="content container_12">
  
  	<form id="add_eleve" name="add_eleve" enctype="multipart/form-data" action="../fonction/ajout.php" method="POST" >

		<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Information Personnelles</h2></div>
			<div class="box-content">

					<div class="form-row">
						<label class="form-label"> Nom </label>
						<input type="text" name="nom" placeholder="Veuillez saisir le nom" size="100" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required /> 
					</div>
					
					<div class="form-row">
							<label class="form-label"> Pr&eacute;nom  </label>
							<input type="text" name="prenom" placeholder="saisir le Pr&eacute;nom" size="100" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required />
					</div>
					
					<div class="form-row">
							<label class="form-label"> E-mail  </label>
							<input type="email" name="email" placeholder="saisir l'E-mail" size="100"  />
					</div>
					
					<div class="form-row">
							<label class="form-label"> Telephone  </label>
							<input type="text" name="tel" placeholder="saisir Telephone" size="100" pattern="^\d{10}$" />
					</div>
                                        <div class="form-row">
							<label class="form-label"> Delegu&eacute  </label>
                                                        <input type="checkbox" name="delegue" />
					</div>
			</div>
		  </div>
		 
	  
      <div class="box grid_12">
        <div class="box-head"><h2>Identit&eacute; visuelle</h2></div>
        <div class="box-content">
			
			<div class="form-row">
				<label class="form-label"> Photo etudiant  </label>
				<input type="file" name="pic_stud" />
				<input type="hidden" name="quoi" value="eleve"/>
			</div>
		</div>
      </div> 
            
             <div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Informations entreprise d'acceuil</h2></div>
			<div class="box-content">
				
					<div class="form-row">
							<label class="form-label"> Intitul&eacute; de l'entreprise </label>
							<input type="text" name="intitule" placeholder="Veuillez saisir l'intitul&eacute;" size="100"  /> 
					</div>
					<div class="form-row">
							<label class="form-label"> Adresse de l'entreprise </label>
							<input type="text" name="adresse" placeholder="Veuillez saisir l'adresse" size="100" /> 
					</div>	
					<div class="form-row">
							<label class="form-label"> Num&eacute;ro de telephone  </label>
							<input type="text" name="tel_entreprise" placeholder="saisir le T&eacute;l" size="100"  />
					</div>
					
					<div class="form-row">
							<label class="form-label"> E-mail Entreprise  </label>
							<input type="email" name="email_entreprise" placeholder="saisir l'E-mail entreprise" size="100" />
							
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