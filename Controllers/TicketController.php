<?php
namespace Controllers;

use DAO\CinemaFunctionDAO;
use DAO\TicketDAO as TicketDAO;
use DateTime;
use Models\Ticket as Ticket;

class TicketController{
    private $ticketDAO;

    public function __construct()
    {
        $this->ticketDAO = new TicketDAO();
    }


    public function purchaseTickets(){

        $function = (new CinemaFunctionDAO)->getFunctionById((new CityController)->getCity($_SESSION["cityid"]),$_GET["functionId"]);

        $date = (new DateTime())->format("l");

        if($_GET["seats"] >= 2 && $date == "Tuesday" || $date == "Wednesday"){

            $discount = 0.25;
        } else{
            $discount = 0;
        }


        $ticket = new Ticket($_SESSION["loggedUser"],$function,$_GET["seats"],$discount);


        if($this->ticketDAO->add($ticket) != 1){
            UtilitiesController::notification("There was an error with out Data Base",FRONT_ROOT."views/homeView");
        } else {
            UtilitiesController::notification("Ticket successfully buyed!", FRONT_ROOT."views/homeView");
        }

    }
}

?>