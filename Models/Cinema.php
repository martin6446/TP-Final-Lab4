<?php
namespace Models;

class Cinema{
    private $name;
    private $address;
    private $city;



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

}
?>