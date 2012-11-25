<?php

include_once '../models/entreprise.php';
include_once '../models/connexion.php';
 
function ajout_entreprise($nom,$adresse=null,$telephone=null,$email=null){
	try {
        $db=connect();
 
        $d = new entreprise($nom,$adresse,$telephone,$email);
       
        $resultat= $db->prepare("INSERT INTO entreprise (nom_entreprise,adresse_entreprise,telephone_entreprise,email_entreprise) VALUES (?,?,?,?)");
       
        $resultat->bindValue(1, $d->getNom(), PDO::PARAM_STR) ;    
        $resultat->bindValue(2, $d->getAdresse(), PDO::PARAM_STR) ;    
        $resultat->bindValue(3, $d->getTelephone(), PDO::PARAM_STR) ;    
        $resultat->bindValue(4, $d->getEmail(), PDO::PARAM_STR) ;    
        
        $resultat->execute();
        return true;
     
	} catch (PDOException $exc) {
		echo $exc->getMessage();
		return false;
	}  
}


function modifier_entreprise($id,$nom,$adresse,$telephone,$email){
    try{
        
        
        $db=connect();
        $d = new entreprise($nom,$adresse,$telephone,$email);
        $resultat= $db->prepare("UPDATE entreprise SET nom_entreprise=?,adresse_entreprise=?,telephone_entreprise=?,email_entreprise=? WHERE id=?");
        $resultat->bindValue(1, $d->getNom(), PDO::PARAM_STR) ;    
        $resultat->bindValue(2, $d->getAdresse(), PDO::PARAM_STR) ;    
        $resultat->bindValue(3, $d->getTelephone(), PDO::PARAM_STR) ;    
        $resultat->bindValue(4, $d->getEmail(), PDO::PARAM_STR) ;  
        $resultat->bindValue(5, $id, PDO::PARAM_INT) ; 
        $resultat->execute();
        return true;
     
	} catch (PDOException $exc) {
		echo $exc->getMessage();
		return false;
	}  
}
function supprimer_entreprise($id){
	try{
		$db=connect();
		$resultat= $db->prepare("DELETE FROM  entreprise  WHERE id=?");
		$resultat->bindValue(1,$id,PDO::PARAM_INT);
		$resultat->execute();
		return true;
     
	} catch (PDOException $exc) {
		echo $exc->getMessage();
		return false;
	}  
}

function get_entreprise(){
	try{
		$db=connect();
		$res=$db->query('SELECT MAX(id) FROM entreprise');
		while ($resultat=$res->fetch(PDO::FETCH_ASSOC)) {

			return $resultat;

		}

       }
    catch (PDOException $exc)
    {
		echo $exc->getMessage();
		return false;
    }  
}
function ajout_entreprise_eleve($eleve){
	try{
        
        $id_entreprise=get_entreprise();
		$id_entreprise=$id_entreprise['MAX(id)'];
		$db=connect();
		$resultat= $db->prepare("UPDATE eleve SET id_entreprise=? WHERE id=?");
        $resultat->bindValue(1, $id_entreprise, PDO::PARAM_STR) ;     
        $resultat->bindValue(2, $eleve, PDO::PARAM_INT) ; 
        $resultat->execute();	
        return true;
     
	} catch (PDOException $exc) {
		echo $exc->getMessage();
		return false;
	}  
}


function afficher_entreprises(){
    try{
		$db=connect();
		$res=$db->prepare('SELECT * FROM entreprise en,eleve e where e.id_entreprise=en.id');
		$res->execute();
		return $res;

       }
    catch (PDOException $exc)
    {
		echo $exc->getMessage();
		return false;
    }  
}
function afficher_entreprises_all(){
    try{
		$db=connect();
		$res=$db->prepare('SELECT * FROM entreprise');
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
