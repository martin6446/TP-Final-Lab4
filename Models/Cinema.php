<?php
namespace Models;

class Cinema{
    private $id;
    private $name;
    private $address;
    private $city;

    public function __construct($city = null, $id = 0, $name= "", $address= ""){
        $this->setId($id);
        $this->setName($name);
        $this->setAddress($address);
        $this->setCity($city);
    }


    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getAddress(){
        return $this->address;
    }


    public function setAddress($address){
        $this->address = $address;
    }


    public function getCity(){
        return $this->city;
    }


    public function setCity($city){
        $this->city = $city;
    }

    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;
    }

}
?>