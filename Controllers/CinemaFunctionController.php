<?php
namespace Controllers;

use DAO\CinemaFunctionDAO;

class CinemaFunctionController{
    private $cinemaFunctionDAO;

    public function __construct()
    {
        $this->cinemaFunctionDAO = new CinemaFunctionDAO();
    }


    public function addFunction(){
        var_dump($_GET);
        die;

        
    }

}

?>