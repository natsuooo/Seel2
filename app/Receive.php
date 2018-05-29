<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receive extends Model
{
  protected $fillable=[
    'profile_id', 'message', 'to'
  ];
  
  public function profile(){
    return $this->belongsTo('App\Profile');
  }
}
