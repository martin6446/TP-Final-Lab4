<?php

namespace Controllers;

use DAO\UserDAO as UserDAO;
use Models\User as User;
use Controllers\UtilitiesController as UtilitiesController;

class UserController
{
    private $userDAO;
    private $utility;
    private $landing;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
        $this->utility = new UtilitiesController();
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION["loggedUser"]);
        ///unset($_SESSION["fb_access_token"]);
        $this->utility->notification("Logged out", FRONT_ROOT . "index.php");
    }

    public function userRegister($name, $lastname, $email, $password, $confirmpass, $city)
    {

        if ($password === $confirmpass) {

            $user = new User($name, $lastname, $email, $password,$city);

            $data = $this->userDAO->createUser($user);

            if ($data[0] === false) {
                if ($data[1] == 1062) {
                }
            }


            $_SESSION["isAdmin"] = $user->getIsAdmin();
            $_SESSION["loggedUser"] = $user;

            header("location:" . FRONT_ROOT . "views/homeview");
        } else {
            header("location:" . FRONT_ROOT . "views/registerView");
        }
    }

    public function userLogin($email, $password)
    {

        $user = $this->userDAO->read($email);

        if ($user) {
            if ($user->getPassword() == $password) {

                $_SESSION["isAdmin"] = $user->getIsAdmin();
                $_SESSION["name"] = $user->getName();
                $_SESSION["lastname"] = $user->getLastName();
                $_SESSION["password"] = $user->getPassword();
                $_SESSION["email"] = $user->getEmail();
                $_SESSION["cityid"] = $user->getCity_id();
                $_SESSION["loggedUser"]= $user;

                header("location:" . FRONT_ROOT . "views/homeview");
            } else {
                $this->utility->notification("Wrong password", FRONT_ROOT . "index.php");
            }
        } else {
            $this->utility->notification("Wrong user name", FRONT_ROOT . "index.php");
        }
        /// aca alertariamos de un error en el logeo.
    }


    public function modifyUser()
    {

        $newUserData = $_GET;

        $oldUser = new User($_SESSION["name"], $_SESSION["lastname"], $_SESSION["email"], $_SESSION["password"], $_SESSION["cityid"], $_SESSION["isAdmin"]);

        $this->userDAO->modifyUser($newUserData, $oldUser);

        $_SESSION["name"] = $newUserData["name"];
        $_SESSION["lastname"] = $newUserData["lastname"];
        $_SESSION["password"] = $newUserData["password"];
        $_SESSION["cityid"] = $newUserData["cityid"];


        header("location:" . FRONT_ROOT . "views/homeview");
    }
}
