<?php
namespace Models;


class Movie{

    private $idMovie;
    private $moviePoster;
    private $backdrop;
    private $name;
    private $releaseDate; // date real
    private $genres = array();
    private $duration;

    public function getName()
    {
        return $this->name;
    }

    
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    
    public function setReleaseDate($date)
    {
        $this->releaseDate = $date;
    }

    public function getGenres()
    {
        return $this->genres;
    }

    
    public function addGenre($genre)
    {
        array_push($this->genres, $genre);
    }

    public function getDuration()
    {
        return $this->duration;
    }

    
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    public function getIdMovie()
    {
        return $this->idMovie;
    }

    
    public function setIdMovie($idMovie)
    {
        $this->idMovie = $idMovie;
    }

    public function getMoviePoster()
    {
        return $this->moviePoster;
    }

    
    public function setMoviePoster($moviePoster)
    {
        $this->moviePoster = $moviePoster;
    }

    
    public function setGenres($genre)
    {
        $this->genres = $genre;
    }

    public function getBackdrop(){
        return $this->backdrop;
    }


    public function setBackdrop($backdrop){
        $this->backdrop = $backdrop;
    }

}


?>