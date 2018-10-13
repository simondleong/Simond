<?php
/**
 * Created by PhpStorm.
 * User: Webber
 * Date: 2018-10-11
 * Time: 23:54
 */

namespace App\Http\Controllers\Auth;


class RegisterControllerTest extends \PHPUnit_Framework_TestCase
{
    public $register;
    function setUp()
    {
        $this->register = new RegisterController();
    }
    function testValidator()
    {
        $testuser1=array("name"=>"webber","email"=>"webber@gmail.com","password"=>"123456");
        $testuser2=array("name"=>"","email"=>"webber@gmail.com","password"=>"123456");
        $testuser3=array("name"=>"webber","email"=>"webber#gmail.com","password"=>"123456");
        $this->assertTrue(true,$this->register->validator($testuser1));
        $this->assertTrue(false,$this->register->validator($testuser2));
        $this->assertTrue(false,$this->register->validator($testuser3));
    }
    function testCreate()
    {
        $testuser=array("name"=>"webber","email"=>"webber@gmail.com","password"=>"123456");
        $this->assertTrue(true,$this->register->create($testuser));
    }
    function tearDown() {
        unset($this->register);
    }
}
