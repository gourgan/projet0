<!doctype html>
<html lang="fr">

 <?php  
	include 'Head.php';  
	include 'menu.php';  
	include_once '../controllers/DTOutilisateur.php';
	$utilisateur=afficher_utilisateurs();
 ?>
 <script src="../js/ajax.js"></script>
<body>
  <?php afficher_message(); ?>
  <div class="content container_12">
  	<form id="modif_utilisateur" name="modif_utilisateur" enctype="multipart/form-data" action="../fonction/modification.php" method="POST" >
         
		 
	<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Modification des utilisateurs</h2></div>
			<?php if(!isset($_GET['id'])){	 ?>

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
			<?php }
			/// test pour les droits de modification
			else if(($_SESSION["gdrole"]=="intervenant" && $_GET['id']==$_SESSION["id_user"]) || ($_SESSION["gdrole"]!=="intervenant")){
				
				$id=htmlentities($_GET['id']);
				echo "<script language='javascript'>showUser(".$id.",'utilisateur')</script>"; 
			}else echo "<div class='box-content'>Vous avez pas l'acc&eacute;s a cette page</div>"; ?>
      </div>
	  <div id="ajax_form">

   
	  </div>
  
     </form>
  </div>





</body>


</html>