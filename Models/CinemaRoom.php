<?php
namespace Models;
use Models\Cinema;


class CinemaRoom{
    private $id;
    private $cinema;
    private $name;
    private $price;
    private $capacity;
    
    public function __construct($id=0,$cinema= null,$name="",$price=0,$capacity=0)
    {
        $this->setId($id);
        $this->setCinema($cinema);
        $this->setName($name);
        $this->setPrice($price);
        $this->setCapacity($capacity);
    }

    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;
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

    public function getCinema(){
        return $this->cinema;
    }


    public function setCinema(Cinema $Cinema){
        $this->cinema = $Cinema;
    }

}

?>