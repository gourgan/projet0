<!doctype html>
<html lang="FR">
 <?php  
	
	include '../Head.php';  
	include '../menu.php';  

   ?>

<body onclose="valider();">
  <div id="contenty" class="content container_12">
	<?php if(isset($_GET["saved"])){
	//on recoient les eleves absents to get their informations from database
	$eleves_abs=$_SESSION['absents_req'];
    include_once '../controllers/DTOabsence.php';
    $absence=afficher_absence_temp($eleves_abs);
	?>
		
	  <form id="absenceform" name="absenceform" action="../fonction/absence_fonction.php" method="POST" >

		<div class="box grid_6">
			<div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Enregistrement d'absence :</h2></div>
			<div id="absence-content" class="box-content" style="height:700px;margin-bottom:10px;">
				 <div id="end" class="notif-msg small-mg" > 
					L'absence est enregistr&eacute; avec succ&eacute;s , il vous reste encore
					<span id="bip" style="color:red;font-weight:bolder;"></span>
					pour qu'il soit valid&eacute; 
				 </div>
				 	<?php
						while($lignes=$absence->fetch(PDO::FETCH_OBJ))
						{?>
							<div class="one_pic">
								<img height="300" width="75" src="../upload/<?php echo $lignes->photo;?>" alt="" title="" class="pic" />
								<div class="check" style="text-align:center">
									<span> Absent(e) ?</span>
									<input type="checkbox" name="absents[]" id="absents[]" class="checkbox" value="<?php echo $lignes->id ; ?>" checked/>
							
								</div>
								<div class="info">
									<span> <?php echo $lignes->nom; ?> </span><br/>
									<span> <?php echo $lignes->prenom; ?> </span><br/>
								</div>
							</div>
					<?php } ?>
			</div>
			
			
			
		<div class="class_button" style="width:251px;font-weight:bold;">
			<input type="submit" value="modifier" name="modifier" class="button big black">
			<input type="submit" value="Valider definitivement" name="valider" class="button big green">
		</div>
		  
          
		
		</div>
	  </form>
	<?php } else if(isset($_GET["ok"])){
						echo " 
						<div class='ad-notif-success grid_12 small-mg' 
							style='padding:10px;color:green;font-weight:bold;display:block !important;'> 
							L'absence a &eacute;t&eacute; bien valid&eacute; !<br/>
							Merci...
						</div>";
					}else if(isset($_GET["noabsents"])){
						echo " 
						<div class='ad-notif-success grid_12 small-mg' 
							style='padding:10px;color:green;font-weight:bold;display:block !important;'> 
							Tout le monde est present aujourd'hui !<br/>
							Merci...
						</div>";
					}
				?>
   </div>


</body>

<script>

var times=getCookie("times");
var timems=getCookie("timems");
if (times!=null && times!="" && times!=0)
{
	counter=times;
	timems=counter*1000;
}else
{
	counter=36;
	times=counter;
	timems=times*1000;
	setCookie("times",times,1);
	setCookie("timems",timems,1);
	
}
  
start();

function action()
{
  clearInterval(intervalId);
  document.getElementById("end").innerHTML = "C'est TERMINE : L'absence est en cours de validation!! ... ";	
  document.absenceform.quoi.value="valider";
  document.forms["absenceform"].submit();
}
function conversion_seconde_heure(time) {
	var reste=time;
	var result='';

	var nbJours=Math.floor(reste/(3600*24));
	reste -= nbJours*24*3600;

	var nbHours=Math.floor(reste/3600);
	reste -= nbHours*3600;

	var nbMinutes=Math.floor(reste/60);
	reste -= nbMinutes*60;

	var nbSeconds=reste;

	if (nbJours>0)
		result=result+nbJours+'j ';

	if (nbHours>0)
		result=result+nbHours+'h ';

	if (nbMinutes>0)
		result=result+nbMinutes+'min ';

	if (nbSeconds>0)
		result=result+nbSeconds+'s ';

	return result;
}
function bip()
{	
  document.getElementById("bip").innerHTML = conversion_seconde_heure(counter);
  counter--;
  timems=counter*1000;
  setCookie("times",counter,1);
  setCookie("timems",timems,1);
  
}
function start()
{
  intervalId = setInterval(bip, 1000);
  setTimeout(action,timems);
}

function getCookie(c_name)
{
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
  {
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}

function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}


/* Validation de l'absence en cas de fermeture de la page */
//pas f&eacute;

</script>

</html>