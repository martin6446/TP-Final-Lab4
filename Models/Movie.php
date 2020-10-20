<?php
namespace Models;


class Movie{

    private $idMovie;
    private $moviePoster;
    private $name;
    private $date; // date real
    private $genre = array();
    private $duration;

    public function getName()
    {
        return $this->name;
    }

    
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDate()
    {
        return $this->date;
    }

    
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    
    public function addGenre($genre)
    {
        array_push($this->genre, $genre);
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

    
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }
}


?>