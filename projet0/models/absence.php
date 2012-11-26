<?php


class absence {
    private $date_absence;
    private $id_eleve;
    private $statut;
    private $justificatif;
    private $message;
    
    
    function __construct($date_absence, $id_eleve, $statut, $justificatif, $message) {
        $this->date_absence = $date_absence;
        $this->id_eleve = $id_eleve;
        $this->statut = $statut;
        $this->justificatif = $justificatif;
        $this->message = $message;
    }
    public function getJustificatif() {
        return $this->justificatif;
    }

    public function setJustificatif($justificatif) {
        $this->justificatif = $justificatif;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

        public function getDate_absence() {
        return $this->date_absence;
    }

    public function setDate_absence($date_absence) {
        $this->date_absence = $date_absence;
    }

    public function getId_eleve() {
        return $this->id_eleve;
    }

    public function setId_eleve($id_eleve) {
        $this->id_eleve = $id_eleve;
    }

   
    public function getStatut() {
        return $this->statut;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }


    
}
?>
