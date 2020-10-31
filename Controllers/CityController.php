<?php
namespace Controllers;

use DAO\CityDAO;

class CityController{
    private $cityDAO;

    public function __construct(){
        $this->cityDAO = new CityDAO();
    }

    public function getCities(){
        return $this->cityDAO->getAll();
    }

    public function getProvinces(){
        return $this->cityDAO->getProvinces();
    }
}

?>