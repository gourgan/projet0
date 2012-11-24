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
			   <a href="../Absences/ajout.php"><img src="../img/nav/widgets.png" alt="" /><p>Absence</p></a>
		    </li>
		<?php } else{ ?>

		<li class="nav-item">
           <a href="../Eleves/list"><img alt="" src="../img/icons/anlt.png"><p>Eleve</p></a>
		   <ul class="sub-nav">
            <li><a href="../Eleves/ajout">Ajouter</a></li>
            <li><a href="../Eleves/modification">Modifier</a></li>
            <li><a href="../Eleves/suppression">Supprimer</a></li>
            <li><a href="../Eleves/list">Liste</a></li>
          </ul>
         </li>
		  <li class="nav-item">
           <a href="../Entreprises/list"><img alt="" src="../img/icons/anlt.png"><p>Entreprise</p></a>
		   <ul class="sub-nav">
		    <li><a href="../Entreprises/ajout">Ajouter</a></li>
                    <li><a href="../Entreprises/modification">Modifier</a></li>
		    <li><a href="../Entreprises/suppression">Supprimer</a></li>
		    <li><a href="../Entreprises/list">Liste</a></li>
			 </ul>
         </li>
         <li class="nav-item">
           <a href="../Utilisateurs/list"><img alt="" src="../img/icons/anlt.png"><p>Utilisateur</p></a>
		   <ul class="sub-nav">
		   <li><a href="../Utilisateurs/ajout">Ajouter</a></li>
            <li><a href="../Utilisateurs/modification">Modifier</a></li>
			 <li><a href="../Utilisateurs/suppression">Supprimer</a></li>
			 <li><a href="../Utilisateurs/list">Liste</a></li>
			 </ul>
         </li>
        
         <li class="nav-item">
           <a href="../Absences/derniers_absents"><img alt="" src="../img/icons/anlt.png"><p>Absence</p></a>
		   <ul class="sub-nav">
		   <li><a href="../Absences/ajout">Ajouter</a></li>
		   <li><a href="../Absences/justification">Justifier</a></li>
                   <li><a href="../Absences/derniers_absents">Derniers Abs</a></li>
			 
			 </ul>
         </li>
         </li>
		 
         <li class="nav-item">
           <a href="../Importation/both"><p><img alt="" src="../img/icons/anlt.png">PDF/CVS</p></a>
           <ul class="sub-nav">
            <li><a href="../Importation/pdf">En PDF</a></li>
            <li><a href="../Importation/csv">En CSV</a></li>
          </ul>
         </li>
		 <?php } ?>
       </ul>
      </li>
     </ul>
</div>
