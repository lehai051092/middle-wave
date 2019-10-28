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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/customers')->group(function () {
    Route::get('list', 'CustomerController@index')->name('customers.index');
    Route::get('delete/{id}', 'CustomerController@deleteCustomer')->name('customers.delete');
    Route::get('formAdd', 'CustomerController@formAdd')->name('customers.add');
    Route::post('formAdd', 'CustomerController@insertCustomer')->name('customers.insert');
    Route::get('formEdit/{id}', 'CustomerController@formEdit')->name('customers.edit');
    Route::post('formEdit/{id}', 'CustomerController@updateCustomer')->name('customers.update');
    Route::get('search', 'CustomerController@searchCustomer')->name('customers.search');
});
