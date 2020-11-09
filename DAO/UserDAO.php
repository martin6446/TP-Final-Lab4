<?php

namespace DAO;

use Exception;
use Models\User as User;

class UserDAO
{
    private $conection;
    private $tablename = "usuarios";

    public function createUser(User $user)
    {



        $sql = "INSERT INTO " . $this->tablename . " (nombre, apellido, email, pwd, id_ciudad, user_type) VALUES (:name, :lastname, :email, :password, :city_id, :user_type);";

        $parameters["name"] = $user->getName();
        $parameters["lastname"] = $user->getLastname();
        $parameters["email"] = $user->getEmail();
        $parameters["password"] = $user->getPassword();
        $parameters["city_id"] = 1;
        $parameters["user_type"] = $user->getIsAdmin();

        try {

            $this->conection = Connection::GetInstance();

            $affectedRows = $this->conection->ExecuteNonQuery($sql, $parameters);

            return [true,$affectedRows];
        } catch (Exception $e) {
            return [false, $e->errorInfo[1]];
        }
    }

    public function read($email)
    {

        $sql = "SELECT * FROM " . $this->tablename . " WHERE email = :email";

        $parameters["email"] = $email;

        try {

            $this->conection = Connection::GetInstance();

            $result = $this->conection->Execute($sql, $parameters);
        } catch (Exception $e) {
            throw $e;
        }


        if (!empty($result)) {
            return $this->map($result);
        } else {
            return false;
        }
    }

    protected function map($value)
    {

        $value = is_array($value) ? $value : [];

        $result = array_map(function ($data) {
            return new User($data["nombre"], $data["apellido"], $data["email"], $data["pwd"], $data["id_ciudad"], $data["user_type"]);
        }, $value);


        return $result[0];
    }


    public function modifyUser($newUserValues, $oldUserValues)
    {

        if ($user = $this->read($oldUserValues->getEmail())) {

            $sql = "UPDATE " . $this->tablename . " SET nombre = :name, apellido = :lastname, email = :email, pwd = :password, id_ciudad = :city_id WHERE email = '" . $user->getEmail() . "'";


            $parameters["name"] = $newUserValues["name"];
            $parameters["lastname"] = $newUserValues["lastname"];
            $parameters["email"] = $newUserValues["email"];
            $parameters["password"] = $newUserValues["password"];
            $parameters["city_id"] = $newUserValues["city"];

            try {
                $this->conection = Connection::GetInstance();

                $this->conection->ExecuteNonQuery($sql, $parameters);
            } catch (Exception $e) {
                throw $e;
            }
        }
    }
}
