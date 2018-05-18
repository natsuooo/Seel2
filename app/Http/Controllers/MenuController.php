<?php

namespace App\Http\Controllers;

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
	
	public function index(){
		$user=Auth::user();
		$menus=Menu::latest('created_at')->where('user_id', $user->id)->get();

		
		return view('/host/menu/index', compact('user', 'menus'));
	}
	
  public function create(){
		$user=Auth::user();
		$menus=Menu::latest('created_at')->where('user_id', $user->id)->get();
		return view('/host/menu/create', compact('user', 'menus'));
	}
	
	public function store(Request $request){
		
		$user=Auth::user();
		$user_id=$user->id;
		$title=$request->title;
		$body=$request->body;
		$price=$request->price;
		
		Menu::updateOrCreate(
			['user_id'=>$user_id],
			['title'=>$title, 
			 'body'=>$body, 
			 'price'=>$price,
			]
		);

		return redirect('/home')->with('status', 'メニューを追加しました');
	}
	
	public function imageCreate(Request $request){
		//一応実装はしたけど、JPGなど拡張子も併せて保存しなければ！
		
		
		$user=Auth::user();
		$user_id=$user->id;
		$user_name=$user->name;
		
		$input=$request->all();

//		$fileName=$input['fileName']->getClientOriginalName();
//		$fileName=time().$fileName;
		$image=Image::make($input['fileName']->getRealPath());
		$image->resize(100, null, function($constraint){
			$constraint->aspectRatio();
		});
//		$image->save(public_path().'/images/menu/'.$fileName);
		$image->save(public_path().'/images/menu/'.$user_id);
//		$path='images/menu/'.$fileName;
		$path='images/menu/'.$user_id;
		
//		$menu=Menu::where('user_id', $user->id)->get(['image_path']);
//		unlink('images/menu/1526540383elel1.PNG');
		
		
		
		Menu::updateOrCreate(
			['user_id'=>$user_id],
			['image'=>$path]
		);
		
		return redirect('/menu/create')->with('status', 'メニュー画像を追加しました');
	}
	
	public function upload(){
		
	}
}
