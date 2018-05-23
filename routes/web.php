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


Route::get('/', function () {
    return view('index');
});



//認証
Auth::routes();
Route::get('/home', 'HomeController@index');


//ホストルーティング

//メインメニュー
Route::get('/host/home', 'HomeController@index');
Route::get('/host/menu', 'MenuController@index');
Route::get('/host/menu/create', 'MenuController@create');
Route::get('/host/calendar', 'CalendarController@index');
Route::get('/host/data', 'DataController@index');
Route::get('/host/review', 'ReviewController@index');
Route::get('/host/notification', 'NotificationController@index');
Route::get('/host/message', 'MessageController@index');


//サブメニュー
Route::get('/host/profile', 'ProfileController@index');

Route::get('/host/area', 'AreaController@index');
Route::get('/host/cancel', 'CancelController@index');
Route::get('/host/help', 'HelpController@index');

//プロフィール
Route::post('/host/profile/upload', 'ProfileController@upload');



//メニュー編集
Route::get('/menu/create', 'MenuController@create');
Route::post('/menu/create', 'MenuController@store');
Route::post('/menu/create/image', 'MenuController@imageCreate');


