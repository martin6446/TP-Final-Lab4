<?php
    namespace DAO;

use Exception;
    use Models\CinemaFunction as CinemaFunction;
    use Models\City as City;

    class CinemaFunctionDAO{
        private $connection;
        private $tableName;
    
        public function __construct(){
            $this->tableName = 'funciones';
        }

        public function add(CinemaFunction $function, $idSala){

            try{
                $query = "INSERT INTO ".$this->tableName." (id_pelicula, id_sala, horario_inicio, horario_finalizacion) VALUES (:id_pelicula, :id_sala, :horario_inicio, :horario_finalizacion);";
                $params["id_pelicula"] = $function->getMovie()->getIdMovie();
                $params["id_sala"] = $idSala;
                $params["horario_inicio"] = $function->getStartTime();
                $params["horario_finalizacion"] = $function->getEndTime();


                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $params);
            }
            catch(Exception $e){
                throw $e;
            }
        }

        public function getByCityAndMovieId($city, $movieId){
            $query = "SELECT f.id, f.id_pelicula, f.id_sala ,f.horario_inicio, f.horario_finalizacion FROM funciones f
            INNER JOIN salas s
            ON s.id = f.id_sala
            INNER JOIN cines c
            ON c.id = s.id_cine
            INNER JOIN ciudades
            on ciudades.id = c.id_ciudad
            WHERE ciudades.id = :city AND
            id_pelicula = :movieId";
    
            $params["city"] = $city->getId();
            $params["movieId"] = $movieId;

            try{
                $this->connection = Connection::GetInstance();
                $response = $this->connection->Execute($query,$params);
                $funciones = array();

                $cinemaRoomList = (new CinemaRoomDAO)->getAll($city);
                $movieDAO = MovieDAO::getInstance();
                foreach($response as $soonToBeFunction){
                    foreach($cinemaRoomList as $sala){
                        //estaria buenisimo que PHP tuviera una funcion para hacer algo como esto, no ? :) Great language
                       if($sala->getId() == $soonToBeFunction['id_sala']){
                           $matchingSala = $sala;
                            break;
                       } 
                    }
                    if($matchingSala){
                        $movie = $movieDAO->getMovieById($soonToBeFunction["id_pelicula"]);
                        array_push($funciones, new CinemaFunction( $movie, $soonToBeFunction["horario_inicio"],
                        $soonToBeFunction["horario_finalizacion"], $matchingSala, $soonToBeFunction['id']));
                    }
                }
            
                return $funciones;

                

            }catch(Exception $e){
                throw $e;
            }
        }
        


        public function getAll(City $city){
            $query = "SELECT f.id, f.id_pelicula, f.id_sala ,f.horario_inicio, f.horario_finalizacion FROM funciones f
            INNER JOIN salas s
            ON s.id = f.id_sala
            INNER JOIN cines c
            ON c.id = s.id_cine
            INNER JOIN ciudades
            on ciudades.id = c.id_ciudad
            WHERE ciudades.id = :city
            AND f.horario_inicio > NOW();";
        
            $params["city"] = $city->getId();
            try{
                $this->connection = Connection::GetInstance();
                $queryResult = $this->connection->Execute($query, $params);
                $funciones = array();

                $cinemaRoomList = (new CinemaRoomDAO)->getAll($city);
                $movieDAO = MovieDAO::getInstance();
                foreach($queryResult as $soonToBeFunction){
                    foreach($cinemaRoomList as $sala){
                        //estaria buenisimo que PHP tuviera una funcion para hacer algo como esto, no ? :) 
                       if($sala->getId() == $soonToBeFunction['id_sala']){
                           $matchingSala = $sala;
                            break;
                       } 
                    }
                    if($matchingSala){
                        $movie = $movieDAO->getMovieById($soonToBeFunction["id_pelicula"]);
                        array_push($funciones, new CinemaFunction( $movie, $soonToBeFunction["horario_inicio"],
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
                    $i++;
                }
                $query = substr($query, 0, -4) . ";";

                /* echo $query;
                die(); */

                $this->connection = Connection::GetInstance();
                return $this->connection->Execute($query,$params);



            }
            catch(Exception $e){
                throw $e;
            }
        }

        

    
    }
