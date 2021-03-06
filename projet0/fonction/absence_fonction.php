<?php
session_start();

function valider_ab(){
	include_once("../controllers/DTOabsence.php");
	//Validation definitive et enregistrement de l'absence
	$statut ="0";
	date_default_timezone_set('Europe/Paris');
	$date = date("Y-m-d", time());
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
		    emailer_absence($id_eleve,$id_horaire);
			/////retour a la page absence avec validation

			echo"<script type='text/javascript'>document.location.replace('../Absences/annonce-ok');</script>";
	}else{
		noabsents();
	}
//vide les sessions et cookies utilis&eacute;s en absence;
	clear_absence();
//empecher la modification de l'absence dans 3 heure (dur�e de cours)
setcookie("absent_set", "yes", time()+3600*3, "/");

}

//we get the date and day program from agenda?

function check_horaire_day(){
	include_once("../controllers/DTOabsence.php");
	$date_a=date("Y-m-d", time());
	$quand=gedate_horaire();
	$id_h=get_programme($date_a,$quand);
	$id=0;
	while($lignes=$id_h->fetch(PDO::FETCH_OBJ))
	{
		$id=$lignes->id;
	}
	return $id;
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
		echo"<script type='text/javascript'>document.location.replace('../Absences/annonce-saved');</script>";
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
	echo"<script type='text/javascript'>document.location.replace('../Absences/annonce-noabsents');</script>";
	
}
// si klk1 est arriv&eacute; avant la validation,on modifie l'absence
function modifier_ab(){
	if (isset($_POST['absents'])){
	$_SESSION['absents']=$_POST['absents'];
	get_id_eleves_req($_SESSION['absents']);
	echo"<script type='text/javascript'>document.location.replace('../Absences/annonce-saved');</script>";
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

