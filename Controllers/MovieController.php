<?php
namespace Controllers;

use DAO\MovieDAO as MovieDAO;
use Models\Movie as Movie;

class MovieController{
    
    private $movieDAO;
    private $movieList = array();

    public function __construct()
    {
        $this->movieDAO = new MovieDAO();
    }

    public function showListView(){

        $movieList = $this->movieDAO->GetAll();
        require_once(VIEWS_PATH."movie-list.php");
    }

}
