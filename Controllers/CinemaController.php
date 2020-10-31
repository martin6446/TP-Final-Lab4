<?php
namespace Controllers;
use Models\Cinema as Cinema;

use DAO\CinemaDAO as CinemaDAO;

class CinemaController{

    private $cinemaDAO;

    public function __construct()
    {
        $this->cinemaDAO = new CinemaDAO();
    }

    public function modifyCinema($name){
        $cinema = $this->cinemaDAO->findCinema($name);
        require_once(VIEWS_PATH . "edit-cinema.php");
    }

    public function getMovies(){
        return $this->cinemaDAO->getAll();
    }

    public function retrieveCinemas(){
        return $this->cinemaDAO->getAll();
    }

    public function addCinema($name,$ticketvalue,$capacity,$address,$address2,$city,$state,$zip){
        $cinema = new Cinema();
        $cinema->setName($name);
        $cinema->setTicketValue($ticketvalue);
        $cinema->setCapacity($capacity);
        $cinema->setAddress($address);
        $cinema->setAddress2($address2);
        $cinema->setCity($city);
        $cinema->setState($state);
        $cinema->setZip($zip);

        $this->cinemaDAO->add($cinema);

        
    }

    public function removeCinema($name){
        $this->cinemaDAO->remove($name);   
    }


}
