<?php

	
	//envoi des headers csv
    function between_dates_csv($date1,$date2){    
		$res = afficher_absence_entredate($date1,$date2);
		header('Content-Type: application/csv-tab-delimited-table');	
		header('Content-disposition: filename=absence_'.date('Y-m-d').'.csv');//nommage du fichier avec la date du jour
		echo 'La liste des absents entre '.$date1.' et '.$date2."\n";

		//Premiere ligne avec le noms des colonnes
		echo '"Nom";"Prénom";"Email";"Matiere";"Date";"Matin/Aprés-midi"'."\n";
		 
		while($a=$res->fetch(PDO::FETCH_OBJ))
		{
		echo '"'.$a->nom.'";"'.$a->prenom.'";"'.$a->email.'";"'.$a->matiere.'";"'.$a->date.'";"'.$a->quand."\n";
		}
		return true;
	}
	function all_absence_csv(){    
		$res = afficher_absence_all();
		header('Content-Type: application/csv-tab-delimited-table');	
		header('Content-disposition: filename=absence_all.csv');//nommage du fichier avec la date du jour
		echo 'La liste de tous les absences'."\n";
 
		//Premiere ligne avec le noms des colonnes
		echo '"Nom";"Prénom";"Email";"Matiere";"Date";"Matin/Aprés-midi"'."\n";
		 
		while($a=$res->fetch(PDO::FETCH_OBJ))
		{
		echo '"'.$a->nom.'";"'.$a->prenom.'";"'.$a->email.'";"'.$a->matiere.'";"'.$a->date.'";"'.$a->quand."\n";
		}
		return true;
	}
?>
