<?php
namespace Models;


class User{
    private $name;
    private $lastname;
    private $email;
    private $password;
    private $isAdmin;

    public function __construct($name="",$lastname="",$email="",$password="",$isAdmin="false")
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
    }

    public function getEmail()
    {
        return $this->email;
    }

    
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getName()
    {
        return $this->name;
    }

    
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }
}


?>