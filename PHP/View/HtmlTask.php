<?php
// Formulaire de connexion qui vérifie que les informations de l'utilisateur ( pour info pseudo = admin et Mot de passe = admin )
//include "Header.php";
$list = CategoryManager::getList();
?>
<div class="formConnection">
    <div class='title'><h1>Merci de renseigner votre nouvelle tâche</h1></div>
        <form class="form" method="post" action="<?php echo serverRoot; ?>?action=mainUser"><!--connect renvoie à FormConnection-->
                <!-- Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée -->
            <label for="name">Décrivez votre tâche</label>
            <input type='text' name='description' rows='2' cols='20' required>
            <label for="category">Choisissez une catégorie</label>
                <SELECT name='category' size='1' required>
                    <?php 
                        foreach ($list as $elt) {
                        echo '<option>'.$elt->getIdCategory().' '.$elt->getDescription().'</option>';
                        }
                    ?>
                </SELECT>
                
            <label for="date">Choisissez la date de votre tâche</label>
            <input type='date' name='calendar' required>
            <label for="comment">Commentaire</label>
            <textarea name='comment' rows='3' cols='20' required></textarea>
            <div class="button">
                <input type='submit' value='Ajouter' class='button' />
                <input type='reset' value='Retour' class='button' />
            </div>
        </form>
</div>