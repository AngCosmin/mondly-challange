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
    if(Auth::user()){
        return redirect()->route('home');
    }
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'room', 'as' => 'room.'], function () {
        Route::get('{slug}', 'RoomController@joinRoom')->name('join');

        Route::get('{slug}/start', 'RoomController@joinRoom')->name('start');

        Route::post('create', 'RoomController@create')->name('create');
    });

    Route::get('get-question', 'QuizController@generateQuizQuestion')->name('get.quiz.question');
});
