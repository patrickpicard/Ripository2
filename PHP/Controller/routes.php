<?php
// Le fichier Route permet de gérer toutes les ouvertures de pages

//on definit les constantes qui permet de definir les chemins
if (!class_exists("Settings")) require "Settings.class.php";
Settings::init();
Define ( "adresseRoot" , $_SERVER["DOCUMENT_ROOT"].Settings::getAdresseRoot()) ;
Define ("serverRoot",Settings::getServerRoot());

// La fonction afficherPage, prend 3 paramètres
// Le chemin où trouver les pages, le nom de la partie contenu à afficher et le titre à donner à la page
function afficherPage($chemin, $page, $titre)
{
	require $chemin . "Header.php";
    require $chemin . $page;
    //require $chemin . 'Footer.php';
}

// A l'include de la page Route, le code suivant est exécuté
// Si la variable $get existe, on exploite les informations pour afficher la bonne page
if (isset($_GET['action'])) {
    // En fonction de ce que contient la variable action de $_GET, on ouvre la page correspondante

    switch ($_GET['action']) {

		case 'connect':
		{
			afficherPage(adresseRoot . 'PHP/View/', 'FormConnection.php', "Connexion");
			break;
        }
        case 'deconnect':
            {
                afficherPage(adresseRoot . 'PHP/View/', 'FormDeconnection.php', "Deconnection");
                break;
            }
        case 'register':
            {
                afficherPage(adresseRoot . 'PHP/View/', 'FormRegister.php', "Page D'enregistrement");
                break;
            }
        case 'registration':
            {
                afficherPage(adresseRoot . 'PHP/View/', 'registration.php', "Page D'enregistrement");
                break;
            }
        case 'mainUser':
            {
                afficherPage(adresseRoot . 'PHP/View/', 'mainUser.php', "Page D'utilisateur");
                break;
            }
        case 'formAction':
            {
                afficherPage(adresseRoot . 'PHP/View/', 'FormAction.php', "Page D'utilisateur");
                break;   
            }
        case 'mainAdmin':
            {
                afficherPage(adresseRoot . 'PHP/View/', 'mainAdmin.php', "Page Administrateur");
                break;
            }
        case 'createTask':
            {
                afficherPage(adresseRoot . 'PHP/View/', 'FormTask.php', "Gestionnaire de Tache");
                break;
            }
        case 'deleteTask':
            {
                afficherPage(adresseRoot . 'PHP/View/', 'FormTask.php', "Gestionnaire de Tache");
                break;
            }
        case 'updateTask':
            {
                afficherPage(adresseRoot . 'PHP/View/', 'FormTask.php', "Gestionnaire de Tache");
                break;
            }
        case 'editTask':
            {
                afficherPage(adresseRoot . 'PHP/View/', 'FormAction.php', "Gestionnaire de Tache");
                break;
            }
        case 'addTask':
            {
                afficherPage(adresseRoot . 'PHP/View/', 'FormAction.php', "Gestionnaire de Tache");
                break;
            }
        case 'delTask':
            {
                afficherPage(adresseRoot . 'PHP/View/', 'FormAction.php', "Gestionnaire de Tache");
                break;
            }
        case 'updTask':
            {
                afficherPage(adresseRoot . 'PHP/View/', 'FormAction.php', "Gestionnaire de Tache");
                break;
		    }
    }
} else { // Sinon, on affiche la page principale du site
    afficherPage(adresseRoot . 'PHP/View/', 'FormConnection.php', "Connexion");
}