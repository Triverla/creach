<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Comments extends Model
{
    //
    protected $table = 'comments';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getUsername(){
       
        if($this->user_id != null){
            $id = $this->user_id;
            $name = User::select('name')->where('id','=', $id)->value('name');
        }elseif ($this->name == 'undefined' || $this->name == null) {
             $name = 'User'.rand(99,999);
        }
        return $name;
    }

    public function post(){
        return $this->belongsTo('App\Post', 'post_id');
    }
}
