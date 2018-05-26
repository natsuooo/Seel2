<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
	
	public function __construct()
	{
			$this->middleware('auth');
	}
	
	public function index(){
		$user=Auth::user();
		$profile=Profile::where('user_id', $user->id)->first();
		
		return view('/host/profile', compact('user', 'profile'));
	}
	
    //ファイルサイズが大きすぎるとローカル環境だとうまくいかない、本番環境でもやってみてどの程度許すか後で決める
	public function upload(Request $request){
      $user=Auth::user();
      $user_id=$user->id;
      $profile=Profile::where('user_id', $user->id)->first();


      if(isset($request->header_image)){
        
        
        $header_image=Image::make($request->file('header_image')->getRealPath());
        $header_image->resize(100, null, function($constraint){
            $constraint->aspectRatio();
        });
        $header_extension=$request->file('header_image')->getClientOriginalExtension();
        $header_image->save(public_path().'/images/header/'.$user_id.'.'.$header_extension);
        $header_path='images/header/'.$user_id.'.'.$header_extension;
        
        if(isset($profile->header_image)){
          unlink($profile->header_image);
        }
        

      }else{
          $header_path=$profile->header_image;
      }			

      if(isset($request->profile_image)){
        $profile_image=Image::make($request->file('profile_image')->getRealPath());
        $profile_image->resize(100, null, function($constraint){
        $constraint->aspectRatio();
        });
        $profile_extension=$request->file('profile_image')->getClientOriginalExtension();
        $profile_image->save(public_path().'/images/profile/'.$user_id.'.'.$profile_extension);
        $profile_path='images/profile/'.$user_id.'.'.$profile_extension;
        
        if(isset($profile->$profile_image)){
          unlink($profile->$profile_image);
        }
        

      }else{
          $profile_path=$profile->profile_image;
      }

      Profile::updateOrCreate(
          ['user_id'=>$user_id],
          ['user_name'=>$request->user_name,
          'header_image'=>$header_path,
          'profile_image'=>$profile_path,
          'facebook'=>$request->facebook,
          'instagram'=>$request->instagram,
          'twitter'=>$request->twitter,
          'text'=>$request->text]
      );


      return redirect('/host/profile')->with('status', 'プロフィールを更新しました');
  }
	
 
}
