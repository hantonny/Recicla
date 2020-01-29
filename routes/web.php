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
Route::get('/', function(){
    return view('home');
});
Route::get('/home', function(){
    return view('home');
})->name('home');
Route::get('/sobre', function(){
    return view('sobre');
})->name('sobre');


Route::get('localiza', 'LocalController@listar_local')->name('localiza');

Route::prefix('/local')->group(function(){
    Route::get('/','LocalController@list')->name('local.list');//Listagem de Locais

    Route::get('add', 'LocalController@add')->name('local.add'); //Tela de adição
    Route::post('add', 'LocalController@addAction'); //Ação de adição

    Route::get('edit/{id}', 'LocalController@edit')->name('local.edit'); //Tela de edição
    Route::post('edit/{id}', 'LocalController@editAction'); //Ação de edição

    Route::get('delete/{id}', 'LocalController@del')->name('local.del'); //Ação de deletar
});
Route::fallback(function(){
    return view('home');
});