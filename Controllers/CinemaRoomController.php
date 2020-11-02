<?php
namespace Controllers;

use DAO\CinemaRoomDAO;
use Models\CinemaRoom;

class CinemaRoomController{

    private $cinemaRoomDAO;

    public function __construct()
    {
        $this->cinemaRoomDAO = new CinemaRoomDAO();
    }

    public function addRoom($cinema, $roomData){

        $rooms = [];
        foreach($roomData as $data){
            array_push($rooms,new CinemaRoom($cinema,$data["name"], $data["price"], $data["capacity"]));
        }

        $this->cinemaRoomDAO->add(...$rooms);

    }

    public function showRoomView(){}

    public function removeRoom(){}

    
}

?>