<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  protected $fillable = [
		'profile_id', 'image', 'title', 'body', 'price'
  ];
  
  public function profile(){
    return $this->belongsTo('App\Profile');
  }
}