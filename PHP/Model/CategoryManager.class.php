<?php

class CategoryManager
{
	  
	static public function add( $description)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�paration de la requ�te d'insertion.
		$q = $db->prepare('INSERT INTO category (Categorydescription) VALUES('.$description) ;
		
		// Ex�cution de la requ�te.
		$q->execute();
		
	}
	
	static public function delete(Category $category)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type DELETE.
		$q = $db->prepare('DELETE FROM category WHERE idCategory = '.$category->getIdCategory());
		$q->execute();
	}
	
	static public function getByLibelle($libelle)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Category.
				
		$q = $db->query('SELECT idcategory, Categorydescription FROM category WHERE Categorydescription = "'.$libelle.'"');
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new Category($donnees);
	}

	static public function getById($id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Category.
				
		$q = $db->query('SELECT idcategory, Categorydescription FROM category WHERE idCategory = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new Category($donnees);
	}
	
	static public function getList()
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Retourne la liste de tous les categorynnes.
		
		$q = $db->query('SELECT idCategory, Categorydescription FROM category ORDER BY Categorydescription');
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$categories[] = new Category($donnees);
		}
		
		return $categories;
	}
	
	static public function update( $newdescription , $id )
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Pr�pare une requ�te de type UPDATE.
		$q = $db->prepare('UPDATE category SET Categorydescription='.$newdescription.'  WHERE idcategory ='.$id);
		
		
		// Ex�cution de la requ�te.
		$res = $q->execute();
	}
	
	
}