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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'can:user-higher']], function () {
    Route::view('/', 'index');
    Route::resource('report', 'ReportsController');
    Route::resource('user', 'UsersController', ['only' => ['index', 'show', 'update', 'edit']]);
});

Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
    Route::view('/admin', 'admin');
    Route::resource('user', 'UsersController', ['only' => ['create', 'store', 'destroy']]);
});

Route::group(['middleware' => ['auth', 'can:master-higher']], function () {
});

Route::group(['middleware' => ['auth', 'can:system-only']], function () {
});
