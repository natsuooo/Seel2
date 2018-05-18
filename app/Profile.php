<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $fillable = [
		'user_id', 'user_name', 'header_image', 'profile_image', 'facebook', 'instagram', 'twitter', 'text'
  ];
}
