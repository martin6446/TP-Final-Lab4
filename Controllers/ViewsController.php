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

    public function cinemaList(){

        $cinemaList = $this->cinemaController->getCinemas($this->cityController->getCity($_SESSION["cityid"]));

        require_once(VIEWS_PATH."cinema-list.php");
    }

    public function cinemaListRemove(){
        $cinemaList = $this->cinemaController->getCinemas($this->cityController->getCity($_SESSION["cityid"]));

        require_once(VIEWS_PATH."cinema-list-remove.php");
    }

    public function adminView(){
        require_once(VIEWS_PATH."admin-panel.php");
    }

    public function addCinemaView(){
        require_once(VIEWS_PATH."add-cinema-view.php");
    }

    public function addCinemaFunctionView(){
        $cinema = $this->cinemaController->retrieveCinema($_GET["id"],$this->cityController->getCity($_SESSION["cityid"]));

        require_once(VIEWS_PATH."cinemafunction-add-view.php");
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