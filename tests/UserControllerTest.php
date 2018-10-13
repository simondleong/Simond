<?php
/**
 * Created by PhpStorm.
 * User: Webber
 * Date: 2018-10-12
 * Time: 22:02
 */

namespace App\Http\Controllers;
use App\Models\User;

class UserControllerTest extends \PHPUnit_Framework_TestCase
{
    public $user;
    public $userobject;
    function setUp()
    {
        $this->userobject = new User(['John', 'Wilson', 'john@gmail.com', '123456', '123456789', 'male',
            '0', '0', '22', 'cd']);
        $this->user = new UserController($this->userobject);
    }
    function testShowRegisterForm()
    {
        $this->user->showRegisterForm();
        $response = $this->get('/register');
        $response
            ->assertStatus(200)
            ->assertViewHas(city, 'cd')
            ->assertViewHas(gender, 'male')
            ->assertViewHas(sexual_preference, '0')
            ->assertViewHas(personality_type, '0')
            ->assertViewHas(age, '22');
    }
    function testShowProfileForm()
    {
        $this->user->showRegisterForm();
        $response = $this->get('/editProfile');
        $response
            ->assertStatus(200)
            ->assertViewHas(city, 'cd')
            ->assertViewHas(gender, 'male')
            ->assertViewHas(sexual_preference, '0')
            ->assertViewHas(personality_type, '0')
            ->assertViewHas(age, '22');
    }
    function testRregister()
    {
        $request = new Request();
        $request->password='123456';
        $request->confirm_password='1234567';
        $this->user->register($request);
        $response = $this->get('/register');
        $this->assertContains($response, 'Password and Repeat Password do not match!');

        $request->confirm_password=$request->password;
        $this->user->register($request);
        $response = $this->get('/preferences');
        $this->assertContains($response, 'You have successfully registered. Please enter your preferences.');
        $response = $this->withSession(['user' => $this->user]);
    }
    function testLogin()
    {
        $request = new Request();
        $request->email='john@gmail.com';
        $request->password='123456';
        $this->user->login($request);
        $response = $this->get('/');
        $response = $this->withSession(['user' => $this->user]);
    }
    function testUpdatePassword()
    {
        $request = new Request();
        $request->old_password='123456';
        $request->new_password='1234567';
        $request->confirm_password='1234567';
        $this->user->updatePassword($request);
        $response = $this->get('/');
        $this->assertContains($response, 'Your password has been updated!');
    }
    function testUpdateProfile()
    {
        $request = new Request();
        $request->first_name='Tom';
        $request->last_name='Cruise';
        $request->email='cruise@gmail.com';
        $request->phone='987654321';
        $request->gender='male';
        $request->sexual_preference='1';
        $request->personality_type='1';
        $request->age='25';
        $request->city='xa';
        $this->user->updateProfile($request);
        $response = $this->get('/');
        $this->assertContains($response, 'Your profile has been updated!');
    }
    function testLogout()
    {
        $this->user->logout();
        $response = $this->withSession(['user' => null]);
    }
    function tearDown() {
        unset($this->user);
    }
}
