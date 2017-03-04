<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

use App\User;

use Illuminate\Support\Facades\Auth;

use DB;

use Carbon\Carbon;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data, $id){

        
        $Date = Carbon::now(); 
        $user_conect=Auth::user();
         
         

         $last_id = DB::table('tasks')->insertGetId(
            ['user_id' => $id, 
            'title' => $data['title'],
            'description' => $data['task'],
            'due_date' => $data['date'],
            'updater_user_id' => $user_conect->id,
            'created_at' => $Date,
            'updated_at' => $Date]
         );

       
         DB::table('priorities')->insert(
             ['priority_id' => $last_id,
              'priorietes' => $data['priority'],
              'created_user_id' => $user_conect->id,
              'updater_user_id' => $user_conect->id,
              'created_at' => $Date,
              'updated_at' => $Date]
            );

         
        return back()->with('message', 'the task was success');

      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = DB::table('tasks')
        ->join('priorities', 'tasks.id', '=', 'priority_id')
        ->join('users', 'users.id', '=', 'user_id')
        ->where('tasks.id', '=', $id)
        ->select('tasks.*', 'priorities.priorietes',
                 'users.first_name',
                 'users.last_name', 
                 'title', 'description', 'due_date')
        ->get();

        

        return view('update-tasks.update-task', compact('users')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, $id)
    {   
        $Date = Carbon::now(); 
        $user_conect=Auth::user();


    $users = DB::table('tasks')
        ->join('priorities', 'tasks.id', '=', 'priority_id')
        ->join('users', 'users.id', '=', 'user_id')
        ->where('tasks.id', '=', $id)
        ->update(['title' => $data['title'],
                  'description' => $data['task'],
                  'due_date' => $data['date'],
                  'tasks.updater_user_id' => $user_conect->id,
                  'tasks.updated_at' => $Date,
                  'priorities.updated_at' => $Date,
                  'priorities.updater_user_id' => $user_conect->id,
                  'priorities.priorietes' => $data['priority']
                ]);

        return back()->with('message', 'the task was Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        


         DB::table('tasks')
        ->join('priorities', 'tasks.id', '=', 'priority_id')
        ->join('users', 'users.id', '=', 'user_id')
        ->where('tasks.id', '=', $id)
        ->select('tasks.*', 'priorities.priorietes',
                 'users.first_name',
                 'users.last_name', 
                 'title', 'description', 'due_date')
        ->delete();

        return back()->with('message', 'the task was Remove');
    }



    public function listar($id){
       
      

        $tasks = Task::where('user_id',$id)
                       ->paginate();

            
           
      
      return view('list_users.list_task', compact('tasks'));          
    }
}
