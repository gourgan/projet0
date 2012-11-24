<?php
ob_start();
session_start();

if (isset($_SESSION["gdusername"])) {
 	
	$x=$_SESSION['gdrole'];
     
	if(empty($x)){
			header('location :index.php?error=error');
	}else{
		if($x=="intervenant"){
			header('location :../Absences/ajout');
		}
		else{
			header('location :../Dashboard/news');
		}
	}
}


?>