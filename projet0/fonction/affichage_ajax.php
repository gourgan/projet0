<?php
function afficher_entreprise_modif(){
	include_once("../controllers/DTOentreprise.php");

//ajax afichage entreprise pour modif
	$id=$_GET["id"];
	$entreprise=afficher_entreprises();
	while($lignes=$entreprise->fetch(PDO::FETCH_OBJ))
		{		
			if($lignes->id==$id){
			
			echo'
			<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Information Personnelles</h2></div>
			<div class="box-content">

					<div class="form-row">
						<label class="form-label"> Intitul&eacute; </label>
						<input type="text" name="intitule" value="'.$lignes->nom_entreprise.'" size="100" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required /> 
					</div>
					
					<div class="form-row">
							<label class="form-label"> adresse  </label>
							<input type="text" name="adresse" value="'.$lignes->adresse_entreprise.'" size="100" />
					</div>
					
					<div class="form-row">
							<label class="form-label"> Telephone  </label>
							<input type="text" name="tel" value="'.$lignes->telephone_entreprise.'" size="100" pattern="^\d{10}$" />
					</div>
					
					<div class="form-row">
							<label class="form-label"> E-mail  </label>
							<input type="email" name="email" value="'.$lignes->email_entreprise.'" size="100" />
							<input type="hidden" name="quoi" value="entreprise"/>
							<input type="hidden" name="entreprise" value="'.$lignes->id.'"/>
							
					</div>
					
					
			</div>
		  </div>
		 
	      
		<div class="class_button">
			<input type="submit" value="Modifier" class="button big black">
			<input type="reset" value="Vider" class="button big red">
		</div>
		';
			
			}
	
		}
}


		  		
     
		

function afficher_dates(){
include_once("../controllers/DTOabsence.php");

//ajax affichage date 
	$id=$_GET["id"];
	
        $dates=get_absence_all_dates();
			echo'
			<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Information Personnelles</h2></div>
			<div class="box-content style=height:550px;margin-bottom:10px;">

					<div class="form-row">
							
							
							<label class="form-label"> Selectionnez une date : </label>
							
								<?php while($lignes=$dates->fetch(PDO::FETCH_OBJ))
									{	
									$date_ab=explode(":",$lignes->date);
									$date_ab=$date_ab[0];
									echo "<option  value=\'$date_ab\'>
										$date_ab</option>" ;
									}?>						
							</select>	<br/>			
				     </div>
					<div class="form-row">
							<label class="form-label"> Message :  </label>
							<textarea name="message" rows="4" cols="50"> </textarea>
					</div>
                                        

					<div class="form-row">
							<label class="form-label"> Justificatif  </label>
							<input type="file" name="justif" />
					</div>
					
			
			</div>
		  </div>
		 
		<div class="class_button">
			<input type="submit" value="Modifier" class="button big black">
			<input type="reset" value="Vider" class="button big red">
		</div>
		';
			
}
	
function afficher_utilisateur_modif(){
include_once("../controllers/DTOutilisateur.php");

//ajax afichage eleve pour modif
	$id=$_GET["id"];
	$utilisateur=afficher_utilisateurs();
	while($lignes=$utilisateur->fetch(PDO::FETCH_OBJ))
		{
			if($lignes->id==$id){
			
			echo'
			<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Information Personnelles</h2></div>
			<div class="box-content">
                                        
                                         <div class="form-row">
						<label class="form-label"> Login </label>
						<input type="text" name="login" value="'.$lignes->login.'" placeholder="Veuillez saisir le login" size="100"  pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required /> 
					</div>
                                        <div class="form-row">
						<label class="form-label"> Mot de Passe </label>
						<input type="password" name="mdp" placeholder="Veuillez saisir le mot de passe " size="100"  pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required /> 
					</div>
					<div class="form-row">
						<label class="form-label"> Nom </label>
						<input type="text" name="nom" value="'.$lignes->nom.'" size="100" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required /> 
					</div>
					
					<div class="form-row">
							<label class="form-label"> Pr&eacute;nom  </label>
							<input type="text" name="prenom" value="'.$lignes->prenom.'" size="100" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required />
					</div>
					
					<div class="form-row">
							<label class="form-label"> E-mail  </label>
							<input type="email" name="email" value="'.$lignes->email.'" size="100" />
					</div>
					
					<div class="form-row">
							<label class="form-label"> Telephone  </label>
							<input type="text" name="tel" value="'.$lignes->telephone.'" size="100" pattern="^\d{10}$" />
					</div>
					<div class="form-row">
							<label class="form-label"> Alias  </label>
							<input type="text" name="alias" value="'.$lignes->Alias.'" size="100" />
							<input type="hidden" name="picture"  size="100" value="'.$lignes->picture.'" > </input> 

					</div>
			
			</div>
		  </div>
		 
	  
      <div class="box grid_12">
        <div class="box-head"><h2>Identit&eacute; visuelle</h2></div>
        <div class="box-content">
			<div class="form-row">
				<label class="form-label"> Changer photo utilisateur  </label>
				<input type="file" name="pic_uti" />
				<img height="165" src="../upload/'.$lignes->picture.'" alt="photo" />
				<input type="hidden" name="quoi" value="utilisateur"/>
			</div>
		</div>
      </div>

     
		<div class="class_button">
			<input type="submit" value="Modifier" class="button big black">
			<input type="reset" value="Vider" class="button big red">
		</div>
		';
			
			}
	
		}
}

