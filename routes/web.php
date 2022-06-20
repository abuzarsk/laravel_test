<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\unsubscribe;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|C:\xampp\htdocs\www\laravel_test\test\app\Http\Controllers\unsubscribe.php
*/



Route::get('/', function () {
    return view('welcome');
});

Route::get('/createPost', function () {
    return view('createPost');
});

Route::post('/form_submit',[AjaxController::class,'form_submit']);
Route::post('/postsubmit',[PostController::class,'postsubmit']);
Route::get('/unsubscribe/{uid}',[unsubscribe::class,'unsubscribeFunc']);

//Route::get('/unsubscribe/{uid}', function ($uid) {
  //  print_r(unsubscribe::unsubscribeFunc($uid));
    //return view('unsubscribe');
//});
