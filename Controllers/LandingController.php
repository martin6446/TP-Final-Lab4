<?php
namespace Controllers;

use DAO\MovieDAO as MovieDAO;
use DAO\CinemaDAO as CinemaDAO;
use Models\Cinema as Cinema;

class LandingController
{
    private $movieDAO;

    public function __construct()
    {
        $this->movieDAO = new MovieDAO();
    }

    public function loadData()
    {

        $cines = new CinemaDAO();
        $cines->add(new Cinema());


        $movies = $this->movieDAO->getAll();
        $featuredMovies = array();
        array_push($featuredMovies, $movies[0], $movies[3], $movies[4]);
        $genres = $this->movieDAO->getGenres();

        require_once(VIEWS_PATH."landing.php");
        
    }
}

?>