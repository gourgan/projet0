<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
    
    include_once 'AjoutEleve.php';
    if(isset($_POST['enregistrer'])){
        
        ajout_eleve();
        
    }
    if(isset($_POST['supprimer'])){
        echo "----";
        afficher_eleve();
        
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form name = "form1" action ="#" method = "POST">
            Nom : <input type="text" name="nom" value="" />
            prénom : <input type="text" name="prenom" value="" />
            photo : <input type="file" name="photo" value="" />
            email : <input type="text" name="email" value="" />
            tel : <input type="text" name="telephone" value="" />
            filiere : <input type="text" name="id_filiere" value="" />
            entreprise : <input type="text" name="id_entreprise" value="" />
            <input type="submit" value="enregistrer" name="enregistrer" />
            <input type="submit" value="supprimer" name="supprimer" />
        </form>

    </body>
</html>
