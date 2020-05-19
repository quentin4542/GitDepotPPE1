<div id="contenu">
    <h2>Validation des fiches de frais</h2>
    <h3>visiteur à sélectionner : </h3>
    <form>
      <input type = "hidden" name = "uc" value = "comptable">
      <input type = "hidden" name = "action" value = "validationC">
        <div class="corpsForm">
            <p>
                <label for="lstVisiteur" accesskey="n">Visiteur : </label>
                <select id="lstVisiteur" name="lstVisiteur">
                <?php
			        foreach ($visiteur as $v)
			        {
						$nomVisiteur = $v['nom'];
						$prenomVisiteur = $v['prenom'];
						$id = $v['id'];
				        ?>
				            <option class="form-control" selected value="<?php echo $id ?>"><?php echo  $nomVisiteur." ".$prenomVisiteur ?> </option>
				        <?php
                    }
		            ?>
                </select>
            </p>
            <p>
	            <label for="lstMois" accesskey="n">Mois : </label>
                <select id="lstMois" name="lstMois">
                <?php
			        foreach ($lesMois as $unMois)
			        {
			            $mois = $unMois['mois'];
				        $numAnnee =  $unMois['numAnnee'];
				        $numMois =  $unMois['numMois'];
				        ?>
				            <option class="form-control" selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				        <?php
			    	}
		        	?>
                </select>
            </p>
        </div>
      <div class="piedForm">
        <p>
            <input id="ok" type="submit" class="btn btn-primary" value="Valider" size="20" />
            <input id="annuler" type="reset" class="btn btn-danger" value="Effacer" size="20" />
        </p>
      </div>
    </form>
 </div>
