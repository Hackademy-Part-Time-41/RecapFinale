<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage',[PageController::class,'home'])->name('home');

Route::get('/esempio',function(){
    return 'esempio';
})->name('esempio');

Route::get('/esempio/{id}/{categoria?}',[PageController::class,'esempio'])->name('parametrica');

Route::get('/feedback',[PageController::class,'feedback'])->middleware('auth')->name('feedback');
Route::post('/feedback',[PageController::class,'feedbackSend'])->middleware('auth')->name('feedback.send');