<?php
namespace Models;

class Cinema{
    private $id;
    private $name;
    private $address;
    private $idCity;
    private $rooms = [];
    
        

    public function getName()
    {
        return $this->name;
    }

    
    public function setName($name)
    {
        $this->name = $name;
    }

    

    public function getAddress()
    {
        return $this->address;
    }

    
    public function setAddress($address)
    {
        $this->address = $address;
    }


    public function getRooms()
    {
        return $this->rooms;
    }

    
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
    }

    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdCity()
    {
        return $this->idCity;
    }

    
    public function setIdCity($idCity)
    {
        $this->idCity = $idCity;
    }
}

?>