<?php

Route::get('/', 'WebSiteController@home')->name('home');
Route::get('linha', 'WebSiteController@linha')->name('linhas');
Route::get('linha/{slug}', ['as' => 'linha.item', 'uses' => 'WebSiteController@getSingleLinha'])->where('slug', '[\w\d\-\_]+');
Route::get('noticia', 'WebSiteController@noticias')->name('noticias');
Route::get('noticia/{slug}', ['as' => 'noticia.item', 'uses' => 'WebSiteController@getSingleNoticia'])->where('slug', '[\w\d\-\_]+');
Route::get('produto', 'WebSiteController@produtos')->name('produtos');
Route::get('produto/{slug}', ['as' => 'produto.item', 'uses' => 'WebSiteController@getSingleProduto'])->where('slug', '[\w\d\-\_]+');


Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function () {
    Route::get('/', 'HomeController@index')->name('admin.home');

    Route::resource('quemsomos', 'QuemsomosController');

    Route::resource('linha', 'LinhaController');

    Route::resource('noticia', 'NoticiaController');

    Route::resource('produto', 'ProdutoController');

    Route::resource('usuario', 'UserController');
    Route::get('usuario/{usuario}/editar_senha', 'UserController@editPassword')->name('usuario.editar_senha');
    Route::post('usuario/atualizar_senha/{usuario}', 'UserController@updatePassword')->name('usuario.atualizar_senha');
});
Auth::routes();
