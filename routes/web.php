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
})->name('home');

Auth::routes();

//Route::get('/home', 'HomeController@index');

Route::get('/meds/{id}', 'MedController@show');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/profile', 'UserController@profile');

    Route::get('/edit/profile', 'UserController@editProfile');

    Route::resource('/people', 'PersonController', ['only' => [
        'update'
    ]]);

    Route::resource('/pharmacies', 'PharmacyController', ['only' => [
        'update'
    ]]);

    /**Empiezan rutas de pedidos */
        Route::resource('/pedidos', 'PedidoController');

        Route::post('/pedidos/new', 'PedidoController@new');

        Route::get('/pedidos/{id}/cancel', 'PedidoController@cancel');

        Route::get('/pedidos/{id}/deliver', 'PedidoController@deliver');

        Route::post('/pedidos/{id}/total', 'PedidoController@total');
    /**Terminan rutas de pedidos */

    Route::group(['middleware' => 'role:user'], function() {
        Route::get('/orders', 'PersonController@orders');
    });

    Route::group(['middleware' => 'role:pharmacy'], function() {
        Route::get('/pharmacies/orders', 'PharmacyController@orders');
    });

    Route::group(['middleware' => 'role:admin'], function() {
        Route::resource('/people', 'PersonController', ['except' => 'update']);

        Route::resource('/pharmacies', 'PharmacyController');
    });
});