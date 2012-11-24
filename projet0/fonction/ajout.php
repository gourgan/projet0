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
		//ajou&eacute; l'entreprise a l'etudiant;
		ajout_entreprise_eleve($id_eleve);
		echo"<script type='text/javascript'>document.location.replace('../Entreprises/ajout-ok');</script>";
	}else{
		echo"<script type='text/javascript'>document.location.replace('../Entreprises/ajout-error');</script>";
	}
}

function ajout_uti(){
include_once("../controllers/DTOutilisateur.php");
         
	//info intervenant
        $login = htmlentities($_POST['login']);
        $mdp = sha1(htmlentities($_POST['mdp']));
	$nom = htmlentities($_POST['nom']);
	$prenom = htmlentities($_POST['prenom']);
	$email = htmlentities($_POST['email']);
	$tel = htmlentities($_POST['tel']);
	$alias = htmlentities($_POST['alias']);
	$photo=$_FILES["pic_uti"];
	$nm=$nom."_".$prenom;
	//ajout photo intervenant
	if(upload($photo,$nm)){
		$picture=upload($photo,$nm);
		ajout_utilisateur($login,$mdp,$nom,$prenom,$email,$tel,$picture,$alias);
		echo"<script type='text/javascript'>document.location.replace('../Utilisateurs/ajout-ok');</script>";
	}else{
		echo"<script type='text/javascript'>document.location.replace('../Utilisateurs/ajout-error');</script>";
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
	//si l'image a et&eacute; bien plac&eacute; sur le serveur?
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
	$dele= htmlentities($_POST['delegue']);
         if ($dele!=null){
         
         $dele =true;
         
             
         }else {
         $dele =false;
             
         }
         
	$nm=$nom."_".$prenom;
	if(upload($_FILES['pic_stud'],$nm)){
	$photo=upload($_FILES['pic_stud'],$nm);
	//entreprise par d&eacute;faut lors de l'inscription ( );
	$entreprise=1;
	//ajout eleve;
	ajout_eleve($nom,$prenom,$photo,$email,$tel,$entreprise,$delegue);
		echo"<script type='text/javascript'>document.location.replace('../Eleves/ajout-ok');</script>";
	}else{
		echo"<script type='text/javascript'>document.location.replace('../Eleves/ajout-ok');</script>";
	}
}

// s'il est deja pass&eacute; par le formulaire
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
	else if($_POST["quoi"]=="utilisateur"){
            
		ajout_uti();
	}
// s'il est pas pass&eacute; par le formulaire
	}else {
	echo "Vous avez pas l'acc&eacute;s a cette page!!";
	header( "refresh:5;url=../index.php" );
	}

?>

