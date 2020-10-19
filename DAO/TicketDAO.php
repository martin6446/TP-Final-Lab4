<?php
namespace DAO;

use Models\Ticket as Ticket;

class TicketDAO{
    
    private $filename;
    private $ticketList = array();

    public function __construct()
    {
        $this->filename = dirname(__DIR__)."/Data/Ticket.json";
    }

    public function retrieveData(){

        if(file_exists($this->filename)){
            $jsonContent = file_get_contents($this->filename);

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent,true) : array();

            foreach($arrayToDecode as $data){
                $ticket = new Ticket();

                /*llenar con datos de ticket*/

                array_push($this->ticketList,$ticket);
            }
        }
    }

    public function saveData(){
        $arrayToEncode = array();

        foreach($this->ticketList as $ticket){
            
            /*llenar con datos de ticket*/

            array_push($arrayToEncode,$valuesArray);
        }

        file_put_contents($this->filename,json_encode($arrayToEncode,JSON_PRETTY_PRINT));
    }

    public function add(Ticket $ticket){

        $this->retrieveData();
        array_push($this->ticketList,$ticket);
        $this->saveData();
    }

    public function getAll(){
        $this->retrieveData();
        return $this->ticketList;
    }

    public function remove($ticketid){
        
        $this->retrieveData();

        foreach($this->ticketList as $ticket){
            if($ticket->getId() == $ticketid){
                array_splice($this->ticketList,array_search($ticket,$this->ticketList),1);
            break;
            }
        }

        $this->saveData();
    }


}

?>