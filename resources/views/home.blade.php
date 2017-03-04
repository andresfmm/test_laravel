@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            @if(Session::has('status'))
                 <div class="alert alert-dismissible alert-success">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <strong>{{session::get('status')}}</strong> 
                 </div>
                 @endif
                <div class="panel-heading" align="center"><strong><span>{{ Auth::user()->role }}</span> panel</strong></div>

                <div class="panel-body">
                    
                    
                    <a class="btn btn-primary" style="margin: 0 13px;" href="{{ url('/register') }}">
                                    Create User
                   </a>
                    
                   <a class="btn btn-primary" style="margin: 0 13px;" href="{{ url('/list-users') }}">
                                    List User
                   </a>

                    <a href=""></a>
                    <a href=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
