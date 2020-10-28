<?php
namespace Models;

class City{
    private $id;
    private $idProvincia;
    private $nombre;
    

    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdProvincia()
    {
        return $this->idProvincia;
    }

    
    public function setIdProvincia($idProvincia)
    {
        $this->idProvincia = $idProvincia;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}

?>