<?php
function ajout_en(){
	include_once("../controllers/DTOentreprise.php");

	//entreprise
	$intitule = htmlentities($_POST['intitule']);
	$tel_entreprise = htmlentities($_POST['tel_entreprise']);
	$email_entreprise = htmlentities($_POST['email_entreprise']);
	$adresse_entreprise = htmlentities($_POST['adresse']);
	$id_eleve = htmlentities($_POST['eleve']);
	//ajout de l'entreprise
	if(ajout_entreprise($intitule,$adresse_entreprise,$tel_entreprise,$email_entreprise)){
		//ajoué l'entreprise a l'etudiant;
		ajout_entreprise_eleve($id_eleve);
		echo"<script type='text/javascript'>document.location.replace('../view/ajouter_entreprise.php?success');</script>";
	}else{
		echo"<script type='text/javascript'>document.location.replace('../view/ajouter_entreprise.php?error');</script>";
	}
}
function ajout_act(){
include_once("../controllers/DTOacteur.php");

	//info acteur
	$role = htmlentities($_POST['role']);
	$login = htmlentities($_POST['login']);
	$pass = sha1(htmlentities($_POST['password']));
	$email = htmlentities($_POST['email']);
	//ajout acteur
	if(ajout_acteur($login,$pass,$role,$email)){
		echo"<script type='text/javascript'>document.location.replace('../view/ajouter_acteur.php?success');</script>";
	}else{
		echo"<script type='text/javascript'>document.location.replace('../view/ajouter_acteur.php?error');</script>";
	}
}
function ajout_int(){
include_once("../controllers/DTOintervenant.php");

	//info intervenant
	$nom = htmlentities($_POST['nom']);
	$prenom = htmlentities($_POST['prenom']);
	$email = htmlentities($_POST['email']);
	$tel = htmlentities($_POST['tel']);
	$alias = htmlentities($_POST['alias']);
	$photo=$_FILES["pic_int"];
	$nm=$nom."_".$prenom;
	//ajout photo intervenant
	if(upload($photo,$nm)){
		$picture=upload($photo,$nm)
		ajout_intervenant($nom,$prenom,$email,$tel,$picture,$alias);
		echo"<script type='text/javascript'>document.location.replace('../view/ajouter_intervenant.php?success');</script>";
	}else{
		echo"<script type='text/javascript'>document.location.replace('../view/ajouter_intervenant.php?error');</script>";
	}
}
function upload($file,$nm){
	$msg="";
	$extension = end(explode(".", $file["name"]));
	$file_upload="true";
	$file_up_size=$file["size"];
	$add=$nm.".".$extension; // le nom de l'image a enregistrer
	if ($file["size"]>450000)
	{
	// le nom d'enregistrement de l'image ou cas d'erreur(image par defaut)
	$file_upload="false";$add="nothing.jpg";
	}
	// Verification type;
	if (!($file["type"] =="image/jpeg" OR $file["type"] =="image/gif" OR $file["type"] =="image/x-png" OR $file["type"] =="image/png" ))
	{
	$file_upload="false";$add="nothing.jpg"; // le nom d'enregistrement de l'image ou cas d'erreur(image par defaut)

	}
	//s'il existe aucun erreur?
	if($file_upload=="true"){
	//si l'image a eté bien placé sur le serveur?
	if(move_uploaded_file($file["tmp_name"], "../upload/$add")){
		chmod ("../upload/$add", 0777);
		// en store l'image au serveur change les droit de l'image pour la suppression et 
		//on retourn le chemin pour l'enregistrement a la base .
		return $add;
	}else{return $add;}

	}else{return $add;}
}
function ajout_el(){
	include_once("../controllers/DTOEleve.php");

	//eleve
	$nom = htmlentities($_POST['nom']);
	$prenom = htmlentities($_POST['prenom']);
	$email = htmlentities($_POST['email']);
	$tel = htmlentities($_POST['tel']);
	$nm=$nom."_".$prenom;
	if(upload($_FILES['pic_stud'],$nm)){
	$photo=upload($_FILES['pic_stud'],$nm);
	//entreprise par défaut lors de l'inscription ( );
	$entreprise=1;
	//ajout eleve;
	ajout_eleve($nom,$prenom,$photo,$email,$tel,$entreprise);
		echo"<script type='text/javascript'>document.location.replace('../view/ajouter_eleve.php?success');</script>";
	}else{
		echo"<script type='text/javascript'>document.location.replace('../view/ajouter_eleve.php?error');</script>";
	}
}

// s'il est deja passé par le formulaire
if(isset($_POST["quoi"])){
	if($_POST["quoi"]=="eleve"){
		ajout_el();
	}
	else if($_POST["quoi"]=="entreprise"){
		ajout_en();

	}
	else if($_POST["quoi"]=="acteur"){
		ajout_act();
	}
	else if($_POST["quoi"]=="intervenant"){
		ajout_int();
	}
// s'il est pas passé par le formulaire
	else {
	echo "Vous avez pas l'accés a cette page!!";
	header( "refresh:5;url=../index.php" );
	}

?>

