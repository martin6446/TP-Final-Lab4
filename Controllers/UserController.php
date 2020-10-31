<?php

namespace Controllers;

use DAO\UserDAO as UserDAO;
use Models\User as User;
use Controllers\UtilitiesController as UtilitiesController;
use Controllers\LandingController as LandingController;

class UserController
{
    private $userDAO;
    private $utility;
    private $landing;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
        $this->utility = new UtilitiesController();
        $this->landing = new LandingController();
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION["loggedUser"]);
        ///unset($_SESSION["fb_access_token"]);
        $this->utility->notification("Logged out", FRONT_ROOT . "index.php");
    }

    public function userRegister($name, $lastname, $email, $password, $confirmpass, $city, $province)
    {

        if ($password === $confirmpass) {

            $user = new User($name, $lastname, $email, $password);

            $data = $this->userDAO->createUser($user);

            if ($data[0] === false) {
                if ($data[1] == 1062) {
                }
            }


            $_SESSION["isAdmin"] = $user->getIsAdmin();
<<<<<<< HEAD
            $this->landing->loadData();
        }else {
            $this->userRegisterView();
=======
            header("location:" . FRONT_ROOT . "views/homeview");
        } else {
            header("location:" . FRONT_ROOT . "views/registerView");
>>>>>>> 3a12a0bbfc7b96fa86eb31b031981de9128be675
        }
    }

    public function userLogin($email, $password)
    {

<<<<<<< HEAD
=======
        $user = $this->userDAO->read($email);

        if ($user) {
            if ($user->getPassword() == $password) {

                $_SESSION["isAdmin"] = $user->getIsAdmin();
                $_SESSION["name"] = $user->getName();
                $_SESSION["lastname"] = $user->getLastName();
                $_SESSION["password"] = $user->getPassword();
                $_SESSION["email"] = $user->getEmail();
                $_SESSION["cityid"] = $user->getCity_id();
                header("location:" . FRONT_ROOT . "views/homeview");
            } else {
                $_SESSION["wrongPassword"] = "contraseña incorrecta";
                $this->utility->notification("Wrong password", FRONT_ROOT . "index.php");
            }
        } else {
            $_SESSION["wrongUser"] = "usuario incorrecto";
            $this->utility->notification("Wrong password", FRONT_ROOT . "index.php");
        }



        /// aca alertariamos de un error en el logeo.
    }
>>>>>>> 3a12a0bbfc7b96fa86eb31b031981de9128be675


    public function modifyUser()
    {

        $newUserData = $_GET;

        $oldUser = new User($_SESSION["name"], $_SESSION["lastname"], $_SESSION["email"], $_SESSION["password"], $_SESSION["cityid"], $_SESSION["isAdmin"]);

        $this->userDAO->modifyUser($newUserData, $oldUser);

        $_SESSION["name"] = $newUserData["name"];
        $_SESSION["lastname"] = $newUserData["lastname"];
        $_SESSION["password"] = $newUserData["password"];
        $_SESSION["cityid"] = $newUserData["cityid"];


<<<<<<< HEAD
        if($flag){
            $_SESSION["isAdmin"] = $user->getIsAdmin();
            $this->landing->loadData();
        }else{
            $this->utility->notification("Wrong username or password", FRONT_ROOT."index.php");
        }
        
        /// aca alertariamos de un error en el logeo.
=======
        header("location:" . FRONT_ROOT . "views/homeview");
>>>>>>> 3a12a0bbfc7b96fa86eb31b031981de9128be675
    }
}
