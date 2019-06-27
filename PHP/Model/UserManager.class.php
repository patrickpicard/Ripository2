<?php

class UserManager
{
	  
	static public function add(user $user)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�paration de la requ�te d'insertion.
		$q = $db->prepare('INSERT INTO user(name, pseudo, firstName, password, confirm, level ) VALUES(:name, :pseudo, :firstName, :password, :confirm, :level)');
		
		// Assignation des valeurs pour le name, le pr�name.
		$q->bindValue(':name', $user->getName());
		$q->bindValue(':pseudo', $user->getPseudo());
		$q->bindValue(':firstName', $user->getFirstname());
		$q->bindValue(':password', $user->getPassword());
		$q->bindValue(':confirm', $user->getConfirm());
        $q->bindValue(':level', $user->getLevel());
       
		
		// Ex�cution de la requ�te.
		$q->execute();
		$q->CloseCursor ();
	}
	
	static public function delete(User $user)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type DELETE.
		$db->query('DELETE FROM user WHERE idUser = '.$user->getIdUser());
	}
	
	static public function getById($id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet user.
		/*$id = (int) $id;*/
		
		$q = $db->query('SELECT idUser, name, firstName, pseudo , password, level, idGroup  FROM user WHERE idUser = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new user($donnees);
	}

	

	static public function getByPseudo($pseudo) {
		$db = DbConnect::getDb (); // Instance de PDO.
		// Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personne
		$q = $db->prepare ( 'SELECT idUser , name , pseudo, firstName , password,  level , idGroup FROM user WHERE pseudo = :pseudo' );
		
		// Assignation des valeurs .
		$q->bindValue ( ':pseudo', $pseudo );
		$q->execute ();
		$donnees = $q->fetch ( PDO::FETCH_ASSOC );
		$q->CloseCursor ();
		if ($donnees == false) { // Si l'utilisateur n'existe pas, on renvoi un objet vide
			return new User ();
		} else {
			return new User ( $donnees );
		}
	}
	
	static public function update(user $user)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�pare une requ�te de type UPDATE.
		$q = $db->prepare('UPDATE user SET name=:name, firstName=:firstName ,pseudo=:pseudo, password=:password, level=:level WHERE idUser ='.$_SESSION[id]);
		
		// Assignation des valeurs � la requ�te.
		$q->bindValue(':name', $user->getName());
		$q->bindValue(':firstName', $user->getFirstname());
		$q->bindValue(':pseudo', $user->getPseudo());
		$q->bindValue(':password', $user->getPassword());
		$q->bindValue(':level', $user->getLevel());
		// Ex�cution de la requ�te.
		$res = $q->execute();
	}
    
}
?>
