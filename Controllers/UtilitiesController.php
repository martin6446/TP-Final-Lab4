<?php
namespace Controllers;

use SessionHandler;

class UtilitiesController{
    
    public static function notification($notification, $location){
        require_once(VIEWS_PATH. "notification.php");
    }

    public static function validateAdmin(){

        if(isset($_SESSION["loggedUser"])){
            if($_SESSION["loggedUser"]->getIsAdmin() == 0){
                header("location:".FRONT_ROOT."views/homeView");   
            }
        } else {
            header("location:".FRONT_ROOT);
        }
    }
}

?>