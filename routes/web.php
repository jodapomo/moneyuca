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

Route::get('/', 'HomeController@index')->name('home');

Route::get('new-investors', 'Admin\NewInvestorsController@index')->name('admin.newInvestors');

Route::get('investors', 'Admin\InvestorsController@index')->name('admin.investors');

Route::get('configurations', 'Admin\ConfigurationsController@index')->name('admin.configurations');

Route::put('configurations', 'Admin\ConfigurationsController@update')->name('admin.configuration.update');