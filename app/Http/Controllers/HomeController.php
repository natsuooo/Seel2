<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Menu;
use App\Profile;
use App\AccountImage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
			$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$user=Auth::user();
		$photos=AccountImage::latest('created_at')->where('user_id', $user->id)->get();
		$menus=Menu::latest('created_at')->where('user_id', $user->id)->get();
		
		$profiles=Profile::where('user_id', $user->id)->get();
		
		return view('/host/home', compact('user', 'photos', 'profiles', 'menus'));
		
		
	}
	
	public function accountImageStore(Request $request)
	{
		
//		JPG, PNG, GIF以外をはじく処理をしなきゃ
		
		$input=$request->all();
		$fileName=$input['fileName']->getClientOriginalName();
		$fileName=time().$fileName;
		$image=Image::make($input['fileName']->getRealPath());
		$image->resize(100, null, function($constraint){
			$constraint->aspectRatio();
		});
		$image->save(public_path().'/images/account/'.$fileName);
		$path='images/account/'.$fileName;

		$account_image=new AccountImage();
		$account_image->path='images/account/'.$fileName;
		
		$user=Auth::user();
		$account_image->user_id=$user->id;
		
		$account_image->save();

		return redirect('/home')->with('status', 'ファイルをアップロードしました！');
	}
	
	public function menuUpload(Request $request){
		//一応実装はしたけど、JPGなど拡張子も併せて保存しなければ！
		
		
		$user=Auth::user();
		$user_id=$user->id;
		
		$input=$request->all();

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
		
		
		
		$menu_image=Menu::updateOrCreate(
			['user_id'=>$user_id],
			['image_path'=>$path]
		);
		
		return redirect('/home')->with('status', 'ファイルをアップロードしました！');
	}
	
	
	
}
