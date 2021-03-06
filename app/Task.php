<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Task extends Model
{
    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function priority(){
    	return $this->belongsTo('App\Priorities', 'id');
    }
}



