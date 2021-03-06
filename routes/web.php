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
    return view('welcome');
});

Route::get('discouts',[
    'middleware' => 'auth',
    'uses' => 'DiscountsController@index'
    ]);

Route::resource('about', 'AboutController', ['only' => ['index']]);
Route::resource('contact', 'ContactController', ['only' => ['create', 'store']]);

//コンタクトフォーム
Route::get('contact', ['as' => 'contact', 'uses' => 'ContactController@create']);
Route::post('contact', ['as' => 'contact_store', 'uses' => 'ContactController@store']);
//productroute
Route::get('products','ProductController@index');
Route::get('products/{$id}','ProductController@show');
//管理者プロダクト
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function()
{
    Route::resource('products', 'ProductController');
});


Auth::routes();


