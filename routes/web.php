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

Route::get('now', function () {
    return date("Y-m-d H:i:s");
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');
    // Route::get('/articles', 'ArticleController@index');
    // Route::get('/articles/create', 'ArticleController@create');
    Route::get('article/{id}', 'ArticleController@show');
    Route::resource('articles', 'ArticleController');
    
    Route::post('comment', 'CommentController@store');
    // Route::resource('articles/create', 'ArticleController');
});