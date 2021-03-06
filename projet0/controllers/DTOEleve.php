<?php
include_once '../models/eleve.php';
include_once '../models/connexion.php';
 

function ajout_eleve($nom,$prenom,$photo,$email,$tel,$entreprise,$delegue){
	try {
        $db=connect();
 
        $d = new eleve($nom,$prenom,$photo,$email,$tel,$entreprise,$delegue);
        $resultat= $db->prepare("INSERT INTO eleve (nom,prenom,photo,email,telephone,id_entreprise,delegue) VALUES (?,?,?,?,?,?,?)");
       
        $resultat->bindValue(1, $d->getNom(), PDO::PARAM_STR) ;    
        $resultat->bindValue(2, $d->getPrenom(), PDO::PARAM_STR) ;    
        $resultat->bindValue(3, $d->getPhoto(), PDO::PARAM_STR) ;    
        $resultat->bindValue(4, $d->getEmail(), PDO::PARAM_STR) ;    
        $resultat->bindValue(5, $d->getTelephone(), PDO::PARAM_STR) ;    
        $resultat->bindValue(6, $d->getId_entreprise(), PDO::PARAM_INT) ;  
        $resultat->bindValue(7, $d->getDelegue(), PDO::PARAM_BOOL) ;  
		
        $resultat->execute();
        return $db->lastInsertId();
     
	} catch (PDOException $exc) {
		echo $exc->getMessage();
		return false;
	}  
}


function modifier_eleve($id,$nom,$prenom,$photo,$email,$tel,$entreprise,$delegue){
    try{
        
        
		$db=connect();
        
		$d = new eleve($nom,$prenom,$photo,$email,$tel,$entreprise,$delegue);
        $resultat= $db->prepare("UPDATE  eleve SET nom=?,prenom=?,photo=?,email=?,telephone=?,id_entreprise=?,delegue=? WHERE id=?");
       
        $resultat->bindValue(1, $d->getNom(), PDO::PARAM_STR) ;    
        $resultat->bindValue(2, $d->getPrenom(), PDO::PARAM_STR) ;    
        $resultat->bindValue(3, $d->getPhoto(), PDO::PARAM_STR) ;    
        $resultat->bindValue(4, $d->getEmail(), PDO::PARAM_STR) ;    
        $resultat->bindValue(5, $d->getTelephone(), PDO::PARAM_STR) ;       
        $resultat->bindValue(6, $d->getId_entreprise(), PDO::PARAM_INT) ;
        $resultat->bindValue(7, $d->getDelegue(), PDO::PARAM_BOOL) ; 
        $resultat->bindValue(8, $id,PDO::PARAM_INT);
        $resultat->execute();
        return true;
    }
    catch (PDOException $exc)
    {
        echo $exc->getMessage();
        return false;
    }  
}

function supprimer_eleve($id){
  try{
        
        $db=connect();
        $resultat= $db->prepare("DELETE FROM  eleve  WHERE id=?");
        $resultat->bindValue(1,$id,PDO::PARAM_STR);
        $resultat->execute();
        return true;   
    }  
    catch (PDOException $exc) {
        
        echo $exc->getMessage();
        return false; 
    }
}

function afficher_eleves(){
    try{
		$db=connect();
		$res=$db->prepare('SELECT * FROM eleve');
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
