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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'agenda', 'where' => ['id' => '[0-9]+']], function () {

    Route::get('/criar', ['as' => 'agenda.criar', 'uses' => 'App\Http\Controllers\AgendaController@criar']);
    Route::post('/inserir', ['as' => 'agenda.inserir', 'uses' => 'App\Http\Controllers\AgendaController@inserir']);
    
    Route::get('{id}/editar', ['as' => 'agenda.editar', 'uses' => 'App\Http\Controllers\AgendaController@editar']);
    Route::put('{id}/atualizar', ['as' => 'agenda.atualizar', 'uses' => 'App\Http\Controllers\AgendaController@atualizar']);

    Route::delete('{id}/excluir', ['as' => 'agenda.excluir', 'uses' => 'App\Http\Controllers\AgendaController@excluir']);
});
