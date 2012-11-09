<?php

include_once '../models/intervenant.php';
include_once '../models/connexion.php';


function ajout_intervenant($nom,$prenom,$email,$tel,$picture,$alias){
try {
     

       $db=connect();
    
        $d = new intervenant($nom,$prenom,$email,$tel,$picture,$alias);
        
     
     
        $resultat= $db->prepare("INSERT INTO intervenant (nom,prenom,email,tel,picture,alias) VALUES (?,?,?,?,?,?)");
       
        $resultat->bindValue(1, $d->getNom(), PDO::PARAM_STR) ;    
        $resultat->bindValue(2, $d->getPrenom(), PDO::PARAM_STR) ;    
        $resultat->bindValue(3, $d->getEmail(), PDO::PARAM_STR) ;    
        $resultat->bindValue(4, $d->getTelephone(), PDO::PARAM_STR) ;     
        $resultat->bindValue(5, $d->getPicture(), PDO::PARAM_STR) ;  
        $resultat->bindValue(6, $d->getAlias(), PDO::PARAM_STR) ;       
        $resultat->execute();
        
        
        
        
     
} catch (PDOException $exc) {
    echo $exc->getMessage();
}  
}

function modifier_intervenant($id,$nom,$prenom,$email,$tel,$picture,$alias){
    
	
	try{
        $db=connect();
         
        $d = new intervenant($nom,$prenom,$email,$tel,$picture,$alias);
        $resultat= $db->prepare("UPDATE  intervenant SET nom=?,prenom=?,email=?,tel=?,picture=?,alias=? WHERE id=?");
        
        $resultat->bindValue(1, $d->getNom(), PDO::PARAM_STR) ;    
        $resultat->bindValue(2, $d->getPrenom(), PDO::PARAM_STR) ;    
        $resultat->bindValue(3, $d->getEmail(), PDO::PARAM_STR) ;    
        $resultat->bindValue(4, $d->getTelephone(), PDO::PARAM_STR) ;  
        $resultat->bindValue(5, $d->getPicture(), PDO::PARAM_STR) ; 
        $resultat->bindValue(6, $d->getAlias(), PDO::PARAM_STR) ; 
		$resultat->bindValue(7, $id, PDO::PARAM_INT) ;
		
        $resultat->execute();
        
        
    }
    catch (PDOException $exc) 
    {
    echo $exc->getMessage();
    }  
}

function supprimer_intervenant($id){

try{
    $db=connect();
    $resultat= $db->prepare("DELETE FROM  intervenant  WHERE id=?");
    $resultat->bindValue(1,$id,PDO::PARAM_INT);
    $resultat->execute();
	 }
    catch (PDOException $exc) 
    {
    echo $exc->getMessage();
    }  
        
}

function afficher_intervenants(){
    try{
            $db=connect();


            $res=$db->prepare('SELECT * FROM intervenant');
            $res->execute();
			return $res;

       }
    catch (PDOException $exc)
    {
            echo $exc->getMessage();
            return false;
    }  
}

function afficher_matieres(){
    try{
            $db=connect();


            $res=$db->prepare('SELECT * FROM matiere');
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
