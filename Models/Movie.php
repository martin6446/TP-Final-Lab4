<?php
namespace Models;


class Movie{
    private $name;
    private $date;
    private $category;
    private $duration;

    public function getName()
    {
        return $this->name;
    }

    
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDate()
    {
        return $this->date;
    }

    
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getCategory()
    {
        return $this->category;
    }

    
    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }
}


?>