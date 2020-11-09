<?php
namespace Controllers;

use SessionHandler;

class UtilitiesController{
    
    public function notification($notification, $location){
        require_once(VIEWS_PATH. "notification.php");
    }

    public static function validateAdmin(){

        if($_SESSION["loggedUser"]->getIsAdmin() == 0){
            header("location:".FRONT_ROOT);   
        }
    }
}

?>