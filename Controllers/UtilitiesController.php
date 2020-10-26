<?php
namespace Controllers;

class UtilitiesController{
    
    public function notification($notification, $location){
        require_once(VIEWS_PATH. "notification.php");
    }
}

?>