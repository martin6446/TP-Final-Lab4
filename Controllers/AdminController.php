<?php
namespace Controllers;

use DAO\AdminDAO as AdminDAO;

class AdminController{
    private $adminDAO;

    public function __construct()
    {
        $this->adminDAO = new AdminDAO();
    }

    public function showAdminView(){
        require_once(VIEWS_PATH."admin-panel.php");
    }

    public function showAdminAddCinemaView(){
        require_once(VIEWS_PATH."add-cinema-view.php");
    }

    public function addMovie(){

    }

    public function addCinema($name,$address,$address2,$city,$state,$zip){
        echo$name."<br>";
        echo$address."<br>";
        echo$address2."<br>";
        echo$city."<br>";
        echo$state."<br>";
        echo$zip."<br>";

    }

    public function removeMovie(){

    }

    public function removeCinema(){

    }


}


?>