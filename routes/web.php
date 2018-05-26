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
Route::get('/guest/table/{profile}', 'Guest\TableController@show');
Route::get('/guest/message/{profile}', 'MessageController@index');


//認証
Auth::routes();

//ホストルーティング


//メインメニュー
Route::get('/host/home', 'Host\HomeController@index');
Route::get('/host/menu', 'Host\MenuController@index');
Route::get('/host/menu/create', 'Host\MenuController@create');
Route::get('/host/calendar', 'Host\CalendarController@index');
Route::get('/host/data', 'Host\DataController@index');
Route::get('/host/review', 'Host\ReviewController@index');
Route::get('/host/notification', 'Host\NotificationController@index');
Route::get('/host/message', 'Host\MessageController@index');


//サブメニュー
Route::get('/host/profile/{profile}', 'Host\ProfileController@index');

Route::get('/host/area', 'Host\AreaController@index');
Route::get('/host/cancel', 'Host\CancelController@index');
Route::get('/host/help', 'Host\HelpController@index');

//プロフィール
Route::post('/host/profile', 'Host\ProfileController@upload');

//メニュー
Route::post('/host/menu/create', 'Host\MenuController@store');
Route::get('/host/menu/{menu}/edit', 'Host\MenuController@edit');
Route::patch('/host/menu/{menu}', 'Host\MenuController@update');
Route::delete('/host/menu/{menu}', 'Host\MenuController@destroy');