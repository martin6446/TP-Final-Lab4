<?php
    namespace DAO;
    use Exception;
use Models\Cinema;
use Models\CinemaRoom as CinemaRoom;
use Models\City;

class CinemaRoomDAO{
        private $connection;
        private $tableName;
    
        public function __construct(){
            $this->tableName = 'salas';
        }
    
        
        public function add(CinemaRoom ...$salas){
            try{
                $query = "INSERT INTO ".$this->tableName." (nombre, id_cine, precio, capacidad) VALUES";
                $i = 1;
                foreach($salas as $sala){
                    $query = $query . "(:nombre" . $i .", :id_cine" . $i . ", :precio" . $i . ", :capacidad" . $i . "), ";
                    $params["nombre" . $i] = $sala->getName();
                    $params["id_cine" . $i] = $sala->getCinema()->getId();
                    $params["precio" . $i] = $sala->getPrice();
                    $params["capacidad" . $i] = $sala->getCapacity();

                    $i++;
                }
                
                $query = substr($query, 0, -2) . ";";
                $this->connection = Connection::GetInstance();
                return $this->connection->ExecuteNonQuery($query, $params);

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
                        array_push($cinemaRoomList, new CinemaRoom($matchingCine, $soonToBeSala['nombre'], $soonToBeSala['precio'], $soonToBeSala['capacidad'],$soonToBeSala['id']));
                    }
                }
    
                return $cinemaRoomList;
            }
            catch(Exception $e){
                throw $e;
            }
        }

        public function getByCinema(Cinema $cinema){
            try{
                $query = "SELECT s.id, s.nombre, s.precio, s.capacidad FROM salas s
                WHERE s.id_cine = :id_cine";
    
                $params["id_cine"] = $cinema->getId();
                $this->connection = Connection::GetInstance();
                $response = $this->connection->Execute($query, $params);
                $cinemaRoomList = array();
                foreach($response as $soonToBeSala){
            
                    array_push($cinemaRoomList, new CinemaRoom($cinema, $soonToBeSala['nombre'], $soonToBeSala['precio'], $soonToBeSala['capacidad'], $soonToBeSala['id']));
                }
    
                return $cinemaRoomList;
            }
            catch(Exception $e){
                throw $e;
            }
        }

    
    }



?>