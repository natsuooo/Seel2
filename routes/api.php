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