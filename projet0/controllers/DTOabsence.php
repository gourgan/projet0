<?php

include_once '../models/absence.php';
include_once '../models/connexion.php';
   
function ajout_absence($id_h, $id_eleve,$statut,$justificatif,$message){
	try {
		$db=connect();

		$d = new absence($id_h,$id_eleve,$statut);
		$resultat= $db->prepare("INSERT INTO absence (id_horaire,id_eleve,statut,justificatif,message) VALUES (?,?,?,?,?)");
		$resultat->bindValue(1, $d->getDate_absence(), PDO::PARAM_INT);    
		$resultat->bindValue(2, $d->getId_eleve(), PDO::PARAM_STR);    
		$resultat->bindValue(3, $d->getStatut(), PDO::PARAM_STR);    
		$resultat->bindValue(4, $d->getJustificatif(), PDO::PARAM_STR);    
		$resultat->bindValue(5, $d->getMessage(), PDO::PARAM_STR);    
		$resultat->execute();
		return true;
	} 
	catch (PDOException $exc) 
	{
		echo $exc->getMessage();
		return false;
	}  
}
function ajout_absence($id_h, $id_eleve,$statut,$justificatif,$message){
	try {
		$db=connect();

		$d = new absence($id_h,$id_eleve,$statut);
		$resultat= $db->prepare("INSERT INTO absence (id_horaire,id_eleve,statut,justificatif,message) VALUES (?,?,?,?,?)");
		$resultat->bindValue(1, $d->getDate_absence(), PDO::PARAM_INT);    
		$resultat->bindValue(2, $d->getId_eleve(), PDO::PARAM_STR);    
		$resultat->bindValue(3, $d->getStatut(), PDO::PARAM_STR);    
		$resultat->bindValue(4, $d->getJustificatif(), PDO::PARAM_STR);    
		$resultat->bindValue(5, $d->getMessage(), PDO::PARAM_STR);    
		$resultat->execute();
		return true;
	} 
	catch (PDOException $exc) 
	{
		echo $exc->getMessage();
		return false;
	}  
}


function modifier_absence($statut,$justificatif,$message,$id){
	try {   
		////afficher absence selon dates
		$db=connect();
		$res=$db->prepare('UPDATE absence SET statut=?,justificatif=?,message=? WHERE id=?');
                $res->bindValue(1,$statut, PDO::PARAM_STR); 
                $res->bindValue(2,$justificatif, PDO::PARAM_STR); 
                $res->bindValue(3,$message, PDO::PARAM_STR); 
                $res->bindValue(4,$date, PDO::PARAM_STR); 
               
		$res->execute();
		return $res;
	} catch (PDOException $exc) 
	{
		echo $exc->getMessage();
		return false;
	}
}
    function afficher_absence_entredate($date1,$date2){
	try {   
		////afficher absence selon dates
		$db=connect();
		$res=$db->prepare('SELECT * FROM eleve e,absence a,horaire h  WHERE a.id_eleve=e.id AND a.id_horaire=h.id AND h.date BETWEEN ? AND ? ');
                $res->bindValue(1,$date1, PDO::PARAM_STR) ; 
                $res->bindValue(1,$date2, PDO::PARAM_STR) ; 
		$res->execute();
		return $res;
	}     
        
	catch (PDOException $exc) 
	{
		echo $exc->getMessage();
		return false;
	}  
}

function get_programme($today,$quand){
	try {   
		//we get programme du jour d'apr&eacute;s la date from horaire
		$db=connect();
		$res=$db->prepare('SELECT id FROM horaire h WHERE h.date=? and h.quand=?');
		$res->bindValue(1,$today, PDO::PARAM_STR) ;    
		$res->bindValue(2,$quand, PDO::PARAM_STR) ;    
		$res->execute();
		return $res;
		
	} 
	catch (PDOException $exc) 
	{
		echo $exc->getMessage();
		return false;
	}  
}


function afficher_absence_temp($eleves){
	try {		
		//print_r($eleves);exit;
		$db=connect();
		//faut mettre where id in();
		$res=$db->prepare('SELECT * FROM eleve WHERE id IN ('.$eleves.')');
		$res->execute();
		return $res;
		
	} 
	catch (PDOException $exc) 
	{
		echo $exc->getMessage();
		return false;
	}  
}

function get_absence_dates($id){
	try {		
		//get les dates d'absence de l'eleve d'apr&eacute;s id;
		$db=connect();
		$res=$db->prepare('SELECT DISTINCT h.date,a.id FROM horaire h,absence a WHERE a.id_horaire=h.id group by h.date');
		$res->execute();
		return $res;
		
	} 
	catch (PDOException $exc) 
	{
		echo $exc->getMessage(); 
		return false;
	}  
}

function get_absence_all_dates(){
	try {		
		echo "xxxxxxx";//get all dates dont il y'avait un absence;
		$db=connect();
		$res=$db->prepare('SELECT DISTINCT h.date,a.id FROM horaire h,absence a  group by h.date');
		$res->execute();
		return $res;
		
	} 
	catch (PDOException $exc) 
	{
		echo $exc->getMessage();
		return false;
	}  
}
function store_matiere_calendar($even){
	try {		
		$db=connect();
		//insertion des donn&eacute;es de l'agenda dans la table horaire;
		$resultat= $db->prepare("INSERT INTO horaire (date,quand,matiere,abrev_intervenant) VALUES (?,?,?,?)");
		$resultat->bindValue(1, $even["date"], PDO::PARAM_STR) ;    
		$resultat->bindValue(2, $even["quand"], PDO::PARAM_STR) ;  
		$resultat->bindValue(3, $even["matiere"], PDO::PARAM_STR) ;    
		$resultat->bindValue(4, $even["abrev_interv"], PDO::PARAM_STR) ;      
		$resultat->execute();
		return true;
	} 
	catch (PDOException $exc) 
	{
		echo $exc->getMessage();
		return false;
	}  
}


?>
