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

    public function notification($notification, $location){
        require_once(VIEWS_PATH. "notification.php");
    }

    public function userRegisterView(){
        require_once(VIEWS_PATH."user-register-view.php");
    }

    public function logout(){
        session_destroy();
        unset($_SESSION["loggedUser"]);
        ///unset($_SESSION["fb_access_token"]);
        $this->notification("Logged out", FRONT_ROOT."index.php");
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
            $this->notification("Wrong username or password", FRONT_ROOT."index.php");
        }
        
        /// aca alertariamos de un error en el logeo.
    }
}
