@extends('layouts.app')

@section('content')

@foreach($users as $user)
  
@endforeach


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center"><strong>Update Task</strong></div>
                

                
                @if (session('message'))
                <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{ session('message') }}</strong>
                </div>
                @endif

                <div class="panel-body">
                 <form class="form-horizontal" role="form" method="POST" action="{{url('update-task', [$user->id])}}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                  
                   <label for="label" class="col-md-12 col-lg-3" control-label pull-left" style="text-align: left;">User : {{$user->first_name }} {{$user->last_name}}</label>
                   
                   <div class="form-group">
                    
                    

                    <div class="col-md-12 col-lg-6 col-sm-12">
                     <label for="comment">Title:</label>
                    <input id="title" type="text" class="form-control" name="title" value="{{$user->title }}" required>
                    <label for="comment">Description:</label>
                    <textarea class="form-control" rows="4" id="comment" name="task" value="">{{$user->description}}</textarea>
                    
                     
                    <div class="panel-body"> </div> 
                    <div class="row"> 
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                  
                     <label>Due Date</label>
                    <input type="date" data-date="" data-date-format="DD MMMM YYYY" value="{{$user->due_date}}" name="date">
                   </div>
                     

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Priority :</label>
                      <select class="selectpicker" name="priority">
                          <option value="{{$user->priorietes}}">{{$user->priorietes}}</option>
                        <option>High</option>
                        <option>Medium</option>
                        <option>Normal</option>
                      </select>
                    </div>

                    </div>
                   </div>
                    </div>

                    <a class="btn btn-primary" style="margin: 0 13px;" href="{{ url('/list-users') }}">
                                    Back
                   </a> 

                  

                   <button type="submit" class="btn btn-primary">
                                    Update Task
                   </button>  
                 </form>
                   
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



  
  