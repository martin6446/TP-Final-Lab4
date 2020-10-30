<?php
namespace DAO;

use Models\Cinema as Cinema;

class CinemaDAO{
    private $filename;
    private $cinemaList = array();

    public function __construct()
    {
        $this->filename = dirname(__DIR__)."/Data/Cinemas.json";
    }

    public function retrieveData(){

        if(file_exists($this->filename)){
            $jsonContent = file_get_contents($this->filename);

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent,true) : array();

            foreach($arrayToDecode as $data){
                $cinema = new Cinema();

                /* $cinema->setName($data["name"]);
                $cinema->setTicketValue($data["ticketvalue"]);
                $cinema->setAddress($data["address"]);
                $cinema->setAddress2($data["address number"]);
                $cinema->setCity($data["city"]);
                $cinema->setState($data["state"]);
                $cinema->setZip($data["zip"]);
                $cinema->setMoviePlaying($data["movieplaying"]);
                $cinema->setCapacity($data["capacity"]); */

                array_push($this->cinemaList,$cinema);
            }
        }
    }

    public function saveData(){
        $arrayToEncode = array();

        foreach($this->cinemaList as $cinema){
            $valuesArray["name"] = $cinema->getName();
            $valuesArray["ticketvalue"] = $cinema->getTicketValue();
            $valuesArray["address"] = $cinema->getAddress();
            $valuesArray["address number"] = $cinema->getAddress2();
            $valuesArray["city"] = $cinema->getCity();
            $valuesArray["state"] = $cinema->getState();
            $valuesArray["zip"] = $cinema->getZip();
            $valuesArray["movieplaying"] = $cinema->getMoviePlaying();
            $valuesArray["capacity"] = $cinema->getCapacity();

            array_push($arrayToEncode,$valuesArray);
        }

        file_put_contents($this->filename,json_encode($arrayToEncode,JSON_PRETTY_PRINT));
    }

    public function add(Cinema $cinema){

        $this->retrieveData();
        array_push($this->cinemaList,$cinema);
        $this->saveData();
    }

    public function getAll(){
        $this->retrieveData();
        return $this->cinemaList;
    }
    
    public function findCinema($name){
       $cinemaList = $this->getAll(); 

       foreach($cinemaList as $cinema){
           if($cinema->getName() == $name){
               return $cinema;
           }
       }
    }


    public function remove($name){
        
        $this->retrieveData();
        $arrayAux = [];

        foreach($this->cinemaList as $cinema){
            if($cinema->getName() != $name){
            array_push($arrayAux,$cinema);
            }
        }

        $this->cinemaList = $arrayAux;

        $this->saveData();
    }


}

?>