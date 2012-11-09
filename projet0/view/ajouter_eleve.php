<!doctype html>
<html lang="fr">

 <?php  include 'Head.php';  ?>
<body>

  <!--- HEADER -->
      
	   <?php  include 'menu.php';  ?>
	

  <!--- CONTENT AREA -->

  <div class="content container_12">
  	<form id="add_eleve" name="add_eleve" enctype="multipart/form-data" action="../fonction/ajout.php" method="POST" >

		<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Information Personnelles</h2></div>
			<div class="box-content">

					<div class="form-row">
						<label class="form-label"> Nom </label>
						<input type="text" name="nom" placeholder="Veuillez saisir le nom" size="100" /> 
					</div>
					
					<div class="form-row">
							<label class="form-label"> Prénom  </label>
							<input type="text" name="prenom" placeholder="saisir le Prénom" size="100" />
					</div>
					
					<div class="form-row">
							<label class="form-label"> E-mail  </label>
							<input type="text" name="email" placeholder="saisir l'E-mail" size="100" />
					</div>
					
					<div class="form-row">
							<label class="form-label"> Telephone  </label>
							<input type="text" name="tel" placeholder="saisir Telephone" size="100" />
					</div>
			</div>
		  </div>
		 
	  
      <div class="box grid_12">
        <div class="box-head"><h2>Identité visuelle</h2></div>
        <div class="box-content">
			
			<div class="form-row">
				<label class="form-label"> Photo etudiant  </label>
				<input type="file" name="pic_stud" />
				<input type="hidden" name="quoi" value="eleve"/>
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