<!doctype html>
<html lang="fr">
 <?php 
	include 'Head.php'; 
	include 'menu.php';  
	include_once '../controllers/DTOentreprise.php';
	$entreprise=afficher_entreprises_all();
 ?>
 <script src="../js/ajax.js"></script>
<body>
  <?php afficher_message(); ?>
  <div class="content container_12">
  	<form id="modif_entreprise" name="modif_entreprise" enctype="multipart/form-data" action="../fonction/modification.php" method="POST" >
         
	
	<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Modification entreprise</h2></div>
			<?php if(!isset($_GET['id'])){	 ?>
			<div class="box-content">
				
					<div class="form-row">
							<label class="form-label"> Selectionnez l'entreprise </label>
         
							<div class="form-item">
								<select name="entreprise" onchange="showUser(this.value,'entreprise')" >
								<option value="Selectionner l'entreprise" selected>Selectionner l'entreprise</option>

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
			<?php }
			else {
				
				$id=htmlentities($_GET['id']);
				echo "<script language='javascript'>showUser(".$id.",'entreprise')</script>"; 
			} ?>
      </div>
	  <div id="ajax_form">

   
	  </div>
  
     </form>
  </div>





</body>


</html>