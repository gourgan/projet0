<!doctype html>
<html lang="fr">


<body>

  <!--- HEADER -->

	<?php  include 'Head.php';  ?>
	<?php  include 'menu.php';  ?>

  <!--- CONTENT AREA -->
  <div class="content container_12">
	<form id="add_actor" name="add_actor" action="../fonction/ajout.php" method="POST" >


	  
      <div class="box grid_12">
        <div class="box-head"><h2>  Nouveau Acteur  </h2></div>
        <div class="box-content">
				
					<div class="form-row">
							<label class="form-label"> fonction de l'acteur </label>
         
							<div class="form-item">
								<select name="role">
									<option value="Responsable">Responsable</option>
									<option value="Secretaire">Secretaire</option>
									<option value="Intervenant">Intervenant</option>
								</select>
							</div>
					</div>
					<div class="form-row">
						<label class="form-label"> Nom d'utilisateur </label>
						<input type="text" name="login" placeholder="Veuillez saisir l'utilisateur" size="100" title ="pas de nombre autorisé" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required/> 
					</div>
					
					<div class="form-row">
						<label class="form-label"> Mot de passe  </label>
						<input type="password" name="password" placeholder="saisir le password" size="100" required/>
					</div>
					<div class="form-row">
						<label class="form-label"> Email  </label>
						<input type="email" name="email" placeholder="saisir l'email" size="100"   required/>
						<input type="hidden" name="quoi" value="acteur"/>
					</div>
        </div>
      </div>

     
	<div class="class_button">
		<input type="submit" value="Valider" class="button big black">
		<input type="reset" value="Vider" class="button big red">
	</div>
</form>

  </div>

<div class="footer">
  <p>Université de Cergy Pontoise <br/>- Site universitaire de Gennevilliers -</p>
</div>



</body>


</html>