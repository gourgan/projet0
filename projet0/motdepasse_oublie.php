<?php
 include_once('fonction/check.php');
 ?>
<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Gestion des absences - Identification</title>
  <!---CSS Files-->
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/login.css">
  <!---jQuery Files-->
  <script src="js/jquery-1.7.1.min.js"></script>
  <script src="js/jquery.spinner.js"></script>
  <script type="text/javascript" src="js/forms/jquery.validate.min.js"></script>
    <script>
    $(document).ready(function () {
       $('div.wrapper').hide();
        $('div.wrapper').fadeIn(1200);
        $('#lg-form').validate();
        $('.submit').click(function() {
        var $this = $(this);
        $this.spinner();
        setTimeout(function() {
                $this.spinner('remove');
        }, 1000);
       });
    });
  </script>
</head>
<body>
	<div class="wrapper">
	   <div class="log_content">
			<div class="logo"></div>
			<div class="logo_lp"></div>
	   </div>
   <div class="lg-body">
     <div class="inner">
       <div id="lg-head">
         <p><span class="font-bold">Mot de passe oublié </span> <a href="#"><span class="font-bold" style="float:right">Retourner a l'acceuil </span></a> </p>
         <div class="separator"></div>
       </div>
       <div class="login">
         <?php if(isset($_GET["error"])){
					echo" 
					<div id='login-msg'>
						<p class='font-bold'>Email invalide ! <p>
					</div>";
				}else if(isset($_GET["ok"])){
					echo" 
					<div id='login-msg'>
						<p class='font-bold'>Le nouveau mot de passe est envoyé a votre email ! <p>
					</div>";
				}
		?>
		 <form id="lg-form" method="post" action="fonction/verification.php">
           <fieldset>
              <ul>
                 <li id="usr-field">
                  <input class="input required" name="email" type="text" size="40" minlength ="1" placeholder="email..." />
                  <span id="usr-field-icon"></span>
                 </li>
                 <li>
                  <input class="submit button green" type="submit" value="Valider"/>
                 </li>
				 <div id="login-msg">
						Vous avez oublié votre mot de passe ? 
						Indiquez votre adresse e-mail et nous vous en renverrons a nouveau 
						
				</div>
              </ul>
           </fieldset>
          </form>
        </div>
     </div>
    </div>
 
	</div>
</body>

</html>
