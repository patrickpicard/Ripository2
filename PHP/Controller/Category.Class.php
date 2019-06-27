<?php

class Category
{	
	// Attributs
	private $_idCategory;
	private $_Categorydescription;
	
    // Getters & Setters 
    public function getIdCategory()
	{
		return $this->_idCategory;
	}

	public function setIdCategory($_idCategory)
	{
		$this->_idCategory = intval($_idCategory);
		return $this;
    }
    
	public function getCategorydescription()
	{
		return $this->_Categorydescription;
	}

	public function setCategorydescription($_description)
	{
		$this->_Categorydescription = $_description;
		return $this;
	}
  

    // Construct & hydrate
	public function __construct(array $options = [])
	{ 
		if (!empty($options))
		{
			$this->hydrate($options);
		}
	}
	public function hydrate($data)
	{
		foreach ($data as $key => $value)
		{
			$method = 'set'.ucfirst($key);
			
			if (is_callable([$this, $method]))
			{
				$this->$method($value);
			}
		}
	}
}

?>