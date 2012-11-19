<?php
include_once '../models/role_utilisateur.php';
include_once '../models/connexion.php';
 

function ajout_roleutilisateur($id_role,$id_utilisateur){
	try {
        $db=connect();
 
        $d = new role_utilisateur($id_role,$id_utilisateur);
        $resultat= $db->prepare("INSERT INTO role_utilisateur (id_role,id_utilisateur) VALUES (?,?)");
       
        $resultat->bindValue(1, $d->getRole(), PDO::PARAM_INT) ;    
        $resultat->bindValue(2, $d->getRole_utilisateur(), PDO::PARAM_INT) ;    
          
       
       
        $resultat->execute();
        return true;
     
	} catch (PDOException $exc) {
		echo $exc->getMessage();
		return false;
	}  
}


function modifier_roleutilisateur($role,$role_utilisateur){
    try{
        
        
		$db=connect();
        
		$d = new role_utilisateur($id_role,$id_utilisateur);
        $resultat= $db->prepare("UPDATE  role_utilisateur  SET id_role=?  id_utilisateur=? ");
       
        $resultat->bindValue(1, $d->getRole(), PDO::PARAM_INT) ;    
        $resultat->bindValue(2, $d->getRole_utilisateur(), PDO::PARAM_INT) ;    
          
       
        $resultat->execute();
        return true;
    }
    catch (PDOException $exc)
    {
        echo $exc->getMessage();
        return false;
    }  
}

function supprimer_roleutilisateur($id){
  try{
        
        $db=connect();
        $resultat= $db->prepare("DELETE FROM  role_utilisateur  WHERE id_role=?");
        $resultat->bindValue(1,$id,PDO::PARAM_STR);
        $resultat->execute();
        return true;   
    }  
    catch (PDOException $exc) {
        
        echo $exc->getMessage();
        return false; 
    }
}

function afficher_roleutilisateur(){
    try{
		$db=connect();


		$res=$db->prepare('SELECT * FROM role_utilisateur');
		$res->execute();
		return $res;

    }
    catch (PDOException $exc)
    {
		echo $exc->getMessage();
		return false;
    }  
}

?>
