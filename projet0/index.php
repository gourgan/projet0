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
         <p><span class="font-bold">Gestion des absences </span> </p>
         <div class="separator"></div>
       </div>
       <div class="login">
         <?php if(isset($_GET["rep"]) and isset($_SESSION['error'])){
					echo" 
					<div id='login-msg'>
						<p class='font-bold'>Nom d'utilisateur ou mot de passe Invalide!!!<p>
					</div>";
				}
		?>
		 <form id="lg-form" method="post" action="fonction/verification.php">
           <fieldset>
              <ul>
                 <li id="usr-field">
                  <input class="input required" name="utilisateur" type="text" size="30" minlength ="1" placeholder="Utilisateur..." />
                  <span id="usr-field-icon"></span>
                 </li>
                 <li id="psw-field">
                  <input class="input required" name="pass" type="password" size="30" minlength="1" placeholder="Mot de passe..." />
                  <span id="psw-field-icon"></span>
                 </li>
                 <li>
                  <input class="submit button green" type="submit" value="S'identifier"/>
                 </li>
              </ul>
           </fieldset>
          </form>
          <span id="lost-psw">
           <a href="motdepasse_oublie.php">Mot de passe oubli&eacute;?</a>
          </span>
        </div>
     </div>
    </div>
 
	</div>
</body>

</html>
