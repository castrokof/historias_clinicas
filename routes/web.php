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

if(version_compare(PHP_VERSION, '7.2.0', '>=')) { error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING); }

/* RUTAS IMAGENES TEXTO */

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
//Route::get('/', 'Admin\InicioController@index')->name('inicio');
Route::get('/', 'Seguridad\LoginController@index')->name('inicio');
Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'superadmin']], function () {


     /* RUTAS DEL MENU */
     Route::get('menu', 'MenuController@index')->name('menu');
     Route::get('menu/crear', 'MenuController@crear')->name('crear_menu');
     Route::get('menu/{id}/editar', 'MenuController@editar')->name('editar_menu');
     Route::put('menu/{id}', 'MenuController@actualizar')->name('actualizar_menu');
     Route::post('menu', 'MenuController@guardar')->name('guardar_menu');
     Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar_orden');
     Route::get('rol/{id}/elimniar', 'MenuController@eliminar')->name('eliminar_menu');

     /* RUTAS DEL ROL */
     Route::get('rol', 'RolController@index')->name('rol');
     Route::get('rol/crear', 'RolController@crear')->name('crear_rol');
     Route::post('rol', 'RolController@guardar')->name('guardar_rol');
     Route::get('rol/{id}/editar', 'RolController@editar')->name('editar_rol');
     Route::put('rol/{id}', 'RolController@actualizar')->name('actualizar_rol');
     Route::delete('rol/{id}', 'RolController@eliminar')->name('eliminar_rol');

     /* RUTAS DEL MENUROL */
     Route::get('menu-rol', 'MenuRolController@index')->name('menu_rol');
     Route::post('menu-rol', 'MenuRolController@guardar')->name('guardar_menu_rol');

     /* RUTAS DE LA EMPRESA */
     Route::get('empresa', 'EmpresaController@index')->name('empresa');
     Route::get('empresa/crear', 'EmpresaController@crear')->name('crear_empresa');
     Route::post('empresa', 'EmpresaController@guardar')->name('guardar_empresa');
     Route::get('empresa/{id}/editar', 'EmpresaController@editar')->name('editar_empresa');
     Route::put('empresa/{id}', 'EmpresaController@actualizar')->name('actualizar_empresa');

     /* RUTAS DEL PERMISO */
     Route::get('permiso', 'PermisoController@index')->name('permiso');
     Route::get('permiso/crear', 'PermisoController@crear')->name('crear_permiso');
     Route::post('permiso', 'PermisoController@guardar')->name('guardar_permiso');
     Route::get('permiso/{id}/editar', 'PermisoController@editar')->name('editar_permiso');
     Route::put('permiso/{id}', 'PermisoController@actualizar')->name('actualizar_permiso');
     Route::delete('permiso/{id}', 'PermisoController@eliminar')->name('eliminar_permiso');

     /* RUTAS DEL PERMISOROL */
     Route::get('permiso-rol', 'PermisoRolController@index')->name('permiso_rol');
     Route::post('permiso-rol', 'PermisoRolController@guardar')->name('guardar_permiso_rol');

     Route::resource('post', 'PostsController');


});


