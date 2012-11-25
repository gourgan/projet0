<?php
function supprimer_en(){
	include_once("../controllers/DTOentreprise.php");

	//Supprimer entreprise
	$id = $_POST['entreprise'];
	if(supprimer_entreprise($id)){
		echo"<script type='text/javascript'>document.location.replace('../Entreprises/suppression-ok');</script>";
	}else{
		echo"<script type='text/javascript'>document.location.replace('../Entreprises/suppression-error');</script>";
	}	
}



function supprimer_photo($nm){
	//supprimer la photo et laisser celle par defaut nommé nothing
	$fichier="../upload/".$nm;
	if( file_exists ($fichier) AND strpos($fichier,'nothing') == "" and isset($nm))
    {
		unlink($fichier);
	}
	return true;
}

function supprimer_el(){
	include_once("../controllers/DTOEleve.php");

	//Supprimer eleve
	$id_image = explode("/",$_POST['eleve']);
	$id = $id_image[0];
	$image=$id_image[1];
	if(supprimer_eleve($id) &&  supprimer_photo($image)){
		echo"<script type='text/javascript'>document.location.replace('../Eleves/suppression-ok');</script>";
	}else{
		echo"<script type='text/javascript'>document.location.replace('../Eleves/suppression-error');</script>";
	}	

}
function supprimer_uti(){
	include_once("../controllers/DTOutilisateur.php");

	//Supprimer intervenant
	$id_image = explode("/",$_POST['utilisateur']);
	$id = $id_image[0];
	$image=$id_image[1];
	if(supprimer_utilisateur($id) &&  supprimer_photo($image)){
		echo"<script type='text/javascript'>document.location.replace('../Utilisateurs/suppression-ok');</script>";
	}else{
		echo"<script type='text/javascript'>document.location.replace('../Utilisateurs/suppression-error');</script>";
	}	

}
// s'il est deja pass&eacute; par le formulaire
if(isset($_POST["quoi"])){
$code=sha1("succ&eacute;s");
if($_POST["quoi"]=="eleve"){
	supprimer_el();
}
else if($_POST["quoi"]=="entreprise"){
	supprimer_en();
}
else if($_POST["quoi"]=="utilisateur"){
	supprimer_uti();	
}



// s'il est deja pass&eacute; par le formulaire
}else echo "acc&eacute;s impossible";
?>

