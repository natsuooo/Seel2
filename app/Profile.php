<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $fillable = [
		'user_id', 'user_name', 'header_image', 'profile_image', 'facebook', 'instagram', 'twitter', 'text'
  ];
  
  public function user(){
    return $this->belongsTo('App\User');
  }
  
  public function menus(){
    return $this->hasMany('App\Menu');
  }
  
  public function messages(){
    return $this->hasMany('App\Message');
  }
  
  public function favorites(){
    return $this->belongsToMany('App\Favorite')->withTimestamps();
  }
  
  public function reserves(){
    return $this->hasMany('App\Reserve', 'reserved_profile_id');
  }
}
