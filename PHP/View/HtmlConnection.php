<?php
// Formulaire de connexion qui vérifie que les informations de l'utilisateur ( pour info pseudo = admin et Mot de passe = admin )
?>
<div class="formConnection">
	<form class='form'  method="post" action="<?php echo serverRoot; ?>?action=connect"><!--connect renvoie à FormConnection-->
			<!--<legend>Bienvenue dans votre espace de connexion, merci de renseigner les informations necéssaires</legend>-->
			<!-- Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée -->
			<div class='title'><h3>Bienvenue dans votre espace de connexion</h3></div>
			<div class="underTitle"><h3>Veuillez vous identifier</h3></div>
			<label for="name">Nom de l'utilisateur</label>
			<input type='text' class='formulaire' name='pseudo' required> 
			<label for="name">Mot de passe</label>
			<input type='password' class='formulaire' name='password' required>
			<div class="button">
				<input type='submit' value='valider' class='button' />
				<input type='reset' value='annuler' class='button' />
			</div>	
			<div class="ligne">
				<a href="<?php echo serverRoot; ?>?action=registration">Pas encore inscrit ?</a>
			</div>
	</form>
</div>


