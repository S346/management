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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'time_records', 'middleware' => 'auth'], function() {
    Route::get('/', 'TimeRecordController@index');
    Route::get('/recordStartTime', 'TimeRecordController@recordStartTime');
    Route::get('/recordEndTime', 'TimeRecordController@recordEndTime');
});

Route::resource('/projects', 'ProjectController')->middleware('auth')->except(['create', 'edit']);
