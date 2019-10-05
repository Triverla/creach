<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
   
       protected $fillable =[

    	             'title','body','category_id','featured','slug','user_id'


                   ];

    public function getFeaturedAttribute($featured)
    {

          return asset($featured);
    }

    protected $dates = ['deleted_at'];


    public function category()
    {

       return $this->belongsTo('App\Category');

    }
    public function tags()
    {

      return $this->belongsToMany('App\Tag');
    }
 public function user()
 {
  return $this->belongsTo('App\User');
 }

 public function comments(){
   return $this->hasMany('App\Comments', 'post_id', 'id');
}

public function likes(){
   return $this->hasMany('App\PostLike', 'post_id', 'id');
}

public function getLikeCount(){
   if ($this->like_count == null){
       $this->like_count = $this->likes()->count();
   }
   return $this->like_count;
}

public function getCommentCount(){
   if ($this->comment_count == null){
       $this->comment_count = $this->comments()->count();
   }
   return $this->comment_count;
}

public function checkOwner($user_id){
   if ($this->user_id == $user_id)return true;
   return false;
}

public function checkLike($user_id){
   if ($this->likes()->where('like_user_id', $user_id)->get()->first()){
       return true;
   }else{
       return false;
   }
}



}
