<?php
namespace Controllers;

use DAO\TicketDAO as TicketDAO;

class TicketController{
    private $ticketDAO;

    public function __construct()
    {
        $this->ticketDAO = new TicketDAO();
    }
}

?>