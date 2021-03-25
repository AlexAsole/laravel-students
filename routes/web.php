<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/students', 'PublicController@index')->name('public-index');
Route::get('/students/{student}', 'PublicController@show')->name('public-show');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {
        Route::resource('/students', StudentsController::class);
    });
