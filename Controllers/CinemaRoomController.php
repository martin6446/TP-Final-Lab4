<?php
namespace Controllers;

use DAO\CinemaRoomDAO;
use Models\CinemaRoom;
use Models\Cinema as Cinema;

class CinemaRoomController{

    private $cinemaRoomDAO;

    public function __construct()
    {
        $this->cinemaRoomDAO = new CinemaRoomDAO();
    }

    public function addRoom($cinema, $roomData){
        UtilitiesController::validateAdmin();

        $rooms = [];
        foreach($roomData as $data){
            array_push($rooms,new CinemaRoom($cinema,$data["name"], $data["price"], $data["capacity"]));
        }

        $this->cinemaRoomDAO->add(...$rooms);

    }

    public function updateRoom($id,$roomData){
        UtilitiesController::validateAdmin();

        $this->cinemaRoomDAO->update($id,$roomData);
    }

    public function getRooms(Cinema $cinema){
        return $this->cinemaRoomDAO->getByCinema($cinema);
    }

    public function removeRoom(){}

    
}

?>