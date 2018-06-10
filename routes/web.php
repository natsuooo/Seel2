<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//ゲストルーティング
Route::get('/', 'Guest\IndexController@index');
//Route::get('/table/{profile}', 'Guest\TableController@show');
Route::get('/favorite', 'Guest\FavoriteController@index');
Route::get('/notification', 'NotificationController@index');
Route::get('/message', 'MessageController@index');
Route::get('/reserve', 'Guest\ReserveController@index');


//メッセージ機能
Route::get('/message/contact/{profile}', 'MessageController@contact');
Route::post('/message/submit', 'MessageController@submit');
Route::get('/message/private/{profile}', 'MessageController@private');
Route::get('/message/receive', 'MessageController@receive');
Route::get('/message/send', 'MessageController@send');


//お気に入り機能
//Route::post('/favorite/register', 'Guest\FavoriteController@registerOrDelete');
Route::post('/favorite/delete', 'Guest\FavoriteController@delete');

//予約
Route::post('/reserve/{profile}', 'Guest\ReserveController@reserve');


//認証
Auth::routes();

//SPA
Route::get('/article', function(){
  return view('vue');
});


//ホストルーティング


//メインメニュー
Route::get('/home', 'Host\HomeController@index');
Route::get('/menu', 'Host\MenuController@index');
Route::get('/calendar', 'Host\CalendarController@index');
Route::get('/data', 'Host\DataController@index');
Route::get('/review', 'Host\ReviewController@index');
Route::get('/notification', 'Host\NotificationController@index');
//Route::get('/message', 'Host\MessageController@index');


//サブメニュー
Route::get('/profile', 'Host\ProfileController@index');

Route::get('/area', 'Host\AreaController@index');
Route::get('/cancel', 'Host\CancelController@index');
Route::get('/help', 'Host\HelpController@index');

//プロフィール
Route::post('/profile/{profile}', 'Host\ProfileController@upload');

//メニュー
Route::get('/menu/create', 'Host\MenuController@create');
Route::post('/menu/create/{profile}', 'Host\MenuController@store');
Route::get('/menu/{menu}/edit', 'Host\MenuController@edit');
Route::patch('/menu/{menu}', 'Host\MenuController@update');
Route::delete('/menu/{menu}', 'Host\MenuController@destroy');

//カレンダー
Route::get('/calendar/{t}', 'Host\CalendarController@show');