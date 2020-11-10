<?php

namespace Controllers;

use DAO\MovieDAO as MovieDAO;
use Models\Movie as Movie;

class MovieController
{

    private $movieDAO;

    public function __construct()
    {
        $this->movieDAO = MovieDAO::getInstance();
    }

    public function getMovies($genre = "All")
    {
        $allMovies = $this->movieDAO->getMovieList();
        $movieList = array();
        if ($genre != 'All') {
            foreach ($allMovies as $movie) {
                if (array_search($genre, $movie->getGenres()) !== false) {
                    array_push($movieList, $movie);
                }
            }
        } else {
            $movieList = $allMovies;
        }

        return $movieList;
    }

    public function addMovie($movieId)
    {
        UtilitiesController::validateAdmin();

        $movie = $this->fetchApiMovie($movieId);

        $this->movieDAO->add($movie);

        $this->movieDAO->loadMovies();

        header("location:".FRONT_ROOT."views/addMoviesView");

    }

    public function getMovieGenre()
    {
        var_dump($this->movieDAO->getMovieGenres(1));
    }

    public function getGenres()
    {
        return $this->movieDAO->getGenreList();
    }

    public function retrieveMovie($movieId)
    {
        return $this->movieDAO->getMovieById($movieId);
    }

    public function fetchApiMovie($movieId)
    {

        $url = "https://api.themoviedb.org/3/movie/" . $movieId . "?api_key=c0cb585209076897c1f12bc28efc0a20&language=en-US";
        $json = file_get_contents($url);
        $movie = json_decode($json, true);

        return $movie;
    }

    private function fetchApiMovies()
    {

        $movieArray = array();

        $url = "https://api.themoviedb.org/3/movie/now_playing?api_key=c0cb585209076897c1f12bc28efc0a20";
        $json = file_get_contents($url);
        $response = json_decode($json, true);


        $url = "https://api.themoviedb.org/3/genre/movie/list?api_key=c0cb585209076897c1f12bc28efc0a20&language=en-US";
        $json = file_get_contents($url);
        $genres = json_decode($json, true)["genres"];




        foreach ($response["results"] as $movie) {

            $movieObj = new Movie();
            $movieObj->setIdMovie($movie["id"]);
            $movieObj->setName($movie["title"]);
            $movieObj->setReleaseDate($movie["release_date"]);
            $movieObj->setRating($movie["vote_average"]);
            $movieObj->setOverview($movie["overview"]);
            $movieObj->setDuration($this->movieDAO->getRuntime($movie["id"]));
            $movieObj->setTrailer($this->movieDAO->getTrailer($movie["id"]));
            $movieObj->setMoviePoster("https://image.tmdb.org/t/p/original/" . $movie["poster_path"]);
            $movieObj->setBackdrop("https://image.tmdb.org/t/p/original/" . $movie["backdrop_path"]);


            foreach ($movie["genre_ids"] as $genre_id) {
                foreach ($genres as $genre) {

                    if ($genre_id == $genre["id"]) {
                        $movieObj->addGenre($genre["name"]);
                    }
                }
            }
            array_push($movieArray, $movieObj);
        }

        return $movieArray;
    }

    public function searchNewMovies()
    {
        UtilitiesController::validateAdmin();
        
        $apiMovies = $this->fetchApiMovies();
        $dbMovies = $this->movieDAO->getMovieList();


        return array_diff($apiMovies, $dbMovies);
    }

    public function getMoviesWithFunctions($cityId){
        return $this->movieDAO->getMoviesWithFunctions($cityId);
    }
}
