    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">

        <h2>

</h2>
    <?php if ($_SESSION['typeUser'] == "V") { ?>
      </div>
         <ul id="menuList">
            <li >
               Visiteur :<br>
               <?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?>
            </li>
            <li class="smenu">
               <a href="index.php?uc=gererFrais&action=saisirFrais" title="Saisie fiche de frais ">Saisie fiche de frais</a>
            </li>
            <li class="smenu">
               <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
            </li>
            <li class="smenu">
               <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
            </li>
         </ul>
      </div>
    <?php } else if($_SESSION['typeUser'] == "C") { ?>
         </div>
         <ul id="menuList">
            <li >
               Comptable :<br>
               <?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?>
            </li>
            <li class="smenu">
               <a href="index.php?uc=comptable&action=selectionnerMois" title="Valider fiche de frais ">Valider fiche de frais</a>
            </li>
            <li class="smenu">
               <a href="index.php?uc=comptable&action=selectionnerMoisC" title="Confirmation payement">Confirmation paiement</a>
            </li>
            <li class="smenu">
               <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
            </li>
         </ul>
      </div>
      <?php } ?>
