<div id="contenu">
      <h2>Identification utilisateur</h2>


<form method="POST" action="index.php?uc=connexion&action=valideConnexion">
	<p>
            <input id="login" type="text" class="form-control" name="login"  size="30" maxlength="45" placeholder="Login">
      </p>
		<p>
			<input id="mdp"  type="password"  class="form-control" name="mdp" size="30" maxlength="45" placeholder="Mot de passe">
            </p>
            <input type="submit" class="btn btn-primary" value="Valider" name="valider">
            <input type="reset" class="btn btn-primary" value="Annuler" name="annuler"> 
      </p>
</form>

</div>