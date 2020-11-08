<?php
namespace DAO;

use Exception;
use Models\City as City;
use Models\Province as Province;

class CityDAO{
    private $connection;
    private $tableName;
    private $cityList;
    private $provinceList;

    public function __construct(){
        $this->tableName = 'ciudades';
        $this->cityList = array();
        $this->provinceList = array();
    }

    public function getAll(){
        try{
            $query = "SELECT * FROM ". $this->tableName;

            $this->connection = Connection::GetInstance();
            $response = $this->connection->Execute($query);
            $this->cityList;
            foreach($response as $soonToBeCity){
                array_push($this->cityList, new City($soonToBeCity["id"],$soonToBeCity["nombre"]));
            }

            return $this->cityList;;
        }
        catch(Exception $e){
            throw $e;
        }
    }

}
?>