<?php
session_start();

function valider_ab(){
	include_once("../controllers/DTOabsence.php");
	//Validation definitive et enregistrement de l'absence
	$statut ="0";
	date_default_timezone_set('Europe/Paris');
	$date = date("Y/m/d", time());
	//verifie si un absence de cette date est d&eacute;ja enregistr&eacute;?
	$id_horaire=check_horaire_day();
	if (isset($_POST['absents'])){
		$_SESSION['absents'] = $_POST['absents'];
		$id_eleve =$_POST['absents'];
		
		foreach( $id_eleve as $item)
		   {
			ajout_absence($id_horaire,$item,$statut);   
		   }
			//envoyer les alertes des absences!!
		    //annoncer_absence();
			/////retour a la page absence avec validation
			header('location :../Absences/annonce-ok');
	}else{
		noabsents();
	}
//vide les sessions et cookies utilis&eacute;s en absence;
	clear_absence();
//empecher la modification de l'absence
setcookie("absent_set", "yes", time()+3600*3, "/");

}

//we get the date and day program from agenda?

function check_horaire_day(){
	include_once("../controllers/DTOabsence.php");
	$date_a=date("Y/m/d", time());
	$quand=gedate_horaire();
	$id_h=get_programme($date_a,$quand);
	$id=0;
	while($lignes=$id_h->fetch(PDO::FETCH_OBJ))
	{
		$id=$lignes['id'];
	}
	return $id;
}
// get date and convert it selon le format dont on a enregistr&eacute; l'horaire;
function gedate_horaire(){

	$time_a = date("H i s", time());
	$matin=date("H i s", mktime(13,20,00,0,0,0));
	if($time_a<$matin){
		$quand="matin";
	}
	else{
		$quand="apres-midi";
	}
	return $quand;

}
//verifie si un absence de cette date est d&eacute;ja enregistr&eacute;?

function check_absence_day(){


}

//alerte les absence aupr&eacute;s des acteurs et entreprises?

function alerter_absence(){



}
//on supprime tout les traces des sessions et cookies absence;
function clear_absence(){

 unset($_SESSION['absents']); 
 unset($_SESSION['absents_req']); 
 //unset($_SESSION['shape']); 
 setcookie('times'); 
 setcookie('timems'); 
 }
function enregistrer_ab(){
	//Enregistrement temporaire de l'absence
	$i=0;
	if (isset($_POST['absents'])){
		$_SESSION['absents']=$_POST['absents'];
		$id_eleves=$_SESSION['absents'];
		get_id_eleves_req($id_eleves);
		header('location :../Absences/annonce-saved');
	}else{
		noabsents();
	}
}

//regrouper les etudiant absent pour la requete d'affichage des absents (en cas de presence : retard);
function get_id_eleves_req($id_eleves){
	$i=0;
	$_SESSION['absents_req']=null;
	$_SESSION['absents_req'] = implode(',', $id_eleves);
}

// Si tout est present
function noabsents(){
	//vide les sessions et cookies utilis&eacute;s en absence;
	clear_absence();
	setcookie("absent_set", "yes", time()+3600*3, "/");
	header('location :../Absences/annonce-noabsents');
	
}
// si klk1 est arriv&eacute; avant la validation,on modifie l'absence
function modifier_ab(){
	if (isset($_POST['absents'])){

	$_SESSION['absents']=$_POST['absents'];
	get_id_eleves_req($_SESSION['absents']);
	header('location :../Absences/annonce-saved');
	}else{
		noabsents();
	}
}
// s'il est deja pass&eacute; par le formulaire
if(isset($_POST["quoi"])){
	if($_POST["quoi"]=="absence"){
		enregistrer_ab();
	}else if($_POST["quoi"]=="valider"){
		valider_ab();
	}else{
		modifier_ab();
	}
	}else if(isset($_POST["modifier"])){
		modifier_ab();
	}
	else if(isset($_POST["valider"]) OR isset($_GET["valider"])){
		valider_ab();
	}
// s'il est pas pass&eacute; par le formulaire
	else {
	echo "Vous avez pas l'acc&eacute;s a cette page!!";
	header( "refresh:5;url=../index.php" );
	}
?>

