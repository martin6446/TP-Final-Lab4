<?php
namespace Controllers;

use DAO\CinemaDAO;
use DAO\CinemaFunctionDAO;
use DAO\MovieDAO as MovieDAO;
use DAO\CinemaRoomDAO AS cinemaRoomDAO;
use Models\City;

class LandingController
{
    private $movieDAO;

    public function __construct()
    {
        $this->movieDAO = new MovieDAO();
    }

    public function loadData()
    {

        
        var_dump((new CinemaFunctionDAO())->getAll(new City(1,1)));
        $movies = $this->movieDAO->getAll();
        $featuredMovies = array();
        array_push($featuredMovies, $movies[0], $movies[3], $movies[4]);
        $genres = $this->movieDAO->getGenres();

        require_once(VIEWS_PATH."landing.php");
        
    }
}

?>