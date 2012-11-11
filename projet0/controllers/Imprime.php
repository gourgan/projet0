<?php
require('fpdf.php');

class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    $this->Image('../img/logo.png',10,6,30);
    // Police Arial gras 15
    $this->SetFont('Arial','',15);
    // D&eacute;calage à droite
    $this->Cell(80);
    // Titre
    $this->Cell(0,10,'Absence des etudiants',1,0,'C');
    // Saut de ligne
    $this->Ln(20);
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Times','I',8);
    // Num&eacute;ro de page
    $this->Cell(0,0,'Universit&eacute; de Cergy-Pontoise',20,10,'L');
    $this->Cell(0,0,'Page '.$this->PageNo().'/{nb}',20,0,'C');
    $this->Cell(0,0,'Gestion des absences LPDW',20,10,'R');
    
}
}
function all_absence_pdf(){
// Instanciation de la classe d&eacute;riv&eacute;e
/// on retourne fichier pdf contenant tout les absences 

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);
	mysql_connect('localhost','root','') or die("ERROR DATABASE CONNECTION");
    mysql_select_db('projet0') or die("DATA SELECTION ERRROR");
    $query="select * from absence a,eleve e,horaire h 
			where e.id=a.id_eleve and a.id_horaire=h.id
			order by h.date";
    $resultat=mysql_query($query);
	$pdf->Cell(0,10,'Liste des absents de tout les jours',1,0,'C');
    // Saut de ligne
    $pdf->Ln(20);
	$pdf->SetFillColor(96,96,96);
    $pdf->SetTextColor(255,255,255);
	$header=array('Nom','Prenom',"Date d'absence","intervenant");
	for($i=0;$i<sizeof($header);$i++)
	$pdf->cell(50,10,$header[$i],10,0,'C',1);
	$pdf->SetFillColor(0xdd,0xdd,0xdd);
    $pdf->SetTextColor(0,0,0);
	$pdf->SetXY(10,$pdf->GetY()+10);
	$fond=0;
	while($row=mysql_fetch_array($resultat)){
	$pdf->cell(50,10,$row['nom'],10,0,'C',$fond);
    $pdf->cell(50,10,$row['prenom'],10,0,'C',$fond);
    $pdf->cell(50,10,$row['date']."-".$row['quand'],10,0,'C',$fond);
	$pdf->cell(50,10,$row['abrev_intervenant'],10,0,'C',$fond);
	$pdf->SetXY(10,$pdf->GetY()+9);
	$fond=!$fond;


	}
    $pdf->Output();
}
function between_dates_pdf($date1,$date2){
// Instanciation de la classe d&eacute;riv&eacute;e
/// on retourne fichier pdf contenant tout les basence entre deux dates
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);
	mysql_connect('localhost','root','') or die("ERROR DATABASE CONNECTION");
    mysql_select_db('projet0') or die("DATA SELECTION ERRROR");
    $query="select * from absence a,eleve e,horaire h 
			where e.id=a.id_eleve and a.id_horaire=h.id
			and h.date between '$date1' and '$date2'
			order by h.date";
    $resultat=mysql_query($query);
	$pdf->Cell(0,10,'Liste des absents entre '.$date1.' et '.$date2,1,0,'C');
    // Saut de ligne
    $pdf->Ln(20);
	$pdf->SetFillColor(96,96,96);
    $pdf->SetTextColor(255,255,255);
	$header=array('Nom','Prenom',"Date d'absence","intervenant");
	for($i=0;$i<sizeof($header);$i++)
	$pdf->cell(50,10,$header[$i],10,0,'C',1);
	$pdf->SetFillColor(0xdd,0xdd,0xdd);
    $pdf->SetTextColor(0,0,0);
	$pdf->SetXY(10,$pdf->GetY()+10);
	$fond=0;
	while($row=mysql_fetch_array($resultat)){
	$pdf->cell(50,10,$row['nom'],10,0,'C',$fond);
    $pdf->cell(50,10,$row['prenom'],10,0,'C',$fond);
    $pdf->cell(50,10,$row['date']."-".$row['quand'],10,0,'C',$fond);
	$pdf->cell(50,10,$row['abrev_intervenant'],10,0,'C',$fond);
	$pdf->SetXY(10,$pdf->GetY()+9);
	$fond=!$fond;


	}
    $pdf->Output();
}
?>
