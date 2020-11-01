<?php
namespace Controllers;

use Models\Room;

class ViewsController{
    private $cinemaController;
    private $cinemaRoomController;
    private $functionController;
    private $movieController;
    private $userController;

    public function __construct()
    {
        $this->cinemaController = new CinemaController();
        $this->cinemaRoomController = new CinemaRoomController();
        #$this->functionController = new FunctionController();
        $this->movieController = new MovieController();
        $this->userController = new UserController();
    }

    public function homeView(){
        $movies = $this->movieController->getMovies();
        $featuredMovies = array();
        array_push($featuredMovies, $movies[0], $movies[3], $movies[4]);
        $genres = $this->movieController->getGenres();

        require_once(VIEWS_PATH."home.php");
        
    }

    public function movieList($genre="All"){
        $movieList = $this->movieController->getMovies($genre);

        require_once(VIEWS_PATH."movie-list.php");
    }

    public function cinemaList($valor=0){

        $cinemaList = $this->cinemaController->getMovies();

        require_once(VIEWS_PATH."cinema-list.php");
    }

    public function cinemaListRemove(){
        $cinemaList = $this->cinemaController->retrieveCinemas();

        require_once(VIEWS_PATH."cinema-list-remove.php");
    }

    public function adminView($valor=0){
        require_once(VIEWS_PATH."admin-panel.php");
    }

    public function addCinemaView(){
        $valor = 1;

        $this->adminView($valor);
    }

    public function removeCinemaView(){
        $valor = 3;

        $this->adminView($valor);
        
    }

    public function addCinemaFunctionView(){
        $valor = 2;

        $this->adminView($valor);
    }

    public function modifyUser(){
        require_once(VIEWS_PATH."user-modify-view.php");
    }

    public function registerView(){
        require_once(VIEWS_PATH."user-register-view.php");
    }
}
?>