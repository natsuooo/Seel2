<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
		$photos=AccountImage::latest('created_at')->where('user_id', $user->id)->paginate(3);
		return view('home', compact('user', 'photos'));
		
		
	}
	
	public function accountImageStore(Request $request, User $user)
	{
		
//		JPG, PNG, GIF以外をはじく処理をしなきゃ
		
		$input=$request->all();
		$fileName=$input['fileName']->getClientOriginalName();
		$fileName=time().$fileName;
		$image=Image::make($input['fileName']->getRealPath());
		$image->resize(100, null, function($constraint){
			$constraint->aspectRatio();
		});
		$image->save(public_path().'/images/'.$fileName);
		$path='images/'.$fileName;

		$account_image=new AccountImage();
		$account_image->path='images/'.$fileName;
		
		$user=Auth::user();
		$account_image->user_id=$user->id;
		
		$account_image->save();

		return redirect('/home')->with('status', 'ファイルをアップロードしました！');
	}
	
	
}
