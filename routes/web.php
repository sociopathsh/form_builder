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


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

        Route::get('forms', 'FormController@index')->name('admin.forms');

        Route::get('login_form/edit', 'LoginFormController@edit')->name('admin.login_form.edit');
        Route::post('login_form/edit', 'LoginFormController@update')->name('admin.login_form.update');

        Route::get('register_form/edit', 'RegisterFormController@edit')->name('admin.register_form.edit');
        Route::post('register_form/edit', 'RegisterFormController@update')->name('admin.register_form.update');
    });

});

Route::get('/', 'HomeController@index')->name('home');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
