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



/*******************************************/
/********WEBSITE ALIVE TECH*****************/
/*******************************************/


Route::get('/', 'PagesController@alivetech');
Route::get('/Industria', 'PagesController@industria');
Route::get('/Academia', 'PagesController@academia');
Route::get('/Gobierno', 'PagesController@gobierno');
Route::get('/Transferencia', 'PagesController@transferencia');
Route::get('/About', 'PagesController@about');
Route::get('/Privacy', 'PagesController@privacy');


/**************************************************/
/*****************MODULARIZACION******************/
/*************************************************/


/*Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('logout',function(){
	Auth::logout();
	return Redirect::to('/');
});

Route::resource('logueo','AutenticacionController@logueo');

Route::resource('asesor','AsesorController');
Route::resource('empresa','EmpresaController');
Route::resource('vinculado','VinculadoController');