function afficher_absents(){
include_once("../controllers/DTOabsence.php");
$absent=afficher_absence_selondate($_GET["id"]);


  echo '<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Derniers absent :</h2></div>
			<div class="box-content" style="height:700px;margin-bottom:10px;">';?>
				 
				 		<?php
									while($lignes=$absent->fetch(PDO::FETCH_OBJ))
									{?>
										<div class="one_pic">
											<img height="300" width="75" src="../upload/<?php echo $lignes->photo;?>" alt="" title="" class="pic" />
											<div class="check" style="text-align:center">
												<span> Absent</span>
												<input type="checkbox"  checked name="absents[]" id="absents[]"  class="checkbox" value="<?php echo $lignes->id ; ?>" />
											</div>
                                                                                        <div class="info">
                                                                                            
												<span> <?php echo $lignes->nom; ?> </span><br/>
												<span> <?php echo $lignes->prenom; ?> </span><br/>
											</div>
										</div>
									<?php 
									}
									?>		
			<?php echo '</div>
			
			
			
		<div class="class_button" style="width:81px;">
			<input type="submit" value="modifier" class="button big black">
		</div>
		  
          
		
		</div>
	  </form>

   </div>';
   
  
}



function afficher_eleve_modif(){
	include_once("../controllers/DTOEleve.php");
	include_once("../controllers/DTOentreprise.php");

	//ajax afichage eleve pour modif
	$id=$_GET["id"];
	$eleve=afficher_eleves();
	$entreprises=afficher_entreprises();
	while($lignes=$eleve->fetch(PDO::FETCH_OBJ))
		{
			if($lignes->id==$id){
			(
			/// si delegué on attribue checked a checkbox;
			$lignes->delegue==1)?$checked="checked":$checked="";
			echo'
			<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Information Personnelles</h2></div>
			<div class="box-content">

					<div class="form-row">
						<label class="form-label"> Nom </label>
						<input type="text" name="nom" size="100" value="'.$lignes->nom.'" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required >   </input> 
					</div>
					
					<div class="form-row">
							<label class="form-label"> Pr&eacute;nom  </label>
							<input type="text" name="prenom"  size="100"  value="'.$lignes->prenom.'" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required > </input> 
					</div>
					
					<div class="form-row">
							<label class="form-label"> E-mail  </label>
							<input type="email" name="email" size="100" value="'.$lignes->email.'" ></input> 
					</div>
					
					<div class="form-row">
							<label class="form-label"> Telephone  </label>
							<input type="text" name="tel"  size="100" value="'.$lignes->telephone.'"  pattern="^\d{10}$"> </input> 
							<input type="hidden" name="photo"  size="100" value="'.$lignes->photo.'" > </input> 
							
					</div>
                    <div class="form-row">
						<label class="form-label"> Delegu&eacute  </label>
						<input type="checkbox" name="delegue" '.$checked.' />
					</div>
					<div class="form-row">
							<label class="form-label"> Modifier l\'entreprise </label>
         
					<div class="form-item" style="overflow: inherit;">';?>
						<?php if($entreprises->rowCount()>0){ ?>
							<select name="entreprise">
							<?php
							while($lignes2=$entreprises->fetch(PDO::FETCH_OBJ))
								{?>
									<option <?php echo "value=".$lignes2->id;
									if($lignes->id_entreprise==$lignes2->id)
									echo"selected";
									echo">".$lignes2->nom_entreprise."</option>" ;?>						
							<?php }
							echo'</select>';
					  }else {echo '<a class="ajout_href" href="../Entreprises/ajout">Ajouter entreprise</a>';}	
					echo '</div>
				</div>
			</div>
		  </div>
		 
	  
      <div class="box grid_12">
        <div class="box-head"><h2>Identit&eacute; visuelle</h2></div>
        <div class="box-content">
			<div class="form-row">
				<label class="form-label"> Changer photo etudiant  </label>
				<input type="file" name="pic_stud" value="'.$lignes->photo.'" />
				<img height="165" src="../upload/'.$lignes->photo.'" alt="photo" />
				<input type="hidden" name="quoi" value="eleve"/>
			</div>
		</div>
      </div>
        
		
     
		<div class="class_button">
			<input type="submit" value="Modifier" class="button big black">
			<input type="reset" value="Vider" class="button big red">
		</div>
		';
			
			}
	
		}
	 
}

// s'il est deja pass&eacute; par le formulaire
if(isset($_GET["quoi"])){
	if($_GET["quoi"]=="eleve"){
		 afficher_eleve_modif();
	}
	else if($_GET["quoi"]=="entreprise"){

		afficher_entreprise_modif();

	}
	else if($_GET["quoi"]=="utilisateur"){
		afficher_utilisateur_modif();
	}
	else if($_GET["quoi"]=="dates_absence"){
		afficher_dates();
	}else if($_GET["quoi"]=="absent"){
		afficher_absents();
		
	}
       
            
    // s'il est pas pass&eacute; par le formulaire
	else {
	echo "Vous avez pas l'acc&eacute;s a cette page!!";
	header( "refresh:5;url=../index.php" );
	}

}
?>

