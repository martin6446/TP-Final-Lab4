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

    public function userRegister($email, $password){
        $user = new User();

        $user->setEmail($email);
        $user->setPassword($password);

        $_SESSION["loggeduser"] = $user->getEmail();

        $this->userDAO->add($user);
        #require_once(FRONT_ROOT."index/loadData.php");
        #require_once(FRONT_ROOT."movie/showListView");

    }

    public function userLogin($email, $password){
        $userList = $this->userDAO->getAll();
        $flag = false;

        foreach($userList as $user){
            if($user->getEmail() == $email && $user->getPassword() == $password){
                $flag = true;
                break;
            }
        }

        if($flag){
            $_SESSION["loggeduser"] = $user->getEmail();
            header("location:".FRONT_ROOT."/landing/loadData");
        }else{
            require_once(VIEWS_PATH."login.php");
        }
        
        /// aca alertariamos de un error en el logeo.
    }
}

?>