<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


Route::get('/', [QuestionController::class,'getQuestions']);
Route::post('/check_answer/{word}/{id}', [QuestionController::class,'checkAnswer']);

#AUTH
Route::get('/login', function(){
    return view('auth.login');
});
Route::post('/login', [AuthController::class,'login'])->name('login');

Route::get('/register', function(){

    return view('auth.register',[
        'question' => DB::table('Questions')
                    ->inRandomOrder()
                    ->first()
    ]);
});
Route::post('/register', [AuthController::class,'register']);
Route::get('/logout', [AuthController::class,'logout']);
