<?php

namespace Controllers;

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
        UtilitiesController::validateAdmin();

        $movieList = $this->movieController->getMovies($genre);

        require_once(VIEWS_PATH . "movie-list.php");
    }

    public function cinemaListingView()
    {
        $movieList = $this->movieController->getMoviesWithFunctions($_SESSION["cityid"]);
        require_once(VIEWS_PATH . "cinema-listing-view.php");
    }

    public function functionList($genre = "All", $date)
    {

        $functions = $this->cinemaFunctionController->getFunctions($this->cityController->getCity($_SESSION["cityid"]), $genre, $date);

        require_once(VIEWS_PATH . "function-list-view.php");
    }

    public function cinemaList()
    {
        UtilitiesController::validateAdmin();

        $cinemaList = $this->cinemaController->getCinemas();

        require_once(VIEWS_PATH . "cinema-list.php");
    }

    public function purchaseView($functionId){
        
        $function = $this->cinemaFunctionController->getFunctionById($this->cityController->getCity($_SESSION["cityid"]),$functionId);
        $availableSeats = $this->cinemaRoomController->getAvailableSeats($function->getId()); 
        require_once(VIEWS_PATH."purchase-view.php");
    }

    public function cinemaListModify()
    {
        UtilitiesController::validateAdmin();

        if (isset($_POST["modify"])) {

            $this->modifyCinemaView($_POST["modify"]);
        } else if (isset($_POST["delete"])) {
            $this->cinemaController->delete($_POST["delete"]);
            unset($_POST["delete"]);
            $this->cinemaListModify();
        } else {
            $cinemaList = $this->cinemaController->getCinemas();
            $controller = $this->cinemaController;

            require_once(VIEWS_PATH . "cinema-list-modify.php");
        }
    }

    public function adminView()
    {
        UtilitiesController::validateAdmin();
        require_once(VIEWS_PATH . "admin-panel.php");
    }

    public function addCinemaView()
    {
        UtilitiesController::validateAdmin();
        $_SESSION["roomNumber"] = 1;


        if (isset($_GET["save"])) {

            $city = $this->cityController->getCity($_GET["cinema"]["city"]);


            $this->cinemaController->addCinema($city, $_GET["cinema"]);

            $cinema = $this->cinemaController->getCinemaByCityAndName($city, $_GET["cinema"]["name"]);


            array_shift($_GET);
            array_pop($_GET);


            $this->cinemaRoomController->addRoom($cinema, $_GET);

            
        } else {

            if (isset($_GET["add"])) {

                $_SESSION["roomNumber"] = $_GET["add"] + 1;
            } else if (isset($_GET["remove"])) {

                $_SESSION["roomNumber"] = $_GET["remove"] - 1;
            }

            $_SESSION["add_cinema"] = $_GET;


        }


        $cities = $this->cityController->getCities();
        require_once(VIEWS_PATH . "add-cinema-view.php");
    }

    public function addCinemaFunctionView()
    {
        UtilitiesController::validateAdmin();
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

    public function addMoviesView()
    {
        UtilitiesController::validateAdmin();

        $movieList = $this->movieController->searchNewMovies();

        require_once(VIEWS_PATH . "add-movies-view.php");
    }

    public function modifyCinemaView($id)
    {

        UtilitiesController::validateAdmin();
        if (isset($_POST["add"])) {
            if (empty($_POST["addedRoom"]["name"]) || empty($_POST["addedRoom"]["price"]) || empty($_POST["addedRoom"]["capacity"])) {

                $city = $this->cityController->getCity($_SESSION["cityid"]);
                $cinema = $this->cinemaController->getCinemaByCityAndName($city, $_POST["name"]);

                unset($_POST["add"]);
                $id = $cinema->getId();

                $this->modifyCinemaView($id);
            } else {

                $city = $this->cityController->getCity($_SESSION["cityid"]);
                $cinema = $this->cinemaController->getCinemaByCityAndName($city, $_POST["name"]);

                $roomToAdd = [];

                array_pop($_POST);
                array_push($roomToAdd, array_pop($_POST));


                $this->cinemaRoomController->addRoom($cinema, $roomToAdd);
                unset($_POST["add"]);
                $id = $cinema->getId();

                $this->modifyCinemaView($id);
            }
        } else if (isset($_POST["updateCinema"])) {

            $city = $this->cityController->getCity($_SESSION["cityid"]);

            $cinema = $this->cinemaController->getCinemaById($_POST["updateCinema"], $city);

            $this->cinemaController->modifyCinema($cinema, array("name" => $_POST["name"], "address" => $_POST["address"]));


            unset($_POST["updateCinema"]);
            $id = $cinema->getId();

            $this->modifyCinemaView($id);
        } else if (isset($_POST["updateRoom"])) {

            $idRoom = $_POST["updateRoom"];
            $roomData = $_POST["room" . $_POST["updateRoom"]];
            $this->cinemaRoomController->updateRoom($idRoom, $roomData);

            unset($_POST["updateRoom"]);

            $city = $this->cityController->getCity($_SESSION["cityid"]);
            $cinema = $this->cinemaController->getCinemaByCityAndName($city, $_POST["name"]);

            $id = $cinema->getId();

            $this->modifyCinemaView($id);
        } else {
            $cinema = $this->cinemaController->getCinemaById($id);
            $city = $this->cityController->getCity($cinema->getCity()->getId());
            $rooms = $this->cinemaRoomController->getRooms($cinema);

            require_once(VIEWS_PATH . "modify-cinema-view.php");
        }
    }
}
