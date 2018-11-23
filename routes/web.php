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
    Route::view('/', 'index')->name('dashboard');
    Route::resource('report', 'ReportsController');
    // Route::resource('user', 'UsersController', ['only' => ['index', 'show', 'update', 'edit']]);
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Admin\Auth\LoginController@login');
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('logout');

    Route::group(['middleware' => ['auth', 'can:admin-higher']], function() {
        Route::view('/', 'admin.index')->name('admin.dashboard');
        Route::resource('user', 'Admin\UsersController');
        Route::post('user/confirm', 'Admin\UsersController@confirm')->name('user.confirm');
        Route::resource('section', 'Admin\SectionsController', ['only' => ['index', 'store', 'destroy']]);
        Route::resource('position', 'Admin\PositionsController', ['only' => ['index', 'store', 'destroy']]);
        Route::resource('sales', 'Admin\SalesController');
        Route::resource('shop', 'Admin\ShopsController');
        Route::resource('item', 'Admin\ItemsController');
        Route::resource('news', 'Admin\NewsController');
        Route::post('news/confirm', 'Admin\NewsController@confirm')->name('news.confirm');
    });
});

Route::group(['middleware' => ['auth', 'can:master-higher'], 'prefix' => 'admin'], function() {
});

Route::group(['middleware' => ['auth', 'can:system-only'], 'prefix' => 'admin'], function() {
});
