<?php

// Ce fichier sera inclus a chaque fois que l'on aura besoin d'acceder a la base de donnees.
// Il permet d'ouvrir la connection a la base de donnees
class DbConnect
{
    private static $db;

    public static function getDb()
    {
        return DbConnect::$db;
    }

    public static function init()
    {

        try {
            
            // On se connecte a MySQL
            self::$db = new PDO('mysql:host='. Settings::getHost() .';port=' . Settings::getPort() . ';dbname=' . Settings::getDbname() . ';charset=utf8', Settings::getLogin(), Settings::getPwd());
        } catch (Exception $e) {
            // En cas d'erreur, on affiche un message et on arrete tout
            die('Erreur : ' . $e->getMessage());
        }

    }
}
