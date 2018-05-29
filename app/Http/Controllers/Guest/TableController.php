<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Profile;
use App\Menu;
use App\Favorite;


class TableController extends Controller
{
  public function show(Profile $profile){
    $user=Auth::user();
    $menus=Menu::where('profile_id', $profile->id)->latest('created_at')->get();
    $faved=Favorite::where('faved', $profile->id)->count();
    return view('/guest/table', compact('profile', 'menus', 'faved'));
  }
}

