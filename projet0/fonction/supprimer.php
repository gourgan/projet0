<?php
function supprimer_en(){
include_once("../controllers/DTOentreprise.php");

//Supprimer entreprise
$id = $_POST['entreprise'];
supprimer_entreprise($id);
}

function supprimer_act(){
include_once("../controllers/DTOacteur.php");

//Supprimer acteur
$id = $_POST['acteur'];
supprimer_acteur($id);
echo"<script type='text/javascript'>document.location.replace('../view/supprimer_acteur.php?success');</script>";

}

function supprimer_photo($nm){
	//supprimer la photo et laisser celle par defaut
	$fichier="../upload/".$nm;
	if( file_exists ($fichier) AND strpos($fichier,'nothing') == "" )
    {
		if(unlink($fichier))
				echo "Le fichier $fichier a été supprimé avec succès";
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

supprimer_eleve($id);
supprimer_photo($image);
echo"<script type='text/javascript'>document.location.replace('../view/modifier_eleve.php?success');</script>";


}
function supprimer_int(){
include_once("../controllers/DTOintervenant.php");

//Supprimer intervenant
$id_image = explode("/",$_POST['intervenant']);
$id = $id_image[0];
$image=$id_image[1];

supprimer_intervenant($id);
supprimer_photo($image);
echo"<script type='text/javascript'>document.location.replace('../view/modifier_intervenant.php?success');</script>";


}
// s'il est deja passé par le formulaire
if(isset($_POST["quoi"])){
$code=sha1("succés");
if($_POST["quoi"]=="eleve"){
	supprimer_el();
}
else if($_POST["quoi"]=="entreprise"){
	supprimer_en();
}
else if($_POST["quoi"]=="intervenant"){
	supprimer_int();	
}
else if($_POST["quoi"]=="acteur"){
	supprimer_act();

}


// s'il est deja passé par le formulaire
}else echo "accés impossible";
?>

