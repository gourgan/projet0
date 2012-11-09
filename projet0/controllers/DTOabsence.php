<?php

include_once '../models/absence.php';
include_once '../models/connexion.php';
   
function ajout_absence($id_h, $id_eleve,$statut){
try {
        $db=connect();
 
        $d = new absence($id_h,$id_eleve,$statut);
        $resultat= $db->prepare("INSERT INTO absence (id_horaire,id_eleve,statut) VALUES (?,?,?)");
        $resultat->bindValue(1, $d->getDate_absence(), PDO::PARAM_INT) ;    
        $resultat->bindValue(2, $d->getId_eleve(), PDO::PARAM_STR) ;    
        $resultat->bindValue(3, $d->getStatut(), PDO::PARAM_STR) ;    
             
        $resultat->execute();
    
} 
catch (PDOException $exc) 
{
    echo $exc->getMessage();
}  
}
function afficher_absence_selondate(){
try {   
			////afficher absence selon dates
			$db=connect();
            $res=$db->prepare('SELECT * FROM eleve e,absence a WHERE a.id_eleve=e.id');
            $res->execute();
			return $res;
} 
catch (PDOException $exc) 
{
    echo $exc->getMessage();
}  
}

function get_programme($today,$quand){
try {   
		//we get programme du jour d'aprés la date from horaire
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
}  
}


function afficher_absence_temp($eleves){
try {		//print_r($eleves);exit;
			$db=connect();
			//faut mettre where id in();
            $res=$db->prepare('SELECT * FROM eleve WHERE id IN ('.$eleves.')');
            $res->execute();
			return $res;
    
} 
catch (PDOException $exc) 
{
    echo $exc->getMessage();
}  
}

function get_absence_dates($id){
try {		//get les dates d'absence de l'eleve d'aprés id;
			$db=connect();
            $res=$db->prepare('SELECT DISTINCT h.date,a.id FROM horaire h,absence a WHERE a.id_horaire=h.id group by h.date');
            $res->execute();
			return $res;
    
} 
catch (PDOException $exc) 
{
    echo $exc->getMessage(); 
}  
}

function get_absence_all_dates(){
try {		
			//get all dates dont il y'avait un absence;
			$db=connect();
            $res=$db->prepare('SELECT DISTINCT h.date,a.id FROM horaire h,absence a  group by h.date');
            $res->execute();
			return $res;
    
} 
catch (PDOException $exc) 
{
    echo $exc->getMessage();
}  
}
function store_matiere_calendar($even){
try {		
		$db=connect();
		//insertion des données de l'agenda dans la table horaire;
        $resultat= $db->prepare("INSERT INTO horaire (date,matiere,abrev_intervenant) VALUES (?,?,?)");
        $resultat->bindValue(1, $donnees["date"], PDO::PARAM_INT) ;    
        $resultat->bindValue(2, $donnees["matiere"], PDO::PARAM_STR) ;    
        $resultat->bindValue(3, $donnees["abrev_interv"], PDO::PARAM_STR) ;      
        $resultat->execute();
		return true;
} 
catch (PDOException $exc) 
{
    echo $exc->getMessage();
}  
}


?>
