<?php

require '../models/connexion.php';
include_once '../models/acteur.php';
 

function ajout_acteur($login,$mdp,$role,$email){
	try {
		 

			$db=connect();
			$d = new acteur($login,$mdp,$role,$email);
			$resultat= $db->prepare("INSERT INTO acteur (login,mdp,role,email) VALUES (?,?,?,?)");
			$resultat->bindValue(1, $d->getLogin(), PDO::PARAM_STR) ;    
			$resultat->bindValue(2, $d->getMdp(), PDO::PARAM_STR) ;    
			$resultat->bindValue(3, $d->getRole(), PDO::PARAM_STR) ;    
			$resultat->bindValue(4, $d->getEmail(), PDO::PARAM_STR) ;    
			
			$resultat->execute();
	  
		 
	} catch (PDOException $exc) {
		echo $exc->getMessage();
	}  
}

function supprimer_acteur($id){
		try {
		
			$db=connect();
			$resultat= $db->prepare("DELETE FROM  acteur  WHERE id=?");
			$resultat->bindValue(1,$id,PDO::PARAM_INT);
			$resultat->execute();
    
		}catch (PDOException $exc) {
			echo $exc->getMessage();
		}    
}   



function modifier_acteur($id,$login,$mdp,$role,$email){
    try{
        
        
        $db=connect();
        $d = new acteur($login,$mdp,$role,$email);
      
     
     
        $resultat= $db->prepare("UPDATE  acteur SET login=?,mdp=?,role=?,email=? WHERE id=?");
        
        $resultat->bindValue(1, $d->getLogin(), PDO::PARAM_STR) ;    
        $resultat->bindValue(2, $d->getMdp(), PDO::PARAM_STR) ;    
        $resultat->bindValue(3, $d->getRole(), PDO::PARAM_STR) ;    
        $resultat->bindValue(4, $d->getEmail(), PDO::PARAM_STR) ;  
        $resultat->bindValue(5, $id, PDO::PARAM_INT) ; 
        $resultat->execute();
        
        
    }
    catch (PDOException $exc) 
    {
    echo $exc->getMessage();
    }  
}
function afficher_acteurs(){
    try{
			$db=connect();
            $res=$db->prepare('SELECT * FROM acteur');
            $res->execute();
			return $res;

       }
     catch (PDOException $exc) 
    {
    echo $exc->getMessage();
    }  
}

function getnew_pass($email){
    try{	$pass="1234";
			$newpas=sha1($pass);
			$db=connect();
			mysql_query("UPDATE acteur SET mdp='".$newpas."' WHERE email='".$email."'");
			
			if(mysql_affected_rows()){
				return $pass;
			}else{
				return false;
			}
			
       }
     catch (PDOException $exc) 
    {
    echo $exc->getMessage();
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
	}   
   
}

function checkLoggedin()
{			//on verifie s'est existe déja une session precedente;

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
	}   
}
?>
