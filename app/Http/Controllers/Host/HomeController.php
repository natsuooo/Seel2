<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
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
		$menus=Menu::latest('created_at')->where('profile_id', $user->id)->get();
		
		$profile=Profile::where('user_id', $user->id)->first();
		
		return view('/host/home', compact('user', 'profile', 'menus'));
		
		
	}
	
	
	
	
}
