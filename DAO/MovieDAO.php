<?php
namespace DAO;

    use DAO\IMovieDAO as IMovieDAO;
    use Models\Movie as Movie;

class MovieDAO implements IMovieDAO{

    private $movieList = array();
    private $filename;

    public function __construct()
    {
        $this->filename = dirname(__DIR__)."/Data/Movies.json";
    }
    
    public function Add(Movie $movie){
        $this->RetrieveData();
        array_push($this->movieList, $movie);
        $this->SaveData();
    }

    public function GetAll(){
        $this->RetrieveData();
        return $this->movieList;
    }

    private function SaveData(){
        $arrayToEncode = array();

        foreach($this->movieList as $movie){
            $valuesArray["Id"] = $movie->getIdMovie();
            $valuesArray["title"] = $movie->getName();
            $valuesArray["genre"] = $movie->getGenre();
            $valuesArray["release"] = $movie->getDate();
            $valuesArray["poster"] = $movie->getMoviePoster();
            array_push($arrayToEncode, $valuesArray);
        }
        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        file_put_contents($this->filename, $jsonContent);
    }

    private function RetrieveData(){
        
        $this->movieList = array();

        if(file_exists($this->filename)){
            $jsonContent = file_get_contents($this->filename);
            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach($arrayToDecode as $valuesArray){
                $movie = new Movie();
                $movie->setIdMovie($valuesArray["Id"]);
                $movie->setName($valuesArray["title"]);
                $movie->setGenre($valuesArray["genre"]);
                $movie->setDate($valuesArray["release"]);
                $movie->setMoviePoster($valuesArray["poster"]);
                array_push($this->movieList, $movie);
            }
        }
    }

    

}


?>