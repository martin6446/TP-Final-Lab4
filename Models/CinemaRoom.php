<?php
namespace Models;


class CinemaRoom{
    private $id;
    private $idCinema;
    private $name;
    private $price;
    private $capacity;
    
    public function __construct($id=0,$idCinema=0,$name="",$price=0,$capacity=0)
    {
        $this->id = $id;
        $this->idCinema = $idCinema;
        $this->name = $name;
        $this->price = $price;
        $this->capacity = $capacity;
    }

    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdCinema()
    {
        return $this->idCinema;
    }

    
    public function setIdCinema($idCinema)
    {
        $this->idCinema = $idCinema;
    }

    public function getName()
    {
        return $this->name;
    }

    
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }

    
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }
}

?>