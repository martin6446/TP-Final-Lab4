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

    public function userRegisterView(){
        require_once(VIEWS_PATH."user-register-view.php");
    }

    public function userRegister($email, $password){
        $user = new User();

        $user->setEmail($email);
        $user->setPassword($password);

        $_SESSION["loggeduser"] = $user->getEmail();

        #$this->userDAO->add($user);
        #require_once(FRONT_ROOT."index/loadData.php");
        require_once(FRONT_ROOT."landing/loadData");


        
    }

    public function UserLogin($email, $password){
        
    }
}

?>