<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use App\Profile;

class ProfileController extends Controller
{
	
	public function __construct()
	{
			$this->middleware('auth');
	}
	
	public function index(){
		$user=Auth::user();
		$profiles=Profile::where('user_id', $user->id)->get();
		
		return view('profile', compact('user', 'profiles'));
	}
	
  public function headerUpload(Request $request){
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
		$image->save(public_path().'/images/header/'.$user_id);
//		$path='images/menu/'.$fileName;
		$path='images/header/'.$user_id;
		
//		$menu=Menu::where('user_id', $user->id)->get(['image_path']);
//		unlink('images/menu/1526540383elel1.PNG');
		
		
		
		Profile::updateOrCreate(
			['user_id'=>$user_id],
			['header_image'=>$path]
		);
		
		return redirect('/profile')->with('status', 'ヘッダー画像を更新しました');
	}
	
	public function profileImageUpload(Request $request){
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
		$image->save(public_path().'/images/profile/'.$user_id);
//		$path='images/menu/'.$fileName;
		$path='images/profile/'.$user_id;
		
//		$menu=Menu::where('user_id', $user->id)->get(['image_path']);
//		unlink('images/menu/1526540383elel1.PNG');
		
		
		
		Profile::updateOrCreate(
			['user_id'=>$user_id],
			['profile_image'=>$path]
		);
		
		return redirect('/profile')->with('status', 'ヘッダー画像を更新しました');
	}
	
	public function profileUpload(Request $request){
		$user=Auth::user();
		$user_id=$user->id;
		$user_name=$request->user_name;
		$facebook=$request->facebook;
		$instagram=$request->instagram;
		$twitter=$request->twitter;
		$text=$request->text;
		
		
		Profile::updateOrCreate(
			['user_id'=>$user_id],
			['user_name'=>$user_name, 
			 'facebook'=>$facebook, 
			 'instagram'=>$instagram,
			 'twitter'=>$twitter,
			 'text'=>$text,
			]
		);
		
		return redirect('/profile')->with('status', 'プロフィールを更新しました');
	}
}
