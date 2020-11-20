<?php

namespace Controllers;

use DAO\CinemaFunctionDAO;
use DAO\MovieDAO;
use DateTime;
use Models\CinemaFunction as CinemaFunction;
use Controllers\UtilitiesController;

class CinemaFunctionController
{
    private $cinemaFunctionDAO;
    private $utility;

    public function __construct()
    {
        $this->cinemaFunctionDAO = new CinemaFunctionDAO();
        $this->utility = new UtilitiesController();
    }

    public function retrieveFunction($city, $movieId)
    {
        return $this->cinemaFunctionDAO->getByCityAndMovieId($city, $movieId);
    }


    public function getFunctionById($functionId){
        return $this->cinemaFunctionDAO->getFunctionById($city,$functionId);
    }


    public function getFunctions($city, $genre = "All", $date)
    {

        if ($date == "") {
            $date = "Any";
        }

        $allFunctions =  $this->cinemaFunctionDAO->getAll($city);

        $filteredFunctions = array();
        if ($date != "Any" && $genre != "All") {
            foreach ($allFunctions as $function) {
                if (array_search($genre, $function->getMovie()->getGenres()) !== false && (new DateTime($function->getStartTime()))->format("Y-m-d") == $date) {
                    array_push($filteredFunctions, $function);
                }
            }
        } else if ($date != "Any") {
            foreach ($allFunctions as $function) {
                if ((new DateTime($function->getStartTime()))->format("Y-m-d") == $date) {
                    array_push($filteredFunctions, $function);
                }
            }
        } else if ($genre != 'All') {
            foreach ($allFunctions as $function) {
                if (array_search($genre, $function->getMovie()->getGenres()) !== false) {
                    array_push($filteredFunctions, $function);
                }
            }
        } else {
            $filteredFunctions = $allFunctions;
        }


        return $filteredFunctions;
    }

    /*     public function getMovies($genre = "All"){
        $allMovies = $this->movieDAO->getMovieList();
        $movieList = array();
        if($genre !='All'){
            foreach($allMovies as $movie){
                if(array_search($genre, $movie->getGenres()) !== false){
                    array_push($movieList, $movie);
                }
            }
        }
        else{
            $movieList = $allMovies;
        }

        return $movieList;
    } */



    public function addFunction()
    {
        UtilitiesController::validateAdmin();
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $date = (new DateTime())->modify('+1 days');
        foreach ($_GET["weekday"] as $day) {
            $chosenDays[$day] = $day;
        }

        /* echo $date->modify( '+1 days' )->format( 'l' );
        die; */

        $days = $_GET["week"] * 7;



        $movie = MovieDAO::getInstance()->getMovieById($_GET["movieId"]);

        $stTime = (new DateTime($_GET["starttime"]))->modify('+1 days')->format("Y-m-d H:i:s");

        $endTime = (new DateTime($stTime))->modify('+' . $movie->getDuration() . ' minutes')->format("Y-m-d H:i:s");

        $roomId = $_GET["roomId"];


        $functions = array();

        for ($x = 0; $x < $days; $x++) {

            if (isset($chosenDays["monday"]) && $date->format('l') == "Monday") {
                array_push($functions, new CinemaFunction($movie, $stTime, $endTime));
            }
            if (isset($chosenDays["tuesday"]) && $date->format('l') == "Tuesday") {
                array_push($functions, new CinemaFunction($movie, $stTime, $endTime));
            }
            if (isset($chosenDays["wednesday"]) && $date->format('l') == "Wednesday") {
                array_push($functions, new CinemaFunction($movie, $stTime, $endTime));
            }
            if (isset($chosenDays["thursday"]) && $date->format('l') == "Thursday") {
                array_push($functions, new CinemaFunction($movie, $stTime, $endTime));
            }
            if (isset($chosenDays["friday"]) && $date->format('l') == "Friday") {
                array_push($functions, new CinemaFunction($movie, $stTime, $endTime));
            }
            if (isset($chosenDays["saturday"]) && $date->format('l') == "Saturday") {
                array_push($functions, new CinemaFunction($movie, $stTime, $endTime));
            }
            if (isset($chosenDays["sunday"]) && $date->format('l') == "Sunday") {
                array_push($functions, new CinemaFunction($movie, $stTime, $endTime));
            }

            $stTime = (new DateTime($stTime))->modify('+1 days')->format("Y-m-d H:i:s");
            $endTime = (new DateTime($endTime))->modify('+1 days')->format("Y-m-d H:i:s");
            $date->modify('+1 days');
        }

        if (empty($this->cinemaFunctionDAO->validate($_GET["roomId"], ...$functions))) {



            foreach ($functions as $function) {
                $this->cinemaFunctionDAO->add($function, $roomId);
            }

            $this->utility->notification("Succesfully added functions",FRONT_ROOT."views/cinemaList");
        } else {
            $this->utility->notification("There was a conflict with an existing function",FRONT_ROOT."views/cinemaList");
        }
    }
}
