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
/***********WEBSITE ALIVE TECH**************/
/*******************************************/


Route::get('/', 'PagesController@alivetech');
Route::get('/Industria', 'PagesController@industria');
Route::get('/Academia', 'PagesController@academia');
Route::get('/Gobierno', 'PagesController@gobierno');
Route::get('/Transferencia', 'PagesController@transferencia');
Route::get('/About', 'PagesController@about');
Route::get('/Privacy', 'PagesController@privacy');

/***********************************************/
/******************MAIL*************************/
/***********************************************/

Route::get('sup', function(){
    
    Mail::to('sistemas@alivetech.mx')->send(new WelcomeMail);
    
});




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







Route::group(['middleware' => 'auth'], function () {
    
	// MIDDLEWARE PARA ASESOR
    Route::group(['middleware' => 'asesor'], function () {
    
		Route::resource('asesor','AsesorController');
		Route::resource('asesor.convocatoria/','ConvocatoriaController');
		Route::resource('asesor.programa/','ProgramaController');
	    
	});

    // MIDDLEWARE PARA EMPRESA
	Route::group(['middleware' => 'empresa'], function () {
    
		Route::resource('empresa','EmpresaController');
	    
	});

	// MIDDLEWARE PARA VINCULADO
	Route::group(['middleware' => 'vinculado'], function () {
    
		Route::resource('vinculado','VinculadoController');
	    
	});

});