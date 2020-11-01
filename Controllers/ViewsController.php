<?php
namespace Controllers;


class ViewsController{
    private $cinemaController;
    private $cinemaRoomController;
    private $functionController;
    private $movieController;
    private $userController;
    private $cityController;

    public function __construct()
    {
        $this->cinemaController = new CinemaController();
        $this->cinemaRoomController = new CinemaRoomController();
        #$this->functionController = new FunctionController();
        $this->movieController = new MovieController();
        $this->userController = new UserController();
        $this->cityController = new CityController();
    }

    public function homeView(){
        #$this->movieController->updateDataBase();

        $movies = $this->movieController->getMovies();
        var_dump($movies);
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

        $cinemaList = $this->cinemaController->getCinemas($this->cityController->getCity($_SESSION["cityid"]));

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
    
        if(!empty($_GET)){

            $valor = 4;
        } else {
            $valor = 2;
        }

        $this->adminView($valor);
    }

    public function modifyUser(){
        $cities = $this->cityController->getCities();
        require_once(VIEWS_PATH."user-modify-view.php");
    }

    public function registerView(){
        $provinces = $this->cityController->getProvinces();
        $cities = $this->cityController->getCities();
        require_once(VIEWS_PATH."user-register-view.php");
    }
}
?>