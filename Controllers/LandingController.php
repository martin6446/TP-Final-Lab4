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
        $genres = $this->movieDAO->getGenres();

        require_once(VIEWS_PATH."landing.php");
        
    }
}

?>