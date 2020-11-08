<?php

namespace Controllers;

use DAO\CinemaDAO;
use DAO\Connection;
use Models\Cinema;

class ViewsController
{
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

    public function homeView()
    {
        $this->movieController->searchNewMovies();
        $movies = $this->movieController->getMovies();
        $genres = $this->movieController->getGenres();

        $featuredMovies = array();
        array_push($featuredMovies, $movies[0], $movies[1], $movies[2]);


        require_once(VIEWS_PATH . "home.php");
    }

    public function Login()
    {
        require_once(VIEWS_PATH . "login.php");
    }

    public function movieList($genre = "All")
    {
        $movieList = $this->movieController->getMovies($genre);

        require_once(VIEWS_PATH . "movie-list.php");
    }

    public function functionList($genre = "All", $date = "Any")
    {

        $functions = $this->cinemaFunctionController->getFunctions($this->cityController->getCity($_SESSION["cityid"]), $genre, $date);

        require_once(VIEWS_PATH . "function-list-view.php");
    }

    public function cinemaList()
    {

        $cinemaList = $this->cinemaController->getCinemas($this->cityController->getCity($_SESSION["cityid"]));

        require_once(VIEWS_PATH . "cinema-list.php");
    }

    public function cinemaListModify()
    {
        $cinemaList = $this->cinemaController->getCinemas($this->cityController->getCity($_SESSION["cityid"]));
        $controller = $this->cinemaController;

        require_once(VIEWS_PATH . "cinema-list-modify.php");
    }

    public function adminView()
    {
        require_once(VIEWS_PATH . "admin-panel.php");
    }

    public function addCinemaView()
    {

        $_SESSION["roomNumber"] = 1;


        if (isset($_GET["button"])) {

            if ($_GET["button"] != "save") {
                $_SESSION["roomNumber"] = $_GET["button"] + 1;
            } else {

                $city = $this->cityController->getCity($_GET["cinema"]["city"]);


                #$this->cinemaController->addCinema($city, $_GET["cinema"]);

                $cinema = $this->cinemaController->getCinemaByCityAndName($city, "Oestherheld");


                array_shift($_GET);
                array_pop($_GET);

                $this->cinemaRoomController->addRoom($cinema, $_GET);
            }
        }


        $cities = $this->cityController->getCities();
        require_once(VIEWS_PATH . "add-cinema-view.php");
    }

    public function addCinemaFunctionView()
    {
        $cinema = $this->cinemaController->getCinemaById($_GET["id"], $this->cityController->getCity($_SESSION["cityid"]));

        $rooms = $this->cinemaRoomController->getRooms($cinema);

        $movies = $this->movieController->getMovies();

        require_once(VIEWS_PATH . "cinemafunction-add-view.php");
    }

    public function modifyUser()
    {
        $cities = $this->cityController->getCities();
        $cityUser = $this->cityController->getCity($_SESSION["cityid"]);
        require_once(VIEWS_PATH . "user-modify-view.php");
    }

    public function registerView()
    {
        $cities = $this->cityController->getCities();
        require_once(VIEWS_PATH . "user-register-view.php");
    }

    public function moviePreview()
    {

        $movie = $this->movieController->retrieveMovie($_GET["movieId"]);

        $functions = $this->cinemaFunctionController->retrieveFunction($this->cityController->getCity($_SESSION["cityid"]), $_GET["movieId"]);

        require_once(VIEWS_PATH . "movie-preview.php");
    }

    public function addMoviesView(){

        

        require_once(VIEWS_PATH."add-movies-view.php");
    }

    public function modifyCinemaView(){

        if (isset($_GET["add"])) {
            if (empty($_GET["addedRoom"]["name"]) || empty($_GET["addedRoom"]["price"]) || empty($_GET["addedRoom"]["capacity"])) {

                $city = $this->cityController->getCity($_SESSION["cityid"]);
                $cinema = $this->cinemaController->getCinemaByCityAndName($city, $_GET["name"]);

                unset($_GET["add"]);
                $_GET["id"] = $cinema->getId();

                $this->modifyCinemaView();
                
            } else {

                $city = $this->cityController->getCity($_SESSION["cityid"]);
                $cinema = $this->cinemaController->getCinemaByCityAndName($city, $_GET["name"]);

                $roomToAdd = [];

                array_pop($_GET);
                array_push($roomToAdd, array_pop($_GET));


                $this->cinemaRoomController->addRoom($cinema, $roomToAdd);
                unset($_GET["add"]);
                $_GET["id"] = $cinema->getId();

                $this->modifyCinemaView();
            }
        } else if (isset($_GET["updateCinema"])) {

            $city = $this->cityController->getCity($_SESSION["cityid"]);

            $cinema = $this->cinemaController->getCinemaById($_GET["updateCinema"], $city);

            $this->cinemaController->modifyCinema($cinema, array("name" => $_GET["name"], "address" => $_GET["address"]));


            unset($_GET["updateCinema"]);
            $_GET["id"] = $cinema->getId();

            $this->modifyCinemaView();

        } else if (isset($_GET["updateRoom"])) {

            $idRoom = $_GET["updateRoom"];
            $roomData = $_GET["room".$_GET["updateRoom"]];
            $this->cinemaRoomController->updateRoom($idRoom,$roomData);

            unset($_GET["updateRoom"]);

            $city = $this->cityController->getCity($_SESSION["cityid"]);
            $cinema = $this->cinemaController->getCinemaByCityAndName($city, $_GET["name"]);

            $_GET["id"] = $cinema->getId();

            $this->modifyCinemaView();

        } else {
            $city = $this->cityController->getCity($_SESSION["cityid"]);
            $cinema = $this->cinemaController->getCinemaById($_GET["id"], $city);
            $rooms = $this->cinemaRoomController->getRooms($cinema);

            require_once(VIEWS_PATH . "modify-cinema-view.php");
        }
    }
}
