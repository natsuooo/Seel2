<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
  protected $fillable=[
    'reserve_profile_id', 'reserved_profile_id', 'number', 'reserved_menu', 'calendar', 'message',
  ];
  
  public function profile(){
    return $this->belongsTo('App\Profile', 'reserved_profile_id');
  }
  
  public function menu(){
    return $this->belongsTo('App\Menu', 'reserved_menu');
  }
}