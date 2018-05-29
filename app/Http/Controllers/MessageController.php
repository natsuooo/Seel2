<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Message;
use App\Send;
use App\Receive;

class MessageController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  
  public function index(){
    $user=Auth::user();
    $profile=Profile::where('user_id', $user->id)->first();
//    $messages=Message::where('from', $profile->id)->get();
//    $rooms=$messages->groupBy('profile_id');
    
//    $messages=Message::where('from', $profile->id)->orWhere('profile_id', $profile->id)->orderBy('created_at', 'desc')->get()->unique('profile_id');
    $messages=Message::where('from', $profile->id)->orWhere('profile_id', $profile->id)->orderBy('created_at', 'desc')->get()->unique('profile_id');
    
    return view('/message/message', compact('profile', 'messages', 'user'));
  }
  
  public function contact(Profile $profile){
    
    return view('/message/contact', compact('profile'));
  }
  
  public function submit(Request $request){
//    $user=Auth::user();
//    $message=new Message();
//    $message->profile_id=$request->profile_id;
//    $message->from=$request->from;
//    $message->message=$request->message;
//    $message->save();
    
    $send=new Send();
    $send->profile_id=$request->profile_id;
    $send->from=$request->from;
    $send->message=$request->message;
    $send->save();
    
    $receive=new Receive();
    $receive->profile_id=$request->from;
    $receive->to=$request->profile_id;
    $receive->message=$request->message;
    $receive->save();
    
    return redirect()->back();
  }
  
  public function private(Profile $profile){
    $user=Auth::user();
    $messages=Send::where('profile_id', $profile->id)->where('from', $user->id)->orWhere('profile_id', $user->id)->where('from', $profile->id)->get();
    return view('/message/private', compact('profile', 'messages', 'user'));
  }
  
  public function receive(){
    $user=Auth::user();
    $profile=Profile::where('user_id', $user->id)->first();

    $receives=Receive::where('to', $profile->id)->orderBy('created_at', 'desc')->get()->unique('profile_id');
    
    return view('/message/receive', compact('profile', 'receives', 'user'));
  }
  
  public function send(){
    $user=Auth::user();
    $profile=Profile::where('user_id', $user->id)->first();

    $sends=Send::where('from', $profile->id)->orderBy('created_at', 'desc')->get()->unique('profile_id');
    
    return view('/message/send', compact('profile', 'sends', 'user'));
  }

  
}
