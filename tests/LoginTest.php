<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
	
    use DatabaseMigrations;
    
    public function testLogin()
    {   

    	 $user=$this->createUser();

    	  $this->actingAs($user)
    	     ->visit('/')
             ->see('Go panel')
             ->see('Create User')
             ->see('List User');

        
    }
}
