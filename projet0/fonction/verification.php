<?php
session_start();
include("../controllers/DTOutilisateur.php");
if(isset($_GET["logout"])){
	// on dectruit les sessions de l'utilisateur en cours
	clearsessionscookies();
	echo"<script type='text/javascript'>document.location.replace('../index.php');</script>";
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
				echo"<script type='text/javascript'>document.location.replace('../index.php?error');</script>";
		}else{
			if($x=="intervenant"){
				echo"<script type='text/javascript'>document.location.replace('../Absences/ajout');</script>";
			}
			else if($x=="responsable"){
				echo"<script type='text/javascript'>document.location.replace('../Dashboard/news');</script>";
			}
			else if($x=="secretaire"){
				echo"<script type='text/javascript'>document.location.replace('../Dashboard/news');</script>";
			}
			else {
				echo"vous avez pas l'accés a l'application";
			}
		}
	}else{
		 echo"<script type='text/javascript'>document.location.replace('../index.php?rep=error');</script>";
	}
}else if(isset($_POST["email"])){
	$email=$_POST["email"];
	/// generer un mot de passe aleatoire.
	$mdp = substr(str_shuffle("abcdefghijkmnpqrstuvwxyz"), 0, 5);
	$user=getnew_pass($email,$mdp);
	echo $user;
	if($user!==0){
		$subject="jetons mot de passe";
		$msg="<h1>Vous avez oubli&eacute; votre mot de passe ?</h1> <br/> <p>Voici vos coordonn&eacute;es d'identification : <br></br>";
		$msg.="Login :   ".$user."<br/>
		Mot de passe :   ".$mdp."<br/>
		<br/>";
		$msg.="<b>VEUILLEZ VOUS IDENTIFIER A L'AIDE DE VOTRE NOM D'UTILISATEUR ET VOTRE NOUVEAU MOT DE PASSE</b> <br/>";
		$msg.="Merci <br/> <b>Gestion d'absences LP-DW</b> </p>";
		// il manque la classe email pour qu'on puisse envoyer l'email a l'acteur;
		include("../controllers/mail.php");
		echo"<script type='text/javascript'>document.location.replace('../motdepasse_oublie.php?rep=ok');</script>";
	
	}else echo"<script type='text/javascript'>document.location.replace('../motdepasse_oublie.php?rep=error');</script>";

 }else echo"<script type='text/javascript'>document.location.replace('../motdepasse_oublie.php?rep=error');</script>";

?>

