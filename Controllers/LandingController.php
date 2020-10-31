<?php
namespace Controllers;

use DAO\MovieDAO as MovieDAO;

class LandingController
{
    private $movieDAO;

    public function __construct()
    {
        $this->movieDAO = new MovieDAO();
    }

    public function loadData()
    {
        $movies = $this->movieDAO->getAll();
        $featuredMovies = array();
        array_push($featuredMovies, $movies[0], $movies[3], $movies[4]);
        $this->movieDAO->pushGenres();
        $this->movieDAO->pushMovies();
        
        require_once(VIEWS_PATH."landing.php");
        
    }
}

?>