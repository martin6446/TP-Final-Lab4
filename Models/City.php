<?php
namespace Models;

class City{
    private $id;
    private $name;
    

    public function __construct($id = 0, $name = "")
    {
        $this->setId($id);
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
  

    public function getName(){
        return $this->name;
    }


    public function setName($name){
        $this->name = $name;
    }

}

?>