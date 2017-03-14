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
        Route::resource('asesorinstitucionfondo', 'InstitucionFondoController');
		Route::resource('asesorconvocatoria','ConvocatoriaController');
        Route::resource('asesordocumentos','DocumentoController');
        Route::get('api/asesordocumentos', function () { return App\Documento::apidocumentos(); } );
        //Route::resource('asesorclasificacion','AClasificacionController');
        Route::resource('asesormodulo','AModuloController');
        Route::get('api/asesormodulo', function () { return App\Modulo::apimodulos(); });
        Route::resource('asesorclave','AClaveController');
        Route::get('api/asesorclave', function () { return App\Clave::apiclaves(); } );
        Route::resource('asesorparrafo','AParrafoController');
        Route::get('api/asesorparrafo', function () { return App\Parrafo::apiparrafos(); } );
        Route::resource('asesorimagen','AImagenController');
        Route::get('api/asesorimagen', function () { return App\Imagen::apiimagenes(); } );
        Route::resource('asesorcategoria','ACategoriaController');
        Route::get('api/asesorcategoria', function () { return App\Categoria::apicategorias(); } );
        Route::resource('asesoradd','AddAsesorController');

    Route::resource('aordenagnrl','AOrdenaGnrlController');
    Route::resource('aordenaconv','AOrdenaConvController');

    //      VISTAS DEL ASESOR
    Route::resource('asesorempresa','AEmpresaController');
    // DataTable for company
    Route::get('api/empresas', function () {
        return Datatables::queryBuilder(
            DB::table('users')
                      ->select('users.id','users.estado','users.ciudad','users.nombre','users.email','users.activo',
                        DB::raw('(SELECT COUNT(user_modulo.modulo_id)
                                    FROM user_modulo
                                    WHERE users.id = user_modulo.user_id
                                    AND user_modulo.propietario="empresa") as modulo'),
                        DB::raw('(select registros.nombre 
                                 from registros 
                                 where registros.registroable_id=users.id 
                                 AND registros.registroable_type = "App\\\User") as editado')
                                )
                      ->where('users.rol_id', '1')
            )->make(true);
    });

    Route::get('asesorempresa/perfil/{id}','AEmpresaController@perfil');
    Route::get('asesorempresa/perfil/{tipo}/{id}','AEmpresaController@editperfil');
    Route::put('asesorempresa/updateperfil/{id}', 'AEmpresaController@updateperfil');

    Route::get('copyempresa/{id}', 'AEmpresaController@copy' );
    Route::get('documentosempresa/{id}', 'AEmpresaController@documentos' );
    Route::resource('amodulognrl','AModuloGnrlController');

    Route::post('amodulognrl/{empresa_id}/revisado/{modulo_id}', 'AEmpresaController@revisado');
    // Evaluacion de competitividad
    Route::get('amodulognrl/empresa/{id}','AModuloGnrlController@empresa');
    Route::get('amodulognrl/empresa/{id}/pregunta/{idpregunta}','AModuloGnrlController@pregunta');
    Route::put('amodulognrl/empresa/{id}/editpregunta/{idpregunta}','AModuloGnrlController@putpregunta');
    Route::get('amodulognrl/resultados/{id}','AModuloGnrlController@resultados');

    Route::get('amodulognrl/{id}/empresa/{iduser}','AModuloGnrlController@modulognrl');
    Route::get('parrafognl/{id}/empresa/{iduser}','AModuloGnrlController@parrafognl');
    Route::post('storeparrafo','AModuloGnrlController@storeparrafo');
    Route::get('imagengnl/{id}/empresa/{iduser}','AModuloGnrlController@imagengnl');
    Route::post('storeimagen','AModuloGnrlController@storeimagen');

    //  MODIFICAR MODULOS DEL ASESOR
    Route::resource('proyectomodulos','AProyectoEmpresaController');
    Route::get('modulosproyecto/{id}','AProyectoEmpresaController@modulos');
    Route::post('modulosproyecto/{proyecto_id}/revisado/{modulo_id}','AProyectoEmpresaController@revisado');
    Route::get('modulosproyecto/proyecto/{idproyecto}','AProyectoEmpresaController@empresa');
    Route::get('modulosproyecto/proyecto/{idproyecto}/pregunta/{idpregunta}','AProyectoEmpresaController@pregunta');
    Route::get('modulosproyecto/resultados/{id}','AProyectoEmpresaController@resultados');

    Route::get('clavesmodulo/{id}/proyecto/{idproyecto}','AProyectoEmpresaController@clavesmodulo');
    Route::get('parrafoproyecto/{id}/proyecto/{idproyecto}','AProyectoEmpresaController@parrafoproyecto');
    Route::post('storeparrafoproyecto','AProyectoEmpresaController@storeparrafoproyecto');
    Route::get('imagenproyecto/{id}/proyecto/{idproyecto}','AProyectoEmpresaController@imagenproyecto');
    Route::post('storeimagenproyecto','AProyectoEmpresaController@storeimagenproyecto');

      //VISTA DE DE CLAVES DE EMPRESA PROYECTO
    //Route::get('informaciognrl/{id}/user/{user}', 'AEmpresaController@informaciongnrl' );
    Route::get('asesorempresa/claves/{id}/user/{user}', 'AEmpresaController@informaciongnrl' );
    // Api para el data table
    Route::get('api/asesorempresa/claves/{id}/user/{user}/tipo/{tipo}', function ($id,$user,$tipo) {
        return App\User_Clave::apiclaves($id,$user,$tipo);
    } );
    
    Route::get('gnrlparrafo/{id}/user/{user}', 'AEmpresaController@gnrlparrafo' );
    //Route::get('proyectoclaves/{id}/user/{user}', 'AEmpresaController@proyectoclaves' );
    Route::get('asesorempresa/proyecto/claves/{id}/user/{user}', 'AEmpresaController@proyectoclaves' );
    
    Route::get('proyectoparrafos/{id}/user/{user}', 'AEmpresaController@proyectoparrafos' );

    Route::resource('asesorproyecto','AProyectoController');
    Route::get('cuestionarios', 'ProspectController@listarCuestionarios');
    Route::get('cuestionarios/{type}', 'ExcelController@exportarCuestionarios'); //Aregar campo ID para seleccionar uno solo
    Route::resource('excel','ExcelController');
    Route::resource('aproyectosgnrl','AProyectoGnrlController');
    Route::get('copyproyecto/{id}','AProyectoGnrlController@copyproyecto');
    Route::get('aproyectosgnrl/sedes/{id}','AProyectoGnrlController@sedes');
    Route::get('aproyectosgnrl/sedes/{id}/create','AProyectoGnrlController@createsede');
    Route::post('aproyectosgnrl/sedes/{id}/store','AProyectoGnrlController@storesede');
    Route::get('api/aproyectosgnrl', function () { return App\Proyecto::apiproyectos(); } );

    Route::get('aproyectosgnrl/investigadores/{id}','AProyectoGnrlController@investigadores');
    Route::get('aproyectosgnrl/partidas/{proyecto_id}','AProyectoGnrlController@partidas');

    Route::resource('aproyectoempresa','AProyectoEmpresaController');

    Route::resource('dirigidoa','DirigidoController');
    Route::resource('asesorconvocatoria/a/dirigido','CDirigidoController');
    Route::get('asesorconvocatoria/a/dirigido/crear/{id}','CDirigidoController@crear');
    Route::get('asesorconvocatoria/a/dirigido/editar/{idc}/{idr}','CDirigidoController@editar');

    // Vinculados
    Route::resource('instituciones','InstitutionController');
    Route::get('api/instituciones', function () { return App\Institution::api(); } );
    Route::resource('sedes','SedeController');
    Route::get('api/sedes', function () { return App\Sede::api(); } );
    Route::resource('investigadores','ResearcherController');
    Route::get('api/investigadores', function () { return App\Researcher::api(); } );
    Route::resource('partidas','PartidaController');
    Route::get('api/partidas', function () { return App\Partida::api(); } );

	});

    // MIDDLEWARE PARA EMPRESA
	Route::group(['middleware' => 'empresa'], function () {

		Route::resource('empresa','EmpresaController');
        Route::resource('empresadocumentos','EmpresaDocumentoController');
        Route::resource('empresamodulognrl','EModuloGnrlController');
        Route::get('empresamodulognrl/evaluacion/', 'EModuloGnrlController@ecompetitividad');
        Route::post('empresamodulognrl/storeevaluacion/','EModuloGnrlController@storeecompetitividad');

        Route::get('empresaresultados', 'EModuloGnrlController@resultados');

        Route::resource('empresaparrafognrl','EParrafoGnrlController');
        Route::resource('empresaimagengnrl','EImagenGnrlController');

        Route::resource('einfognrl','EInfoGnrlController');
        Route::resource('eproyecto','EProPreController');
        // MODLUOS POR CONVOCATORIA
        Route::resource('empresaproyecto','EProyectoController');
        Route::get('empresaproyecto/preguntas/{id}','EProyectoController@preguntas');
        Route::get('empresaproyecto/{idproyecto}/evaluacion/{id}','EProyectoController@evaluacion');
        Route::get('empresaproyecto/resultados/{id}','EProyectoController@resultados');
        //Route::put('empresaproyecto/storeevaluacion/{id}','EProyectoController@storeevaluacion');

        Route::resource('empresaparrafo','EParrafoController');
        Route::resource('empresaimagen','EImagenController');

        // Vinculaciones
        Route::resource('vinculaciones','VinculacionesController');
        Route::get('vinculaciones/{proyecto_id}/sede/{sede_id}','VinculacionesController@sede');
        Route::post('vinculaciones/{proyecto_id}/partida/{partida_id}','VinculacionesController@partida');


	});

	// MIDDLEWARE PARA VINCULADO
	Route::group(['middleware' => 'vinculado'], function () {
		Route::resource('proyectos','VinculadoController');
		Route::resource('personal','PersonalController');
        Route::resource('cotizaciones','CotizacionController');
        Route::get('proyectos/{id}/clavesg/{proyecto_id}','VinculadoController@clavesg');
        Route::get('proyectos/{id}/clavesc','VinculadoController@clavesc');
        Route::get('proyectos/{id}/parrafos','VinculadoController@parrafos');
	});

    // RUTA PARA EL PERFIL, ESTE APLICA PARA TODOS LOS ROLES
    Route::resource('perfil','PerfilController');

	// RUTA PARA OBTENER LAS CIUDADES
	Route::get('ciudades/{id}','CiudadController@getTowns');

});
