<?php
namespace Models;

class City{
    private $id;
    private $idProvincia;
    private $name;
    

    public function __construct($id = 0, $idProvincia = 0, $name = "")
    {
        $this->setId($id);
        $this->setIdProvincia($idProvincia);
        $this->setName($name);
    }


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

  

    public function getName(){
        return $this->name;
    }


    public function setName($name){
        $this->name = $name;
    }

}

?>