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
        $this->responseToMovies();

    }
    
    private function getData(){

        $url = "https://api.themoviedb.org/3/movie/now_playing?api_key=c0cb585209076897c1f12bc28efc0a20";
        $json = file_get_contents($url);
        $datos = json_decode($json,true);
        
        //var_dump($datos);
        return $datos;
    }

    public function getGenres(){
        $url = "https://api.themoviedb.org/3/genre/movie/list?api_key=c0cb585209076897c1f12bc28efc0a20&language=en-US";
        $json = file_get_contents($url);
        return json_decode($json,true)["genres"];
    }


    private function responseToMovies(){
        

        $response = $this->getData();
        $genres = $this->getGenres();
        
        $this->clearJson();
        
        foreach($response["results"] as $movies){
        
            $movie = new Movie();
            $movie->setIdMovie($movies["id"]);
            $movie->setName($movies["title"]);
            $movie->setReleaseDate($movies["release_date"]);
            $movie->setMoviePoster("https://image.tmdb.org/t/p/original/" . $movies["poster_path"]);

            

            foreach($movies["genre_ids"] as $genre_id){
                foreach($genres as $genre){
      
                if($genre_id == $genre["id"]){
                    $movie->addGenre($genre["name"]);
                  }
                }
              } 
            /// Por ahora persisten en un json....
            $this->Add($movie);
        }
        
        return $this->movieList;

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

    public function clearJson(){
        file_put_contents($this->filename, array());
    }

    private function SaveData(){
        $arrayToEncode = array();

        foreach($this->movieList as $movie){
            $valuesArray["Id"] = $movie->getIdMovie();
            $valuesArray["title"] = $movie->getName();
            $valuesArray["genre"] = $movie->getGenres();
            $valuesArray["release"] = $movie->getReleaseDate();
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
                $movie->setGenres($valuesArray["genre"]);
                $movie->setReleaseDate($valuesArray["release"]);
                $movie->setMoviePoster($valuesArray["poster"]);
                array_push($this->movieList, $movie);
            }
        }
    }

    

}


?>