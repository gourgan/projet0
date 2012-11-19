<?php

require '../models/connexion.php';
include_once '../models/utilisateur.php';
 

function ajout_utilisateur($login,$mdp,$nom,$prenom,$email,$telephone,$picture,$alias){
	try {
		$db=connect();
		$d = new utilisateur($login,$mdp,$nom,$prenom,$email,$telephone,$picture,$alias);
		$resultat= $db->prepare("INSERT INTO utilisateur (login,mdp,nom,prenom,email,telephone,picture,alias) VALUES (?,?,?,?,?,?,?,?,?)");
		$resultat->bindValue(1, $d->getLogin(), PDO::PARAM_STR) ;    
		$resultat->bindValue(2, $d->getMdp(), PDO::PARAM_STR) ;    
		$resultat->bindValue(3, $d->getNom(), PDO::PARAM_STR) ;    
		$resultat->bindValue(4, $d->getPrenom(), PDO::PARAM_STR) ;       
		$resultat->bindValue(5, $d->getEmail(), PDO::PARAM_STR) ;   
		$resultat->bindValue(6, $d->getTelephone(), PDO::PARAM_STR) ;   
		$resultat->bindValue(7 , $d->getPicture(), PDO::PARAM_STR) ;   
		$resultat->bindValue(8 , $d->getAlias(), PDO::PARAM_STR) ;   
		$resultat->execute();
		return true;
		 
	} catch (PDOException $exc) {
		echo $exc->getMessage();
		return false;
	}  
}

function supprimer_utilisateur($id){
	try {
		
		$db=connect();
		$resultat= $db->prepare("DELETE FROM  utilisateur  WHERE id=?");
		$resultat->bindValue(1,$id,PDO::PARAM_INT);
		$resultat->execute();

		return true;
     
	} catch (PDOException $exc) {
		echo $exc->getMessage();
		return false;
	}  
}



function modifier_utilisateur($login,$mdp,$nom,$prenom,$email,$telephone,$picture,$alias){
    try{
        $db=connect();
        $d = new acteur($login,$mdp,$role,$email);
        $resultat= $db->prepare("UPDATE  utilisateur SET login=?,mdp=?,nom=?,prenom=?,email=?,telephone=?,picture=?,alias=?  WHERE id=?");
        
        $resultat->bindValue(1, $d->getLogin(), PDO::PARAM_STR) ;    
		$resultat->bindValue(2, $d->getMdp(), PDO::PARAM_STR) ;    
		$resultat->bindValue(3, $d->getNom(), PDO::PARAM_STR) ;    
		$resultat->bindValue(4, $d->getPrenom(), PDO::PARAM_STR) ;       
		$resultat->bindValue(5, $d->getEmail(), PDO::PARAM_STR) ;   
		$resultat->bindValue(6, $d->getTelephone(), PDO::PARAM_STR) ;   
		$resultat->bindValue(7 , $d->getPicture(), PDO::PARAM_STR) ;   
		$resultat->bindValue(8 , $d->getAlias(), PDO::PARAM_STR) ;     
        $resultat->bindValue(9, $id, PDO::PARAM_INT) ; 
        $resultat->execute();
        return true;
     
	} catch (PDOException $exc) {
		echo $exc->getMessage();
		return false;
	}  
}
function afficher_utilisateur(){
    try{
			$db=connect();
            $res=$db->prepare('SELECT * FROM utilisateur ');
            $res->execute();
			return $res;

       }
    catch (PDOException $exc) 
    {
		echo $exc->getMessage();
		return false;
    }  
}
/// on test si l'email est d&eacute;ja existant et on le change s'il existe puis on va envoyer l'email a l'acteur
function getnew_pass($email,$pass){
    try{	
		// on crypte le pass ;
		$newpas=sha1($pass);
		$db=connect();
		$resultat= $db->prepare("UPDATE utilisateur SET mdp=? WHERE email=?");
		$resultat->bindValue(1, $newpas, PDO::PARAM_STR) ;    
		$resultat->bindValue(2, $email, PDO::PARAM_STR) ;  
		$resultat->execute();
		if($resultat->rowCount()){
			return true;
		}else{
			return false;
		}
			
    }
     catch (PDOException $exc) 
    {
		echo $exc->getMessage();
		return false;

    }  
}

function createsessions($username,$password)
{
    try{
		//Add utilisateur et mot de passe to session
		$_SESSION["gdusername"] = $username;
		$_SESSION["gdpassword"] = sha1($password);
		setcookie("gdusername", $_SESSION['gdusername'], time()+60*60*24*100, "/");
		setcookie("gdpassword", $_SESSION['gdpassword'], time()+60*60*24*100, "/");
		//vider la session error
		unset($_SESSION['error']);
		return true;
	}catch (PDOException $exc)
    {
		echo $exc->getMessage();
		return false;
    } 
}

function clearsessionscookies()
{	try{
		//supprimer les sessions et les cookies de conexion;
		unset($_SESSION['gdusername']);
		unset($_SESSION['gdpassword']);
		unset($_SESSION['gdrole']);
		
		session_unset();    
		session_destroy(); 

		setcookie ("gdusername", "",time()-60*60*24*100, "/");
		setcookie ("gdpassword", "",time()-60*60*24*100, "/");
		return true;
	}
	catch (PDOException $exc)
    {
		echo $exc->getMessage();
		return false;
    } 
}

function confirmUser($utilisateur,$pass)
{
	try {	
		//on verifie si l'acteur(nom d'utilisateur) existe dans la base;
		$x="";
		$db=connect();
		$res=$db->query('SELECT * FROM  acteur');
		
		while ($resultat=$res->fetch(PDO::FETCH_ASSOC)) {
			
			if($resultat["login"]==$utilisateur and $resultat["mdp"]==$pass ){
			$_SESSION['gdrole']=$resultat["role"];
			setcookie("gdrole", $_SESSION['gdrole'], time()+60*60*24*100, "/");
			return true;
			}
			else{
				$x="error";
				$_SESSION['error']="error";
				setcookie("error", $_SESSION['error'], time()+60*60*24*100, "/");
			}
		}	
		if($x=="error")return false;
	}catch (PDOException $exc) {
		echo $exc->getMessage();
		return false;
	}   
   
}

function checkLoggedin()
{			//on verifie s'est existe d&eacute;ja une session precedente;

	try {
			
		if(isset($_SESSION['gdusername']) AND isset($_SESSION['gdpassword']))
			return true;
		elseif(isset($_COOKIE['gdusername']) && isset($_COOKIE['gdpassword']))
		{
			if(confirmUser($_COOKIE['gdusername'],$_COOKIE['gdpassword']))
			{
				createsessions($_COOKIE['gdusername'],$_COOKIE['gdpassword']);
				return true;
			}
			else
			{
				clearsessionscookies();
				return false;
			}
		}
		else
			return false;
			
	}catch (PDOException $exc) {
		echo $exc->getMessage();
		return false;
	}   
}
?>
