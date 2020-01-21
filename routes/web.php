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
    return redirect()->route('login');
    // TODO delete this
//    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/{user}/{poll}', 'VoteController@index')->name('user.vote')->middleware('auth');
//Route::post('/{user}/{poll}', 'VoteController@submitVote')->name('user.submit.vote');
Route::post('/{user}/{id}', 'VoteController@submitVote')->name('user.submit.vote');
