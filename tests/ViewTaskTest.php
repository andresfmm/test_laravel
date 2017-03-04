<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewTaskTest extends TestCase
{
    use DatabaseMigrations;


    public function testExample()
    {
        $user=$this->createUser();

        $this->actingAs($user)
    	     ->visit('/')
             ->see('Go panel')
             ->see('List User')
             ->click('List User')
             ->seePageIs('list-users')
             ->see('Create Task')
             ->see('View Tasks')
             ->click('View Tasks')
             ->seePageIs('list-task/1')
             ->see('Back')
             ->see('Edit Task')
             ->see('Delete Task');

          
    }
}
