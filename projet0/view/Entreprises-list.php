<!doctype html>
<html lang="en">

    
  

<head>
 <?php  include 'Head.php';  ?>
 <?php  include 'menu.php'; ?>
</head>
<body>

  <!--- HEADER -->

	 <?php 
	   include_once '../controllers/DTOEntreprise.php';
          
	   $entreprise=afficher_entreprises();
          
   ?>

 

  <!--- CONTENT AREA -->

  <div class="content container_12">
     

      <div class="box grid_12">
        <div class="box-head"><h2>Liste Des Entreprises</h2></div>
        <div class="box-content no-pad">
        
          <table class="display">
          <thead>
            <tr>
              <th>Apprenti</th>
              <th>Nom Entreprise</th>
              <th>Adresse</th>
              <th>Telephone</th>
              <th>Email</th>
              <th>Modifier</th>
              <th>Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <?php   while($lignes=$entreprise->fetch(PDO::FETCH_OBJ)){?>
            <tr class="odd gradeX">
              <td><?php echo $lignes->nom." ".$lignes->prenom; ?></td>
              <td><?php echo $lignes->nom_entreprise ?></td>
              <td><?php echo $lignes->adresse; ?></td>
              <td> <?php echo $lignes->telephone; ?></td>
              <td><?php echo $lignes->email; ?></td>
              
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