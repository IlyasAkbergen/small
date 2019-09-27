<?php


use Illuminate\Support\Facades\Auth;

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return redirect('home');
});

Route::resource('questions', 'QuestionController');
Route::resource('answers', 'AnswerController');

Route::get('/client-questions', function() {
    return response()->json([
        'questions' => Auth::user()->questions,
    ]);
});