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
	   if(isset($_POST['date1']) && isset($_POST['date2'])){
		   $absent=afficher_absence_entredate($_POST['date1'],$_POST['date2']);
	   }else{
		   $absent=afficher_absence_all();
	   }
	   
	 ?>

  
   
  
  
  
  <!--- CONTENT AREA -->

   <div class="content container_12">
            
      <div class="box grid_12">
        <div class="box-head"><h2>Liste des absents</h2></div>
       
        <div class="box-content no-pad">
        
        <table class="display">
		<div class="form-row">
        <label class="form-label"> Entrez les dates</label>
					<br/>
                        
							<label class="form-label bblue" > Date Debut  </label>
                                                        <input type="date" name="date1" />
							<br/>			
							<label class="form-label bblue" > Date Fin  </label>
                                                        <input type="date" name="date2" />
							
						     
							<div class="class_button">
								<input type="submit" name="par date"value="afficher par date" class="button big yellow">
							</div>
						</div>	
        
        <thead>
            <tr>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Telephone</th>
              <th>Date</th>
              <th>Matin/apr&eacute;s-midi</th>
              <th>Photo</th>
              <th>Modifier</th>
              <th>Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <?php   while($lignes=$absent->fetch(PDO::FETCH_OBJ)){?>
            <tr class="odd gradeX">
              <td align="center"><?php echo $lignes->nom; ?></td>
              <td align="center"><?php echo $lignes->prenom; ?></td>
              <td align="center"> <?php echo $lignes->telephone; ?></td>
              <td align="center"> <?php echo $lignes->date; ?></td>
              <td align="center"> <?php echo $lignes->quand; ?></td>
              <td align="center"> <img  width="75px" height="75px"  src="../upload/<?php echo $lignes->photo; ?>" border="0"> </td> 
	      <td align="center"><a href="#" ><img src="../img/page_white_edit.png" border="0"></a></td>
	      <td align="center"><a href="#" ><img src="../img/publish_r.png" border="0"></a></td>
             
            </tr>
           <?php } ?>
          </tbody>
          
                                        
                                        
         </table>
        </div>
      </div>

      
  </div>

</body>


</html>