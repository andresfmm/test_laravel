<?php

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }


    public function createuser(){
        return factory(App\User::class)->create([
        'first_name' => 'andres',
        'last_name' => 'meza',
        'email' => 'andres@agoit.com',
        'role' => 'admin',
        'password' =>  bcrypt(123456),
        'owner_user_id' => 1,
        'updater_user_id' => 1,
        'remember_token' => str_random(10),
            ]);
    }


     }
