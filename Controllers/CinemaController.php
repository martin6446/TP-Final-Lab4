<?php

namespace Controllers;

use Models\Cinema as Cinema;

use DAO\CinemaDAO as CinemaDAO;

class CinemaController
{

    private $cinemaDAO;

    public function __construct()
    {
        $this->cinemaDAO = new CinemaDAO();
    }

    public function modifyCinema($name)
    {
        $cinema = $this->cinemaDAO->findCinema($name);
        require_once(VIEWS_PATH . "edit-cinema.php");
    }

    public function getCinemas($city)
    {
        return $this->cinemaDAO->getAll($city);
    }

    public function retrieveCinema($id, $city)
    {
        return $this->cinemaDAO->getCinema($id, $city);
    }

    public function addCinema($city, $cinemaData){

        $cinema = new Cinema($city, $cinemaData["name"], $cinemaData["address"] . " " . $cinemaData["addressNumber"]);

        $this->cinemaDAO->add($cinema);
    }

    /* public function removeCinema($name){
        $this->cinemaDAO->remove($name);   
    } */
}
