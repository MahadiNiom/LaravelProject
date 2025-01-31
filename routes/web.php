<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\ImageController;

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


Route::group(["middleware"=>"web"], function(){
    Route::get('/', "App\Http\Controllers\ImageController@index");
    Route::post("/upload", "App\Http\Controllers\ImageController@upload");
});       
