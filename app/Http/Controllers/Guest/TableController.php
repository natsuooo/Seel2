<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profile;
use App\Menu;


class TableController extends Controller
{
  public function show(Profile $profile){
    $menus=Menu::where('profile_id', $profile->id)->latest('created_at')->get();
    return view('/guest/table', compact('profile', 'menus'));
  }
}
