@extends('layouts.app')


@section('content')

 
<table class="table">

  <tr><a class="btn btn-primary" style="margin: 0 13px;" href="{{ url('/list-users') }}">
                                    Back
                   </a>
     <th>Name</th>
     <th>Title</th>
     <th>Description</th>
     <th>Due date</th>
     <th>Priority</th>
     <th>Edit Task</th>
     <th>Delete Taskmm</th>
  </tr>
   
   @foreach($tasks as $task)
  <tr>
    <td>{{$task->user->first_name }} {{$task->user->last_name}}</td> 
    <td>{{$task->title}}</td>
     <td>{{$task->description}}</td>
     <td>{{$task->due_date}}</td>
     <td>{{$task->priority->priorietes}}</td>
    <td><a href="{{url('tasks', [$task->id])}}">Edit Task</a></td>
    <td><a href="{{url('delete-task', [$task->id])}} " data-method="delete" 
    data-token="{{csrf_token()}}">Delete Task</a></td>
  </tr>
  @endforeach


</table>

@endsection