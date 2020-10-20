<?php
namespace Controllers;

use DAO\MovieDAO as MovieDAO;
use Models\Movie as Movie;

class MovieController{
    
    private $movieDAO;

    public function __construct(){
        $this->movieDAO = new MovieDAO();
    }

    public function showListView($genre = "All"){
        $allMovies = $this->movieDAO->GetAll();
        $movieList = array();
        if($genre !='All'){
            foreach($allMovies as $movie){
                if(array_search($genre, $movie->getGenres()) !== false){
                    array_push($movieList, $movie);
                }
            }
        }
        else{
            $movieList = $allMovies;
        }

        require_once(VIEWS_PATH."movie-list.php");
    }

}
