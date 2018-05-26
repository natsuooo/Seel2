<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Profile;

class IndexController extends Controller
{
  public function index(){
    $menus=Menu::latest()->get();
    return view('/guest/index', compact('menus'));
  }
}
