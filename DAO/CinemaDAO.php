<?php
namespace DAO;

use Exception;
use Models\Cinema as Cinema;
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

    public function getCinemaByCityAndName(City $city, $name){
        try{
            $query = "SELECT id, nombre, direccion FROM cines WHERE id_ciudad = :city AND nombre = :name";

            $params["city"] = $city->getId();
            $params["name"] = $name;
            $this->connection = Connection::GetInstance();
            $response = $this->connection->Execute($query, $params);

            return new Cinema($city,$response[0]["nombre"],$response[0]["direccion"],$response[0]["id"]);
            
        }
        catch(Exception $e){
            throw $e;
        }
    }

    public function getCinemaById($id, City $city){
        $query = "SELECT id, nombre, direccion FROM cines WHERE id = ". $id;

        try{
            $this->connection = Connection::GetInstance();
            $response = $this->connection->Execute($query);

            return new Cinema($city,$response[0]["nombre"],$response[0]["direccion"],$response[0]["id"]);
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