<!doctype html>
<html lang="fr">
 <!--- HEADER -->
 <?php  include '../Head.php';  ?>
<body>

	   <?php //menu 
		include '../menu.php';  
		include_once("../controllers/DTOabsence.php");
		//affichage date depuis absence
		$dates=get_absence_all_dates();
		$dates2=get_absence_all_dates();
	   ?>
		


  <div class="content container_12">
  	<form id="add_eleve" name="add_eleve" enctype="multipart/form-data" action="../fonction/pdf-csv.php" method="POST" >

		<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>exportation et telechargement des fichiers d'absence</h2></div>
			<div class="box-content">
						<div id="radio" style="float:left;">
							<label class="form-label bblue"> Selectionnez le format :  </label>
							<input type="radio" name="type" value="PDF" <?php if(isset($_GET["format"]) and $_GET["format"]=="pdf")echo "checked";?>/>PDF
							<input type="radio" name="type" value="CSV" <?php if(isset($_GET["format"]) and $_GET["format"]=="CSV")echo "checked";?>/>CSV
						</div>
						<br/><br/>
						<div class="class_button" style="float:left;">
							<input type="submit" name="tout" value="tout les absences" class="button big black">
						</div>
						<br/>
						<label class="form-label" style="color:green;font-weight:18px;"> OU SELON DATES  </label>
						<br/>
						<div class="form-row">
							<label class="form-label bblue" > Date Debut  </label>
							<select name="date1">
								<?php while($lignes=$dates->fetch(PDO::FETCH_OBJ))
									{	
									$date_ab=explode(":",$lignes->date);
									$date_ab=$date_ab[0];
									echo "<option  value='$date_ab'>
										$date_ab</option>" ;
									}?>						
							</select>	<br/>			
							<label class="form-label bblue" > Date Fin  </label>

							<select name="date2">
								<?php while($lignes2=$dates2->fetch(PDO::FETCH_OBJ))
									{	
									$date_ab=explode(":",$lignes2->date);
									$date_ab=$date_ab[0];
									echo "<option  value='$date_ab'>
										$date_ab</option>" ;
									}?>						
							</select>
						     
							<div class="class_button">
								<input type="submit" name="par date"value="afficher par date" class="button big blue">
							</div>
						</div>	
					
			</div>
		  </div>

     </form>
  </div>





</body>


</html>