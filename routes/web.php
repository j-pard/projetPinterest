<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'ArticleController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create', 'ArticleController@create');
Route::post('/create', 'ArticleController@store');


Route::get('/edit/{id}', 'ArticleController@edit');
Route::patch('/edit/{id}', 'ArticleController@update');


Route::get('/show/{id}', 'ArticleController@show');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/profil', function() {
        return view('profiles.show');
    });
    Route::get('/profil/edit', 'UsersController@edit');
    Route::patch('/profil/update', 'UsersController@update');
    Route::get('/profiles/{id}', 'UsersController@show');
});
