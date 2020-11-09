<?php 
    namespace Models;

use DateTime;
use Models\Movie as Movie;

    class CinemaFunction{
        private $id;
        private $movie;
        private $startTime;
        private $endTime;
        private $cinemaRoom;
        
        public function __construct($movie = null, $startTime = null, $endTime = null, $cinemaRoom = null, $id=0){
          $this->setId($id);  
          $this->setMovie($movie);  
          $this->setStartTime($startTime);  
          $this->setEndTime($endTime);  
          $this->setCinemaRoom($cinemaRoom);  
        }



    public function getId(){
        return $this->id;
    }


    public function setId($id){
        $this->id = $id;
    }


    public function getMovie(){
        return $this->movie;
    }


    public function setMovie(Movie $movie){
        $this->movie = $movie;
    }


    public function getStartTime(){
        return  $this->startTime->format('Y-m-d H:i:s');
    }

    public function getPrettyStartTime(){
        return $this->startTime->format("l d/m  H:i");
    }


    public function setStartTime($startTime){
        $this->startTime = new DateTime($startTime);
       
    }


    public function getEndTime(){
        return $this->endTime->format('Y-m-d H:i:s');

    }

    public function getPrettyEndTime(){
        return $this->endTime->format("H:i");
    }


    public function setEndTime($endTime){
        $this->endTime = new DateTime($endTime);
    }


    public function getCinemaRoom(){
        return $this->cinemaRoom;
    }


    public function setCinemaRoom($cinemaRoom){
        $this->cinemaRoom = $cinemaRoom;
    }

    }



?>