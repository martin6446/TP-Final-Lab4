<?php
namespace Controllers;

use DAO\MovieDAO as MovieDAO;
use Models\Movie as Movie;

class MovieController{
    
    private $movieDAO;
    private $movieList = array();

    public function __construct()
    {
        $this->movieDAO = new MovieDAO();
    }

    public function showListView(){

        $movieList = $this->responseTOmovies();
        require_once(VIEWS_PATH."movie-list.php");
    }

    public function getData(){

        $url = "https://api.themoviedb.org/3/movie/now_playing?api_key=c0cb585209076897c1f12bc28efc0a20";
        $json = file_get_contents($url);
        $datos = json_decode($json,true);
        
        //var_dump($datos);
        return $datos;
    }

    public function responseTOmovies(){
        
        $response = $this->getData();
        $url = "https://api.themoviedb.org/3/genre/movie/list?api_key=c0cb585209076897c1f12bc28efc0a20&language=en-US";
        $json = file_get_contents($url);
        $genres = json_decode($json,true)["genres"];

        foreach($response["results"] as $movies){
        
            $movie = new Movie();
            $movie->setIdMovie($movies["id"]);
            $movie->setName($movies["title"]);
            $movie->setDate($movies["release_date"]);
            $movie->setMoviePoster("https://image.tmdb.org/t/p/original/" . $movies["poster_path"]);

            foreach($movies["genre_ids"] as $genre_id){
                foreach($genres as $genre){
      
                if($genre_id == $genre["id"]){
                    $movie->addGenre($genre["name"]);
                  }
                }
              }

            array_push($this->movieList, $movie);
            
            /// Por ahora persisten en un json....
            $this->movieDAO->Add($movie);
        }
        
        return $this->movieList;

    }


}
