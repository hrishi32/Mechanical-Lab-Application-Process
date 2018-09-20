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

Route::get('/', function () {
    return view('welcome');
});

Route::get('all', function () {
    return view('all');
});

Route::resource('appl', 'ApplController');

Route::resource('applstore', 'ApplController');

Route::resource('applupdate', 'ApplController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\controllers\LfmController@show');
Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\controllers\UploadController@upload');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
