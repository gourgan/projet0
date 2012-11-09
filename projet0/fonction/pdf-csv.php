<?php
session_start();
include("../controllers/DTOabsence.php");
include("../controllers/Imprime.php");


function absence_between_dates($date1,$date2){
	/////////probléme de date ici 
	//$date1=date("d/m/Y",$date1);
	//$date2=date("d/m/Y",$date2);
	$date1="19/10/2012";
	$date2="19/10/2012";
	if(isset($_GET["format"])){
	if($_GET["format"]=="csv")between_dates_csv($date1,$date2);
	else between_dates_pdf($date1,$date2);
	}else{
		between_dates_pdf($date1,$date2);
	}
	}
if(isset($_POST["par_date"])){	
		absence_between_dates($_POST["date1"],$_POST["date2"]);
	
}else if(isset($_POST["tout"])){
	if($_GET["format"]=="pdf") all_absence_pdf();
	else all_absence_csv();
}
?>

