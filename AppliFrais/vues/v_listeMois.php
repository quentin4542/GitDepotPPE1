<div class="row">
  <div class="col">
    <h2>Mes fiches de frais</h2>
    <h3>Mois à sélectionner : </h3>
    <form action="index.php?uc=etatFrais&action=voirEtatFrais" method="post">
      <div class="corpsForm">
        <p>
          <label for="lstMois" accesskey="n">Mois : </label>
          <select class="form-control" id="lstMois" name="lstMois">
          <?php
            foreach ($lesMois as $unMois)
            {
              $mois = $unMois['mois'];
              $numAnnee =  $unMois['numAnnee'];
              $numMois =  $unMois['numMois'];
              if($mois == $moisASelectionner){
              ?>
                <option selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
              <?php 
              }
              else{ ?>
                <option value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
              <?php 
              }
            } ?>    
          </select>
        </p>
      </div>
      <div class="piedForm">
        <p>
          <input class="btn btn-primary" id="ok" type="submit" value="Valider" size="20" />
          <input class="btn btn-primary" id="annuler" type="reset" value="Effacer" size="20" />
        </p> 
      </div>
    </form>
  </div>