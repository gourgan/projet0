<?php 


include_once 'DTOabsence.php';
//on verifie si on adéja enregistré les infos de l'agenda pour le jour active;
if(!exist_date()){
	$userid = 'gourgan.hicham%40gmail.com'; 
	$magicCookie = 'e9e14333cede09d44f85b1f890591b8b'; 
	$feedURL = "http://www.google.com/calendar/feeds/$userid/private-$magicCookie/basic"; 
	if($sxml = simplexml_load_file($feedURL)){ 
		$count = 1;  
		$donnees=array();

		//get le programme de la journ&eacute;e
		foreach($sxml->entry as $entry) 
		{ 
			///date de l'evenement
			$date=$entry->summary;
			///titre de l'evenement
			$title = stripslashes($entry->title); 
			//extraire prof from evenement
			$prof=parenthese($title);
			///extraire titre seul
			$titre=explode("(",$title);
			$titre=$titre[0];
			//extraire date;
			$date=explode("au",$date);$date2=explode("Date :",$date[0]);
			$fin=explode("CET",$date[1]);
			$debut=$date2[1];$debut=explode(".",$date2[1]);$debut=implode("",$debut);
			//on separe les atribut de late en chaine de caract&eacute;re extrait from agenda;
			$pieces = explode(" ", $debut);
			//on cree la date from chaine;
			$date_a = date("Y-m-d",strtotime($pieces[4]." ".$pieces[2]." ".$pieces[3]));
			// on cree time from chaine
			$time_a = date("H i s", strtotime($pieces[5]));
			//on cree time pour comparaison
			$matin=date("H i s", mktime(13,20,00,0,0,0));
			($time_a<$matin)?$quand ="matin":$quand ="apres-midi";
			//on préparent les donn&eacute;es pour le stockage dans la base
			$donnees["matiere"]=$titre;
			$donnees["date"]=$date_a;
			$donnees["quand"]=$quand;
			$donnees["abrev_interv"]=$prof;
			//enregistrer les données
			
			store_in_base($donnees);
			//on sort du boucle pour enregistrer que le jour active;
			break;
			$count++; 
		} 
	}
}
//on enl&eacute;ve les parenthese pour avoir l'abrev de l'intervenant
function parenthese ($text) 
{	 preg_match('#\((.*?)\)#', $text, $match); 
	 if(!empty($match[1])){
		return $match[1]; 
	 }else return false;
}

//on enregistre les données de l'agenda
function store_in_base($donnees){
	if(store_matiere_calendar($donnees)) return true;
	else return false;
}
?> 