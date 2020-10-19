<?php
namespace Controllers;

use DAO\UserDAO as UserDAO;
use Models\User as User;

class UserController{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    public function UserRegister($email, $password){
        $user = new User();

        $user->setEmail($email);
        $user->setPassword($password);

        $_SESSION["loggeduser"] = $user->getEmail();

        $this->userDAO->add($user);

        
    }

    public function UserLogin($email, $password){
        
    }
}

?>