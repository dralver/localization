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
Route::get('/lang/{locale?}', [
    'uses' => 'HomeController@changeLang'
]);

Route::localizedGroup(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('test', function() {
        return view('test');
    });
    Route::get('/login', 'Auth\LoginController@showLoginForm');
});
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/password/reset', 'Auth\LoginController@login')->name('password.request');
Route::get('/register', 'Auth\LoginController@login')->name('register');
Route::post('/logout', 'Auth\LoginController@logout');

//Auth::routes();



