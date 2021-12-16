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

use App\Http\Controllers\HelloController;
use App\Http\Middleware\HelloMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', 'HelloController@index')
    ->middleware('MyMW')->name('hello');
// Route::get('/hello/{id}', 'HelloController@index')
// ->middleware('MyMW');
Route::get('/hello/{id}/{name}', 'HelloController@save');
Route::get('/hello/other', 'HelloController@other');
