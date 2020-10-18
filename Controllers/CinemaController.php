<?php
namespace Controllers;

use DAO\CinemaDAO as CinemaDAO;

class CinemaController{

    private $cinemaDAO;

    public function __construct()
    {
        $this->cinemaDAO = new CinemaDAO();
    }

    public function getData(){
        $url = "https://api.themoviedb.org/3/movie/now_playing?api_key=c0cb585209076897c1f12bc28efc0a20"; 
        $json = file_get_contents($url);
        $datos = json_decode($json,true);
        //$dire = "https://image.tmdb.org/t/p/w500/";

        var_dump($datos);
    }

    public function showListView(){
        require_once(VIEWS_PATH."cinema-list.php");
    }
}