Route::group(['middleware' => ['auth']], function () {

Route::get('/tablero', 'AdminController@index')->name('tablero');

Route::get('informes', 'AdminController@informes')->name('informes')->middleware('superConsultor');


 //RUTA PARA LISTAS GENERALES

 Route::get('/listas-index', 'Listas\ListasController@index')->name('listasIndex')->middleware('superEditor');
 Route::post('/crear-listas', 'Listas\ListasController@store')->name('crearlistas')->middleware('superEditor');
 Route::get('/editar-listas/{id}', 'Listas\ListasController@show')->name('editar-listas')->middleware('superEditor');
 Route::put('/actualizar-listas/{id}', 'Listas\ListasController@update')->name('actualizar-listas')->middleware('superEditor');
 Route::delete('/borrar-listas/{id}', 'Listas\ListasController@destroy')->name('borrar-listas')->middleware('superEditor');

 Route::post('/listas-estado', 'Listas\ListasController@updateestado')->name('lisestado')->middleware('superEditor');

 //RUTA PARA LISTAS DETALLE GENERALES
 Route::get('/detallelistas', 'Listas\ListasDetalleController@indexDetalle')->name('listasdetalledetalle')->middleware('superEditor');
 Route::post('/detallecrear-listas', 'Listas\ListasDetalleController@store')->name('crearlistasdetalle')->middleware('superEditor');
 Route::get('/detalleeditar-listas/{id}', 'Listas\ListasDetalleController@show')->name('editar-listasdetalle')->middleware('superEditor');
 Route::put('/detalleactualizar-listas/{id}', 'Listas\ListasDetalleController@update')->name('actualizar-listasdetalle')->middleware('superEditor');
 Route::delete('/detalleborrar-listas/{id}', 'Listas\ListasDetalleController@destroy')->name('borrar-listasdetalle')->middleware('superEditor');

 Route::post('/detalle-estado', 'Listas\ListasDetalleController@updateestado')->name('detestado')->middleware('superEditor');

 //SELECT DE LISTAS
 route::get('selectlist', 'Listas\ListasDetalleController@select')->name('selectlist')->middleware('superEditor');

//RUTA PARA CREAR PROCEDIMIENTOS
Route::get('procedimientos', 'DefProcedimientosController@index')->name('procedimientosIndex')->middleware('superEditor');
Route::get('procedimientos/crear', 'DefProcedimientosController@crear')->name('crear_procedimientos')->middleware('superEditor');
Route::post('procedimientos', 'DefProcedimientosController@guardar')->name('guardar_procedimientos')->middleware('superEditor');
Route::get('editar_procedimientos/{id}', 'DefProcedimientosController@editar')->name('editar_procedimientos')->middleware('superEditor');
Route::put('procedimientos/{id}', 'DefProcedimientosController@actualizar')->name('actualizar_procedimientos')->middleware('superEditor');
Route::post('procedimiento-estado', 'DefProcedimientosController@updateestado')->name('procestado')->middleware('superEditor');
Route::get('agrupaciones_proce', 'DefProcedimientosController@selectgrup')->name('agrupaciones_proce')->middleware('superEditor');
Route::get('finalidad_proce', 'DefProcedimientosController@selectfin')->name('finalidad_proce')->middleware('superEditor');

//Ruta para consultar las relaciones de Procedimientos vs Servicio
Route::get('relserviciovsprocedimiento', 'RelServiciovsprocedimientosController@index')->name('relserviciovsprocedimiento')->middleware('superEditor');
Route::delete('serviciovsprocedimiento/{id}', 'RelServiciovsprocedimientosController@eliminar')->name('eliminar_servicio')->middleware('superEditor');
Route::get('proce_servicio', 'ServiciosController@rel_proce_index')->name('proce_servicio')->middleware('superEditor');
Route::post('add_servicio_proce', 'RelServiciovsprocedimientosController@create')->name('add_servicio_proce')->middleware('superEditor');

//Ruta para consultar las relaciones de Procedimientos vs Profesional
Route::get('profesionalvsprocedimiento', 'RelProfesionalvsprocedimientosController@index')->name('profesionalvsprocedimiento')->middleware('superEditor');
Route::get('relprofeIndex', 'DefProfesionalesController@rel_index')->name('relprofeIndex')->middleware('superEditor');
Route::delete('profesionalvsprocedimiento/{id}', 'RelProfesionalvsprocedimientosController@eliminar')->name('eliminar_profesional')->middleware('superEditor');
Route::post('add_profesional', 'RelProfesionalvsprocedimientosController@crear')->name('add_profesional')->middleware('superEditor');

//Ruta para consultar las relaciones de Procedimientos vs Contrato
Route::get('contratovsprocedimiento', 'RelContratovsprocedimientosController@index')->name('contratovsprocedimiento')->middleware('superEditor');
Route::delete('contratovsprocedimiento/{id}', 'RelContratovsprocedimientosController@eliminar')->name('eliminar_contrato')->middleware('superEditor');
Route::get('relcontratoIndex', 'DefContratosController@rel_index')->name('relcontratoIndex')->middleware('superEditor');
Route::post('add_contrato', 'RelContratovsprocedimientosController@crear')->name('add_contrato')->middleware('superEditor');

//RUTA PARA CREAR MEDICAMENTOS
Route::get('medicamentos', 'DefMedicamentosSuministrosController@index')->name('medicamentosIndex')->middleware('superEditor');
Route::get('medicamentos/crear', 'DefMedicamentosSuministrosController@crear')->name('crear_medicamentos')->middleware('superEditor');
Route::post('medicamentos', 'DefMedicamentosSuministrosController@guardar')->name('guardar_medicamentos')->middleware('superEditor');
Route::get('editar_medicamentos/{id}', 'DefMedicamentosSuministrosController@editar')->name('editar_medicamentos')->middleware('superEditor');
Route::put('medicamentos/{id}', 'DefMedicamentosSuministrosController@actualizar')->name('actualizar_medicamentos')->middleware('superEditor');
Route::post('medicamento-estado', 'DefMedicamentosSuministrosController@updateestado')->name('med_estado')->middleware('superEditor');
Route::get('atc_medicamento', 'DefMedicamentosSuministrosController@selectatc')->name('atc_medicamento')->middleware('superEditor');
Route::get('marca_medicamento', 'DefMedicamentosSuministrosController@selectmarc')->name('marca_medicamento')->middleware('superEditor');
// Route::get('grupo_medicamento', 'DefMedicamentosSuministrosController@selectgrupo')->name('grupo_medicamento')->middleware('superEditor');
Route::get('grupo_subgrupo_med', 'DefMedicamentosSuministrosController@selectsubgrupo')->name('grupo_subgrupo_med')->middleware('superEditor');

//Ruta para consultar las relaciones de Medicamento vs Servicios
Route::get('servicio_medicamento', 'RelServiciovsmedicamentosController@index')->name('servicio_medicamento')->middleware('superEditor');
Route::delete('serviciovsmedicamento/{id}', 'RelServiciovsmedicamentosController@eliminar')->name('serviciovsmedicamento')->middleware('superEditor');
Route::get('rel_serv_med', 'ServiciosController@rel_med_index')->name('rel_serv_med')->middleware('superEditor');
Route::post('add_med_servicio', 'RelServiciovsmedicamentosController@create')->name('add_med_servicio')->middleware('superEditor');

//Ruta para consultar y relacionar los Medicamentos vs Profesionales
Route::post('add_med_profesional', 'RelProfesionalvsmedicamentosController@crear')->name('add_med_profesional')->middleware('superEditor');

//Ruta para consultar y relacionar los Medicamentos vs Contratos
Route::post('add_med_contrato', 'RelContratovsmedicamentosController@crear')->name('add_med_contrato')->middleware('superEditor');


//RUTA PARA CREAR PROFESIONALES
Route::get('profesionales', 'DefProfesionalesController@index')->name('profesionalesIndex')->middleware('superEditor');
Route::get('profesionales/crear', 'DefProfesionalesController@crear')->name('crear_profesionales')->middleware('superEditor');
Route::post('profesionales', 'DefProfesionalesController@guardar')->name('guardar_profesionales')->middleware('superEditor');
Route::get('editar_profesionales/{id}', 'DefProfesionalesController@editar')->name('editar_profesionales')->middleware('superEditor');
Route::put('profesionales/{id}', 'DefProfesionalesController@actualizar')->name('actualizar_profesionales')->middleware('superEditor');
Route::post('profesional-estado', 'DefProfesionalesController@updateestado')->name('profe_estado')->middleware('superEditor');
Route::get('especialidad', 'DefProfesionalesController@selectespe')->name('especialidad')->middleware('superEditor');
Route::get('users', 'DefProfesionalesController@selectuser')->name('users')->middleware('superEditor');

//Ruta para consultar las relaciones de Profesional vs Servicio
Route::get('relserviciovsprofesional', 'RelProfesionalvsservicioController@index')->name('relserviciovsprofesional')->middleware('superEditor');
Route::delete('serviciovsprofesional/{id}', 'RelProfesionalvsservicioController@eliminar')->name('eliminar_servicios')->middleware('superEditor');
Route::post('add_servicio', 'RelProfesionalvsservicioController@create')->name('add_servicio')->middleware('superEditor');
Route::get('relservicio_profesionalIndex', 'ServiciosController@rel_index1')->name('relservicio_profesionalIndex')->middleware('superEditor');
//Ruta para consultar las relaciones de Profesional vs Procedimientos
Route::get('procedimientovsprofesional', 'RelProfesionalvsprocedimientosController@indexProfe')->name('procedimientovsprofesional')->middleware('superEditor');
Route::get('relproceIndex', 'DefProcedimientosController@rel_index')->name('relproceIndex')->middleware('superEditor');
Route::post('add_procedimiento', 'RelProfesionalvsprocedimientosController@create')->name('add_procedimiento')->middleware('superEditor');

//Ruta para consultar las relaciones de Profesional vs Medicamento
Route::get('profesionalvsmedicamento', 'RelProfesionalvsmedicamentosController@index')->name('profesionalvsmedicamento')->middleware('superEditor');
Route::delete('medicamentovsprofesional/{id}', 'RelProfesionalvsmedicamentosController@eliminar')->name('eliminar_medicamentos')->middleware('superEditor');
Route::get('relmedicamentoIndex', 'DefMedicamentosSuministrosController@rel_index')->name('relmedicamentoIndex')->middleware('superEditor');
Route::get('profesional_medicamento', 'RelProfesionalvsmedicamentosController@indexProfe')->name('profesional_medicamento')->middleware('superEditor');
Route::get('rel_med_profe', 'DefProfesionalesController@rel_med_index')->name('rel_med_profe')->middleware('superEditor');
Route::post('add_medicamento', 'RelProfesionalvsmedicamentosController@create')->name('add_medicamento')->middleware('superEditor');

//RUTA PARA CREAR CONTRATOS
Route::get('contratos', 'DefContratosController@index')->name('contratosIndex')->middleware('superEditor');
Route::get('contratos/crear', 'DefContratosController@crear')->name('crear_contratos')->middleware('superEditor');
Route::post('contratos', 'DefContratosController@guardar')->name('guardar_contratos')->middleware('superEditor');
Route::get('editar_contratos/{id}', 'DefContratosController@editar')->name('editar_contratos')->middleware('superEditor');
Route::put('contratos/{id}', 'DefContratosController@actualizar')->name('actualizar_contratos')->middleware('superEditor');
Route::post('contrato-estado', 'DefContratosController@updateestado')->name('contrato-estado')->middleware('superEditor');

//Ruta para consultar las relaciones de Contrato vs EPS
Route::get('contratovsEPS', 'RelContratovsepsController@index')->name('contratovsEPS')->middleware('superEditor');
Route::get('RelEpsIndex', 'EpsController@rel_index')->name('RelEpsIndex')->middleware('superEditor');
Route::delete('contratovsEPS/{id}', 'RelContratovsepsController@eliminar')->name('eliminar_conteps')->middleware('superEditor');
Route::post('add_eps', 'RelContratovsepsController@create')->name('add_eps')->middleware('superEditor');

//Ruta para consultar las relaciones de Contrato vs Servicio
Route::get('relserviciovsContrato', 'RelContratovsservicioController@index')->name('relserviciovsContrato')->middleware('superEditor');
Route::delete('serviciovscontrato/{id}', 'RelContratovsservicioController@eliminar')->name('eliminar_relservicio')->middleware('superEditor');
Route::get('relservicioIndex', 'ServiciosController@rel_index')->name('relservicioIndex')->middleware('superEditor');
Route::post('add_servicio_2', 'RelContratovsservicioController@create')->name('add_servicio_2')->middleware('superEditor');

//Ruta para consultar las relaciones de Contrato vs Medicamento
Route::get('contrato-medicamento', 'RelContratovsmedicamentosController@index')->name('contrato-medicamento')->middleware('superEditor');
Route::delete('contratovsmedicamento/{id}', 'RelContratovsmedicamentosController@eliminar')->name('eliminar_relmedicamento')->middleware('superEditor');
Route::get('contrato_medicamento', 'RelContratovsmedicamentosController@indexContr')->name('contrato_medicamento')->middleware('superEditor');
Route::get('rel_med_contrato', 'DefMedicamentosSuministrosController@relacion_med_index')->name('rel_med_contrato')->middleware('superEditor');
Route::post('add_medicamento_2', 'RelContratovsmedicamentosController@create')->name('add_medicamento_2')->middleware('superEditor');
Route::get('cont_medicamento/{id}/editar', 'RelContratovsmedicamentosController@editar')->name('editar_rel_cont_med')->middleware('superEditor');
Route::put('cont_medicamento/{id}', 'RelContratovsmedicamentosController@actualizar')->name('actualizar_cont_med')->middleware('superEditor');

//Ruta para consultar las relaciones de Contrato vs Procedimientos
Route::get('contrato-procedimiento', 'RelContratovsprocedimientosController@indexProce')->name('contrato-procedimiento')->middleware('superEditor');
Route::get('rel_med_cont', 'DefContratosController@rel_med_index')->name('rel_med_cont')->middleware('superEditor');
Route::post('add_procedimiento_2', 'RelContratovsprocedimientosController@create')->name('add_procedimiento_2')->middleware('superEditor');
Route::get('rel_cont_procedimiento', 'DefProcedimientosController@rel_cont_index')->name('rel_cont_procedimiento')->middleware('superEditor');
Route::get('cont_proce/{id}/editar', 'RelContratovsprocedimientosController@editar')->name('editar_rel_contrato')->middleware('superEditor');
Route::put('cont_proce/{id}', 'RelContratovsprocedimientosController@actualizar')->name('actualizar_cont_proce')->middleware('superEditor');


/* RUTAS DEL USUARIO */
Route::get('usuario', 'UsuarioController@index')->name('usuario')->middleware('superEditor');
Route::get('usuario/crear', 'UsuarioController@crear')->name('crear_usuario')->middleware('superEditor');
Route::post('usuario', 'UsuarioController@guardar')->name('guardar_usuario')->middleware('superEditor');
Route::get('usuario/{id}/editar', 'UsuarioController@editar')->name('editar_usuario')->middleware('superEditor');
Route::get('usuario/{id}/password', 'UsuarioController@editarpassword')->name('editar_password')->middleware('superEditor');
Route::put('usuario/{id}', 'UsuarioController@actualizar')->name('actualizar_usuario')->middleware('superEditor');
Route::put('password/{id}', 'UsuarioController@actualizarpassword')->name('actualizar_password')->middleware('superEditor');

/* RUTAS DEL paciente */
Route::get('paciente', 'PacienteController@index')->name('paciente')->middleware('superEditor');
Route::get('paciente/crear', 'PacienteController@crear')->name('crear_paciente')->middleware('superEditor');
Route::post('paciente', 'PacienteController@guardar')->name('guardar_paciente')->middleware('superEditor');
Route::get('paciente/{id}/editar', 'PacienteController@editar')->name('editar_paciente')->middleware('superEditor');
Route::put('paciente/{id}', 'PacienteController@actualizar')->name('actualizar_paciente')->middleware('superEditor');
Route::get('pais', 'PacienteController@selectpa')->name('pais')->middleware('superEditor');
Route::get('eps', 'PacienteController@selecteps')->name('eps')->middleware('superEditor');
Route::get('get_nivel_eps', 'PacienteController@getNivelEps')->name('get_nivel_eps')->middleware('superEditor');
Route::get('get_copago_eps', 'PacienteController@getCopagoEps')->name('get_copago_eps')->middleware('superEditor');
Route::get('ciudad', 'PacienteController@selectci')->name('ciudad')->middleware('superEditor');
Route::get('departamento', 'PacienteController@selectde')->name('departamento')->middleware('superEditor');
Route::get('ocupacion', 'PacienteController@selectocu')->name('ocupacion')->middleware('superEditor');
Route::get('barrio', 'PacienteController@selectbar')->name('barrio')->middleware('superEditor');

/* RUTAS DE PAISES */
Route::get('paises', 'PaisController@index')->name('paises')->middleware('superEditor');
Route::get('paises/crear', 'PaisController@crear')->name('crear_pais')->middleware('superEditor');
Route::post('paises', 'PaisController@guardar')->name('guardar_pais')->middleware('superEditor');
Route::get('paises/{id}/editar', 'PaisController@editar')->name('editar_pais')->middleware('superEditor');
Route::put('paises/{id}', 'PaisController@actualizar')->name('actualizar_pais')->middleware('superEditor');

/* RUTAS DE DEPARTAMENTOS */
Route::get('departamentos', 'DepartamentosController@index')->name('departamentos')->middleware('superEditor');
Route::get('departamentos/crear', 'DepartamentosController@crear')->name('crear_departamentos')->middleware('superEditor');
Route::post('departamentos', 'DepartamentosController@guardar')->name('guardar_departamentos')->middleware('superEditor');
Route::get('departamentos/{id}/editar', 'DepartamentosController@editar')->name('editar_departamentos')->middleware('superEditor');
Route::put('departamentos/{id}', 'DepartamentosController@actualizar')->name('actualizar_departamentos')->middleware('superEditor');

/* RUTAS DE CIUDADES */
Route::get('ciudades', 'CiudadesController@index')->name('ciudades')->middleware('superEditor');
Route::get('ciudades/crear', 'CiudadesController@crear')->name('crear_ciudades')->middleware('superEditor');
Route::post('ciudades', 'CiudadesController@guardar')->name('guardar_ciudades')->middleware('superEditor');
Route::get('ciudades/{id}/editar', 'CiudadesController@editar')->name('editar_ciudades')->middleware('superEditor');
Route::put('ciudades/{id}', 'CiudadesController@actualizar')->name('actualizar_ciudades')->middleware('superEditor');

/* RUTAS DE BARRIOS */
Route::get('barrios', 'BarriosController@index')->name('barrios')->middleware('superEditor');
Route::get('barrios/crear', 'BarriosController@crear')->name('crear_barrios')->middleware('superEditor');
Route::post('barrios', 'BarriosController@guardar')->name('guardar_barrios')->middleware('superEditor');
Route::get('barrios/{id}/editar', 'BarriosController@editar')->name('editar_barrios')->middleware('superEditor');
Route::put('barrios/{id}', 'BarriosController@actualizar')->name('actualizar_barrios')->middleware('superEditor');

/* RUTAS DE SEDES */
Route::get('sedes', 'DefSedesController@index')->name('sedes')->middleware('superEditor');
Route::get('sedes/crear', 'DefSedesController@crear')->name('crear_sedes')->middleware('superEditor');
Route::post('sedes', 'DefSedesController@guardar')->name('guardar_sedes')->middleware('superEditor');
Route::get('sedes/{id}/editar', 'DefSedesController@editar')->name('editar_sedes')->middleware('superEditor');
Route::put('sedes/{id}', 'DefSedesController@actualizar')->name('actualizar_sedes')->middleware('superEditor');
Route::get('sede_ciudad', 'DefSedesController@selectci')->name('sede_ciudad')->middleware('superEditor');

/* RUTAS DE OCUPACIONES */
Route::get('ocupaciones', 'OcupacionesController@index')->name('ocupaciones')->middleware('superEditor');
Route::get('ocupaciones/crear', 'OcupacionesController@crear')->name('crear_ocupaciones')->middleware('superEditor');
Route::post('ocupaciones', 'OcupacionesController@guardar')->name('guardar_ocupaciones')->middleware('superEditor');
Route::get('ocupaciones/{id}/editar', 'OcupacionesController@editar')->name('editar_ocupaciones')->middleware('superEditor');
Route::put('ocupaciones/{id}', 'OcupacionesController@actualizar')->name('actualizar_ocupaciones')->middleware('superEditor');

/* RUTAS DE CODIGOS ATC Y FORMAS */
Route::get('codigos_atc', 'DefATCMedicamentosController@index')->name('codigos_atc')->middleware('superEditor');
Route::get('codigos_atc/crear', 'DefATCMedicamentosController@crear')->name('crear_codigos_atc')->middleware('superEditor');
Route::post('codigos_atc', 'DefATCMedicamentosController@guardar')->name('guardar_codigos_atc')->middleware('superEditor');
Route::get('codigos_atc/{id}/editar', 'DefATCMedicamentosController@editar')->name('editar_codigos_atc')->middleware('superEditor');
Route::put('codigos_atc/{id}', 'DefATCMedicamentosController@actualizar')->name('actualizar_codigos_atc')->middleware('superEditor');

/* RUTAS DE ESPECIALIDADES */
Route::get('especialidades', 'DefEspecialidadesController@index')->name('especialidades')->middleware('superEditor');
Route::get('especialidades/crear', 'DefEspecialidadesController@crear')->name('crear_especialidades')->middleware('superEditor');
Route::post('especialidades', 'DefEspecialidadesController@guardar')->name('guardar_especialidades')->middleware('superEditor');
Route::get('especialidades/{id}/editar', 'DefEspecialidadesController@editar')->name('editar_especialidades')->middleware('superEditor');
Route::put('especialidades/{id}', 'DefEspecialidadesController@actualizar')->name('actualizar_especialidades')->middleware('superEditor');

/* RUTAS DE MARCAS */
Route::get('marcas', 'DefMarcasController@index')->name('marcas')->middleware('superEditor');
Route::get('marcas/crear', 'DefMarcasController@crear')->name('crear_marcas')->middleware('superEditor');
Route::post('marcas', 'DefMarcasController@guardar')->name('guardar_marcas')->middleware('superEditor');
Route::get('marcas/{id}/editar', 'DefMarcasController@editar')->name('editar_marcas')->middleware('superEditor');
Route::put('marcas/{id}', 'DefMarcasController@actualizar')->name('actualizar_marcas')->middleware('superEditor');

/* RUTAS DE FINALIDADES */
Route::get('finalidades', 'DefFinalidadesController@index')->name('finalidades')->middleware('superEditor');
Route::get('finalidades/crear', 'DefFinalidadesController@crear')->name('crear_finalidades')->middleware('superEditor');
Route::post('finalidades', 'DefFinalidadesController@guardar')->name('guardar_finalidades')->middleware('superEditor');
Route::get('finalidades/{id}/editar', 'DefFinalidadesController@editar')->name('editar_finalidades')->middleware('superEditor');
Route::put('finalidades/{id}', 'DefFinalidadesController@actualizar')->name('actualizar_finalidades')->middleware('superEditor');
Route::get('serv_fin', 'DefFinalidadesController@selectfi')->name('serv_fin')->middleware('superEditor');
Route::get('eps_finalidad', 'DefFinalidadesController@selecteps')->name('eps_finalidad')->middleware('superEditor');


/* RUTAS DE AGRUPACIONES DE PROCEDIMIENTOS */
Route::get('agrupaciones', 'DefGrupoProcedimientosController@index')->name('agrupaciones')->middleware('superEditor');
Route::get('agrupaciones/crear', 'DefGrupoProcedimientosController@crear')->name('crear_agrupaciones')->middleware('superEditor');
Route::post('agrupaciones', 'DefGrupoProcedimientosController@guardar')->name('guardar_agrupaciones')->middleware('superEditor');
Route::get('agrupaciones/{id}/editar', 'DefGrupoProcedimientosController@editar')->name('editar_agrupaciones')->middleware('superEditor');
Route::put('agrupaciones/{id}', 'DefGrupoProcedimientosController@actualizar')->name('actualizar_agrupaciones')->middleware('superEditor');

/* RUTAS DE SERVICIOS */
Route::get('servicios', 'ServiciosController@index')->name('servicios')->middleware('superEditor');
Route::get('servicios/crear', 'ServiciosController@crear')->name('crear_servicio')->middleware('superEditor');
Route::post('servicios', 'ServiciosController@guardar')->name('guardar_servicio')->middleware('superEditor');
Route::get('servicios/{id}/editar', 'ServiciosController@editar')->name('editar_servicio')->middleware('superEditor');
Route::put('servicios/{id}', 'ServiciosController@actualizar')->name('actualizar_servicio')->middleware('superEditor');

/* RUTAS DE DOCUMENTOS FINANCIEROS */
Route::get('documento_financiero', 'DefDocumentosController@index')->name('documento_financiero')->middleware('superEditor');
Route::get('documento_financiero/crear', 'DefDocumentosController@crear')->name('crear_doc_fin')->middleware('superEditor');
Route::post('documento_financiero', 'DefDocumentosController@guardar')->name('guardar_doc_fin')->middleware('superEditor');
Route::get('documento_financiero/{id}/editar', 'DefDocumentosController@editar')->name('editar_doc_fin')->middleware('superEditor');
Route::put('documento_financiero/{id}', 'DefDocumentosController@actualizar')->name('actualizar_doc_fin')->middleware('superEditor');
Route::post('documento_fin_estado', 'DefDocumentosController@updateestado')->name('documento_fin_estado')->middleware('superEditor');
Route::get('tipo_documento', 'DefDocumentosController@selectdo')->name('tipo_documento')->middleware('superEditor');

/* RUTAS DE DOCUMENTOS CONSECUTIVOS */
Route::get('documentos_consecutivo', 'DefDocumentosConsecutivoController@index')->name('documentos_consecutivo')->middleware('superEditor');
Route::get('documentos_consecutivo/crear', 'DefDocumentosConsecutivoController@crear')->name('crear_doc_conse')->middleware('superEditor');
Route::post('documentos_consecutivo', 'DefDocumentosConsecutivoController@guardar')->name('guardar_doc_conse')->middleware('superEditor');
Route::get('documentos_consecutivo/{id}/editar', 'DefDocumentosConsecutivoController@editar')->name('editar_doc_conse')->middleware('superEditor');
Route::put('documentos_consecutivo/{id}', 'DefDocumentosConsecutivoController@actualizar')->name('actualizar_doc_conse')->middleware('superEditor');
Route::post('documento_conse_estado', 'DefDocumentosConsecutivoController@updateestado')->name('documento_conse_estado')->middleware('superEditor');
Route::get('documento', 'DefDocumentosConsecutivoController@selectdoc')->name('documento')->middleware('superEditor');
Route::get('sede_documento', 'DefDocumentosConsecutivoController@selectsede')->name('sede_documento')->middleware('superEditor');

/* RUTAS DEL CITA */
Route::get('cita', 'CitaController@index')->name('cita')->middleware('superEditor');
Route::get('cita/crear', 'CitaController@crear')->name('crear_cita')->middleware('superEditor');
Route::post('cita', 'CitaController@guardar')->name('guardar_cita')->middleware('superEditor');
Route::get('cita/{id}/editar', 'CitaController@editar')->name('editar_cita')->middleware('superEditor');
Route::get('cita/{id}/consultar', 'CitaController@consultar')->name('consultar_cita')->middleware('superEditor');
Route::put('cita/{id}', 'CitaController@actualizar')->name('actualizar_cita')->middleware('superEditor');
Route::get('pacienteselect', 'CitaController@selectp')->name('selectp')->middleware('superEditor');

Route::get('observaciones', 'CitaController@getObservaciones')->name('observaciones')->middleware('superEditor');
Route::get('cita_observaciones', 'CitaController@showObservaciones')->name('cita_observaciones')->middleware('superEditor');

/* RUTAS DE LA FACTURA */
Route::get('facturacion', 'FacturaController@index')->name('facturacion')->middleware('superEditor');
Route::get('facturacion/crear', 'FacturaController@crear')->name('crear_factura')->middleware('superEditor');
Route::post('facturacion', 'FacturaController@guardar')->name('guardar_factura')->middleware('superEditor');
Route::get('facturacion/{id}/editar', 'FacturaController@editar')->name('editar_factura')->middleware('superEditor');
Route::put('facturacion/{id}', 'FacturaController@actualizar')->name('actualizar_factura')->middleware('superEditor');
Route::get('pacientefact', 'FacturaController@selectpa')->name('pacientefact')->middleware('superEditor');
Route::get('pacientefill', 'FacturaController@buscarp')->name('pacientefill')->middleware('superEditor');

/* RUTAS DE LA FACTURA DEMO*/
Route::get('factura-demo', 'FacturaController@index_demo')->name('factura-demo')->middleware('superEditor');

//Rutas para seleccionar los items que se iran cargando a la Factura (Servicio, Profesional, Procedimiento, Medicamento, Contrato)
Route::get('servicios_factura', 'FcFacturaProcedimientosController@selectservicio')->name('servicios_factura')->middleware('superEditor');
Route::get('profesionales_factura', 'FcFacturaProcedimientosController@selectprof')->name('profesionales_factura')->middleware('superEditor');
Route::get('procedimientos_factura', 'FcFacturaProcedimientosController@selectcups')->name('procedimientos_factura')->middleware('superEditor');
Route::get('get_valor_cups', 'FcFacturaProcedimientosController@getValorParticularCups')->name('get_valor_cups')->middleware('superEditor');
Route::get('get_valor_med', 'FcFacturaProcedimientosController@getValorParticularMed')->name('get_valor_med')->middleware('superEditor');
Route::get('contratos_factura', 'FcFacturaProcedimientosController@selectcont')->name('contratos_factura')->middleware('superEditor');
Route::get('medicamento_factura', 'FcFacturaProcedimientosController@selectmed')->name('medicamento_factura')->middleware('superEditor');


/* RUTAS DE LA HISTORIA */
Route::get('paciente-pro', 'HistoriaController@indexpaciente')->name('cita-paciente')->middleware('superEditor');
Route::get('historia', 'HistoriaController@index')->name('historia')->middleware('superEditor');
Route::get('historiaana', 'HistoriaController@indexana')->name('historiaana')->middleware('superEditor');
Route::get('historia/crear', 'HistoriaController@crear')->name('crear_historia')->middleware('superEditor');
Route::post('historia', 'HistoriaController@guardar')->name('guardar_historia')->middleware('superEditor');
Route::get('historia/{id}/editar', 'HistoriaController@editar')->name('editar_historia')->middleware('superEditor');
Route::put('historiaanalisis/{id}', 'HistoriaController@insertaranalisis')->name('insertaranalisis_historia')->middleware('superEditor');
Route::put('historia/{id}', 'HistoriaController@actualizar')->name('actualizar_historia')->middleware('superEditor');
Route::get('pacienteselect', 'HistoriaController@selectp')->name('selectp')->middleware('superEditor');
Route::get('pacienteprogramado/{id}/editar', 'HistoriaController@editarp')->name('pacienteh')->middleware('superEditor');
Route::get('cie10d', 'HistoriaController@selectc')->name('cie10d')->middleware('superEditor');
Route::get('cups', 'HistoriaController@selectcups')->name('cups')->middleware('superEditor');
Route::get('cums', 'HistoriaController@selectcumsindexpdf')->name('cums')->middleware('superEditor');
Route::get('via', 'HistoriaController@selectvia')->name('via')->middleware('superEditor');

//Ruta para imprimir historias
Route::get('historiapdf', 'HistoriaController@indexpdf')->name('historiapdf')->middleware('superEditor');
Route::get('exportarhpdf', 'HistoriaController@exportarhpdf')->name('exportarpdfh')->middleware('superEditor');
Route::get('exportaropdf', 'HistoriaController@exportaropdf')->name('exportarpdfo')->middleware('superEditor');
Route::get('exportarfpdf', 'HistoriaController@exportarfpdf')->name('exportarpdff')->middleware('superEditor');

/* RUTAS PARA CREAR LAS EPS, NIVELES Y COPAGOS */
Route::get('eps_empresas', 'EpsController@index')->name('eps_empresas')->middleware('superEditor');
Route::get('eps_empresas/crear', 'EpsController@crear')->name('crear_eps_empresas')->middleware('superEditor');
Route::post('eps_empresas', 'EpsController@guardar')->name('guardar_eps_empresas')->middleware('superEditor');
Route::get('eps_empresas/{id}/editar', 'EpsController@editar')->name('editar_eps_empresas')->middleware('superEditor');
Route::put('eps_empresas/{id}', 'EpsController@actualizar')->name('actualizar_eps_empresas')->middleware('superEditor');

Route::get('eps-nivel', 'EpsController@indexProce')->name('eps-nivel')->middleware('superEditor');
Route::get('eps_niveles/{id}/editarn', 'EpsController@editarn')->name('niveles_eps_empresas')->middleware('superEditor');
Route::post('eps_niveles', 'EpsController@guardarnivel')->name('agregarnivel_eps_empresas')->middleware('superEditor');
Route::put('eps_niveles/{id}', 'EpsController@actualizar')->name('actualizarnivel_eps_empresas')->middleware('superEditor');
Route::delete('rel_epsnivel/{id}', 'EpsController@eliminar')->name('eliminar_nivel')->middleware('superEditor');
Route::get('select_servicios', 'EpsController@selectser')->name('select_servicios')->middleware('superEditor');

/* RUTAS DEL DIAGNOSTICO */
Route::get('diagnostico', 'DiagnosticoController@index')->name('diagnostico')->middleware('superEditor');
Route::post('diagnostico', 'DiagnosticoController@guardar')->name('guardar_diagnostico')->middleware('superEditor');
Route::get('diagnostico/{id}/editar', 'DiagnosticoController@editar')->name('editar_diagnostico')->middleware('superEditor');
Route::put('diagnostico/{id}', 'DiagnosticoController@eliminar')->name('eliminar_diagnostico')->middleware('superEditor');

/* RUTAS DEL PLAN TERAPEUTICO */
Route::get('terapeutico', 'PlanterapeuticoController@index')->name('terapeutico')->middleware('superEditor');
Route::post('terapeutico', 'PlanterapeuticoController@guardar')->name('guardar_terapeutico')->middleware('superEditor');
Route::get('terapeutico/{id}/editar', 'PlanterapeuticoController@editar')->name('editar_terapeutico')->middleware('superEditor');
Route::put('terapeutico/{id}', 'PlanterapeuticoController@eliminar')->name('eliminar_terapeutico')->middleware('superEditor');

/* RUTAS DEL PLAN FARMACOLOGICO */
Route::get('farmacologico', 'PlanfarmacologicoController@index')->name('farmacologico')->middleware('superEditor');
Route::post('farmacologico', 'PlanfarmacologicoController@guardar')->name('guardar_farmacologico')->middleware('superEditor');
Route::get('farmacologico/{id}/editar', 'PlanfarmacologicoController@editar')->name('editar_farmacologico')->middleware('superEditor');
Route::put('farmacologico/{id}', 'PlanfarmacologicoController@eliminar')->name('eliminar_farmacologico')->middleware('superEditor');


/* RUTAS DEL EMPLEADO */
Route::get('empleado', 'empleadoController@index')->name('empleado')->middleware('superEditor');
Route::get('empleado/crear', 'empleadoController@crear')->name('crear_empleado')->middleware('superEditor');
Route::post('empleado', 'empleadoController@guardar')->name('guardar_empleado')->middleware('superEditor');
Route::get('empleado/{id}/editar', 'empleadoController@editar')->name('editar_empleado')->middleware('superEditor');
Route::put('empleado/{id}', 'empleadoController@actualizar')->name('actualizar_empleado')->middleware('superEditor');

/* RUTAS DEL CLIENTE */
Route::get('clientes', 'clienteController@index')->name('cliente')->middleware('superConsultor');
Route::get('cliente', 'clienteController@indexcli')->name('clientecli')->middleware('superConsultor');
Route::get('clientes/{id}', 'clienteController@indexCliente')->name('cliente_usuario')->middleware('superConsultor');

Route::get('cliente/crear', 'clienteController@crear')->name('crear_cliente')->middleware('superConsultor');
Route::post('cliente', 'clienteController@guardar')->name('guardar_cliente')->middleware('superConsultor');
Route::get('cliente/{id}/editar', 'clienteController@editar')->name('editar_cliente')->middleware('superConsultor');
Route::put('cliente/{id}', 'clienteController@actualizar')->name('actualizar_cliente')->middleware('superConsultor');

/* RUTAS DEL ORDEN CLIENTE */
Route::get('cliente/ruta', 'clienteController@ruta')->name('cliente-ruta')->middleware('superConsultor');
Route::post('cliente/ruta', 'clienteController@rutaGuardar')->name('guardar-ruta')->middleware('superConsultor');

/* RUTAS DEL PRESTAMO */
Route::get('prestamo', 'prestamoController@index')->name('prestamo')->middleware('superConsultor');
Route::get('prestamo/crear', 'prestamoController@crear')->name('crear_prestamo')->middleware('superConsultor');
Route::post('prestamo', 'prestamoController@guardar')->name('guardar_prestamo')->middleware('superConsultor');
Route::get('prestamo/{id}/editar', 'prestamoController@editar')->name('editar_prestamo')->middleware('superConsultor');
Route::get('prestamo/{id}', 'prestamoController@detalle')->name('detalle_prestamo')->middleware('superConsultor');
Route::put('prestamo/{id}', 'prestamoController@actualizar')->name('actualizar_prestamo')->middleware('superConsultor');

Route::post('detalle_prestamo', 'DetallePrestamoController@update')->name('actualizar_cuota_fecha')->middleware('superConsultor');

/* RUTAS DEL PAGO */

//Route::get('pagos', 'pagoController@index1')->name('pago1')->middleware('superConsultor');
Route::get('pago/{id}', 'pagoController@detalle')->name('detalle_pago')->middleware('superConsultor');
Route::get('pago-info', 'pagoController@detallepagos')->name('detalle_pagos')->middleware('superConsultor');
Route::get('pagos', 'pagoController@index')->name('pago')->middleware('superConsultor');
Route::get('idcuotas', 'pagoController@index')->name('idcuotas')->middleware('superConsultor');
Route::get('pago/crear', 'pagoController@crear')->name('crear_pago')->middleware('superConsultor');
Route::post('pago', 'pagoController@guardar')->name('guardar_pago')->middleware('superConsultor');
Route::get('pago/{id}/editar', 'pagoController@editar')->name('editar_pago')->middleware('superConsultor');
Route::get('pago/{id}/editpay', 'pagoController@editpay')->name('editpay_pago')->middleware('superConsultor');
Route::put('pago/{id}', 'pagoController@actualizar')->name('actualizar_pago')->middleware('superConsultor');


/* RUTAS DEL GASTO */
Route::get('gasto', 'gastoController@index')->name('gasto')->middleware('superEditor');
Route::get('gasto/crear', 'gastoController@crear')->name('crear_gasto')->middleware('superEditor');
Route::post('gasto', 'gastoController@guardar')->name('guardar_gasto')->middleware('superEditor');
Route::get('gasto/{id}/editar', 'gastoController@editar')->name('editar_gasto')->middleware('superEditor');
Route::put('gasto/{id}', 'gastoController@actualizar')->name('actualizar_gasto')->middleware('superEditor');


/* RUTAS DEL USUARIO NO ADMIN PARA CONTRASEÑA */
Route::put('password1/{id}', 'UsuarioController@actualizarpassword1')->name('actualizar_password1');

/* RUTAS DEL ARCHIVO y ENTRADA */
Route::get('archivo', 'ArchivoController@index')->name('archivo')->middleware('superConsultor');
Route::post('guardar', 'EntradaController@guardar')->name('subir_archivo')->middleware('superEditor');

/* RUTAS DE ASIGNACION */
Route::get('asignacion', 'OrdenesmtlasignarController@index')->name('asignacion')->middleware('superEditor');
Route::post('asignacion_orden', 'OrdenesmtlasignarController@actualizar')->name('actualizar_asignacion')->middleware('superEditor');
Route::post('desasignacion_orden', 'OrdenesmtlasignarController@desasignar')->name('desasignar_asignacion')->middleware('superEditor');
Route::get('idDivision', 'OrdenesmtlasignarController@idDivisionss')->name('idDivisionsss')->middleware('superEditor');
/* DETALLE DE ORDENES */
Route::get('seguimiento', 'OrdenesmtlasignarController@seguimiento')->name('seguimiento')->middleware('superConsultor');
Route::get('seguimiento/{id}', 'OrdenesmtlasignarController@fotos')->name('fotos')->middleware('superConsultor');
Route::get('seguimientodetalle/{id}', 'OrdenesmtlasignarController@detalle')->name('detalle_de_orden')->middleware('superConsultor');
Route::get('posicionamiento', 'OrdenesmtlasignarController@posicionamiento')->name('posicionamiento')->middleware('superConsultor');
//Route::get('seguimientoExportar', 'OrdenesmtlasignarController@exportarExcel')->name('exportarxlsx');


/* RUTAS DE MARCA */
Route::get('marca', 'MarcasController@index')->name('marca')->middleware('superConsultor');
Route::get('marca/crear', 'MarcasController@crear')->name('crear_marca')->middleware('superEditor');
Route::post('marca', 'MarcasController@guardar')->name('guardar_marca')->middleware('superEditor');
Route::get('marca/{id}/editar', 'MarcasController@editar')->name('editar_marca')->middleware('superEditor');
Route::put('marca/{id}', 'MarcasController@actualizar')->name('actualizar_marca')->middleware('superEditor');



/* RUTAS DE LA AGENDA */
Route::get('abrir_agenda', 'DefAgendasController@index')->name('agenda')->middleware('superEditor');
Route::post('agenda', 'DefAgendasController@guardar')->name('programar_agenda')->middleware('superEditor');
Route::get('agenda/{id}/editar', 'DefAgendasController@editar')->name('editar_agenda')->middleware('superEditor');
Route::put('agenda/{id}', 'DefAgendasController@actualizar')->name('actualizar_agenda')->middleware('superEditor');


Route::get('profesionalselect', 'DefAgendasController@selectprofesional')->name('selectprofesional')->middleware('superEditor');




});

Route::group(['middleware' => ['auth','superEditor']], function () {

/* ORDENES CRITICA */
Route::get('critica', 'OrdenesmtlasignarController@critica')->name('critica');
Route::get('criticaadd', 'OrdenesmtlasignarController@criticaadd')->name('criticaadd');
Route::get('generar_critica', 'OrdenesmtlasignarController@generarcritica')->name('generar_critica');
Route::post('adicionar_critica', 'OrdenesmtlasignarController@adicionarcritica')->name('adicionar_critica');
Route::post('eliminar_critica', 'OrdenesmtlasignarController@eliminarcritica')->name('eliminar_critica');


});





