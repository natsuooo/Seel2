<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\PasswordReset;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'password',
  ];
	
	protected $guarded=['id', 'created_at'];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];
  
//  パスワード再設定
  public function sendPasswordResetNotification($token){
    $this->notify(new PasswordReset($token));
  }
	
  public function profile(){
    return $this->hasOne('App\Profile');
  }
}
