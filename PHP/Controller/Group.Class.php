<?php

class Group
{	
	// Attributs
	private $_idGroup;
	private $_description;
	
    // Getters & Setters 
    public function getIdGroup()
	{
		return $this->_idGroup;
	}

	public function setIdGroup($_idGroup)
	{
		return $this->_idGroup = intval($_idGroup);
    }
    
	public function getDescription()
	{
		return $this->_description;
	}

	public function setDescription($_description)
	{
		$this->_description = $_description;
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