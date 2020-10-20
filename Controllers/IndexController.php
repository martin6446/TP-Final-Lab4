<?php
    namespace Controllers;

    use DAO\MovieDAO as MovieDAO;


    class IndexController
    {
        private $MovieDAO = new MovieDAO();
        
        
        public function loadData(){
            $genres = $this->MovieDAO->getGenres();
            var_dump($genres);
            require_once(VIEWS_PATH."index.php");
        }        
    }
?>