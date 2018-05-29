<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Send extends Model
{
  protected $fillable=[
    'profile_id', 'message', 'from'
  ];
  
  public function profile(){
    return $this->belongsTo('App\Profile');
  }
}
