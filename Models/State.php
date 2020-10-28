<?php
namespace Models;

class State{
    private $id;
    private $nombre;
    private $cities = [];
    

    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getCities()
    {
        return $this->cities;
    }

    
    public function setCities($cities)
    {
        $this->cities = $cities;
    }
}
?>