<?php
function modifier_en(){
	include_once("../controllers/DTOentreprise.php");
    
	$id = $_POST['entreprise'];
	
	//entreprise
	$intitule = htmlentities($_POST['intitule']);
	$tel_entreprise = htmlentities($_POST['tel']);
	$email_entreprise = htmlentities($_POST['email']);
	$adresse_entreprise = htmlentities($_POST['adresse']);
	//modifier l'entreprise 
	if(modifier_entreprise($id,$intitule,$adresse_entreprise,$tel_entreprise,$email_entreprise)){
		echo"<script type='text/javascript'>document.location.replace('../view/modifier_entreprise.php?rep=ok');</script>";
	}else{
		echo"<script type='text/javascript'>document.location.replace('../view/modifier_entreprise.php?rep=error');</script>";
	}
}

function modifier_act(){
	  include_once("../controllers/DTOacteur.php");
      $acteurs=afficher_acteurs();
	  $id=htmlentities($_POST['acteur']);
	  while($lignes=$acteurs->fetch(PDO::FETCH_OBJ))
		{
		  if($lignes->id==$id)
		  {
			  $role = htmlentities($_POST['role']);
			  $login = htmlentities($_POST['login']);
			  $mdp = sha1(htmlentities($_POST['password']));
			  $old = sha1(htmlentities($_POST['anc_password']));
			  $email = htmlentities($_POST['email']);
			  if($old==$lignes->mdp){
					if(modifier_acteur($id,$login,$mdp,$role,$email)){
						echo"<script type='text/javascript'>document.location.replace('../view/modifier_acteur.php?rep=ok');</script>";
					}else{
						echo"<script type='text/javascript'>document.location.replace('../view/modifier_acteur.php?rep=error');</script>";
					}		
				}
			  else{
					echo"<script type='text/javascript'>document.location.replace('../view/modifier_acteur.php?rep=error');</script>";
			  }	
		  }
	  
		}
}
function modifier_int(){
	include_once("../controllers/DTOintervenant.php");
	$id= $_POST['intervenant'];
	//info intervenant
	$nom = htmlentities($_POST['nom']);
	$prenom = htmlentities($_POST['prenom']);
	$email = htmlentities($_POST['email']);
	$tel = htmlentities($_POST['tel']);
	$alias = htmlentities($_POST['alias']);
	$photo=htmlentities($_POST['picture']);
	$nm=$nom."_".$prenom;
	if($_FILES["pic_int"]["name"]!=""){
	$photo=upload($_FILES["pic_int"],$nm);
	}
	if(modifier_intervenant($id,$nom,$prenom,$email,$tel,$photo,$alias)){
		echo"<script type='text/javascript'>document.location.replace('../view/modifier_intervenant.php?rep=ok');</script>";
	}else{
		echo"<script type='text/javascript'>document.location.replace('../view/modifier_intervenant.php?rep=error');</script>";
	}	
}
function upload($file,$nm){
	$msg="";
	$extension = end(explode(".", $file["name"]));
	$file_upload="true";
	$file_up_size=$file["size"];
	$add=$nm.".".$extension; // the path with the file name where the file will be stored
	if ($file["size"]>7500000)
	{
		$msg=$msg."l'image uploader est plus grand que 450KO.<BR>";
		$file_upload="false";$add="nothing.jpg";
	}

	if (!($file["type"] =="image/jpeg" OR $file["type"] =="image/gif" OR $file["type"] =="image/x-png" OR $file["type"] =="image/png" ))
	{
		$file_upload="false";$add="nothing.jpg"; // the path with the file name where the file will be stored

	}

	if($file_upload=="true" AND strpos($add,'nothing') !== true){
	   
		if(move_uploaded_file($file["tmp_name"], "../upload/$add")){
			chmod ("../upload/$add", 0777);
			return $add;
		// do your coding here to give a thanks message or any other thing.
		}else{return $add;}

	}else{return $add;}
}
function modifier_el(){
	include_once("../controllers/DTOEleve.php");
    //eleve 
	$id= $_POST['eleve'];
	$nom = htmlentities($_POST['nom']);
	$prenom = htmlentities($_POST['prenom']);
	$email = htmlentities($_POST['email']);
	$tel = htmlentities($_POST['tel']);
	$photo=htmlentities($_POST['photo']);
	$entreprise=$_POST['entreprise'];
        $delegue=$_POST['delegue'];
	$nm=$nom."_".$prenom;
	if($_FILES["pic_stud"]["name"]!=""){
	$photo=upload($_FILES["pic_stud"],$nm);
	}
	
	if(modifier_eleve($id,$nom,$prenom,$photo,$email,$tel,$entreprise,$delegue)){
		echo"<script type='text/javascript'>document.location.replace('../view/modifier_eleve.php?rep=ok');</script>";
	}else{
		echo"<script type='text/javascript'>document.location.replace('../view/modifier_eleve.php?rep=error');</script>";
	}	
	
}

// s'il est deja passé par le formulaire
if(isset($_POST["quoi"])){

	if($_POST["quoi"]=="eleve"){
		modifier_el();
	}
	else if($_POST["quoi"]=="entreprise"){
		modifier_en();

	}
	else if($_POST["quoi"]=="acteur"){
		modifier_act();
	}
	else if($_POST["quoi"]=="intervenant"){
		modifier_int();
	}
// s'il est deja pass&eacute; par le formulaire page accés impossible
}else echo "acc&eacute;s impossible";
?>
