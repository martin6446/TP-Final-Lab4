<?php
namespace DAO;

use Controllers\CityController;
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

    public function getIncome($stDate,$endDate){
        $query ="CALL p_get_cinemas_gross_income(?,?)";

        $params["startDate"] = $stDate;
        $params["endDate"] = $endDate;

        try{

            $this->connection = Connection::GetInstance();
            return $this->connection->Execute($query,$params,QueryType::StoredProcedure);

        }catch(Exception $e){
            throw $e;
        }

    }

    public function add(Cinema $cine){
        try{
            $query = "INSERT INTO ".$this->tableName." (nombre, direccion, id_ciudad) VALUES (:nombre, :direccion, :id_ciudad );";
            $params["nombre"] = $cine->getName();
            $params["direccion"] = $cine->getAddress();
            $params["id_ciudad"] = $cine->getCity()->getId();


            
            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query, $params);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    public function alterCinema(Cinema $cinema, $cinemaData){
        $query = "UPDATE ". $this->tableName. " SET nombre = :name, direccion = :address WHERE id = ". $cinema->getId();

        $params["name"] = $cinemaData["name"];
        $params["address"] = $cinemaData["address"];

        try{
            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query,$params);
        }catch(Exception $e){
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

    public function getCinemaById($id){
        $query = "SELECT * FROM cines WHERE id = ". $id;

        try{
            $this->connection = Connection::GetInstance();
            $response = $this->connection->Execute($query);
            $cityController = new CityController();
            $city = $cityController->getCity($response[0]["id_ciudad"]);
            return new Cinema($city,$response[0]["nombre"],$response[0]["direccion"],$response[0]["id"]);
        }catch(Exception $e){
            throw $e;
        }
    }

    public function getAllCinemas(){
        
        try{
            $query = "SELECT * FROM cines";

            $this->connection = Connection::GetInstance();
            $response = $this->connection->Execute($query);
            $cinemaList = array();
            $cityController = new CityController();
            foreach($response as $soonToBeCine){
                $city = $cityController->getCity($soonToBeCine["id_ciudad"]);
                array_push($cinemaList, new Cinema($city, $soonToBeCine['nombre'], $soonToBeCine['direccion'], $soonToBeCine['id']));
            }

            return $cinemaList;
        }
        catch(Exception $e){
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

    public function hasFunctions($cinemaId){
        $query = "SELECT 
        COUNT(f.id) AS functions FROM cines c
        LEFT JOIN salas s
        ON c.id = s.id_cine
        LEFT JOIN funciones f
        ON s.id = f.id_sala
        WHERE c.id = ". $cinemaId . "
        GROUP BY c.id;"; 

        try{
            $this->connection = Connection::GetInstance();
            $functionsNumber = ($this->connection->Execute($query))[0][0];

            return $functionsNumber == 0 ? false : true;
        }
        catch(Exception $e){
            throw $e;
        }

    }

    public function delete($cinemaId){
        $query = "DELETE FROM cines WHERE id = " . $cinemaId . ";";
        try{
            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query);
        }
        catch(Exception $e){
            throw $e;
        }
    }

    public function validateCinemaName($city, $name){
        $query = "SELECT * FROM cines WHERE id_ciudad = $city AND nombre = '$name';";

        try{
            $this->connection = Connection::GetInstance();
            $response = $this->connection->Execute($query);
            return empty($response) ? true : false;
        }
        catch(Exception $e){
            throw $e;
        }
    }

}

?>