<?php
    namespace DAO;

use DateTime;
use Exception;
    use Models\CinemaFunction as CinemaFunction;
    use Models\City as City;

    class CinemaFunctionDAO{
        private $connection;
        private $tableName;
    
        public function __construct(){
            $this->tableName = 'funciones';
        }
    
        public function add(CinemaFunction $sala){
            try{
        
    
            }
            catch(Exception $e){
                throw $e;
            }
        }
    
        /*
        query = "INSERT INTO ".$this->tableName." (nombre, direccion, id_ciudad) VALUES (:nombre, :direccion, :id_ciudad );";
            $params["nombre"] = $cine->getName();
            $params["direccion"] = $cine->getAddress();
            $params["id_ciudad"] = 1;


            
            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query, $params);
            $cinemaRoomDAO = new CinemaRoomDAO();
            foreach($cine->getRooms() as $cinemaRoom){
                $cinemaRoomDAO->add($cinemaRoom);
            }

            */


        public function getAll(City $city){
            $query = "SELECT f.id, f.id_pelicula, f.id_sala ,f.horario_inicio, f.horario_finalizacion FROM funciones f
            INNER JOIN salas s
            ON s.id = f.id_sala
            INNER JOIN cines c
            ON c.id = s.id_cine
            INNER JOIN ciudades
            on ciudades.id = c.id_ciudad
            WHERE ciudades.id = :city;";
        
            $params["city"] = $city->getId();
            try{
                $this->connection = Connection::GetInstance();
                $queryResult = $this->connection->Execute($query, $params);
                $funciones = array();

                $cinemaRoomList = (new CinemaRoomDAO)->getAll($city);
                foreach($queryResult as $soonToBeFunction){
                    foreach($cinemaRoomList as $sala){
                        //estaria buenisimo que PHP tuviera una funcion para hacer algo como esto, no ? :) Great language
                       if($sala->getId() == $soonToBeFunction['id_sala']){
                           $matchingSala = $sala;
                            break;
                       } 
                    }
                    if($matchingSala){
                        array_push($funciones, new CinemaFunction( $soonToBeFunction["id_pelicula"], $soonToBeFunction["horario_inicio"],
                        $soonToBeFunction["horario_finalizacion"], $matchingSala, $soonToBeFunction['id']));
                    }
                }
            
                return $funciones;
            }
            catch(Exception $e){
                throw $e;
            }
        }
    
        public function validate($idSala, CinemaFunction ...$functions){
            try{
                $query = "SELECT * FROM funciones WHERE id_sala = :id_sala AND ";
                $params["id_sala"] = $idSala;
                //(horario_inicio < ADDTIME(:horario_finalizacion, "0:15:00") AND ADDTIME(horario_finalizacion, "0:15:00")  > :horario_inicio);
                $i = 1;
                foreach($functions as $function){
                    $query = $query . "(horario_inicio < ADDTIME(:horario_finalizacion". $i . ", '0:15:00') AND ADDTIME(horario_finalizacion, '0:15:00')  > :horario_inicio".$i.") OR ";
                    $params["horario_inicio" . $i] = $function->getStartTime();
                    $params["horario_finalizacion" . $i] = $function->getEndTime();

                }
                $query = substr($query, 0, -4) . ";";

                echo $query;
                die();

            }
            catch(Exception $e){
                throw $e;
            }
        }

    
    }
?>