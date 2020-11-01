<?php
namespace Models;

class Province{
    private $id;
    private $nombre;
    
    public function __construct($id=0,$nombre="")
    {
        $this->id = $id;
        $this->nombre = $nombre;
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
        return $this->nombre;
    }

    
    public function setName($nombre)
    {
        $this->nombre = $nombre;
    }

}
?>