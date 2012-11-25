<!doctype html>
<html lang="FR">
 <?php  include 'Head.php';  ?>
 <?php  include 'menu.php'; ?>
	
 
<body>

   <?php 
	   include_once '../controllers/DTOEleve.php';
	   $eleve=afficher_eleves();
   ?>


  <div id="contenty" class="content container_12">
	
	<form name="absence" action="../fonction/absence_fonction.php" method="POST" >

		<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Liste Des Eleves :</h2></div>
			<div class="box-content" style="height:700px;margin-bottom:10px;">
				
								<?php
									if(isset($_COOKIE["absent_set"])){
										echo " <div id='end' class='notif-msg small-mg'> 
												L'absence est d&eacute;ja valid&eacute;
												<span style='color:red;font-weight:bolder;'>Vous pouvez pas le modifi&eacute; !</span>
											   </div>";
									}else{

									while($lignes=$eleve->fetch(PDO::FETCH_OBJ))
									{?>
										<div class="one_pic">
											<img height="300" width="75" src="../upload/<?php echo $lignes->photo;?>" alt="" title="" class="pic" />
											<div class="check" style="text-align:center">
												<span> Absent(e) ?</span>
												<input type="checkbox" name="absents[]" id="absents[]"  class="checkbox" value="<?php echo $lignes->id ; ?>" />
											</div>
											<div class="info">
												<span> <?php echo $lignes->nom ; ?> </span><br/>
												<span> <?php echo $lignes->prenom ; ?> </span><br/>
											</div>
											
										</div>
									<?php 
									}
									?>
											
						
					<input type="hidden" name="quoi" value="absence"/>			
			</div>
		<div class="class_button" style="width:81px;">
			<input type="submit" value="Valider" class="button big black">
		</div>
		  
	  </form>
          
		
  </div>
<?php } ?>


<script type="text/javascript">	
			
			Modernizr.load({
				test: Modernizr.csstransforms3d && Modernizr.csstransitions,
				yep : ['http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js','../js/jquery.hoverfold.js'],
				nope: 'css/fallback.css',
				callback : function( url, result, key ) {
						
					if( url === '../js/jquery.hoverfold.js' ) {
						$( '#grid' ).hoverfold();
					}

				}
			});
				
</script>

</body>


</html>