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

Route::group(['middleware' => ['auth', 'can:user-higher']], function() {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('report', 'ReportsController');
    // Route::resource('user', 'UsersController', ['only' => ['index', 'show', 'update', 'edit']]);
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function() {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Route::group(['middleware' => ['auth', 'can:admin-higher']], function() {
        Route::get('/', 'HomeController@index')->name('dashboard');
        Route::resource('user', 'UsersController');
        Route::post('user/confirm', 'UsersController@confirm')->name('user.confirm');
        Route::resource('section', 'SectionsController', ['only' => ['index', 'store', 'destroy']]);
        Route::resource('position', 'PositionsController', ['only' => ['index', 'store', 'destroy']]);
        Route::get('sales', 'SalesController@index')->name('sales.index');
        Route::post('sales/upload', 'SalesController@csvUpload')->name('sales.upload');
        Route::get('sales/download', 'SalesController@csvDownload')->name('sales.download');
        Route::resource('shop', 'ShopsController');
        Route::resource('item', 'ItemsController');
        Route::resource('news', 'NewsController');
        Route::post('news/confirm', 'NewsController@confirm')->name('news.confirm');
    });
});

Route::group(['middleware' => ['auth', 'can:master-higher'], 'prefix' => 'admin'], function() {
});

Route::group(['middleware' => ['auth', 'can:system-only'], 'prefix' => 'admin'], function() {
});
