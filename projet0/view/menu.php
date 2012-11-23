<div class="header">
   <a href="../index.php"><img alt="Logo" src="../img/logo.png"></a> 

</div>
<div class="top-bar">
      <ul id="nav">
        <li id="user-panel">
          <img src="../img/nav/<?php echo$_SESSION["gdrole"]; ?>.jpg" id="usr-avatar" alt="" />
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
           <a href="#"><p>Eleve</p></a>
		   <ul class="sub-nav">
            <li><a href="../view/ajouter_eleve.php">Ajouter</a></li>
            <li><a href="../view/modifier_eleve.php">Modifier</a></li>
			 <li><a href="../view/supprimer_eleve.php">supprimer</a></li>
          </ul>
         </li>
		  <li class="nav-item">
           <a href="#"><p>Entreprise</p></a>
		   <ul class="sub-nav">
		   <li><a href="../view/ajouter_entreprise.php">Ajouter</a></li>
            <li><a href="../view/modifier_entreprise.php">Modifier</a></li>
			 <li><a href="../view/supprimer_entreprise.php">supprimer</a></li>
			 </ul>
         </li>
         <li class="nav-item">
           <a href="#"><p>Utilisateur</p></a>
		   <ul class="sub-nav">
		   <li><a href="../view/ajouter_utilisateur.php">Ajouter</a></li>
            <li><a href="../view/modifier_utilisateur.php">Modifier</a></li>
			 <li><a href="..//supprimer_utilisateur.php">supprimer</a></li>
			 </ul>
         </li>
        
         <li class="nav-item">
           <a href="#"><p>Absence</p></a>
		   <ul class="sub-nav">
		   <li><a href="../view/ajouter_absence.php">Ajouter</a></li>
		   <li><a href="../view/justifier_absence.php">Justifier</a></li>
            <li><a href="../view/dernier_absent.php">Derniers Abs</a></li>
			 <li><a href="../view/supprimer_acteur.php">supprimer</a></li>
			 </ul>
         </li>
         </li>
		 
         <li class="nav-item">
           <a href="../view/pdf-csv.php"><p>PDF/CVS</p></a>
           <ul class="sub-nav">
            <li><a href="../view/pdf-csv.php?format=pdf">En PDF</a></li>
            <li><a href="../view/pdf-csv.php?format=cvs">En CSV</a></li>
          </ul>
         </li>
		 <?php } ?>
       </ul>
      </li>
     </ul>
</div>
