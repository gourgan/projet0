<?php
session_start();
include("../controllers/DTOutilisateur.php");
if(isset($_GET["logout"])){
	// on dectruit les sessions de l'utilisateur en cours
	clearsessionscookies();
	header('location :../index.php');
}else if(isset($_POST["utilisateur"]) && isset($_POST["pass"])){
	
	$utilisateur=$_POST["utilisateur"];
	$pass=sha1($_POST["pass"]);
	if(confirmUser($utilisateur,$pass)){
		 createsessions($utilisateur,$pass);
		 // on recupere la session du role de l'acteur pour gerer les roles et les interfaces a afficher pour l'acteur;
		 $x=$_SESSION['gdrole'];
		 //pour le calendar code pret mais temps insufisant pour l'integrer 
		include("../controllers/calendar.php");
		if(empty($x)){
				header('location :../index.php?=error');
		}else{
			if($x=="intervenant"){
				header('location :../Absences-ajout');
			}
			else if($x=="responsable"){
				header('location :../Dashboard-news');
			}
			else if($x=="secretaire"){
				header('location :../Dashboard-news');
			}
			else {
				echo"vous avez pas l'acc�s a l'application";
			}
		}
	}else{
		header('location :../index.php?rep=error');
	}
}else if(isset($_POST["email"])){
	$email=$_POST["email"];
	/// generer un mot de passe aleatoire.
	//$mdp = substr(str_shuffle("abcdefghijkmnpqrstuvwxyz"), 0, 5);
	$mdp = "admin";
	if(getnew_pass($email,$mdp)){
		$msg="Vous avez oubli&eacute; votre mot de passe ? <br/> Voici vos coordonn&eacute;es d'identification : <b></b>";
		$msg.="Mot de passe :   ".$mdp."<br/><br/>";
		$msg.="VEUILLEZ VOUS IDENTIFIER A L'AIDE DE VOTRE NOM D'UTILISATEUR OU Email ET VOTRE NOUVEAU MOT DE PASSE <br/>";
		$msg.="Merci <br/> <b>Gestion d'absences LP-DW</b> ";
		// il manque la classe email pour qu'on puisse envoyer l'email a l'acteur;
		//include("../controllers/mail.php");
		//if(send_mail("votre nouveau mot de passe",$msg)){
			//echo"<script type='text/javascript'>document.location.replace('../motdepasse_oublie.php?ok');</script>";
		//}
		header('location :../motdepasse_oublie.php?rep=ok');
	
	}else header('location :../motdepasse_oublie.php?rep=error');

 }else header('location :../motdepasse_oublie.php?rep=error');



?>

