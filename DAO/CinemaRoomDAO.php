<?php
    namespace DAO;
    use Exception;
    use Models\CinemaRoom as CinemaRoom;
use Models\City;

class CinemaRoomDAO{
        private $connection;
        private $tableName;
    
        public function __construct(){
            $this->tableName = 'salas';
        }
    
        public function add(CinemaRoom $sala){
    
            try{
                $query = "INSERT INTO ".$this->tableName." (nombre, id_cine, precio, capacidad) VALUES (:nombre, :id_cine,
                :precio, :capacidad);";
                $params["nombre"] = $sala->getName();
                $params["precio"] = $sala->getPrice();
                $params["capacidad"] = $sala->getCapacity();
    
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $params);
    
            }
            catch(Exception $e){
                throw $e;
            }
        }

        public function getAll(City $city){
            try{
                $query = "SELECT s.id, s.id_cine, s.nombre, s.precio, s.capacidad FROM salas s
                INNER JOIN cines
                on cines.id = s.id_cine
                WHERE cines.id_ciudad = :city";
    
                $params["city"] = $city->getId();
                $this->connection = Connection::GetInstance();
                $response = $this->connection->Execute($query, $params);
                $cinemaRoomList = array();
                $cinemaList = (new CinemaDAO)->getAll($city);
                foreach($response as $soonToBeSala){
                    foreach($cinemaList as $cine){
                        //estaria buenisimo que PHP tuviera una funcion para hacer algo como esto, no ? :) Great language
                       if($cine->getId() == $soonToBeSala['id_cine']){
                           $matchingCine = $cine;
                            break;
                       } 
                    }
                    if($matchingCine){
                        array_push($cinemaRoomList, new CinemaRoom($soonToBeSala['id'], $matchingCine, $soonToBeSala['nombre'], $soonToBeSala['precio'], $soonToBeSala['capacidad']));
                    }
                }
    
                return $cinemaRoomList;
            }
            catch(Exception $e){
                throw $e;
            }
        }
    
    }



?>