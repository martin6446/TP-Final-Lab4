<?php
namespace DAO;

use Models\User as User;

class UserDAO{
    private $filename;
    private $userList = array();

    public function __construct()
    {
        $this->filename = dirname(__DIR__)."/Data/Users.json";
    }

    public function retrieveData(){

        if(file_exists($this->filename)){
            $jsonContent = file_get_contents($this->filename);

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent,true) : array();

            foreach($arrayToDecode as $data){
                $user = new User();

                $user->setEmail($data["email"]);
                $user->setPassword($data["password"]);

                array_push($this->userList,$user);
            }
        }
    }

    public function saveData(){
        $arrayToEncode = array();

        foreach($this->userList as $user){
            $valuesArray["email"] = $user->getEmail();
            $valuesArray["password"] = $user->getPassword();

            array_push($arrayToEncode,$valuesArray);
        }

        file_put_contents($this->filename,json_encode($arrayToEncode,JSON_PRETTY_PRINT));
    }

    public function add(User $user){

        $this->retrieveData();
        array_push($this->userList,$user);
        $this->saveData();
    }

    public function getAll(){
        $this->retrieveData();
        return $this->userList;
    }

    public function remove($userid){
        
        $this->retrieveData();

        foreach($this->userList as $user){
            if($user->getId() == $userid){
                array_splice($this->userList,array_search($user,$this->userList),1);
            break;
            }
        }

        $this->saveData();
    }


}

?>