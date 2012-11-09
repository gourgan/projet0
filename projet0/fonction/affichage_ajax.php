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
						<label class="form-label"> Intitulé </label>
						<input type="text" name="intitule" value="'.$lignes->nom.'" size="100" /> 
					</div>
					
					<div class="form-row">
							<label class="form-label"> adresse  </label>
							<input type="text" name="adresse" value="'.$lignes->adresse.'" size="100" />
					</div>
					
					<div class="form-row">
							<label class="form-label"> Telephone  </label>
							<input type="text" name="tel" value="'.$lignes->telephone.'" size="100" />
					</div>
					
					<div class="form-row">
							<label class="form-label"> E-mail  </label>
							<input type="text" name="email" value="'.$lignes->email.'" size="100" />
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

function afficher_acteur_modif(){
include_once("../controllers/DTOacteur.php");

//ajax afichage acteur pour modif
	$id=$_GET["id"];
	$acteur=afficher_acteurs();
	while($lignes=$acteur->fetch(PDO::FETCH_OBJ))
		{
			if($lignes->id==$id){
			
			echo'
			<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Information Personnelles</h2></div>
			<div class="box-content">

					<div class="form-row">
						<label class="form-label"> Login </label>
						<input type="text" name="login" value="'.$lignes->login.'" size="100" /> 
					</div>
					<div class="form-row">
							<label class="form-label"> Ancien mot de passe  </label>
							<input type="password" name="anc_password" value="" size="100" />
					</div>
					<div class="form-row">
							<label class="form-label"> nouveau mot de passe  </label>
							<input type="password" name="password" value="" size="100" />
					</div>
					
					<div class="form-row">
							<label class="form-label"> E-mail  </label>
							<input type="text" name="email" value="'.$lignes->email.'" size="100" />
					</div>
						
					<div class="form-row">
							<label class="form-label"> Modifier le role </label>
         
					<div class="form-item">
								<select name="role">';?>
									
									<option value="Responsable" <?php if($lignes->role=="Responsable"){echo"selected";} ?>>Responsable</option>
									<option value="Secretaire" <?php if($lignes->role=="Secretaire"){echo"selected";} ?>>Secretaire</option>
									<option value="Intervenant" <?php if($lignes->role=="Intervenant"){echo"selected";} ?>>Intervenant</option>
								
							<?php echo'</select>
							</div>
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

//ajax afichage eleve pour modif
	$id=$_GET["id"];
	$dates=get_absence_dates($id);
			echo'
			<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Information Personnelles</h2></div>
			<div class="box-content">

					<div class="form-row">
						<label class="form-label"> Nom </label>
						<select name="entreprise">';?>
							<?php while($lignes2=$dates->fetch(PDO::FETCH_OBJ))
								{?>
								 <option <?php echo "value=".$lignes2->id;
									echo">".$lignes2->date."</option>" ;?>						
							<?php }echo'
						</select>
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
	
function afficher_intervenant_modif(){
include_once("../controllers/DTOintervenant.php");

//ajax afichage eleve pour modif
	$id=$_GET["id"];
	$intervenant=afficher_intervenants();
	while($lignes=$intervenant->fetch(PDO::FETCH_OBJ))
		{
			if($lignes->id==$id){
			
			echo'
			<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Information Personnelles</h2></div>
			<div class="box-content">

					<div class="form-row">
						<label class="form-label"> Nom </label>
						<input type="text" name="nom" value="'.$lignes->nom.'" size="100" /> 
					</div>
					
					<div class="form-row">
							<label class="form-label"> Prénom  </label>
							<input type="text" name="prenom" value="'.$lignes->prenom.'" size="100" />
					</div>
					
					<div class="form-row">
							<label class="form-label"> E-mail  </label>
							<input type="text" name="email" value="'.$lignes->email.'" size="100" />
					</div>
					
					<div class="form-row">
							<label class="form-label"> Telephone  </label>
							<input type="text" name="tel" value="'.$lignes->tel.'" size="100" />
					</div>
					<div class="form-row">
							<label class="form-label"> Alias  </label>
							<input type="text" name="alias" value="'.$lignes->alias.'" size="100" />
							<input type="hidden" name="picture"  size="100" value="'.$lignes->picture.'" > </input> 

					</div>
			
			</div>
		  </div>
		 
	  
      <div class="box grid_12">
        <div class="box-head"><h2>Identité visuelle</h2></div>
        <div class="box-content">
			<div class="form-row">
				<label class="form-label"> Changer photo intervenant  </label>
				<input type="file" name="pic_int" />
				<img height="165" src="../upload/'.$lignes->picture.'" alt="photo" />
				<input type="hidden" name="quoi" value="intervenant"/>
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
$absent=afficher_absence_selondate($_GET["la_date"]);


  echo '<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Derniers absent :</h2></div>
			<div class="box-content" style="height:700px;margin-bottom:10px;">';?>
				 
				 		<?php
									while($lignes=$absence->fetch(PDO::FETCH_OBJ))
									{?>
										<div class="one_pic">
											<img height="300" width="75" src="../upload/<?php 'echo $lignes->photo;'?>" alt="" title="" class="pic" />
											<div class="check" style="text-align:center">
												<span> Absent(e) ?</span>
												<input type="checkbox" name="absents[]" id="absents[]" class="checkbox" value="<?php echo '$lignes->id;' ?>" checked/>
											</div>
											<div class="info">
												<span> <?php echo '$lignes->nom;' ?> </span><br/>
												<span> <?php echo '$lignes->prenom;' ?> </span><br/>
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
			
			echo'
			<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Information Personnelles</h2></div>
			<div class="box-content">

					<div class="form-row">
						<label class="form-label"> Nom </label>
						<input type="text" name="nom" size="100" value="'.$lignes->nom.'" >   </input> 
					</div>
					
					<div class="form-row">
							<label class="form-label"> Prénom  </label>
							<input type="text" name="prenom"  size="100"  value="'.$lignes->prenom.'"> </input> 
					</div>
					
					<div class="form-row">
							<label class="form-label"> E-mail  </label>
							<input type="text" name="email" size="100" value="'.$lignes->email.'" ></input> 
					</div>
					
					<div class="form-row">
							<label class="form-label"> Telephone  </label>
							<input type="text" name="tel"  size="100" value="'.$lignes->telephone.'" > </input> 
							<input type="hidden" name="photo"  size="100" value="'.$lignes->photo.'" > </input> 
							
					</div>
					<div class="form-row">
							<label class="form-label"> Modifier l entreprise </label>
         
					<div class="form-item">
								<select name="entreprise">';?>
							<?php while($lignes2=$entreprises->fetch(PDO::FETCH_OBJ))
								{?>
									<option <?php echo "value=".$lignes2->id;
									if($lignes->id_entreprise==$lignes2->id)
									echo"selected";
									echo">".$lignes2->nom."</option>" ;?>						
							<?php }echo'</select>
							</div>
					</div>
			</div>
		  </div>
		 
	  
      <div class="box grid_12">
        <div class="box-head"><h2>Identité visuelle</h2></div>
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

// s'il est deja passé par le formulaire
if(isset($_GET["quoi"])){
	if($_GET["quoi"]=="eleve"){
		 afficher_eleve_modif();
	}
	else if($_GET["quoi"]=="entreprise"){
		afficher_entreprise_modif();

	}
	else if($_GET["quoi"]=="acteur"){
		afficher_acteur_modif();
	}
	else if($_GET["quoi"]=="intervenant"){
		afficher_intervenant_modif();
	}
	else if($_GET["quoi"]=="dates_absence"){
		afficher_dates();
	}else if($_GET["quoi"]=="absent"){
		afficher_absents();
		
	}// s'il est pas passé par le formulaire
	else {
	echo "Vous avez pas l'accés a cette page!!";
	header( "refresh:5;url=../index.php" );
	}

}?>

