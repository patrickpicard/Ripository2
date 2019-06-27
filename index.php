<?php
require "PHP/Controller/Settings.class.php";
//on récupere les paramètres de l'application

Settings::init();
// Route va gérer tous les affichages de page en fonction de la provenance
include ($_SERVER["DOCUMENT_ROOT"] . Settings::getServerRoot());
?>
