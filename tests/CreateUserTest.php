<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateUserTest extends TestCase
{
    use DatabaseMigrations;

    public function testCreateUser()
    {
        $user=$this->createUser();

        $this->actingAs($user)
    	     ->visit('/')
             ->see('Go panel')
             ->see('Create User')
             ->click('Create User')
             ->seePageIs('register')
             ->type('f_name', 'first_name')
             ->type('l_name', 'last_name') 
             ->type('some_email', 'email')
             ->type('some_password', 'password')
             ->type('confirm_some_password', 'password_confirmation')
             ->press('Register')
             ->visit('/');
            
    }
}
