<?php 

$userid = 'gourgan.hicham%40gmail.com'; 
$magicCookie = 'e9e14333cede09d44f85b1f890591b8b'; 
$feedURL = "http://www.google.com/calendar/feeds/$userid/private-$magicCookie/basic"; 
$sxml = simplexml_load_file($feedURL); 
$count = 1;  
$donnees=array();
//on enléve les parenthese pour avoir l'abrev de l'intervenant
function parenthese ($text) 
{		 preg_match('#\((.*?)\)#', $text, $match); 
		 if(!empty($match[1])){
			return $match[1]; 
		 }else return false;
}
//get le programme de la journée
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
$date=explode("au",$date);
$date2=explode("Date :",$date[0]);
$fin=explode("CET",$date[1]);
$debut=$date2[1];
$debut=explode(".",$date2[1]);
$debut=implode("",$debut);
//on separe les atribut de late en chaine de caractére extrait from agenda;
$pieces = explode(" ", $debut);
//on cree la date from chaine;
$date_a = date("d-m-Y",strtotime($pieces[2]." ".$pieces[3]." ".$pieces[4]));
// on cree time from chaine
$time_a = date("H i s", strtotime($pieces[5]));
//on cree time pour comparaison
$matin=date("H i s", mktime(13,20,00,0,0,0));

if($time_a<$matin){
	$quand ="matin";
}
else{
	$quand ="apres-midi";
}
//on préparent les données pour le stockage dans la base
$donnees["matiere"]=$titre;
$donnees["date"]=$date_a;
$donnees["quand"]=$quand;
$donnees["abrev_interv"]=$prof;
if(store_in_base($donnees)){
break;

}else{
	echo "il existe des erreurs de connexion avec google calendar,merci de faire l'appel en papiers";
}
$count++; 
} 

function store_in_base($donnees){
include_once 'DTOabsence.php';
if(store_matiere_calendar($donnees)){
	return true;
}

return false;
}
?> 