<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ListUsersTasksTest extends TestCase
{
    use DatabaseMigrations;


    public function testListTasks()
    {
        $user=$this->createUser();

        $this->actingAs($user)
    	     ->visit('/')
             ->see('Go panel')
             ->see('List User')
             ->click('List User')
             ->seePageIs('list-users')
             ->see('Create Task')
             ->see('View Tasks');
    }
}
