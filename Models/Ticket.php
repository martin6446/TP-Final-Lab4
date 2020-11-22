<?php
namespace Models;


class Ticket{

    private $id;
    private $user;
    private $function;
    private $ticketAmount;
    private $discount;

    public function __construct($user=null,$function=null,$ticketAmount=0,$discount=0,$id=0)
    {
        $this->user = $user;
        $this->function = $function;
        $this->ticketAmount = $ticketAmount;
        $this->discount = $discount;
        $this->id = $id;
    }

    public function getUser()
    {
        return $this->user;
    }

    
    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getFunction()
    {
        return $this->function;
    }

    
    public function setFunction($function)
    {
        $this->function = $function;
    }

    public function getTicketAmount()
    {
        return $this->ticketAmount;
    }

    
    public function setTicketAmount($ticketAmount)
    {
        $this->ticketAmount = $ticketAmount;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;
    }
}

?>