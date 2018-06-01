<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Profile;
use App\Menu;
use App\Favorite;
use App\Reserve;
use App\ReservedMenu;

class ReserveController extends Controller{
  
  public function index(){
    $user=Auth::user();
    $reserve_requests=Reserve::latest()->where('reserve_profile_id', $user->id)->get();
    
    
    return view('/guest/reserve', compact('user', 'reserve_requests'));
  }
  
  public function reserve(Request $request, Profile $profile){
    $user=Auth::user();
    $reserve=new Reserve();
    $reserve->reserve_profile_id=$user->profile->user_id;
    $reserve->reserved_profile_id=$profile->user_id;
    $reserve->number=$request->number;
    $collection=collect($request->reserved_menu);
    $reserved_menu=$collection->implode(', ');
    $reserve->reserved_menu=$reserved_menu;
    $reserve->calendar=$request->calendar;
    $reserve->message=$request->message;
    $reserve->save();
      
    return redirect()->back()->with('status', $profile->user_name.'さんの食卓を予約リクエストしました');
  }
}