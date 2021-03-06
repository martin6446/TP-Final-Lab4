<?php
namespace Models;


class User{
    private $name;
    private $lastname;
    private $email;
    private $password;
    private $isAdmin;
    private $city_id;

    public function __construct($name="",$lastname="",$email="",$password="",$city_id="",$isAdmin= 0)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
        $this->city_id = $city_id;
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

    public function getCity_id()
    {
        return $this->city_id;
    }

    
    public function setCity_id($city_id)
    {
        $this->city_id = $city_id;
    }
}


?>