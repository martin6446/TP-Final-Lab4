<?php
namespace Controllers;

use DAO\MovieDAO as MovieDAO;

class MovieController{
    private $movieDAO;

    public function __construct()
    {
        $this->movieDAO = new MovieDAO();
    }

    public function showListView(){

        require_once(VIEWS_PATH."movie-list.php");
    }
}

?>