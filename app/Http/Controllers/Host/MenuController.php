<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use App\Menu;

class MenuController extends Controller
{
  public function __construct()
  {
          $this->middleware('auth');
  }
  
  //マイメニュー一覧を表示する
  public function index(){
    $user=Auth::user();
    //先にプロフィールテーブルを作らないと機能しないことに注意
    $menus=Menu::latest('created_at')->where('profile_id', $user->id)->get();

    return view('/host/menu/menu', compact('user', 'menus'));
  }
  
  //メニュー追加画面を表示する
  public function create(){
    $user=Auth::user();
    return view('/host/menu/create', compact('user'));
  }
	
  //メニューを追加する
  public function store(Request $request){

    $user=Auth::user();
    $user_id=$user->id;
    $time=time();

    if(isset($request->image)){

      $image=Image::make($request->file('image')->getRealPath());
      $image->resize(100, null, function($constraint){
          $constraint->aspectRatio();
      });
      $image_extension=$request->file('image')->getClientOriginalExtension();
      $image->save(public_path().'/images/menu/'.$user_id.$time.'.'.$image_extension);
      $image_path='images/menu/'.$user_id.$time.'.'.$image_extension;

    }else{
      $image_path='images/image.png';
    }
    
    $menu=new Menu();
    $menu->profile_id=$user_id;
    $menu->image=$image_path;
    $menu->title=$request->title;
    $menu->body=$request->body;
    $menu->price=$request->price;
    $menu->save();
    
    return redirect('/host/home')->with('status', 'メニューを追加しました');

  }
	
  public function edit(Menu $menu){
    $user=Auth::user();
    return view('/host/menu/edit', compact('user', 'menu'));
  }
  
  public function update(Request $request, Menu $menu){
    
    if(isset($request->image)){

      $image=Image::make($request->file('image')->getRealPath());
      $image->resize(100, null, function($constraint){
          $constraint->aspectRatio();
      });
      $image_extension=$request->file('image')->getClientOriginalExtension();
      $image->save(public_path().'/images/menu/'.$menu->user_id.time().'.'.$image_extension);
      $image_path='images/menu/'.$menu->user_id.time().'.'.$image_extension;
      
      $menu->image=$image_path;
      
      $oldmenu=Menu::where('id', $menu->id)->first();
      if(isset($oldmenu->image)){
        unlink($oldmenu->image);
      }
    }
    
    $menu->title=$request->title;
    $menu->body=$request->body;
    $menu->price=$request->price;
    $menu->save();
    return redirect('/host/home')->with('status', 'メニューを変更しました');
  }
  
  public function destroy(Menu $menu){
    $menu->delete();
		unlink($menu->image);
    return redirect('/host/home')->with('status', 'メニューを削除しました');
  }
  
}

