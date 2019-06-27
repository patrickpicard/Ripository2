<?php

class GroupManager
{
	  
	static public function add(Group $group)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�paration de la requ�te d'insertion.
		$q = $db->prepare('INSERT INTO group (description) VALUES(:description)');
		
		// Assignation des valeurs pour la categorie
		$q->bindValue(':description', $group->getDescription());
		
		// Ex�cution de la requ�te.
		$q->execute();
		
	}
	
	static public function delete(Group $group)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type DELETE.
		$db->exec('DELETE FROM group WHERE idGroup = '.$group->getidGroup());
	}
	
	static public function getById($id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Group.
		$id = (int) $id;
		
		$q = $db->query('SELECT idGroup, description FROM group WHERE idGroup = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new Group($donnees);
	}
	
	static public function getList()
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Retourne la liste de tous les categorynnes.
		
		$q = $db->query('SELECT idGroup, description FROM group ORDER BY idGroup');
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$group[] = new Group($donnees);
		}
		
		return $group;
	}
	
	static public function update(Group $group)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�pare une requ�te de type UPDATE.
		$q = $db->prepare('UPDATE group SET description=:description  WHERE idGroup = :idGroup');
		
		// Assignation des valeurs � la requ�te.
		$q->bindValue(':idGroup', $group->getidGroup());
		$q->bindValue(':description', $group->getDescription());
		// Ex�cution de la requ�te.
		$res = $q->execute();
	}
	static public function getListUser()
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Retourne la liste de tous les categorynnes.
		
		$q = $db->query('SELECT name,firstname, description FROM user ORDER BY name');
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$group[] = new Group($donnees);
		}
		
		return $group;
	}
	
}