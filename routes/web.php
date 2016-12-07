<?php


use App\Mail\WelcomeMail;

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

Route::get('/sup', function(){
    // Enviar email de bienvenida.
    Mail::to('sistemas@alivetech.mx')->send(new WelcomeMail);

    return Redirect::to('/login');

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

    //      VISTAS PARA EL ADMINISTRADOR
		Route::resource('asesor','AsesorController');
		Route::resource('asesorprograma','ProgramaController');
		Route::resource('asesorinstitucion','InstitucionController');
		Route::resource('asesorconvocatoria','ConvocatoriaController');
    Route::resource('asesordocumentos','DocumentoController');
    Route::resource('asesorclasificacion','AClasificacionController');
    Route::resource('asesormodulo','AModuloController');
    Route::resource('asesorclave','AClaveController');
    Route::resource('asesorparrafo','AParrafoController');
    Route::resource('asesorimagen','AImagenController');
    Route::resource('asesorcategoria','ACategoriaController');
    Route::resource('asesoradd','AddAsesorController');

    Route::resource('aordenagnrl','AOrdenaGnrlController');
    Route::resource('aordenaconv','AOrdenaConvController');

    //      VISTAS DEL ASESOR
    Route::resource('asesorempresa','AEmpresaController');
    Route::get('copyempresa/{id}', 'AEmpresaController@copy' );

    Route::resource('asesorproyecto','AProyectoController');
    Route::resource('aproyectosgnrl','AProyectoGnrlController');

    Route::resource('aproyectoempresa','AProyectoEmpresaController');

	});

    // MIDDLEWARE PARA EMPRESA
	Route::group(['middleware' => 'empresa'], function () {

		Route::resource('empresa','EmpresaController');
    Route::resource('empresadocumentos','EmpresaDocumentoController');
    Route::resource('empresamodulognrl','EModuloGnrlController');
    Route::resource('empresaparrafognrl','EParrafoGnrlController');
    Route::resource('empresaimagengnrl','EImagenGnrlController');

    Route::resource('einfognrl','EInfoGnrlController');
    Route::resource('eproyecto','EProPreController');
    // MODLUOS POR CONVOCATORIA
    Route::resource('empresaproyecto','EProyectoController');
    Route::resource('empresaparrafo','EParrafoController');
    Route::resource('empresaimagen','EImagenController');
	});

	// MIDDLEWARE PARA VINCULADO
	Route::group(['middleware' => 'vinculado'], function () {

		Route::resource('vinculado','VinculadoController');
		Route::resource('datosvinculado','DatoController');
		Route::resource('borrame','DatoController@borrame');

	});

	// RUTA PARA OBTENER LAS CIUDADES
	Route::get('ciudades/{id}','CiudadController@getTowns');

});
