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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/gallery', 'HomeController@gallery')->name('gallery');
Route::get('/structure', 'HomeController@structure')->name('structure');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
    'password.email' => false, // Email Verification Routes...
    'password.request' => false, // Email Verification Routes...
    'password.update' => false, // Email Verification Routes...
    'password.reset' => false, // Email Verification Routes...
]);

Route::group(['middleware' => ['web','auth']], function () {
    Route::resource('/profile', 'ProfileController')->except(['create','store','show','destroy']);
    Route::resource('/structures', 'StructureController');
    Route::resource('/arts', 'ArtController');
    Route::resource('/images', 'ImagesController')->except(['update', 'show', 'create', 'edit']);

    Route::post('/video', 'VideoController@store')->name('video.store');
    Route::patch('/video/update', 'VideoController@update')->name('video.update');
});
