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
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/wait', function () {

    return view('auth.wait');

})->name('wait')->middleware('auth');

Route::get('/', 'HomeController@index')->name('home');

// INVESTOR

// MANAGE ACCOUNT
Route::get('account', 'Investor\AccountController@edit')->name('investor.manageAccount');
Route::put('account/name', 'Investor\AccountController@updateName')->name('investor.updateName');
Route::put('account/password', 'Investor\AccountController@updatePassword')->name('investor.updatePassword');
Route::put('account/oandaId', 'Investor\AccountController@updateOandaId')->name('investor.updateOandaId');
Route::put('account/oandaToken', 'Investor\AccountController@updateOandaToken')->name('investor.updateOandaToken');


// OPEN OPERATIONS
Route::get('open-operations', 'Investor\OpenOperationsController@index')->name('investor.openOperations');

// CREATE OPERATION
Route::get('create-operation', 'Investor\CreateOperationController@index')->name('investor.createOperation');
Route::get('create-operation/signal/{signal}', 'Investor\CreateOperationController@index')->name('investor.createOperation.signal');
Route::post('create-operation/{signal?}', 'Investor\CreateOperationController@store')->name('investor.createOperation.store');

// UNINTERPRETED SIGNALS
Route::get('uninterpreted-signals', 'Investor\UninterpretedSignalsController@index')->name('investor.uninterpretedSignals');

// CREATE MODIFIER
Route::get('create-modifier', 'Investor\CreateModifierController@index')->name('investor.createModifier');
Route::get('create-modifier/signal/{signal}', 'Investor\CreateModifierController@index')->name('investor.createModifier.signal');
Route::get('create-modifier/{type}/{signal?}', 'Investor\CreateModifierController@showForm')->name('investor.createModifier.showForm');
Route::post('create-modifier/break-even/{signal?}', 'Investor\CreateModifierController@storeBreakEven')->name('investor.createModifier.storeBreakEven');
Route::post('create-modifier/close-all/{signal?}', 'Investor\CreateModifierController@storeCloseAll')->name('investor.createModifier.storeCloseAll');
Route::post('create-modifier/cancel/{signal?}', 'Investor\CreateModifierController@storeCancel')->name('investor.createModifier.storeCancel');
Route::post('create-modifier/move-stop-loss/{signal?}', 'Investor\CreateModifierController@storeMoveStopLoss')->name('investor.createModifier.storeMoveStopLoss');

// MODIFY OPERATION
Route::get('modify-operation', 'Investor\ModifyOperationController@index')->name('investor.modifyOperation');


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
Route::put('configurations', 'Admin\ConfigurationsController@update')->name('admin.configurations.update');