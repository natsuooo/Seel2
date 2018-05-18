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
Route::get('/host/home', 'HomeController@index');
Route::get('/host/menu', 'MenuController@index');
Route::get('/host/menu/create', 'MenuController@create');


//画像アップロード
Route::post('/accountImageStore', 'HomeController@accountImageStore');
Route::post('/menuUpload', 'HomeController@menuUpload');

//プロフィール編集
Route::post('/headerUpload', 'ProfileController@headerUpload');
Route::post('/profileImageUpload', 'ProfileController@profileImageUpload');
Route::post('/profileUpload', 'ProfileController@profileUpload');


//プロフィール編集
Route::get('/profile', 'ProfileController@index');

//メニュー編集
Route::get('/menu/create', 'MenuController@create');
Route::post('/menu/create', 'MenuController@store');
Route::post('/menu/create/image', 'MenuController@imageCreate');

//Vue練習
Route::get('/vue', 'HomeController@vue');
