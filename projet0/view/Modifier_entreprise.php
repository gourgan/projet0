<!doctype html>
<html lang="fr">

 <?php  include 'Head.php';  ?>
 <script src="../js/ajax.js"></script>
<body>

  <!--- HEADER -->
      
	   <?php 
	   include 'menu.php';  
	   include_once '../controllers/DTOentreprise.php';
	   $entreprise=afficher_entreprises();
	   ?>
	

  <!--- CONTENT AREA -->

  <div class="content container_12">
  	<form id="modif_entreprise" name="modif_entreprise" enctype="multipart/form-data" action="../fonction/modification.php" method="POST" >
         
		 
	<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Modifier entreprise</h2></div>
			<div class="box-content">
				
					<div class="form-row">
							<label class="form-label"> Selectionnez l'entreprise </label>
         
							<div class="form-item">
								<select name="entreprise" onchange="showUser(this.value,'entreprise')">
								<option value="Selectionner l'entreprise" selected>Selectionner l'entreprise</option>

								<?php
									while($lignes=$entreprise->fetch(PDO::FETCH_OBJ))
									{
										echo "<option value='".$lignes->id."'>".$lignes->nom."</option>";

									}
									
								?>	
								</select>
							</div>
							<input type="hidden" name="quoi" value="entreprise"/>
					</div>
													
			</div>
      </div>
	  <div id="ajax_form">

   
	  </div>
  
     </form>
  </div>





</body>


</html>