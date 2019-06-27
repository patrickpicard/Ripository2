<!--Formulaire d'inscription-->
<div class="formConnection">
    <form class='form' method = "post" action="<?php echo serverRoot?>.?action=register" enctype="multipart/form-data">
    <h1>Inscription</h1>
            <label for="name">* Nom</label>
            <input name="name" type="text" id="name">
            <label for="firstName">* Prénom</label>
            <input name="firstName" type="text" id="firstName">
            <label for="pseudo">* Pseudo</label>
            <input name="pseudo" type="text" id="pseudo">
            <label for="password">* Mot de passe</label>
            <input type="password" name="password" id="password">
            <label for="confirm">* Confirmer le mot de passe</label> 
            <input type="password" name="confirm" id="confirm" />
        <p>Les champs précédés d'un * sont obligatoires</p>
        <p><input type="submit" value="S'inscrire"></p>
    </form>
</div>

