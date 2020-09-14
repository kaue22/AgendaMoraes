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
//Home
Route::get('/home', 'HomeController@index')->name('admin.pages.home');
//Agenda
Route::get('/agenda', 'AgendaController@index')->name('admin.agenda.home');
Route::get('/agenda/create','AgendaController@create')->name('admin.agenda.create');
Route::post('/agenda/cadastra', 'AgendaController@cadastra')->name('admin.agenda.cadastra');
