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

    public function showAdminView(){
        require_once(VIEWS_PATH."admin-panel.php");
    }

    public function showAdminAddCinemaView(){
        require_once(VIEWS_PATH."add-cinema-view.php");
    }

    public function showAdminRemoveCinemaView(){
        $cinemaList = $this->cinemaController->retrieveCinemas();

        require_once(VIEWS_PATH."cinema-list-remove.php");
    }

    public function showAdminAddCinemaFunctionView(){
        require_once(VIEWS_PATH. "cinemafunction-add-view.php");
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