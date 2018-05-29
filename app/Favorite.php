<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
  protected $fillable=[
    'fav', 'faved'
  ];
  
  public function profiles(){
    return $this->belongsToMany('App\Profile')->withTimestamps();
  }
}
