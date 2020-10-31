<?php
namespace Controllers;

class AdminController{

    private $cinemaController;
    private $movieController;
    private $utility;

    public function __construct()
    {
        $this->cinemaController = new CinemaController();
        $this->movieController = new MovieController();
    }

    public function addMovie(){

    }

    public function addCinema($name,$ticketvalue,$capacity,$address,$address2,$city,$state,$zip){
        
        $this->cinemaController->addCinema($name,$ticketvalue,$capacity,$address,$address2,$city,$state,$zip);

        header("location:".FRONT_ROOT."/cinema/showListView");
    }

    public function removeMovie(){

    }

    public function removeCinema($cinemaname){

        $this->cinemaController->removeCinema($cinemaname);

        header("location:".FRONT_ROOT."/cinema/showListView");

    }


}


?>