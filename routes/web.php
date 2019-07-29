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

Route::get('/wait', function () {

    return view('auth.wait');

})->name('wait')->middleware('auth');

Route::get('/', 'HomeController@index')->name('home');

// ADMIN

    // NEW INVESTORS
    Route::get('new-investors', 'Admin\NewInvestorsController@index')->name('admin.newInvestors');
    Route::put('new-investors/{investor}', 'Admin\NewInvestorsController@validateInvestor')
        ->where('investor', '[0-9]+')
        ->name('admin.validateInvestor');

    // INVESTORS
    Route::get('investors', 'Admin\InvestorsController@index')->name('admin.investors');

    // CONFIGURATIONS
    Route::get('configurations', 'Admin\ConfigurationsController@index')->name('admin.configurations');

        // API
        Route::put('configurations', 'Admin\ConfigurationsController@update')->name('admin.configuration.update');

// INVESTOR

    //RESUME
    Route::get('resume','Investor\ResumeController@index')->name('investor.resume');

    
    //ACTIVE ORDERS
    Route::get('activeOrders','Investor\ActiveOrdersController@test')->name('investor.activeOrders');

    //CREATE ORDER
    Route::get('createOrder','Investor\CreateOrderController@index')->name('investor.createOrder');

    //CREATE MODIFIER
    Route::get('createModifier','Investor\CreateModifierController@index')->name('investor.createModifier');

    //NOT INTERPRETED MESSAGE
    Route::get('notInterpretedMessage','Investor\NotInterpretedMessage@index')->name('investor.notInterpretedMessage');

    //CONFIGURATION
    Route::get('configurations','Investor\ConfigurationsController@index')->name('investor.configurations');


    
