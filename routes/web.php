<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace'=>'Admin','middleware'=>'auth'],function(){

    Route::get('/','ResumenController@index');

    Route::resource('departamentos','DepartamentsController');
    Route::get('departamentos/{departament_id}/productos','DepartamentsController@products');

    Route::resource('productos','ProductsController');

    Route::get('abastecer-productos','ProductsController@provideProduct');
    Route::post('abastecer-productos','ProductsController@provideProductAndSave');

    Route::resource('usuarios','UsersController');

    Route::resource('entregas','EntregaController');

    Route::get('reportes','ReporteController@index');
    Route::get('reportes/insumos','ReporteController@reporteInsumo');
    Route::get('reportes/entregas','ReporteController@reporteIEntregas');

});

Route::group(['namespace'=>'Admin'],function() {
    Route::get('productos-comprobante/{product_id}','ProductsController@comprobante');
});
