<?php
/**
 * Created by PhpStorm.
 * User: Webber
 * Date: 2018-10-13
 * Time: 23:01
 */

namespace App\Http\Controllers;


class PreferenceControllerTest extends \PHPUnit_Framework_TestCase
{
    public $performance;
    public $pc;
    public $user;
    function setUp()
    {
        $this->user = new User(['John', 'Wilson', 'john@gmail.com', '123456', '123456789', 'male',
            '0', '0', '22', 'cd']);
        $this->performance = new Performance();
        $this->pc = new PreferenceController($this->user,$this->performance);
    }
    function testShowPreferencesForm()
    {
        $this->pc->showPreferencesForm();
        $response = $this->get('/preferences');
        $response
            ->assertStatus(200)
            ->assertViewHas(gender, 'male')
            ->assertViewHas(sexual_preference, '0')
            ->assertViewHas(personality_type, '0')
            ->assertViewHas(age, '22');
    }
    function testUpdate()
    {
        $request = new Request();
        $this->pc->update($request);
        $response = $this->get('/');
        $this->assertContains($response, 'Your preferences have been updated!');
    }
    function testCreateInstance()
    {
        $request = new Request();
        $preference = $this->pc->createInstance($this->user,$request);
        $this->assertTrue($preference->user_id, $this->user->id);
    }
    function testUpdateUserInfo()
    {
        $this->pc->updateUserInfo($this->user);
        $response = $this->get('/');
        $response = $this->withSession(['user' => $this->user]);
    }
    function tearDown()
    {
        unset($this->performance);
    }
}
