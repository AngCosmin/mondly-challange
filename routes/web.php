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

        Route::get('start/{slug}', 'RoomController@startRoomGame')->name('start');
        Route::get('finish/{slug}', 'RoomController@finishRoomGame')->name('finish');

        Route::post('create', 'RoomController@create')->name('create');

        Route::post('update-online', 'RoomController@updateOnlinePlayers')->name('update-online');
    });

    Route::get('/leaderboard', 'LeaderBoardController@index')->name('leaderboard');
});

Route::get('get-question', 'QuizController@generateQuizQuestion')->name('get.quiz.question');

Route::get('add-question-points', 'QuizController@addPoints')->name('quiz.points');
