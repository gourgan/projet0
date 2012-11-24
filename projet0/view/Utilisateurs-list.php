<!doctype html>
<html lang="en">

    
  

<head>
 <?php  include 'Head.php';  ?>
 <?php  include 'menu.php'; ?>
</head>
<body>

  <!--- HEADER -->

	 <?php 
	   include_once '../controllers/DTOUtilisateur.php';
          
	   $utilisateur=afficher_utilisateurs();
          
   ?>

 

  <!--- CONTENT AREA -->

  <div class="content container_12">
     

      <div class="box grid_12">
        <div class="box-head"><h2>Liste Des Utilisateurs</h2></div>
        <div class="box-content no-pad">
        
          <table class="display">
          <thead>
            <tr>
              <th>Login</th>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Email</th>
              <th>Telephone</th>
              <th>Alias</th>
              <th>Picture</th>
              <th>Modifier</th>
              <th>Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <?php   while($lignes=$utilisateur->fetch(PDO::FETCH_OBJ)){?>
            <tr class="odd gradeX">
              <td align="center"><?php echo $lignes->login; ?></td>
              <td align="center"><?php echo $lignes->nom; ?></td>
              <td align="center"><?php echo $lignes->prenom; ?></td>
              <td align="center"><?php echo $lignes->email; ?></td>
              <td align="center"><?php echo $lignes->telephone; ?></td>
              <td align="center"><?php echo $lignes->Alias; ?></td>
              <td align="center"> <img  width="75px" height="75px"  src="../upload/<?php echo $lignes->picture; ?>" border="0"> </td>
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