<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateTaskTest extends TestCase
{
    use DatabaseMigrations;

    public function testCreateTask()
    {
        $user=$this->createUser();

        $this->actingAs($user)
    	     ->visit('/')
             ->see('Go panel')
             ->see('List User')
             ->click('List User')
             ->seePageIs('list-users')
             ->see('Create Tasks')
             ->see('View Tasks')
             ->click('Create Tasks')
             ->seePageIs('set-task/1')
             ->see('Back')
             ->see('Create Task')
             ->type('some_title', 'title')
             ->type('some_description', 'task') 
             ->type('2017-01-01', 'date')
             ->type('Normal', 'priority')
             ->press('Create Task')
             ->see('the task was success');
             
    }
}
