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

Route::group(['prefix' => 'home'], function() {
    Route::get('/', 'HomeController@index');
    Route::get('/recordStartTime', 'TimeRecordController@recordStartTime')->name('recordStartTime');
    Route::get('/recordEndTime', 'TimeRecordController@recordEndTime')->name('recordEndTime');
});

Route::get('/time_records', 'TimeRecordController@index')->name('timeRecords');

Route::resource('/projects', 'ProjectController')->middleware('auth')->except(['create', 'edit']);
