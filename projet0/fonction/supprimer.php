<?php
function supprimer_en(){
	include_once("../controllers/DTOentreprise.php");

	//Supprimer entreprise
	$id = $_POST['entreprise'];
	if(supprimer_entreprise($id)){
		echo"<script type='text/javascript'>document.location.replace('../view/supprimer_entreprise.php?rep=ok');</script>";
	}else{
		echo"<script type='text/javascript'>document.location.replace('../view/supprimer_entreprise.php?rep=error');</script>";
	}	
}



function supprimer_photo($nm){
	//supprimer la photo et laisser celle par defaut
	$fichier="../upload/".$nm;
	if( file_exists ($fichier) AND strpos($fichier,'nothing') == "" )
    {
		if(unlink($fichier))
				echo "Le fichier $fichier a &eacute;t&eacute; supprim&eacute; avec succès";
			else
				echo "Erreur lors de la suppression du fichier $fichier";    }
		return true;
}

function supprimer_el(){
	include_once("../controllers/DTOEleve.php");

	//Supprimer eleve
	$id_image = explode("/",$_POST['eleve']);
	$id = $id_image[0];
	$image=$id_image[1];
	if(supprimer_eleve($id) &&  supprimer_photo($image)){
		echo"<script type='text/javascript'>document.location.replace('../view/supprimer_eleve.php?rep=ok');</script>";
	}else{
		echo"<script type='text/javascript'>document.location.replace('../view/supprimer_eleve.php?rep=error');</script>";
	}	

}
function supprimer_uti(){
	include_once("../controllers/DTOutilisateur.php");

	//Supprimer intervenant
	$id_image = explode("/",$_POST['utilisateur']);
	$id = $id_image[0];
	$image=$id_image[1];
	if(supprimer_utilisateur($id) &&  supprimer_photo($image)){
		echo"<script type='text/javascript'>document.location.replace('../view/supprimer_utilisateur.php?rep=ok');</script>";
	}else{
		echo"<script type='text/javascript'>document.location.replace('../view/supprimer_utilisateur.php?rep=error');</script>";
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

