<?php
namespace Controllers;

use DAO\UserDAO as UserDAO;
use Models\User as User;
use Controllers\UtilitiesController as UtilitiesController;

class UserController{
    private $userDAO;
    private $utility;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
        $this->utility = new UtilitiesController();
    }

    public function userRegisterView(){
        require_once(VIEWS_PATH."user-register-view.php");
    }

    public function userRegister($name, $lastname,$email, $password,$confirmpass){

        /* echo "name ".$name. "<br>";
        echo "lastname ".$lastname. "<br>";
        echo "email ".$email. "<br>";
        echo "password".$password. "<br>";
        echo "confirm password".$confirmpass. "<br>";
        die; */

        if($password === $confirmpass){

            $user = new User($name,$lastname,$email,$password);

            $this->userDAO->add($user);
            $_SESSION["isAdmin"] = $user->getIsAdmin();
            header("location:".FRONT_ROOT."/landing/loadData");
        }else {
            $this->userRegisterView();
        }




      /*   $user = new User();

        $user->setEmail($email);
        $user->setPassword($password);

        $_SESSION["loggeduser"] = $user->getEmail();

        $this->userDAO->add($user);
        #require_once(FRONT_ROOT."index/loadData.php");
        #require_once(FRONT_ROOT."movie/showListView"); */

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
            $_SESSION["isAdmin"] = $user->getIsAdmin();
            header("location:".FRONT_ROOT."/landing/loadData");
        }else{
            $this->utility->notification("Wrong username or password", FRONT_ROOT."index.php");
        }
        
        /// aca alertariamos de un error en el logeo.
    }
}
