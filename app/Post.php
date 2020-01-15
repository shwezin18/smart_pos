<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo('App\User');

    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function postimage(){
        return $this->hasMany("App\Postimage");
    }
    public function first_postimage(){
        return $this->postimage()->take('1');
    }
}
