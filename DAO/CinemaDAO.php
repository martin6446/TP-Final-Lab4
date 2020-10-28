<?php
namespace DAO;

use Exception;
use Models\Cinema as Cinema;

class CinemaDAO{
    private $connection;
    private $tableName;

    public function __construct(){
        $this->tableName = 'cines';
    }

    public function add(Cinema $cine){

        try{
            $query = "INSERT INTO ".$this->tableName." (nombre, direccion, id_ciudad) VALUES (:nombre, :direccion, :id_ciudad );";
            $params["nombre"] = $cine->getName();
            $params["direccion"] = $cine->getAddress();
            $params["id_ciudad"] = 1;

            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query, $params);
           //ADD CINEMA RUMS

        }
        catch(Exception $e){
            throw $e;
        }
    }

}

?>