<?php

class User
{	
	// Attributs
	private $_idUser;
	private $_name;
	private $_firstName;
    private $_pseudo;
	private $_password;
	private $_confirm;
	private $_level;
	private $_idGroup;
    
	
    // Getters & Setters 
    public function getIdUser()
	{
		return $this->_idUser;
	}

	public function setIdUser($_idUser)
	{
		$this->_idUser = intval($_idUser);
		return $this;
    }
    
	public function getName()
	{
		return $this->_name;
	}

	public function setName($_name)
	{
		$this->_name = $_name;
		return $this;
	}
  
    public function getFirstName()
	{
		return $this->_firstName;
	}

	public function setFirstName($_firstName)
	{
		$this->_firstName = $_firstName;
		return $this;
    }
    
    public function getPseudo()
    {
        return $this->_pseudo;
    }

    public function setPseudo($_pseudo)
    {
        $this->_pseudo = $_pseudo;
        return $this;
    }

    public function getPassword()
    {
        return $this->_password;
    }

    public function setPassword($_password)
    {
        $this->_password = $_password;
        return $this;
	}

	public function getConfirm()
    {
        return $this->_confirm;
    }

    public function setConfirm($_confirm)
    {
        $this->_confirm = $_confirm;
        return $this;
    }
	
	public function getLevel()
    {
        return $this->_level;
    }

    public function setLevel($_level)
    {
        $this->_level = $_level;
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