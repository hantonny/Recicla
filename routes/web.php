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


Route::get('localiza', 'LocalController@gerar_mapa')->name('localiza');

Route::prefix('/local')->group(function(){
    Route::get('/','LocalController@list')->name('local.list')->middleware('auth');//Listagem de Locais

    Route::get('add', 'LocalController@add')->name('local.add')->middleware('auth');//Tela de adição
    Route::post('add', 'LocalController@addAction'); //Ação de adição

    Route::get('edit/{id}', 'LocalController@edit')->name('local.edit')->middleware('auth');//Tela de edição
    Route::post('edit/{id}', 'LocalController@editAction'); //Ação de edição

    Route::get('delete/{id}', 'LocalController@del')->name('local.del')->middleware('auth');//Ação de deletar
});
Route::get('/login','Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@authenticate');
//Route::get('/register', 'Auth\RegisterController@index')->name('register');
//Route::post('/register', 'Auth\RegisterController@register');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::fallback(function(){
    return view('home');
});