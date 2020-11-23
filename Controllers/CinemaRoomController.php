<?php

namespace Controllers;

use DAO\CinemaRoomDAO;
use Models\CinemaRoom;
use Models\Cinema as Cinema;

class CinemaRoomController
{

    private $cinemaRoomDAO;

    public function __construct()
    {
        $this->cinemaRoomDAO = new CinemaRoomDAO();
    }

    public function addRoom($cinema, $roomData)
    {
        UtilitiesController::validateAdmin();

        array_shift($roomData);
        array_pop($roomData);

        $rooms = [];
        foreach ($roomData as $data) {
            array_push($rooms, new CinemaRoom($cinema, $data["name"], $data["price"], $data["capacity"]));
        }

        $this->cinemaRoomDAO->add(...$rooms);
    }

    public function validateCinemaRooms($roomData)
    {

        array_shift($roomData);
        array_pop($roomData);

        $match = array();

        foreach ($roomData as $room) {
            $roomName = strtolower($room["name"]);

            if (isset($match[$roomName])) {
                $match[$roomName]++;
            } else {
                $match[$roomName] = 1;
            }
        }
        
        $vals = array_values($match);

        foreach($vals as $quantity){

            if($quantity == 2){
                return true;
            }else{
                return false;
            } 
        }

    }

    public function getAvailableSeats($idFunction)
    {
        return $this->cinemaRoomDAO->getAvailableSeats($idFunction);
    }

    public function updateRoom($id, $roomData)
    {
        UtilitiesController::validateAdmin();

        $this->cinemaRoomDAO->update($id, $roomData);
    }

    public function getRooms(Cinema $cinema)
    {
        return $this->cinemaRoomDAO->getByCinema($cinema);
    }

    public function validateRoomName($cinemaId, $roomId, $newRoomName)
    {
        $rooms = $this->cinemaRoomDAO->getRoomNamesByCinema($cinemaId);
        $names = [];
        $flag = true;

        foreach ($rooms as $room) {
            if ($roomId != $room["id"] && $room["nombre"] == $newRoomName) {
                $flag = false;
            }
        }

        return $flag;
    }
}
