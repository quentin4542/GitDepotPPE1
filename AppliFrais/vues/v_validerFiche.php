<div id="contenu">
    <h3 class="text-center">Fiche de frais du mois <?php echo $numMois."-".$numAnnee?> : </h3>
      <div class="encadre" >
        <p>Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?> <br> Montant validé : <?php echo $montantValide?></p>
        <table class="listeLegere">
          <form action="index.php?uc=comptable&action=changerForfaits" method = "POST">
            <?php echo('<input type="hidden" name="lstMois" value="'.$_GET["lstMois"].'">');
                  echo('<input type="hidden" name="lstVisiteur" value="'.$_GET["lstVisiteur"].'">');

            ?>
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
                <td class="qteForfait"><input type="text" id="<?php echo $id ?>" name="<?php echo $id ?>" class="form-control" style="text-align:center;" value="<?php echo $quantite ?>" ></td>
                <?php
                    $id += 1;
                  }
                ?>
                <td><input type ="submit" value ="Corriger" class="btn btn-primary"></td>
            </tr>
          </form>
        </table>
        <table class="listeLegere">
        <form action="index.php?uc=comptable&action=justificatif" method="POST">
          <?php echo('<input type="hidden" name="lstMois" value="'.$_GET["lstMois"].'">');
                echo('<input type="hidden" name="lstVisiteur" value="'.$_GET["lstVisiteur"].'">');
          ?>
          <tr>
            <td colspan="4">
              </br>
              <legend>Descriptif des éléments hors forfait<input name ="modifJusti" id ="modifJusti" type="text" value="<?php echo $nbJustificatifs ?>" class="btn btn-sm" style="text-align:center;"> justificatifs reçus > 
              <input type ="submit" value ="Corriger" class="btn btn-primary"></legend>
            </br>
            </td>

          </tr>
        </form>
        
        
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
                $idFrais = $unFraisHorsForfait['id'];
            ?>

            <form action="index.php?uc=comptable&action=modification" method="POST">
          <?php echo('<input type="hidden" name="lstMois" value="'.$_GET["lstMois"].'">');
                echo('<input type="hidden" name="lstVisiteur" value="'.$_GET["lstVisiteur"].'">');
                echo('<input type="hidden" name="idFrais" value="'.$idFrais.'">');
          ?>
            <tr>
              <td><input name="modifDate" id="modifDate" type="text" class="form-control" style="text-align:center;" value="<?php echo $date ?>" ></td>
              <td><input name="modifLibelle" id="modifLibelles" type="text" class="form-control" style="text-align:center;" value="<?php echo $libelle ?>" ></td>
              <td><input name="modifMontant" id="modifMontant" type="text" class="form-control" style="text-align:center;" value="<?php echo $montant ?>" ></td>
              
              <td><input type="submit" value="V" class="btn btn-success"></td>
              
              <td><input type="reset" value="-" class="btn btn-secondary"></td>
              </form>

              <form action="index.php?uc=comptable&action=suppression" method="POST">
              <?php echo('<input type="hidden" name="lstMois" value="'.$_GET["lstMois"].'">');
                    echo('<input type="hidden" name="lstVisiteur" value="'.$_GET["lstVisiteur"].'">');
                    echo('<input type="hidden" name="idFrais" value="'.$idFrais.'">');
              ?>
              <td><input type="submit" value="X" class="btn btn-danger"></td>

              </form>

              <form action="index.php?uc=comptable&action=ajout" method="POST">
              <?php echo('<input type="hidden" name="lstMois" value="'.$_GET["lstMois"].'">');
                    echo('<input type="hidden" name="lstVisiteur" value="'.$_GET["lstVisiteur"].'">');
                    echo('<input type="hidden" name="idFrais" value="'.$idFrais.'">');
              ?>
              
              <td><input type="submit" value="o" class="btn btn-secondary"></td>

              </form>
            </tr>

            <?php } ?>
        </table>
      </div>
    </div>
</div>
