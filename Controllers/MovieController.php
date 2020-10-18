<?php
namespace Controller;

use DAO\MovieDAO as MovieDAO;

class MovieController{
    private $movieDAO;

    public function __construct()
    {
        $this->movieDAO = new MovieDAO();
    }
}

?>