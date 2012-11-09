<div class="header">
   <a href="../index.php"><img alt="Logo" src="../img/logo.png"></a> 

</div>
<div class="top-bar">
      <ul id="nav">
        <li id="user-panel">
          <img src="../img/nav/usr-avatar.jpg" id="usr-avatar" alt="" />
          <div id="usr-info">
            <p id="usr-name">Bonjour, <?php echo $_SESSION["gdusername"] ; ?>.</p>
            <p id="usr-notif">Vous êtes un <a><?php echo $_SESSION["gdrole"] ; ?> </a></p>
            <p><a href="modifier_acteur.php">Modifier votre Compte</a><a href="../fonction/verification.php?logout">Log out</a></p>
          </div>
        </li>
        <li>
        <ul id="top-nav">
        <?php if($_SESSION["gdrole"]=="intervenant"){ ?>
			<li class="nav-item">
			   <a href="../view/ajouter_absence.php"><img src="../img/nav/widgets.png" alt="" /><p>Absence</p></a>
		    </li>
		<?php } else{ ?>

		<li class="nav-item">
           <a href="#"><img src="../img/nav/dash-active.png" alt="" /><p>Eleve</p></a>
		   <ul class="sub-nav">
            <li><a href="../view/ajouter_eleve.php">Ajouter</a></li>
            <li><a href="../view/modifier_eleve.php">Modifier</a></li>
			 <li><a href="../view/supprimer_eleve.php">supprimer</a></li>
          </ul>
         </li>
		  <li class="nav-item">
           <a href="#"><img src="../img/nav/cal.png" alt="" /><p>Entreprise</p></a>
		   <ul class="sub-nav">
		   <li><a href="../view/ajouter_entreprise.php">Ajouter</a></li>
            <li><a href="../view/modifier_entreprise.php">Modifier</a></li>
			 <li><a href="../view/supprimer_entreprise.php">supprimer</a></li>
			 </ul>
         </li>
         <li class="nav-item">
           <a href="#"><img src="../img/nav/anlt.png" alt="" /><p>Intervenant</p></a>
		   <ul class="sub-nav">
		   <li><a href="../view/ajouter_intervenant.php">Ajouter</a></li>
            <li><a href="../view/modifier_intervenant.php">Modifier</a></li>
			 <li><a href="../view/supprimer_intervenant.php">supprimer</a></li>
			 </ul>
         </li>
         <li class="nav-item">
           <a href="#"><img src="../img/nav/tb.png" alt="" /><p>Acteur</p></a>
		   <ul class="sub-nav">
		   <li><a href="../view/ajouter_acteur.php">Ajouter</a></li>
            <li><a href="../view/modifier_acteur.php">Modifier</a></li>
			 <li><a href="../view/supprimer_acteur.php">supprimer</a></li>
			 </ul>
         </li>
        
         <li class="nav-item">
           <a href="#"><img src="../img/nav/widgets.png" alt="" /><p>Absence</p></a>
		   <ul class="sub-nav">
		   <li><a href="../view/ajouter_absence.php">ajouter Absence</a></li>
		   <li><a href="../view/justifier_absence.php">Justifier Absence</a></li>
            <li><a href="../view/dernier_absent.php">Dernier Absents</a></li>
			 <li><a href="../view/supprimer_acteur.php">supprimer</a></li>
			 </ul>
         </li>
         </li>
		 
         <li class="nav-item">
           <a href="grid.html"><img src="../img/nav/grid.png" alt="" /><p>Importer Absence</p></a>
           <ul class="sub-nav">
            <li><a href="../view/importer_fichier.php?format=pdf">En PDF</a></li>
            <li><a href="../view/importer_fichier.php?format=cvs">En CVS</a></li>
          </ul>
         </li>
		 <?php } ?>
       </ul>
      </li>
     </ul>
</div>
