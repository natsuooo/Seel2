<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Menu;
use App\Profile;



class IndexController extends Controller
{
  
  public function index(){
    $user=Auth::user();
//    $profile=Profile::where('user_id', $user->id)->first();
//    $menus=Menu::latest()->get();
    return view('/guest/index', compact('user'));
  }
  
  public function vueIndex(){
//    $menus=Menu::latest()->get();
    $menus=Menu::with('profile')->latest()->get();
    return ['menus'=>$menus];
  }
  
}

