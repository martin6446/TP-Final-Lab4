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
        
        public function __construct($id=0, $movie = null, $startTime = null, $endTime = null, $cinemaRoom = null){
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


    public function setMovie($movie){
        $this->movie = $movie;
    }


    public function getStartTime(){
        return $this->startTime;
    }


    public function setStartTime($startTime){
        $this->startTime = new DateTime($startTime);
        $this->startTime->format('Y-m-d H:i:s');
    }


    public function getEndTime(){
        return $this->endTime;
    }


    public function setEndTime($endTime){
        $this->endTime = new DateTime($endTime);
        $this->endTime->format('Y-m-d H:i:s');
    }


    public function getCinemaRoom(){
        return $this->cinemaRoom;
    }


    public function setCinemaRoom($cinemaRoom){
        $this->cinemaRoom = $cinemaRoom;
    }

    }



?>