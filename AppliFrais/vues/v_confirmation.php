<div id="contenu">
    <h3 class="text-center">Fiche de frais du mois <?php echo $numMois."-".$numAnnee?> : </h3>
      <div class="encadre" >
        <p>Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?> <br> Montant validé : <?php echo $montantValide?></p>
        </br>

       <tr>
            <form action="index.php?uc=comptable&action=rembourser" method="POST">
              <?php echo('<input type="hidden" name="lstMois" value="'.$_GET["lstMois"].'">');
                    echo('<input type="hidden" name="lstVisiteur" value="'.$_GET["lstVisiteur"].'">');
              ?>
              
              <th><input type="submit" value="REMBOURSER" class="form-control"></th>

              </form>

            <form action="index.php?uc=comptable&action=creer" method="POST">
              <?php echo('<input type="hidden" name="lstMois" value="'.$_GET["lstMois"].'">');
                    echo('<input type="hidden" name="lstVisiteur" value="'.$_GET["lstVisiteur"].'">');
              ?>
              
              <th><input type="submit" value="CREER" class="form-control"></th>

              </form>

            <form action="index.php?uc=comptable&action=saisie" method="POST">
              <?php echo('<input type="hidden" name="lstMois" value="'.$_GET["lstMois"].'">');
                    echo('<input type="hidden" name="lstVisiteur" value="'.$_GET["lstVisiteur"].'">');
              ?>
              
              <td><input type="submit" value="SAISIE" class="form-control"></td>

              </form>

            <form action="index.php?uc=comptable&action=valider" method="POST">
              <?php echo('<input type="hidden" name="lstMois" value="'.$_GET["lstMois"].'">');
                    echo('<input type="hidden" name="lstVisiteur" value="'.$_GET["lstVisiteur"].'">');
              ?>
              
              <td><input type="submit" value="VALIDER" class="form-control"></td>

              </form>
        </tr>

        <table class="listeLegere">
          <legend>Eléments forfaitisés </legend>
            <tr>
              <?php
                foreach ( $lesFraisForfait as $unFraisForfait ) 
                {
                  $libelle = $unFraisForfait['libelle'];
              ?>
              <th> <?php echo $libelle?> </th>
              <?php } ?>
            </tr>
            <tr>
              <?php
                foreach (  $lesFraisForfait as $unFraisForfait  ) 
                {
                  $quantite = $unFraisForfait['quantite'];
                    ?>
                  <td class="qteForfait" style="text-align:center;" ><?php echo $quantite ?> </td>
                  <?php
                }
              ?>
              
            </tr>
        </table>
        <table class="listeLegere">
          <legend>Descriptif des éléments hors forfait -<?php echo $nbJustificatifs ?> justificatifs reçus -
          </legend>
            <tr>
              <th class="date">Date</th>
              <th class="libelle">Libellé</th>
              <th class='montant'>Montant</th>                
            </tr>
            <?php      
              foreach ( $lesFraisHorsForfait as $unFraisHorsForfait ) 
              {
                $date = $unFraisHorsForfait['date'];
                $libelle = $unFraisHorsForfait['libelle'];
                $montant = $unFraisHorsForfait['montant'];
            ?>
            <tr>
              <td><?php echo $date ?></td>
              <td><?php echo $libelle ?></td>
              <td><?php echo $montant ?></td>
            </tr>
            <?php } ?>
        </table>
      </div>
      </div>
    </div>
</div>