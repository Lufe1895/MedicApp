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

/**Empiezan rutas de farmacias */
Route::get('/pharmacies/orders', 'PharmacyController@orders');

Route::resource('/pharmacies', 'PharmacyController');
/**Terminan rutas de farmacias */

Route::get('/people/login', 'PersonController@loginView');

Route::resource('/people', 'PersonController');


/**Empiezan rutas de pedidos */
Route::resource('/pedidos', 'PedidoController');

Route::post('/pedidos/new', 'PedidoController@new');

Route::get('/pedidos/{id}/cancel', 'PedidoController@cancel');

Route::get('/pedidos/{id}/deliver', 'PedidoController@deliver');

Route::post('/pedidos/{id}/total', 'PedidoController@total');
/**Terminan rutas de pedidos */

Route::get('/meds/{id}', 'MedController@show');

Route::get('/profile', 'UserController@profile');

Route::get('/edit/profile', 'UserController@editProfile');

Route::get('/orders', 'PersonController@orders');