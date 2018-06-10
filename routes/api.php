<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['middleware' => 'api'],function(){
  Route::post('/article/{id}',function($id){
    $user = App\User::where('id',$id)->first();

    $article = new App\Article();
    $article->title = request('title');
    $article->content = request('content');

    $user->articles()->save($article);

    return ['title' => request('title'),'content' => request('content')];
  });

});

Route::group(['middleware' => 'api'],function(){
  Route::post('/reserve/{id}',function($id){
    $user=Auth::user();
    $reserve=new Reserve();
    $reserve->reserve_profile_id=$user->profile->user_id;
//    $reserve->reserved_profile_id=$id;
    $reserve->number=$request->number;
    $collection=collect($request->reserved_menu);
    $reserved_menu=$collection->implode(', ');
    $reserve->reserved_menu=$reserved_menu;
    $reserve->calendar=$request->calendar;
    $reserve->message=$request->message;
    $reserve->save();
      

    return ['number' => request('number'),'reserved_menu' => request('reserved_menu'),'calendar' => request('calendar'),'message' => request('message')];
  });
  
  

});

//Route::group(['middleware' => 'api'], function() {
//  Route::get('menus',  function() {
//    $menus=App\Menu::latest()->get();
//    return $menus;
//  });
//});

Route::group(['middleware' => 'api'], function() {
  Route::get('', 'Guest\IndexController@vueIndex');
  Route::get('table/{profile}', 'Guest\TableController@vueTable');
  Route::post('favorite/reserve', 'Guest\FavoriteController@vueFavorite');
  
});

//Route::group(['middleware' => 'api'], function () {
//    Route::post('authenticate',  'AuthenticateController@authenticate');
//
//    Route::group(['middleware' => 'jwt.auth'], function () {
//        Route::resource('tasks',  'TaskController');
//        Route::get('me',  'AuthenticateController@getCurrentUser');
//    });
//});













