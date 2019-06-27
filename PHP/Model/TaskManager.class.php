<?php

class TaskManager
{
	  
	static public function add(Task $task)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�paration de la requ�te d'insertion.
		$q = $db->prepare('INSERT INTO task( description, idcategory, comment, date, iduser, idgroup ) VALUES(:description, :idcategory, :comment, :date, :iduser, :idgroup)');
		
		// Assignation des valeurs pour le nom, le pr�nom.
		
		$q->bindValue(':description', $task->getDescription());
		$q->bindValue(':idcategory', $task->getIdCategory());
		$q->bindValue(':comment', $task->getComment());
		$q->bindValue(':date', $task->getDate());
		$q->bindValue(':iduser', $task->getIdUser());
		$q->bindValue(':idgroup', $task->getIdGroup());
       
		
		
		// Ex�cution de la requ�te.
		$q->execute();
		
	}
	
	static public function delete( $id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type DELETE.
		$db->query('DELETE FROM task WHERE idTask = '.$id);
	}
	
	static public function getById($id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Tache.
		$id = (int) $id;
		
		$q = $db->query('SELECT idTask, description, idcategory, comment, idUser,idgroup, date FROM task WHERE idTask = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new Task($donnees);
	}
	
	static public function getList()
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Retourne la liste de tous les Tache.
		
		$q = $db->query('SELECT idTask, description, idcategory, comment,idUser,idGroup  date FROM task ORDER BY idTask');
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$taches[] = new Task($donnees);
		}
		
		return $taches;
	}

	static public function getListToday()
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Retourne la liste de tous les Tache.
		$q = $db->query('SELECT idTask, description, comment,idUser,idGroup, idCategory,  date FROM task WHERE date = CURDATE() ORDER BY idTask');
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$taches[] = new Task($donnees);
		}
			if(!isset($taches))
			{
				return null;
			}
			else{
				return $taches;
			}
	}
	
	
	static public function update(Task $task)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�pare une requ�te de type UPDATE.
		$q = $db->prepare('UPDATE task SET description=:description, comment=:comment , date=:date, idcategory=:category  WHERE idTask = :idTask');
		
		// Assignation des valeurs � la requ�te.
		$q->bindValue(':idTask', $task->getIdTask());
		$q->bindValue(':description', $task->getDescription());
		$q->bindValue(':comment', $task->getComment());
		$q->bindValue(':category', $task->getIdCategory());
		$q->bindValue(':date', $task->getDate());
	
		// Ex�cution de la requ�te.
		$res = $q->execute();
	}
	
	
	static public function getByIdGroup($id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Task.
		$id = (int) $id;
		
		$q = $db->query('SELECT idGroup, description, comment,  date FROM task WHERE idGroup = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new Task($donnees);
	}

	/*static public function getByIdTask($id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Task.
		$id = (int) $id;
		
		$q = $db->query('SELECT idTask, description, comment,  date FROM task WHERE idTask = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new Task($donnees);
	}*/
}