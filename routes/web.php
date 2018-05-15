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

Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function () {
    Route::get('/', 'HomeController@index')->name('admin.home');

    Route::resource('quemsomos', 'QuemsomosController');

    Route::resource('noticia', 'NoticiaController');
    // Route::get('noticia/{slug}', ['as' => 'noticia.single', 'uses' => 'NoticiaController@getSingleNoticia'])->where('slug', '[\w\d\-\_]+');
    // Route::get('noticia/{slug}', 'NoticiaController@getSingle')->name('noticia.getSingle');

    Route::resource('cliente', 'ClienteController');
    Route::post('cliente/{id}', 'ClienteController@destroy')->name('cliente.destroy');

    Route::resource('usuario', 'UserController');
    Route::get('usuario/{usuario}/editar_senha', 'UserController@editPassword')->name('usuario.editar_senha');
    Route::post('usuario/atualizar_senha/{usuario}', 'UserController@updatePassword')->name('usuario.atualizar_senha');
});

Auth::routes();
