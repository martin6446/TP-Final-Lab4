<?php

namespace Controllers;

use Models\Cinema as Cinema;

use DAO\CinemaDAO as CinemaDAO;

class CinemaController
{

    private $cinemaDAO;

    public function __construct()
    {
        $this->cinemaDAO = new CinemaDAO();
    }

    public function modifyCinema($cinema, $cinemaData)
    {
        UtilitiesController::validateAdmin();
        $this->cinemaDAO->alterCinema($cinema, $cinemaData);
    }

    public function getCinemas($city = null)
    {
        if ($city == null) {
            return $this->cinemaDAO->getAllCinemas();
        } else {
            return $this->cinemaDAO->getAll($city);
        }
    }

    public function getCinemaById($id)
    {
        return $this->cinemaDAO->getCinemaById($id);
    }

    public function getCinemaByCityAndName($city, $name)
    {
        return $this->cinemaDAO->getCinemaByCityAndName($city, $name);
    }

    public function addCinema($city, $cinemaData)
    {

        UtilitiesController::validateAdmin();
        $cinema = new Cinema($city, $cinemaData["name"], $cinemaData["address"] . " " . $cinemaData["addressNumber"]);

        if ($this->cinemaDAO->validateCinemaName($city->getId(), $cinema->getName())) {

            $this->cinemaDAO->add($cinema);

            return true;
        } else {
            UtilitiesController::notification("this cinema alerady exists!", FRONT_ROOT . "views/addCinemaView");
            return false;
        }
    }

    public function delete($cinemaId)
    {
        UtilitiesController::validateAdmin();
        if (!$this->hasFunctions($cinemaId)) {
            $this->cinemaDAO->delete($cinemaId);
        }
    }

    public function hasFunctions($cinemaId)
    {
        return $this->cinemaDAO->hasFunctions($cinemaId);
    }

    public function getIncomeByDate($stDate,$endDate){
        return $this->cinemaDAO->getIncome($stDate,$endDate);
    }
}
