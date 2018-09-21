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

Route::post('applstore', 'ApplController@store');

// Route::post('applapprove', array('uses' => 'ApplController@approve', 'id'));

// Route::get('applapprove', array('uses' => 'ApplController@approve', 'id'));

// Route::put('applapprove', array('uses' => 'ApplController@approve', 'id'));

// Route::get('applapprove/{id}', ['as' => 'Appl.approve', 'uses' => 'ApplController@approve']);

// Route::put('applapprove', array('uses' => 'ApplController@approve'));

Route::post('appldecline', array('uses' => 'ApplController@decline'));

// Route::resource('applapprove', 'ApplController@approve');

// Route::get('applapprove', 'ApplController@approve');

// Route::get('appldecline', 'ApplController@decline');

Route::post('applapprove', 'ApplController@approve');

Route::post('appldecline', 'ApplController@decline');

// Route::put('applapprove', 'ApplController@approve');

// Route::put('appldecline', 'ApplController@decline');



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
