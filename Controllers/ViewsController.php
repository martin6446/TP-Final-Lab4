<?php
namespace Controllers;

use DAO\Connection;

class ViewsController{
    private $cinemaController;
    private $cinemaRoomController;
    private $CinemaFunctionController;
    private $movieController;
    private $userController;
    private $cityController;

    public function __construct()
    {
        $this->cinemaController = new CinemaController();
        $this->cinemaRoomController = new CinemaRoomController();
        $this->cinemaFunctionController = new CinemaFunctionController();
        $this->movieController = new MovieController();
        $this->userController = new UserController();
        $this->cityController = new CityController();
    }

    public function homeView(){

        $movies = $this->movieController->getMovies();
        $genres = $this->movieController->getGenres();

        $featuredMovies = array();
        array_push($featuredMovies, $movies[0], $movies[3], $movies[4]);
        

        require_once(VIEWS_PATH."home.php");
        
    }

    public function Login()
    {
        require_once(VIEWS_PATH."login.php");
    }

    public function movieList($genre="All"){
        $movieList = $this->movieController->getMovies($genre);

        require_once(VIEWS_PATH."movie-list.php");
    }

    public function functionList($genre="All", $date="Any"){

        $functions = $this->cinemaFunctionController->getFunctions($this->cityController->getCity($_SESSION["cityid"]),$genre,$date);

        require_once(VIEWS_PATH."function-list-view.php");
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

        $_SESSION["roomNumber"] = 1;
        
        if(isset($_GET["button"])){

            if($_GET["button"] != "save"){
                $_SESSION["roomNumber"] = $_GET["button"] + 1;
            }else {

                $city = $this->cityController->getCity($_GET["cinema"]["city"]);


                #$this->cinemaController->addCinema($city,$_GET["cinema"]);

                $cinema = $this->cinemaController->getCinemaByCityAndName($city,"Oestherheld");


                array_shift($_GET);
                array_pop($_GET);

                $this->cinemaRoomController->addRoom($cinema,$_GET);
                
            }

        }

        
        $cities = $this->cityController->getCities();
        require_once(VIEWS_PATH."add-cinema-view.php");
    }

    public function addCinemaFunctionView(){
        $cinema = $this->cinemaController->getCinemaById($_GET["id"],$this->cityController->getCity($_SESSION["cityid"]));

        $rooms = $this->cinemaRoomController->getRooms($cinema);

        $movies = $this->movieController->getMovies();

        require_once(VIEWS_PATH."cinemafunction-add-view.php");
    }

    public function modifyUser(){
        $cities = $this->cityController->getCities();
        require_once(VIEWS_PATH."user-modify-view.php");
    }

    public function registerView(){
        $cities = $this->cityController->getCities();
        require_once(VIEWS_PATH."user-register-view.php");
    }

    public function moviePreview(){

        $movie = $this->movieController->retrieveMovie($_GET["functionId"]);

        require_once(VIEWS_PATH."movie-preview.php");
    }
}
