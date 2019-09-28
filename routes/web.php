<?php


use App\Attachment;
use App\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

Route::get('/attachment/{id}', function ($id) {
    $attachment = Attachment::findOrFail($id);
    return Storage::download($attachment->path);
});
