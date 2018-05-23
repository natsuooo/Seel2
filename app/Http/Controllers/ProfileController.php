<?php

namespace App\Http\Controllers;

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
	
  
	public function upload(Request $request){
      $user=Auth::user();
      $user_id=$user->id;
      $profile=Profile::where('user_id', $user->id)->first();


      if(isset($request->header_image)){
        
        
        $header_image=Image::make($request['header_image']->getRealPath());
        $header_image->resize(100, null, function($constraint){
            $constraint->aspectRatio();
        });
        $header_extension=$request['header_image']->getClientOriginalExtension();
        $header_image->save(public_path().'/images/header/'.$user_id.'.'.$header_extension);
        $header_path='images/header/'.$user_id.'.'.$header_extension;
        
        unlink($profile->header_image);

      }else{
          $header_path=$profile->header_image;
      }			

      if(isset($request->profile_image)){
        $profile_image=Image::make($request['profile_image']->getRealPath());
        $profile_image->resize(100, null, function($constraint){
        $constraint->aspectRatio();
        });
        $profile_extension=$request['profile_image']->getClientOriginalExtension();
        $profile_image->save(public_path().'/images/profile/'.$user_id.'.'.$profile_extension);
        $profile_path='images/profile/'.$user_id.'.'.$profile_extension;
        
        unlink($profile->$profile_image);

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
