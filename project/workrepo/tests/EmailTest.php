<?php
//
use PHPUnit\Framework\TestCase;

require '/home/ubuntu/php_app_workreport/Email.php';

/**
 * @covers Email
 */
class EmailTest extends PHPUnit_Framework_TestCase
{
    public $gunballInstance;

    public function setup()
    {
       $this->gunballInstance = new Email(); 
    }

    public function testturnwheel()
    {
        $this->gunballInstance->setGunball(100);

        $this->gunballInstance->turnwheel();

        $this->assertEquals(99, $this->gunballInstance->getGumball());
    }
}
