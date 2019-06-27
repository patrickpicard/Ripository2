<?php

require "TaskManager.class.php";
require "../Controller/Task.class.php";
require "DbConnect.class.php";
require "../Controller/Settings.class.php";
Settings::init();
DbConnect::init();

/* $list = TaskManager::getList();
var_dump($list) ;
echo json_encode($list);
 */

$db = DbConnect::getDb(); // Instance de PDO.
		// Retourne la liste de tous les Tache.
		
		$q = $db->query('SELECT idtask ,date , Categorydescription , description,  comment FROM task
        INNER JOIN category ON category.idcategory=task.IdCategory
        ORDER BY idTask ');
        
        
		while ($donnees = $q->fetch(PDO::FETCH_OBJ))
		{
			$taches[] = $donnees;
		}
	 
        
        echo json_encode($taches);


   