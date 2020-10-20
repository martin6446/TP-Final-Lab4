<?php
namespace Controllers;

use DAO\CinemaDAO as CinemaDAO;

class CinemaController{

    private $cinemaDAO;

    public function __construct()
    {
        $this->cinemaDAO = new CinemaDAO();
    }


    public function showListView(){
        require_once(VIEWS_PATH."nav-bar.php");


        $cinemaList = $this->cinemaDAO->getAll();

        require_once(VIEWS_PATH."cinema-list.php");
    }


}
