<?php
session_start();
include("../controllers/DTOabsence.php");
include("../controllers/Imprime.php");
include("../controllers/imprimecsv.php");


function absence_between_dates($date1,$date2){
	if(isset($_POST["type"])){
		if($_POST["type"]=="CSV")between_dates_csv($date1,$date2);
		else between_dates_pdf($date1,$date2);
	}else{
		between_dates_pdf($date1,$date2);
	}
}
if(isset($_POST["par_date"])){	
		absence_between_dates($_POST["date1"],$_POST["date2"]);
	
}else if(isset($_POST["tout"])){
	if($_POST["type"]=="PDF") all_absence_pdf();
	else all_absence_csv();
}
?>

