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

                $cinema->setName($data["name"]);
                $cinema->setLocation($data["location"]);
                $cinema->setMoviePlaying($data["movieplaying"]);
                $cinema->setCapacity($data["capacity"]);

                array_push($this->cinemaList,$cinema);
            }
        }
    }

    public function saveData(){
        $arrayToEncode = array();

        foreach($this->cinemaList as $cinema){
            $valuesArray["name"] = $cinema->getName();
            $valuesArray["location"] = $cinema->getLocation();
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

    public function remove($cinemaid){
        
        $this->retrieveData();

        foreach($this->cinemaList as $cinema){
            if($cinema->getId() == $cinemaid){
                array_splice($this->cinemaList,array_search($cinema,$this->cinemaList),1);
            break;
            }
        }

        $this->saveData();
    }


}

?>