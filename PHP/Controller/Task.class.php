<?php

class Task
{	
	// Attributs
	private $_idTask;
	private $_description;
	private $_idCategory;
    private $_date;
	private $_comment;
	private $_idUser;
	private $_idGroup;
	
    // Getters & Setters 
    public function getIdUser()
	{
		return $this->_idUser;
	}

	public function setIdUser($_idUser)
	{
		$this->_idUser = $_idUser;
		return $this;
    }
    
	public function getIdTask()
	{
		return $this->_idTask;
	}

	public function setIdTask($_idTask)
	{
		$this->_idTask = $_idTask;
		return $this;
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
    
    public function getIdCategory()
    {
        return $this->_idCategory;
    }

    public function setIdCategory($_idCategory)
    {
        $this->_idCategory = $_idCategory;
        return $this;
    }
	
	public function getDate()
    {
        return $this->_date;
    }

    public function setDate($_date)
    {
        $this->_date =$_date;
        return $this;
    }

	public function getIdGroup()
    {
        return $this->_idGroup;
    }

    public function setidGroup($_idGroup)
    {
        $this->_idGroup = $_idGroup;
        return $this;
    }

    
	public function getComment()
    {
        return $this->_comment;
    }

    public function setComment($_comment)
    {
        $this->_comment = $_comment;
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
    
    /* AUTRES METHODES */

   /* public function setCategory()
    {
        //Cette fonction sert à ajouter des informations à la catégorie et en même temps changer la description de la catégorie
        TaskManager::getByIdCategory();
        
    }*/
}
