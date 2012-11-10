<?php
session_start();
include("../controllers/DTOacteur.php");
if(isset($_GET["logout"])){

	clearsessionscookies();
	echo"<script type='text/javascript'>document.location.replace('../index.php');</script>";
}else if(isset($_POST["utilisateur"])){

	$utilisateur=$_POST["utilisateur"];
	$pass=sha1($_POST["pass"]);
	if(confirmUser($utilisateur,$pass)){
		 createsessions($utilisateur,$pass);
		 $x=$_SESSION['gdrole'];
		 //pour le calendar code pret mais temps insufisant pour l'integrer 
		// include("../controllers/calendar.php");
		if(empty($x)){
				echo"<script type='text/javascript'>document.location.replace('../index.php?error=error');</script>";
		}else{
			if($x=="intervenant"){
				echo"<script type='text/javascript'>document.location.replace('../view/ajouter_absence.php');</script>";
			}
			else{
				echo"<script type='text/javascript'>document.location.replace('../view/dashboard.php');</script>";
			}
		}
	}else{
		echo"<script type='text/javascript'>document.location.replace('../index.php?rep=error');</script>";
	}
}else if(isset($_POST["email"])){
	$email=$_POST["email"];
	if($x=getnew_pass($email)){
		if(empty($x)){
				echo"<script type='text/javascript'>document.location.replace('../motdepasse_oublie.php?rep=error');</script>";
		}else{
			$msg="Vous avez oublié votre mot de passe ? <br/> Voici vos coordonnées d'identification : <b></b>";
			$msg.="Mot de passe :   ".$x."<br/><br/>";
			$msg.="VEUILLEZ VOUS IDENTIFIER A L'AIDE DE VOTRE NOM D'UTILISATEUR ET VOTRE NOUVEAU MOT DE PASSE <br/>";
			$msg.="Merci <br/> <b>Gestion d'absences LP-DW</b> ";
			// il manque la classe email pour qu'on puisse envoyer l'email a l'acteur;
			//include("../controllers/mail.php");
			//if(send_mail("votre nouveau mot de passe",$msg)){
				//echo"<script type='text/javascript'>document.location.replace('../motdepasse_oublie.php?ok');</script>";
			//}
			echo"<script type='text/javascript'>document.location.replace('../motdepasse_oublie.php?rep=ok');</script>";

		}
	}else{
		echo"<script type='text/javascript'>document.location.replace('../motdepasse_oublie.php?rep=error');</script>";
	}
}

?>

