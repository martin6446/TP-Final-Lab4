<?php
namespace Controllers;

use DAO\UserDAO as UserDAO;

class UserController{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }
}

?>