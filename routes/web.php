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

Route::get('login', 'HomeController@login')->name('user.login');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['customer', 'verified']], function (){
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('profile', 'ProfileController@index')->name('customer.profile');
    Route::post('profile/update', 'ProfileController@update')->name('customer.profile.update');

    Route::get('customer-register', 'CustomerController@index')->name('customer.register');
    Route::post('customer-register/store', 'CustomerController@store')->name('customer.register.store');
});
