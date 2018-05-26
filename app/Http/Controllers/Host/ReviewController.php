<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
  public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index(){
		$user=Auth::user();
		
		return view('/host/review/index', compact('user'));
	}
}
