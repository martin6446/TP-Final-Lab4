<?php

namespace DAO;

use Models\Movie as Movie;
use \Exception as Exception;

class MovieDAO 
{
    private $connection;
    private $genresTable = "genres";
    private $gxmTable = "genresxpelicula";
    private $moviesTable = "peliculas";
    private static $movieDAO = null;
    private $movieList = array();
    private $genreList = array();

    private function __construct()
    {
        $this->loadGenres();
        $this->loadMovies();
    }

    public static function getInstance(){
        if(self::$movieDAO == null){
            self::$movieDAO = new MovieDAO();
        }

        return self::$movieDAO;
    }

    public function getTrailer($id)
    {
        $url = "https://api.themoviedb.org/3/movie/" . $id . "/videos?api_key=c0cb585209076897c1f12bc28efc0a20&language=en-US";
        $json = file_get_contents($url);
        $response = json_decode($json, true)["results"];

        if ($response != NULL) {
            return $response[0]["key"];
        } else { /// si themoviedb no tiene trailer de la pelicula.
            return "RqJVa0fl01w"; /// Confused jhon Travolta
        }
    }

    public function getRuntime($id)
    {
        $url = "https://api.themoviedb.org/3/movie/" . $id . "?api_key=c0cb585209076897c1f12bc28efc0a20&language=en-US";
        $json = file_get_contents($url);
        $response = json_decode($json, true);
        return $response["runtime"];
    }

    /*  public function pushMovies()
    {
        $url = "https://api.themoviedb.org/3/movie/now_playing?api_key=c0cb585209076897c1f12bc28efc0a20";
        $json = file_get_contents($url);
        $datos = json_decode($json, true);

        $this->pushGenres();
         

         foreach ($datos["results"] as $movie) {

            try {
                $query = "INSERT INTO " . $this->moviesTable . " 
                (nombre, movieDB_ID, poster, backdrop, trailer, releaseDate, rating, duration) 
                VALUES 
                (:nombre, :idMovie, :poster, :backdrop, :trailer, :releaseDate, :rating, :duration);";

                $parameters["nombre"] = $movie["title"];
                $parameters["idMovie"] = $movie["id"];
                $parameters["poster"] = $movie["poster_path"];
                $parameters["backdrop"] = $movie["backdrop_path"];
                $parameters["trailer"] = $this->getTrailer($movie["id"]);
                $parameters["releaseDate"] = $movie["release_date"];
                $parameters["rating"] = $movie["vote_average"];
                $parameters["duration"] = $this->getRuntime($movie["id"]);

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

                $this->gxm($movie);
            } catch (Exception $ex) {
                throw $ex;
            }
        }  
    }   */
 
    public function gxm($movie)
    {
        foreach($movie["genre_ids"] as $genredb_id){
            $query = "INSERT INTO " . $this->gxmTable . " (id_pelicula, id_genre) VALUES (:id_pelicula, :id_genre);";
            
            $parameters["id_genre"] = $this->getGenreid($genredb_id);
            $parameters["id_pelicula"] = $this->getMovieid($movie);

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        }
        
    }

    public function getGenreid($genre_id){ /// obtiene la id de generos dada por la base de datos.
        $genres = $this->genreList;
        foreach($genres as $genre){
            if($genre["genreDB_ID"] == $genre_id){
                return $genre["id"];
            }
        }
    }

    public function getMovieid($movie){ /// obtiene la id de peliculas dada por la base de datos.
        $moviesdb = $this->getMoviesTable();
        foreach($moviesdb as $moviedb){
            if($moviedb["movieDB_ID"] == $movie["id"]){
                return $moviedb["id"];
            }
        }
    }

    

    public function getMoviesTable()
    {
        try {
            $query = "SELECT * FROM " . $this->moviesTable;

            $this->connection = Connection::GetInstance();

            $result = $this->connection->Execute($query);

            return $result;

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function getGenreList()
    {
        return $this->genreList;
    }

    private function loadGenres(){
        try {
            $query = "SELECT * FROM " . $this->genresTable;

            $this->connection = Connection::GetInstance();

            $result = $this->connection->Execute($query);

            $this->genreList = $result;

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /*  public function pushGenres()
    {
        $url = "https://api.themoviedb.org/3/genre/movie/list?api_key=c0cb585209076897c1f12bc28efc0a20&language=en-US";
        $json = file_get_contents($url);
        $genres = json_decode($json, true)["genres"];

        foreach ($genres as $genre) {
            try {
                $query = "INSERT INTO " . $this->genresTable . " (genreDB_ID, nombre) VALUES (:id,:name);";

                $parameters["id"] = $genre["id"];
                $parameters["name"] = $genre["name"];

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch (Exception $ex) {
                throw $ex;
            }
        }
    }  */

    public function getGenreName($id){
        $genres = $this->genreList;

        foreach($genres as $genre){
            if($genre["id"] == $id){
                return $genre["nombre"];
            }
        }

    }

    public function getMovieGrenres($idMovie){

        $query = "SELECT id_genre FROM genresxpelicula WHERE id_pelicula = ". $idMovie;
        
        try{

            $this->connection = Connection::GetInstance();
            $results = $this->connection->Execute($query);

            $gxp = array();
            foreach($results as $result){
            array_push($gxp,$this->getGenreName($result["id_genre"]));
            }

        }catch(Exception $e){
            throw $e;
        }

        return $gxp;
    }

    public function getMovieList()
    {
        return $this->movieList;
    }

    private function loadMovies(){
        $movies = $this->getMoviesTable();

        foreach($movies as $movie){
            $oMovie = new Movie();
            $oMovie->setIdMovie($movie["id"]);
            $oMovie->setMoviePoster("https://image.tmdb.org/t/p/original/".$movie["poster"]);
            $oMovie->setBackdrop("https://image.tmdb.org/t/p/original/".$movie["backdrop"]);
            $oMovie->setName($movie["nombre"]);
            $oMovie->setRating($movie["rating"]);
            $oMovie->setTrailer($movie["trailer"]);
            $oMovie->setReleaseDate($movie["releaseDate"]);

            $oMovie->setGenres($this->getMovieGrenres($movie["id"]));

            $oMovie->setDuration($movie["duration"]);

            array_push($this->movieList,$oMovie);
        }

    } 
}
