<?php
namespace Models;

class Cinema{
    private $name;
    private $location;
    private $moviePlaying;
    private $capacity;
        

    public function getName()
    {
        return $this->name;
    }

    
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getLocation()
    {
        return $this->location;
    }

    
    public function setLocation($location)
    {
        $this->location = $location;
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
}

?>