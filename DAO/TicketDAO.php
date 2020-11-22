<?php
namespace DAO;

use Exception;
use Models\Ticket as Ticket;

class TicketDAO{
    private $connection;
    private $tableName;
    private $ticketList;

    public function __construct(){
        $this->tableName = 'entradas';
        $this->ticketList = array();
    }


    public function add(Ticket $ticket){

        $query = "CALL p_buy_tickets(?,?,?,?);";
        $params["userEmail"] = $ticket->getUser()->getEmail();
        $params["functionId"] = $ticket->getFunction()->getId();
        $params["ticketAmount"] = $ticket->getTicketAmount();
        $params["discount"] = $ticket->getDiscount();

        try{

            $this->connection = Connection::GetInstance();
            
            return  $this->connection->ExecuteNonQuery($query,$params, QueryType::StoredProcedure);

        }catch(Exception $e){
            throw $e;
        }

    }

}

?>