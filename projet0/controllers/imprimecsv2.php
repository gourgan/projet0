<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

        require '../models/connexion.php';
	//envoi des headers csv
	header('Content-Type: application/csv-tab-delimited-table');	//nommage du fichier avec la date du jour
	header('Content-disposition: filename=absence_'.date('Y-m-d').'.csv');
	 $rq=connect();
        $res=$rq->prepare('select e.nom,e.prenom,e.email from absence a,eleve e  where e.id=a.id_eleve order by a.date_absence ');
		
		
	//Première ligne avec le noms des colonnes
	echo '"Nom";"Prénom";"Email"'."\n";
	 
	
	 $res->execute() or die (mysql_error());
	while($a=$res->fetch(PDO::FETCH_OBJ))
	{
	echo '"'.$a->nom.'";"'.$a->prenom.'";"'.$a->email.'"'."\n";
	}
	 
	
	exit;
?>
