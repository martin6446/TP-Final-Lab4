<?php
namespace Controllers;

use DAO\MovieDAO as MovieDAO;
use Models\Movie as Movie;

class MovieController{
    
    private $movieDAO;

    public function __construct(){
        $this->movieDAO = MovieDAO::getInstance();
    }

    public function getMovies($genre = "All"){
        $allMovies = $this->movieDAO->getMovieList();
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

        return $movieList;
    }

    public function getMovieGenre(){
        var_dump($this->movieDAO->getMovieGenres(1));
    }

    public function getGenres(){
        return $this->movieDAO->getGenreList();
    }  

    public function retrieveMovie($movieId){
        return $this->movieDAO->getMovieById($movieId);
    }


}
