<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace'=>'Api'],function(){

    Route::resource('/departamentos','DepartamentosController')->only(['index','show']);

    Route::get('/departamentos/{departamento_id}/productos','DepartamentosController@products');

    Route::resource('/productos','ProductsController')->only(['index','show']);

    Route::post('entregas','EntregaController@store');
    Route::get('entregas/{entrega_id}','EntregaController@show');
    Route::put('entregas/{entrega_id}','EntregaController@update');

    Route::post('auth','AuthController@login');

});
