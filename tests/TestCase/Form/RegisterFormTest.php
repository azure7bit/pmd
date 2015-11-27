<?php
namespace App\Test\TestCase\Form;

use App\Form\RegisterForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\RegisterForm Test Case
 */
class RegisterFormTest extends TestCase
{

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Register = new RegisterForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Register);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
