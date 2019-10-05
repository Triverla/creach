<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function post(){
        return $this->belongsTo('App\Post', 'post_id');
    }
}
