<?php
namespace Controllers;

use DAO\Connection;

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

        //var_dump((Connection::GetInstance())->Execute("Select ciudades.id, id_provincia, ciudades.nombre as Ciudad, provincias.nombre as Provincia FrOM ciudades INNER JOIN provincias ON ciudades.id_provincia = provincias.id;"));
        
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

        $provinces = $this->cityController->getProvinces();
        $cities = $this->cityController->getCities();
        require_once(VIEWS_PATH."add-cinema-view.php");
    }

    public function addCinemaFunctionView(){
        $cinema = $this->cinemaController->getCinemaById($_GET["id"],$this->cityController->getCity($_SESSION["cityid"]));

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

    public function moviePreview(){
        require_once(VIEWS_PATH."movie-preview.php");
    }
}
