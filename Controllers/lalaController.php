<?php
namespace Controllers;

use DAO\MovieDAO as MovieDAO;

class lalaController
{
    private $movieDAO;

    public function __construct()
    {
        $this->movieDAO = new MovieDAO();
    }

    public function loadData()
    {
        $genre = $this->movieDAO->getGenres();

        require_once(VIEWS_PATH."index2.php");
        
    }
}

?>