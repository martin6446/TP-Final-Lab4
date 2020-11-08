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

    public function modifyCinema($cinema,$cinemaData)
    {
        $this->cinemaDAO->alterCinema($cinema,$cinemaData);
    }

    public function getCinemas($city)
    {
        return $this->cinemaDAO->getAll($city);
    }

    public function getCinemaById($id, $city)
    {
        return $this->cinemaDAO->getCinemaById($id, $city);
    }

    public function getCinemaByCityAndName($city, $name){
        return $this->cinemaDAO->getCinemaByCityAndName($city,$name);
    }

    public function addCinema($city, $cinemaData){

        $cinema = new Cinema($city, $cinemaData["name"], $cinemaData["address"] . " " . $cinemaData["addressNumber"]);

        $this->cinemaDAO->add($cinema);
    }

    public function delete($cinemaId){
        if(!$this->hasFunctions($cinemaId)){
            $this->cinemaDAO->delete($cinemaId);
        }
    }

    public function hasFunctions($cinemaId){
        return $this->cinemaDAO->hasFunctions($cinemaId);
    }


}
