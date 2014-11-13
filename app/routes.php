<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as'=>'home','uses'=>'AuthController@index']);
Route::post('/login', array('as' => 'login', 'uses' => 'AuthController@login'));

Route::group(array('before' => 'auth'), function()
{
    Route::get('/orden/getEquipoCliente/{id}','EquipoController@getEquipoCliente');
	Route::get('/personas/{id}','PersonaController@index');
    // Esta será nuestra ruta de bienvenida.
    Route::get('/inicio', function()
    {
        return View::make('inicio');
    });
    // Esta ruta nos servirá para cerrar sesión.
    Route::get('logout', ['as'=>'logout','uses'=>'AuthController@logOut']);
    Route::resource('cliente', 'ClienteController');
    Route::resource('equipos', 'EquipoController');
    Route::resource('orden','OrdenController');
    Route::patch('/orden/entrega/{id}',['as'=>'entrega','uses'=>'OrdenController@entrega']);
});

