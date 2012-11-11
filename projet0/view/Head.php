<?php
session_start();

require_once ("../controllers/DTOacteur.php"); 
if(!checkLoggedin()){
  header("location: ../index.php"); 
}

?>

<head>
  <meta charset="utf-8">
  <title>Gestion des absences :: <?php echo""; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="shortcut icon" href="favicon.gif">
  <!---CSS Files-->
  <link rel="stylesheet" href="../css/master.css">
  <link rel="stylesheet" href="../css/tables.css">
  <!---jQuery Files-->
  <script src="../js/jquery-1.7.1.min.js"></script>
  <script src="../js/global.js"></script>
  
  
  <!---Fonts-->
   <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>-->
   <!--<link href='http://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>-->
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <!--[if lte IE 8]>
  <script language="javascript" type="text/javascript" src="../js/flot/excanvas.min.js"></script>
  <![endif]-->
</head>
<?php 
	//fonction qui permet d'afficher les message de succ&eacute;s ou erreur lors de l'ajour , suppression ou modification
function afficher_message(){
	
	if(isset($_GET["rep"])){
	
		if($_GET["rep"]=='error'){
			echo 
			'<div id="login-msg">
				<p class="font-bold">Il existe des erreurs,veuillez verifier votre saisie</p>
			</div>';
		}else if($_GET["rep"]=='ok'){
			echo '
			<div id="login-msg-success">
				<p class="font-bold"> Op&eacute;ration effectu&eacute;e avec succ&eacute;s </p>
			</div>';
		
		}
	}
}
?>