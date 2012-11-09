<?php
ob_start();
session_start();

if (isset($_SESSION["gdusername"])) {
 	
	$x=$_SESSION['gdrole'];
     
	if(empty($x)){
			echo"<script type='text/javascript'>document.location.replace('index.php?error=error');</script>";
	}else{
		if($x=="intervenant"){
			echo"<script type='text/javascript'>document.location.replace('view/ajouter_absence.php');</script>";
		}
		else{
			echo"<script type='text/javascript'>document.location.replace('view/dashboard.php');</script>";
		}
	}
}


?>