<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	

        
        factory(App\User::class)->create([
        'first_name' => 'andres',
        'last_name' => 'meza',
        'email' => 'andres@agoit.com',
        'role' => 'admin',
        'password' =>  bcrypt(123456),
        'owner_user_id' => 1,
        'updater_user_id' => 1,
        'remember_token' => str_random(10),
        	]);

        factory(App\User::class, 4)->create();


    }
}
