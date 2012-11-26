<!doctype html>
<html lang="fr">
<?php  include 'Head.php';
       include 'menu.php';
	
     
		 
		include_once("../controllers/DTOabsence.php");
		//affichage date depuis absence
		$dates= get_absence_all_dates();
	 
	   ?>
<body>

  

  <script src="../js/ajax.js"></script>

  <!--- CONTENT AREA -->

  <div class="content container_12">
      

  

 	  <div class="box grid_12">
         <div class="box-head"><h2>Les  absents Selon Une date</h2></div>
         <div class="box-content no-pad">
			
			<table class="display" id="example" height="50">
 				<div class="form-row">
							
							
							
							
							<label class="bblue"> Selectionnez une date : </label>
							<select name="date" onchange="showUser(this.value,'absent')">
								<?php while($lignes=$dates->fetch(PDO::FETCH_OBJ)){	
								$date_ab=explode(":",$lignes->date);
								$date_ab=$date_ab[0];
								echo "<option  value=$date_ab>$date_ab</option>"; }?>						
							</select>	<br/>			
 				</div>
                            <div id="login-msg2">
						
							Pour Modifier l'absence veuillez d&eacute;cocher le ou les &eacute;tudiants 
                                                        pr&eacute;sents
							
					 </div>
 			</table>
            
 			<input type="hidden" name="absent"/>
         </div>
 		
-       
      
 


     
  </div>

  <div id="ajax_form">
       
   
	  </div>

  </div>

</body>


</html>