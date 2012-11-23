<!doctype html>
<html lang="en">

    
  

<head>
 <?php  include '../Head.php';  ?>
 <?php  include '../menu.php'; ?>
</head>
<body>

  <!--- HEADER -->

	 <?php 
	   include_once '../controllers/DTOEleve.php';
          
	   $eleve=afficher_eleves();
          
   ?>

 

  <!--- CONTENT AREA -->

  <div class="content container_12">
     

      <div class="box grid_12">
        <div class="box-head"><h2>Table with Toolbar</h2></div>
        <div class="box-content no-pad">
        
          <table class="display">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Adresse</th>
              <th>Telephone</th>
              <th>Consulter</th>
              <th>Modifier</th>
              <th>Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <?php   while($lignes=$eleve->fetch(PDO::FETCH_OBJ)){?>
            <tr class="odd gradeX">
              <td><?php echo $lignes->nom; ?></td>
              <td><?php echo $lignes->prenom; ?></td>
              <td><?php echo $lignes->email; ?></td>
              <td class="center"> <?php echo $lignes->telephone; ?></td>
              <td align="center"><a href="#" onclick="return false;"><img src="../img/magnifier.png" border="0"></a></td>
	      <td align="center"><a href="#" onclick="return false;"><img src="../img/page_white_edit.png" border="0"></a></td>
	      <td align="center"><a href="#" onclick="return false;"><img src="../img/publish_r.png" border="0"></a></td>
             
            </tr>
           <?php } ?>
          </tbody>
         </table>
        </div>
      </div>

      
  </div>

<div class="footer">
  <p>Powered by Adminity Administration Interface</p>
</div>

<script> /* SCRIPTS */
  $(function () {
    $('#dt1').dataTable( {
        "bJQueryUI": true   
    });
    $('#dt2').dataTable( {
        "bJQueryUI": true     
    });
    $('#dt3').dataTable( {
        "bJQueryUI": true,
        "sPaginationType": "full_numbers"   
    }); /* For the data tables */
  });
</script>

</body>


</html>