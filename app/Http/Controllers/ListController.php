<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\users;

use App\User;



use DB;

class ListController extends Controller{


	public function index(){

		$posts =  User::Paginate();  

		return view('list_users.list', compact('posts'));
	}


	public function edit($id){
      
	}


	public function listar($id){
      $users = DB::table('users')
                   ->where('id',$id)
                   ->get();

      return view('list_users.create_task', compact('users'));          
	}
    
}

