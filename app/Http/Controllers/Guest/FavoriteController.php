<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Favorite;

class FavoriteController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
  
  public function index(){
    $user=Auth::user();
    $favs=Favorite::latest()->where('fav', $user->profile->id)->get();
    return view('guest/fav', compact('favs'));
  }
  
  public function registerOrDelete(Request $request){
    $isFav=Favorite::where('fav', $request->fav)->where('faved', $request->faved)->first();
    
    if(empty($isFav->id)){
      $favorite=new Favorite();
      $favorite->fav=$request->fav;
      $favorite->faved=$request->faved;
      $favorite->save();
      $favorite->profiles()->attach($request->faved);
      return redirect()->back()->with('status', 'お気に入りに追加しました');
    }else{
      Favorite::where('fav', $request->fav)->where('faved', $request->faved)->delete();
      return redirect()->back()->with('status', 'お気に入りから削除しました');
    }
    
  }
  
  public function delete(Request $request){
    Favorite::where('fav', $request->fav)->where('faved', $request->faved)->delete();
      return redirect()->back()->with('status', 'お気に入りから削除しました');
  }
  
  public function vueFavorite(Request $request){
    $isFav=Favorite::where('fav', $request->fav)->where('faved', $request->faved)->first();
    
    if(empty($isFav->id)){
      $favorite=new Favorite();
      $favorite->fav=$request->fav;
      $favorite->faved=$request->faved;
      $favorite->save();
      $favorite->profiles()->attach($request->faved);
      return redirect()->back()->with('status', 'お気に入りに追加しました');
    }else{
      Favorite::where('fav', $request->fav)->where('faved', $request->faved)->delete();
      return redirect()->back()->with('status', 'お気に入りから削除しました');
    }
    
  }
  
}

