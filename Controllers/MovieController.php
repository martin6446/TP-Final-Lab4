<?php
namespace Controllers;

use DAO\MovieDAO as MovieDAO;

class MovieController{
    private $movieDAO;

    public function __construct()
    {
        $this->movieDAO = new MovieDAO();
    }

    public function showListView(){

        $movieList = $this->getData();

        require_once(VIEWS_PATH."movie-list.php");
    }

    public function getData(){
        $url = "https://api.themoviedb.org/3/movie/now_playing?api_key=c0cb585209076897c1f12bc28efc0a20"; 
        $json = file_get_contents($url);
        $datos = json_decode($json,true);
        //$dire = "https://image.tmdb.org/t/p/w500/";

        #var_dump($datos);

        return $datos;
    }
}

?>