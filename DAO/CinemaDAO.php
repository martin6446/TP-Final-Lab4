<?php
namespace DAO;

use Exception;
use Models\Cinema as Cinema;
use DAO\CinemaRoomDAO as CinemaRoomDAO;
use Models\City as City;

class CinemaDAO{
    private $connection;
    private $tableName;
    private $cinemaList;

    public function __construct(){
        $this->tableName = 'cines';
        $this->cinemaList = array();
    }

    public function add(Cinema $cine){
        try{
            $query = "INSERT INTO ".$this->tableName." (nombre, direccion, id_ciudad) VALUES (:nombre, :direccion, :id_ciudad );";
            $params["nombre"] = $cine->getName();
            $params["direccion"] = $cine->getAddress();
            $params["id_ciudad"] = 1;


            
            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query, $params);

        }
        catch(Exception $e){
            throw $e;
        }
    }

    public function getCinema($id, City $city){
        $query = "SELECT id, nombre, direccion FROM cines WHERE id = ". $id;

        try{
            $this->connection = Connection::GetInstance();
            $response = $this->connection->Execute($query);

            return new Cinema($city,$response[0]["id"],$response[0]["nombre"],$response[0]["direccion"]);
        }catch(Exception $e){
            throw $e;
        }
    }


    public function getAll(City $city){
        try{
            $query = "SELECT id, nombre, direccion FROM cines WHERE id_ciudad = :city";

            $params["city"] = $city->getId();
            $this->connection = Connection::GetInstance();
            $response = $this->connection->Execute($query, $params);
            $cinemaList = array();
            foreach($response as $soonToBeCine){
                array_push($cinemaList, new Cinema($city, $soonToBeCine['nombre'], $soonToBeCine['direccion'], $soonToBeCine['id']));
            }

            return $cinemaList;
        }
        catch(Exception $e){
            throw $e;
        }
    }

}

?>