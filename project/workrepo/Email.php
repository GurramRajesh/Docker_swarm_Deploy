<?php

class Email
{
    
    private $gumball;


    //Get the amount of gumball
    public function getGumball()
    {
        return $this->gumball;
    }

    //set the amount of gunball
    public function setGunball($amount)
    {
        $this->gumball = $amount;
    }

    public function turnwheel()
    {
        $this->setGunball($this->getGumball() - 1);
    }    
}
