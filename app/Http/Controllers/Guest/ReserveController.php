<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Profile;
use App\Menu;
use App\Favorite;
use App\Reserve;

class ReserveController extends Controller
{
  public function index(Profile $profile){
    $user=Auth::user();
    $menus=Menu::where('profile_id', $profile->id)->latest('created_at')->get();
    $faved=Favorite::where('faved', $profile->id)->count();
    return view('/guest/reserve', compact('profile', 'menus', 'faved'));
  }
  
  public function reserve(Request $request, Profile $profile){
    $user=Auth::user();
    $reserve=new Reserve();
    $reserve->reserve_profile_id=$user->profile->user_id;
    $reserve->reserved_profile_id=$profile->user_id;
    $reserve->number=$request->number;
    $collection=collect($request->reserved_menu);
    $reserved_menu=$collection->implode('-');
    $reserve->reserved_menu=$reserved_menu;
    $reserve->calendar=$request->calendar;
    $reserve->message=$request->message;
    $reserve->save();
    
    $menu_confirms=Menu::whereIn('id', $request->reserved_menu)->get();
      
    return redirect()->back()->with('status', '下記の内容で'.$profile->user_name.'さんの食卓の予約をリクエストしました')->with('menu_confirms', $menu_confirms);
  }
}