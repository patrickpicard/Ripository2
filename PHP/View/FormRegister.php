<?php
$titre="Enregistrement";

if (empty($_POST['pseudo'])) // Si la variable est vide, on est sur la page de formulaire
{
	require adresseRoot.'/PHP/View/registration.php'; 
}
else //On est dans le cas traitement
{
    $pseudo_erreur1 = null;
    $pseudo_erreur2 = null;
    $mdp_erreur = null;
    //On récupère les variables
    $i = 0; // compte le nombre d'erreurs à afficher
    $temps = time();
    $name=$_POST['name'];
    $pseudo=$_POST['pseudo'];
    $firstName=$_POST['firstName'];
    $pass = (md5($_POST['password'])); // on hache le password avec md5
    $confirm = (md5($_POST['confirm']));
    $level = 1;
    //Vérification du pseudo
    $user = UserManager::getByPseudo($pseudo);
    if ($user->getIdUser()!=null)
    {
        $pseudo_erreur1 = "Ce pseudo est déjà utilisé par un membre";
        $i++;
    }
    
    if (strlen($pseudo) < 3 || strlen($pseudo) > 15)
    {
        $pseudo_erreur2 = "Le pseudo est trop grand ou trop petit";
        $i++;
    }
    
    //Vérification du mdp
    if ($pass != $confirm || empty($confirm) || empty($pass))
    {
        $mdp_erreur = "Le mot de passe et la confirmation sont différents, ou sont vides";
        $i++;
    }
    
    if ($i==0) // S'il n'y a pas d'erreur
    {
    	$newUser = new User(['name'=>$_POST['name'], 'pseudo'=>$_POST['pseudo'], 'firstName'=>$_POST['firstName'], 'password'=>md5($_POST['password']), 'confirm'=>md5($_POST['confirm']) , 'level'=>$level]);
        UserManager::add($newUser); // On crée l'utilisateur dans la base
        $newUser = UserManager::getByPseudo($_POST['pseudo']); //pour récupérer l'ID
        echo'<h1>Inscription terminée</h1>';
        echo'<p>Bienvenue '.stripslashes(htmlspecialchars($_POST['pseudo'])).' vous êtes maintenant inscrit</p>';

        //Et on définit les variables de sessions
        $_SESSION['pseudo'] = $newUser->getPseudo();
        $_SESSION['id'] = $newUser->getIdUser() ;
        $_SESSION['level'] = $newUser->getLevel();
        $_SESSION['group'] = $newUser->getIdGroup();
        echo'<p>Cliquez <a href="/AgendaFinal/Php/Controller/routes.php?action=mainUser">ici</a> pour vous connecter</p>';

        
    }
    else // on affiche les erreurs
    {
        echo'<h1>Inscription interrompue</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites pendant l\'incription</p>';
        echo'<p>'.$i.' erreur(s)</p>';
        echo'<p>'.$pseudo_erreur1.'</p>';
        echo'<p>'.$pseudo_erreur2.'</p>';
        echo'<p>'.$mdp_erreur.'</p>';
        
        echo'<p>Cliquez <a href="/AgendaFinal/Php/Controller/routes.php?action=registration">ici</a> pour recommencer</p>';
    }
}
?>





