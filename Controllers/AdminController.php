<?php
namespace Controllers;

use DAO\AdminDAO as AdminDAO;

class AdminController{
    private $adminDAO;
    private $cinemaController;
    private $movieController;

    public function __construct()
    {
        $this->adminDAO = new AdminDAO();
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