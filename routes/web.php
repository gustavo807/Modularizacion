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
/***********Website Alive Tech**************/
/*******************************************/


Route::get('/', 'PagesController@alivetech');
Route::post('/', 'PagesController@emailContactForm');
Route::get('/Industria', 'PagesController@industria');
Route::get('/Academia', 'PagesController@academia');
Route::get('/Gobierno', 'PagesController@gobierno');
Route::get('/Transferencia', 'PagesController@transferencia');
Route::get('/About', 'PagesController@about');
Route::get('/Privacy', 'PagesController@privacy');


/******************************************************/
/*************Cuestionario de prospección**************/
/******************************************************/

Route::get('prospeccion', 'ProspectController@prospeccion');
Route::post('prospeccion', 'ProspectController@store');


/***********************************************************/
/******************Registro y Login*************************/
/***********************************************************/

Route::get('register', 'RegistroController@register');
Route::post('register', 'RegistroController@postRegister');
Route::get('register/confirm/{token}', 'RegistroController@confirmEmail');
Route::get('login', 'AutenticacionController@login');
Route::get('logout', 'AutenticacionController@logout');
Route::resource('logueo','AutenticacionController@logueo');


/**************************************************/
/*****************MODULARIZACION******************/
/*************************************************/


/*Route::get('/', function () {
    return view('welcome');
});
*/

//Auth::routes();

//Route::get('/home', 'HomeController@index');


// WEB SERVICE
Route::group(['middleware' => 'phone'], function () {
    Route::resource('cors','CorsController');
});

Route::group(['middleware' => 'auth'], function () {

	// MIDDLEWARE PARA ASESOR
    Route::group(['middleware' => 'asesor'], function () {

    //      VISTAS PARA EL ADMINISTRADOR
        Route::resource('asesor','AsesorController');
		    Route::resource('asesorprograma','ProgramaController');
		    Route::resource('asesorinstitucion','InstitucionController');
        Route::resource('asesorfondo', 'FondosController');
		    Route::resource('asesorconvocatoria','ConvocatoriaController');
        Route::resource('asesordocumentos','DocumentoController');
        //Route::resource('asesorclasificacion','AClasificacionController');
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
    Route::get('documentosempresa/{id}', 'AEmpresaController@documentos' );
    Route::resource('amodulognrl','AModuloGnrlController');
    Route::get('amodulognrl/{id}/empresa/{iduser}','AModuloGnrlController@modulognrl');
    Route::get('parrafognl/{id}/empresa/{iduser}','AModuloGnrlController@parrafognl');
    Route::post('storeparrafo','AModuloGnrlController@storeparrafo');
    Route::get('imagengnl/{id}/empresa/{iduser}','AModuloGnrlController@imagengnl');
    Route::post('storeimagen','AModuloGnrlController@storeimagen');

    //  MODIFICAR MODULOS DEL ASESOR
    Route::resource('proyectomodulos','AProyectoEmpresaController');
    Route::get('modulosproyecto/{id}','AProyectoEmpresaController@modulos');
    Route::get('clavesmodulo/{id}/proyecto/{idproyecto}','AProyectoEmpresaController@clavesmodulo');
    Route::get('parrafoproyecto/{id}/proyecto/{idproyecto}','AProyectoEmpresaController@parrafoproyecto');
    Route::post('storeparrafoproyecto','AProyectoEmpresaController@storeparrafoproyecto');
    Route::get('imagenproyecto/{id}/proyecto/{idproyecto}','AProyectoEmpresaController@imagenproyecto');
    Route::post('storeimagenproyecto','AProyectoEmpresaController@storeimagenproyecto');

      //VISTA DE DE CLAVES DE EMPRESA PROYECTO
    Route::get('informaciognrl/{id}/user/{user}', 'AEmpresaController@informaciongnrl' );
    Route::get('gnrlparrafo/{id}/user/{user}', 'AEmpresaController@gnrlparrafo' );
    Route::get('proyectoclaves/{id}/user/{user}', 'AEmpresaController@proyectoclaves' );
    Route::get('proyectoparrafos/{id}/user/{user}', 'AEmpresaController@proyectoparrafos' );

    Route::resource('asesorproyecto','AProyectoController');
    Route::get('cuestionarios', 'ProspectController@listarCuestionarios');
    Route::get('cuestionarios/{type}', 'ExcelController@exportarCuestionarios'); //Aregar campo ID para seleccionar uno solo
    Route::resource('excel','ExcelController');
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

    // RUTA PARA EL PERFIL, ESTE APLICA PARA TODOS LOS ROLES
    Route::resource('perfil','PerfilController');

	// RUTA PARA OBTENER LAS CIUDADES
	Route::get('ciudades/{id}','CiudadController@getTowns');

});
