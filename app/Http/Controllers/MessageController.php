<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class MessageController extends Controller
{
  public function index(Profile $profile){
    return view('/guest/message', compact('profile'));
  }
}
