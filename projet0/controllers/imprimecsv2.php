<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

        require '../models/connexion.php';
        include_once('../controllers/DTOabsence.php');
	//envoi des headers csv
        
        $res= afficher_absence_entredate($date1,$date2);
        
	header('Content-Type: application/csv-tab-delimited-table');	//nommage du fichier avec la date du jour
	header('Content-disposition: filename=absence_'.date('Y-m-d').'.csv');
	 
		
		
	//Première ligne avec le noms des colonnes
	echo '"Nom";"Pr�nom";"Email";"Matin/Apr�s-midi"'."\n";
	 
	
	  
	while($a=$res->fetch(PDO::FETCH_OBJ))
	{
	echo '"'.$a->nom.'";"'.$a->prenom.'";"'.$a->email.'";"'.$a->quand."\n";
	}
	 
	
	exit;
?>
