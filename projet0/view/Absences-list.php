<!doctype html>
<html lang="en">

    
  

<head>
 <?php  include 'Head.php';  ?>
 <?php  include 'menu.php'; ?>
</head>
<body>

  <!--- HEADER -->

	 <?php 
	   include_once '../controllers/DTOabsence.php';
          
	   $absent=afficher_absence_entredate($date1,$date2);
          
   ?>

  
   
  
  
  
  <!--- CONTENT AREA -->

  <div class="content container_12">
     

      <div class="box grid_12">
        <div class="box-head"><h2>Liste Des Eleves</h2></div>
        
        <div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>exportation et telechargement des fichiers d'absence</h2></div>
			<div class="box-content">
					<br/>
						<label class="form-label" style="color:green;font-weight:18px;"> Lister les absents entre deux dates </label>
					<br/>
                                        <div class="form-row">
							<label class="form-label bblue" > Date Debut  </label>
							<br/>			
							<label class="form-label bblue" > Date Fin  </label>

							
						     
							<div class="class_button">
								<input type="submit" name="par date"value="afficher par date" class="button big blue">
							</div>
						</div>	
                       
                        </div>
						
						
					
			</div>
		  </div>

        
        
        
        
        <div class="box-content no-pad">
        
          <table class="display">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Telephone</th>
              <th>Date</th>
              <th>Matin/apr�s-midi</th>
              <th>Photo</th>
              <th>Modifier</th>
              <th>Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <?php   while($lignes=$eleve->fetch(PDO::FETCH_OBJ)){?>
            <tr class="odd gradeX">
              <td align="center"><?php echo $lignes->nom; ?></td>
              <td align="center"><?php echo $lignes->prenom; ?></td>
              <td align="center"> <?php echo $lignes->telephone; ?></td>
              <td align="center"> <?php echo $lignes->date; ?></td>
              <td align="center"> <?php echo $lignes->quand; ?></td>
              <td align="center"> <img  width="75px" height="75px"  src="../upload/<?php echo $lignes->photo; ?>" border="0"> </td> 
	      <td align="center"><a href="#" onclick="return false;"><img src="../img/page_white_edit.png" border="0"></a></td>
	      <td align="center"><a href="#" onclick="return false;"><img src="../img/publish_r.png" border="0"></a></td>
             
            </tr>
           <?php } ?>
          </tbody>
         </table>
        </div>
      </div>

      
  </div>


</body>


</html>