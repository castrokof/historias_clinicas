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



});


Route::group(['middleware' => ['auth']], function () {

Route::get('/tablero', 'AdminController@index')->name('tablero');

Route::get('informes', 'AdminController@informes')->name('informes')->middleware('superConsultor');

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

/* RUTAS DE PAISES */
Route::get('paises', 'PaisController@index')->name('paises')->middleware('superEditor');
Route::get('paises/crear', 'PaisController@crear')->name('crear_pais')->middleware('superEditor');
Route::post('paises', 'PaisController@guardar')->name('guardar_pais')->middleware('superEditor');
Route::get('paises/{id}/editar', 'PaisController@editar')->name('editar_pais')->middleware('superEditor');
Route::put('paises/{id}', 'PaisController@actualizar')->name('actualizar_pais')->middleware('superEditor');

/* RUTAS DEL CITA */
Route::get('cita', 'CitaController@index')->name('cita')->middleware('superEditor');
Route::get('cita/crear', 'CitaController@crear')->name('crear_cita')->middleware('superEditor');
Route::post('cita', 'CitaController@guardar')->name('guardar_cita')->middleware('superEditor');
Route::get('cita/{id}/editar', 'CitaController@editar')->name('editar_cita')->middleware('superEditor');
Route::put('cita/{id}', 'CitaController@actualizar')->name('actualizar_cita')->middleware('superEditor');
Route::get('pacienteselect', 'CitaController@selectp')->name('selectp')->middleware('superEditor');

/* RUTAS DE LA FACTURA */
Route::get('factura', 'FacturaController@index')->name('factura')->middleware('superEditor');
Route::get('factura/crear', 'FacturaController@crear')->name('crear_factura')->middleware('superEditor');
Route::post('factura', 'FacturaController@guardar')->name('guardar_factura')->middleware('superEditor');
Route::get('factura/{id}/editar', 'FacturaController@editar')->name('editar_factura')->middleware('superEditor');
Route::put('factura/{id}', 'FacturaController@actualizar')->name('actualizar_factura')->middleware('superEditor');
Route::get('pacientefact', 'FacturaController@selectpa')->name('pacientefact')->middleware('superEditor');


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
//Route::get('eps_empresas/{id}/agregar_nivel', 'EpsController@agregar_nivel')->name('agregarnivel_eps_empresas')->middleware('superEditor');
Route::get('eps_niveles', 'EpsController@indexnivel')->name('eps_niveles')->middleware('superEditor');
Route::get('eps_niveles/{id}/editarn', 'EpsController@editarn')->name('niveles_eps_empresas')->middleware('superEditor');
Route::post('eps_niveles', 'EpsController@guardarnivel')->name('agregarnivel_eps_empresas')->middleware('superEditor');
Route::put('eps_niveles/{id}', 'EpsController@actualizar')->name('actualizarnivel_eps_empresas')->middleware('superEditor');

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

});

Route::group(['middleware' => ['auth','superEditor']], function () {

/* ORDENES CRITICA */
Route::get('critica', 'OrdenesmtlasignarController@critica')->name('critica');
Route::get('criticaadd', 'OrdenesmtlasignarController@criticaadd')->name('criticaadd');
Route::get('generar_critica', 'OrdenesmtlasignarController@generarcritica')->name('generar_critica');
Route::post('adicionar_critica', 'OrdenesmtlasignarController@adicionarcritica')->name('adicionar_critica');
Route::post('eliminar_critica', 'OrdenesmtlasignarController@eliminarcritica')->name('eliminar_critica');
});





