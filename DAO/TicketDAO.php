<?php
namespace DAO;

use Exception;
use Models\Ticket as Ticket;

class TicketDAO{
    private $connection;
    private $tableName;
    private $ticketList;

    public function __construct(){
        $this->tableName = 'entradas';
        $this->ticketList = array();
    }


    public function add(Ticket $ticket, $discount){

        $query = "CALL p_buy_tickets(?,?,?,?);";
        $params["userEmail"] = $ticket->getUser()->getEmail();
        $params["functionId"] = $ticket->getFunction()->getId();
        $params["ticketAmount"] = $ticket->getTicketAmount();
        $params["discount"] = $discount;

        try{

            $this->connection = Connection::GetInstance();
            
            return  $this->connection->ExecuteNonQuery($query,$params, QueryType::StoredProcedure);

        }catch(Exception $e){
            throw $e;
        }

    }

    public function getPurchases($userId){
        $query = "SELECT p.nombre as Pelicula, cines.nombre as cine, s.nombre as sala,
        f.horario_inicio as fecha, COUNT(e.id) as cantidad_entradas, c.monto  FROM comprobantes c
       INNER JOIN entradas e
       ON e.id_comprobante = c.id
       INNER JOIN funciones f
       ON f.id = e.id_funcion
       INNER JOIN peliculas p
       on p.id = f.id_pelicula
       INNER JOIN salas s
       ON s.id = f.id_sala
       INNER JOIN cines
       on cines.id = s.id_cine
       WHERE c.id_usuario = (SELECT id from usuarios where email = '" . $userId ."' ) 
       GROUP BY c.id
       ORDER BY fecha;";
       try{
        $this->connection = Connection::GetInstance();
            
        $result = $this->connection->Execute($query);
        return empty($result) ? array() : $result;
       }
       catch(Exception $e){
            throw $e;
       }
    }


}

?>