<?php

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

Route::get('/', 'LandingController@index')->name('landing');

Auth::routes();

Route::get('/authcheck', [App\Http\Controllers\HomeController::class, 'index'])->name('authcheck');

Route::get('/collection', 'UserGameController@index')->name('collection');

// FORMULARIO AÑADIR JUEGO
Route::post('add', 'GameController@addGame')->name('add');

//OAuth
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('{provider}/callback', 'Auth\LoginController@handleProviderCallback');