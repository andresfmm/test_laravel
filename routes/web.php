<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => '/login'
]);

Auth::routes();



Route::group(['middleware'=>'auth'], function(){

Route::get('list-users', 'ListController@index');

Route::get('set-task/{id}', 'ListController@listar');

Route::post('create-task/{id}', 'TaskController@store');

Route::get('list-task/{id}', 'TaskController@listar' );

Route::get('tasks/{id}', 'TaskController@show' );

Route::put('update-task/{id}', 'TaskController@update' );

Route::resource('delete-task/{id}', 'TaskController@destroy' );

});




