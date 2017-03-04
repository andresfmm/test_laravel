@extends('layouts.app')


@section('content')


<table class="table">
	<tr>
	   <th>Firs Name</th>
	   <th>Last Name</th>
	   <th>Task</th>
	   <th>Edit Task</th>
	</tr>
   
   @foreach($posts as $post)
	<tr>
	    <td>{{$post->first_name}}</td>
		<td>{{$post->last_name}}</td>
		<td><a href="{{url('set-task', [$post->id])}}">Create Tasks</a></td>
		<td><a href="{{url('list-task', [$post->id])}}">View Tasks</a></td>
	</tr>
	@endforeach


</table>
{!! $posts->render() !!}
@endsection

