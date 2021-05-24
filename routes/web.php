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

Route::resource('/pharmacies', 'PharmacyController');

Route::get('/people/login', 'PersonController@loginView');

Route::resource('/people', 'PersonController');

Route::resource('/pedidos', 'PedidoController');

Route::get('/meds/{id}', 'MedController@show');

Route::get('/profile', 'UserController@profile');

Route::get('/edit/profile', 'UserController@editProfile');

Route::get('/orders', 'PersonController@orders');