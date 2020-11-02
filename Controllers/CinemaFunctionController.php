<?php
namespace Controllers;

use DAO\CinemaFunctionDAO;
use DateTime;

class CinemaFunctionController{
    private $cinemaFunctionDAO;

    public function __construct()
    {
        $this->cinemaFunctionDAO = new CinemaFunctionDAO();
    }


    public function addFunction(){
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $date = new DateTime();
        foreach($_GET["weekday"] as $day){
            $chosenDays[$day] = $day;
        }

        var_dump($);
        die;
        
        echo $date->modify( '+1 days' )->format( 'l' );
        die;

        $days = $_GET["week"] * 7;


       for($x = 0; $x > $days; $x++){
            if(isset($chosenDays["monday"])){

            }
        }
     
        


        


    }

}

?>