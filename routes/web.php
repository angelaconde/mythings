<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Auth
Route::get('/authcheck', [App\Http\Controllers\HomeController::class, 'index'])->name('authcheck');

// Users
Route::get('profile/{user}', 'UserController@view')->name('users.profile');
Route::patch('users/updatename', 'UserController@updateName')->name('users.updatename');
Route::patch('users/avatar', 'UserController@uploadAvatar')->name('users.avatar');
Route::patch('users/avatar/reset', 'UserController@resetAvatar')->name('users.avatar.reset');

// User's games CRUD
Route::post('add', 'GameController@addGame')->name('add');
Route::get('/collection', 'UserGameController@index')->name('collection');
Route::patch('updateusergame', 'UserGameController@update')->name('editusergame');
Route::delete('deleteusergame', 'UserGameController@delete')->name('deleteusergame');

// User's games stats
Route::get('stats', 'UserGameController@showStats')->name('stats');

// Game details
Route::get('/details/{id}', 'GameController@details')->name('details');

// OAuth
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('{provider}/callback', 'Auth\LoginController@handleProviderCallback');
