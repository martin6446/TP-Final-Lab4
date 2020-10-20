<?php
namespace Models;

class Admin{
    private $adminId;
    private $adminName;
    private $adminEmail;

    
    public function getAdminId()
    {
        return $this->adminId;
    }

    
    public function setAdminId($adminId)
    {
        $this->adminId = $adminId;
    }

    public function getAdminName()
    {
        return $this->adminName;
    }

    
    public function setAdminName($adminName)
    {
        $this->adminName = $adminName;
    }

    public function getAdminEmail()
    {
        return $this->adminEmail;
    }

    
    public function setAdminEmail($adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }
}

?>