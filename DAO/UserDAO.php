<?php
namespace DAO;

use Models\User as User;

class UserDAO{
    private $filename;
    private $userList;

    public function __construct()
    {
        $this->filename = dirname(__DIR__)."/Data/Users.json;";
    }

    public function retrieveData(){

        if(file_exists($this->filename)){
            $jsonContent = file_get_contents($this->filename);

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent,true):array();

            foreach($arrayToDecode as $data){
                $user = new User();

                $user->setEmail($data["email"]);
                $user->setPassword($data["password"]);

                array_push($this->userList,$user);
            }
        }
    }

    public function saveData(){

    }

    public function add(){

    }

    public function getAll(){

    }

    public function remove(){
        
    }


}

?>