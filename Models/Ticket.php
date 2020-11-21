<?php
namespace Models;


class Ticket{

    private $ticketNumber;
    private $movieFunction;
    
    public function getTicketNumber()
    {
        return $this->ticketNumber;
    }

    public function setTicketNumber($ticketNumber)
    {
        $this->ticketNumber = $ticketNumber;
    }

    public function getMovieFunction()
    {
        return $this->movieFunction;
    }

    
    public function setMovieFunction($movieFunction)
    {
        $this->movieFunction = $movieFunction;
    }
}

?>