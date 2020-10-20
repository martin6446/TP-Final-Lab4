<?php
namespace Models;

class Cinema{
    private $name;
    private $address;
    private $address2;
    private $city;
    private $state;
    private $zip;
    private $moviePlaying;
    private $capacity;
    private $ticketValue;
        

    public function getName()
    {
        return $this->name;
    }

    
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getMoviePlaying()
    {
        return $this->moviePlaying;
    }

    
    public function setMoviePlaying($moviePlaying)
    {
        $this->moviePlaying = $moviePlaying;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }

    
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    public function getAddress()
    {
        return $this->address;
    }

    
    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAddress2()
    {
        return $this->address2;
    }

    
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    }

    public function getCity()
    {
        return $this->city;
    }

    
    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getState()
    {
        return $this->state;
    }

    
    public function setState($state)
    {
        $this->state = $state;
    }

    public function getZip()
    {
        return $this->zip;
    }

    
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    public function getTicketValue()
    {
        return $this->ticketValue;
    }

    
    public function setTicketValue($ticketValue)
    {
        $this->ticketValue = $ticketValue;
    }
}

?>