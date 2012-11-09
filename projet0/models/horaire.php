<?php

class horaire{
    private $date;
    private $heure_debut;
    private $heure_fin;
    private $id_matiere;
    



function __construct($date, $heure_debut, $heure_fin, $id_matiere) {
    $this->date = $date;
    $this->heure_debut = $heure_debut;
    $this->heure_fin = $heure_fin;
    $this->id_matiere = $id_matiere;
}



public function getDate() {
    return $this->date;
}

public function setDate($date) {
    $this->date = $date;
}

public function getHeure_debut() {
    return $this->heure_debut;
}

public function setHeure_debut($heure_debut) {
    $this->heure_debut = $heure_debut;
}

public function getHeure_fin() {
    return $this->heure_fin;
}

public function setHeure_fin($heure_fin) {
    $this->heure_fin = $heure_fin;
}

public function getId_matiere() {
    return $this->id_matiere;
}

public function setId_matiere($id_matiere) {
    $this->id_matiere = $id_matiere;
}


}

?>
