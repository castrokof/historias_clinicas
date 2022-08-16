<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('usuario')->insert([
            'papellido'=>strtoupper('Castro'),
            'sapellido'=>strtoupper('Galeano'),
            'pnombre'=>strtoupper('Jhonnathan'),
            'snombre'=>null,
            'tipo_documento'=>strtoupper('CC'),
            'documento'=>'1130629762',
            'usuario'=>'jcastro',
            'password'=>bcrypt('123456'),
            'remenber_token'=>bcrypt('123456'),
            'email'=>'castrokof@gmail.com',
            'cod_retus'=>'0123',
            'celular'=>'3175018125',
            'telefono'=>'3062047',
            'profesion'=>strtoupper('ingeniero'),
            'especialidad'=>strtoupper('sistemas'),
            'observacion'=>strtoupper('Prueba'),
            'ips'=>strtoupper('atencion fidem s.a.s'),
            'activo'=>'1'
            ]);



        DB::table('usuario_rol')->insert([

            'rol_id'=>1,
            'usuario_id'=>1,

        ]);


        //Creación de menu

        DB::table('menu')->insert([

            'menu_id'=> 0,
            'nombre'=>'Admin',
            'url'=>'#',
            'orden'=>8,
            'icono'=>'far fa-building'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 1,
            'nombre'=>'Lista de Menus',
            'url'=>'admin/menu',
            'orden'=>1,
            'icono'=>'fa fa-cog fa-spin fa-3x fa-fw'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 1,
            'nombre'=>'Crear_menu',
            'url'=>'admin/menu/crear',
            'orden'=>2,
            'icono'=>'fas fa-clipboard-list'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 1,
            'nombre'=>'Roles',
            'url'=>'admin/rol',
            'orden'=>3,
            'icono'=>'fa fa-list'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 1,
            'nombre'=>'Asignar Menus',
            'url'=>'admin/menu-rol',
            'orden'=>4,
            'icono'=>'fa fa-tasks'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 0,
            'nombre'=>'Usuario',
            'url'=>'#',
            'orden'=>11,
            'icono'=>'fa fa-users'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 6,
            'nombre'=>'Usuarios',
            'url'=>'usuario',
            'orden'=>1,
            'icono'=>'fa fa-user'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 12,
            'nombre'=>'Paciente',
            'url'=>'paciente',
            'orden'=>2,
            'icono'=>'fas fa-handshake'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 12,
            'nombre'=>'Historia',
            'url'=>'#',
            'orden'=>4,
            'icono'=>'fa fa-list'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 0,
            'nombre'=>'Tablero de control',
            'url'=>'tablero',
            'orden'=>9,
            'icono'=>'fas fa-tachometer-alt'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 9,
            'nombre'=>'Historias creadas',
            'url'=>'historia',
            'orden'=>1,
            'icono'=>'fa fa-cog fa-spin fa-3x fa-fw'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 0,
            'nombre'=>'IPS',
            'url'=>'#',
            'orden'=>10,
            'icono'=>'far fa-building'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 38,
            'nombre'=>'Cita',
            'url'=>'cita',
            'orden'=>1,
            'icono'=>'fas fa-calendar-plus'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 12,
            'nombre'=>'Pacientes programados',
            'url'=>'paciente-pro',
            'orden'=>3,
            'icono'=>'fa fa-stethoscope'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 9,
            'nombre'=>'Consulta Historias PDF',
            'url'=>'historiapdf',
            'orden'=>2,
            'icono'=>'fas fa-clipboard-list'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 34,
            'nombre'=>'Eps empresas',
            'url'=>'eps_empresas',
            'orden'=>4,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 0,
            'nombre'=>'Parámetros Generales',
            'url'=>'#',
            'orden'=>1,
            'icono'=>'fa fa-cog fa-spin fa-3x fa-fw'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 0,
            'nombre'=>'Modulo Financiero',
            'url'=>'#',
            'orden'=>3,
            'icono'=>'fas fa-chart-line'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 0,
            'nombre'=>'Modulo Administrativo',
            'url'=>'#',
            'orden'=>4,
            'icono'=>'fas fa-clipboard'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 0,
            'nombre'=>'Modulo Inventario',
            'url'=>'#',
            'orden'=>5,
            'icono'=>'fas fa-book'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 0,
            'nombre'=>'Modulo Clínico',
            'url'=>'#',
            'orden'=>6,
            'icono'=>'fas fa-clinic-medical'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 0,
            'nombre'=>'Informes',
            'url'=>'#',
            'orden'=>7,
            'icono'=>'fas fa-sitemap'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 33,
            'nombre'=>'Sedes',
            'url'=>'sedes',
            'orden'=>1,
            'icono'=>'fas fa-angle-right'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 33,
            'nombre'=>'Servicios',
            'url'=>'servicios',
            'orden'=>2,
            'icono'=>'fas fa-angle-right'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 33,
            'nombre'=>'Países',
            'url'=>'paises',
            'orden'=>3,
            'icono'=>'fas fa-angle-right'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 33,
            'nombre'=>'Departamentos',
            'url'=>'departamentos',
            'orden'=>4,
            'icono'=>'fas fa-angle-right'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 33,
            'nombre'=>'Ciudades',
            'url'=>'ciudades',
            'orden'=>5,
            'icono'=>'fas fa-angle-right'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 33,
            'nombre'=>'Barrios',
            'url'=>'barrios',
            'orden'=>6,
            'icono'=>'fas fa-angle-right'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 18,
            'nombre'=>'Facturación General',
            'url'=>'#',
            'orden'=>0,
            'icono'=>'fas fa-coins'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 29,
            'nombre'=>'Facturar',
            'url'=>'facturacion',
            'orden'=>1,
            'icono'=>'fas fa-coins'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 29,
            'nombre'=>'Consultas',
            'url'=>'consultar_factura',
            'orden'=>2,
            'icono'=>'fas fa-folder-open'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 29,
            'nombre'=>'Informe Facturación',
            'url'=>'informe_facturacion',
            'orden'=>3,
            'icono'=>'fas fa-chart-pie'
        ]);
        DB::table('menu')->insert([

            'menu_id'=>17,
            'nombre'=>'Configuración Inicial',
            'url'=>'#',
            'orden'=>0,
            'icono'=>'fas fa-tasks'
        ]);
        DB::table('menu')->insert([

            'menu_id'=>17,
            'nombre'=>'Configuración Financiera',
            'url'=>'#',
            'orden'=>1,
            'icono'=>'fas fa-tasks'
        ]);
        DB::table('menu')->insert([

            'menu_id'=>17,
            'nombre'=>'Configuración Administrativa',
            'url'=>'#',
            'orden'=>2,
            'icono'=>'fas fa-tasks'
        ]);
        DB::table('menu')->insert([

            'menu_id'=>17,
            'nombre'=>'Configuración Inventarios',
            'url'=>'#',
            'orden'=>3,
            'icono'=>'fas fa-tasks'
        ]);
        DB::table('menu')->insert([

            'menu_id'=>17,
            'nombre'=>'Configuración Clínico',
            'url'=>'#',
            'orden'=>4,
            'icono'=>'fas fa-tasks'
        ]);
        DB::table('menu')->insert([

            'menu_id'=>18,
            'nombre'=>'Agenda Médica',
            'url'=>'#',
            'orden'=>1,
            'icono'=>'fas fa-calendar-alt'
        ]);
        DB::table('menu')->insert([

            'menu_id'=>38,
            'nombre'=>'Abrir Agenda',
            'url'=>'abrir_agenda',
            'orden'=>0,
            'icono'=>'fas fa-calendar-check'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 1,
            'nombre'=>'Listas',
            'url'=>'#',
            'orden'=>5,
            'icono'=>'fa fa-list'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 40,
            'nombre'=>'Crear listas',
            'url'=>'/listas-index',
            'orden'=>1,
            'icono'=>'fa fa-list-alt'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 34,
            'nombre'=>'Documentos',
            'url'=>'documento_financiero',
            'orden'=>0,
            'icono'=>'fas fa-angle-right'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 34,
            'nombre'=>'Documentos Consecutivo',
            'url'=>'documentos_consecutivo',
            'orden'=>1,
            'icono'=>'fas fa-angle-right'
        ]);
        
        DB::table('menu')->insert([

            'menu_id'=> 34,
            'nombre'=>'Medicamentos',
            'url'=>'medicamentos',
            'orden'=>2,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 34,
            'nombre'=>'Procedimientos',
            'url'=>'procedimientos',
            'orden'=>3,
            'icono'=>'fas fa-angle-right'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 34,
            'nombre'=>'Contratos',
            'url'=>'contratos',
            'orden'=>5,
            'icono'=>'fas fa-angle-right'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 34,
            'nombre'=>'Profesionales',
            'url'=>'profesionales',
            'orden'=>6,
            'icono'=>'fas fa-angle-right'
        ]);
        


        //Relación menu-rol

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 1
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 2
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 3
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 4
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 5
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 6
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 7
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 8
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 9
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 10
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 11
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 12
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 13
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 14
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 15
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 16
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 17
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 18
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 19
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 20
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 21
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 22
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 23
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 24
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 25
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 26
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 27
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 28
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 29
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 30
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 31
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 32
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 33
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 34
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 35
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 36
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 37
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 38
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 39
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 40
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 41
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 42
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 43
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 44
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 45
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 46
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 47
        ]);
        


        DB::table('menu_rol')->insert([

            'rol_id'=> 2,
            'menu_id'=> 8
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 2,
            'menu_id'=> 9
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 2,
            'menu_id'=> 11
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 2,
            'menu_id'=> 12
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 2,
            'menu_id'=> 13
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 2,
            'menu_id'=> 14
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 2,
            'menu_id'=> 15
        ]);

        //Insersion de datos en la table listas y listas detalle

        DB::table('listas')->insert([
            'slug'=> 1,
            'nombre'=> 'EMPRESA',
            'descripcion'=> 'LISTA DE EMPRESAS',
            'activo'=> 'SI',
            'user_id'=> 1
        ]);
        DB::table('listas')->insert([
            'slug'=> 2,
            'nombre'=> 'REGIMEN',
            'descripcion'=> 'LISTAS DE TODOS LOS REGIMEN',
            'activo'=> 'SI',
            'user_id'=> 1
        ]);
        DB::table('listas')->insert([
            'slug'=> 'TDOC',
            'nombre'=> 'TIPO DE DOCUMENTOS',
            'descripcion'=> 'TIPOS DE DOCUMENTOS',
            'activo'=> 'SI',
            'user_id'=> 1
        ]);
        DB::table('listas')->insert([
            'slug'=> 'MC',
            'nombre'=> 'MARCAS PRODUCTOS',
            'descripcion'=> 'Aquí se deben parametrizar las marcas de los medicamentos o suministros',
            'activo'=> 'SI',
            'user_id'=> 1
        ]);

        DB::table('listasdetalle')->insert([
            'slug'=> 'PA',
            'nombre'=> 'Particular',
            'descripcion'=> 'Particular',
            'activo'=> 'SI',
            'listas_id'=> 2,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'CO',
            'nombre'=> 'Contributivo',
            'descripcion'=> 'Contributivo',
            'activo'=> 'SI',
            'listas_id'=> 2,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'SU',
            'nombre'=> 'Subsidiado',
            'descripcion'=> 'Subsidiado',
            'activo'=> 'SI',
            'listas_id'=> 2,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'VI',
            'nombre'=> 'Vinculado',
            'descripcion'=> 'Vinculado',
            'activo'=> 'SI',
            'listas_id'=> 2,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'OR',
            'nombre'=> 'Otro régimen',
            'descripcion'=> 'Otro régimen',
            'activo'=> 'SI',
            'listas_id'=> 2,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'AT',
            'nombre'=> 'Accidentes de tránsito',
            'descripcion'=> 'Accidentes de tránsito',
            'activo'=> 'SI',
            'listas_id'=> 2,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'RP',
            'nombre'=> 'Riesgos profesionales',
            'descripcion'=> 'Riesgos profesionales',
            'activo'=> 'SI',
            'listas_id'=> 2,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'DP',
            'nombre'=> 'Desplazado',
            'descripcion'=> 'Desplazado',
            'activo'=> 'SI',
            'listas_id'=> 2,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'VI',
            'nombre'=> 'SALUD VITALIA S.A.S',
            'descripcion'=> 'SALUD VITALIA S.A.S',
            'activo'=> 'SI',
            'listas_id'=> 1,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'CC',
            'nombre'=> 'CC',
            'descripcion'=> 'CEDULA DE CIUDADANIA',
            'activo'=> 'SI',
            'listas_id'=> 3,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'TI',
            'nombre'=> 'TI',
            'descripcion'=> 'TARJETA DE IDENTIDAD',
            'activo'=> 'SI',
            'listas_id'=> 3,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'CE',
            'nombre'=> 'CE',
            'descripcion'=> 'CEDULA DE EXTRANJERIA',
            'activo'=> 'SI',
            'listas_id'=> 3,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'RC',
            'nombre'=> 'RC',
            'descripcion'=> 'REGISTRO CIVIL',
            'activo'=> 'SI',
            'listas_id'=> 3,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'PA',
            'nombre'=> 'PA',
            'descripcion'=> 'PASAPORTE',
            'activo'=> 'SI',
            'listas_id'=> 3,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'AS',
            'nombre'=> 'AS',
            'descripcion'=> 'ADULTO SIN IDENTIFICACIÓN',
            'activo'=> 'SI',
            'listas_id'=> 3,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'MS',
            'nombre'=> 'MS',
            'descripcion'=> 'MENOR SIN IDENTIFICACION',
            'activo'=> 'SI',
            'listas_id'=> 3,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'NI',
            'nombre'=> 'NI',
            'descripcion'=> 'NIT',
            'activo'=> 'SI',
            'listas_id'=> 3,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'NU',
            'nombre'=> 'NU',
            'descripcion'=> 'NU',
            'activo'=> 'SI',
            'listas_id'=> 3,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'PE',
            'nombre'=> 'PE',
            'descripcion'=> 'PERMISO ESPECIAL',
            'activo'=> 'SI',
            'listas_id'=> 3,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'SC',
            'nombre'=> 'SC',
            'descripcion'=> 'SALVO CONDUCTO',
            'activo'=> 'SI',
            'listas_id'=> 3,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'CD',
            'nombre'=> 'CD',
            'descripcion'=> 'CARNET DIPLOMATICO',
            'activo'=> 'SI',
            'listas_id'=> 3,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'RE',
            'nombre'=> 'RE',
            'descripcion'=> 'RESIDENTE ESPECIAL',
            'activo'=> 'SI',
            'listas_id'=> 3,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'PT',
            'nombre'=> 'PT',
            'descripcion'=> 'PROTECCIÓN TEMPORAL',
            'activo'=> 'SI',
            'listas_id'=> 3,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'FI',
            'nombre'=> 'ATENCIÓN FIDEM S.A.S',
            'descripcion'=> 'ATENCIÓN FIDEM S.A.S',
            'activo'=> 'SI',
            'listas_id'=> 1,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> 'MC',
            'nombre'=> 'SALUD MEDCOL S.A.S',
            'descripcion'=> 'SALUD MEDCOL S.A.S',
            'activo'=> 'SI',
            'listas_id'=> 1,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> '01',
            'nombre'=> '3M COLOMBIA S.A.',
            'descripcion'=> '3M COLOMBIA S.A.',
            'activo'=> 'SI',
            'listas_id'=> 4,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> '02',
            'nombre'=> 'A.H. ROBINS S.A.S.',
            'descripcion'=> 'A.H. ROBINS S.A.S.',
            'activo'=> 'SI',
            'listas_id'=> 4,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> '03',
            'nombre'=> 'GRUPO SINERGIA S.A.S.',
            'descripcion'=> 'GRUPO SINERGIA S.A.S.',
            'activo'=> 'SI',
            'listas_id'=> 4,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> '04',
            'nombre'=> 'ASOFARMA S.A.',
            'descripcion'=> 'ASOFARMA S.A.',
            'activo'=> 'SI',
            'listas_id'=> 4,
            'user_id'=> 1
        ]);
        DB::table('listasdetalle')->insert([
            'slug'=> '05',
            'nombre'=> 'GRUPO AFIN',
            'descripcion'=> 'GRUPO AFIN',
            'activo'=> 'SI',
            'listas_id'=> 4,
            'user_id'=> 1
        ]);

        //Creación de Grupos y Subgrupos

        DB::table('def__grupoysubgrupomeds')->insert([

            'cod_grupo'=> 1,
            'nombre_grupo'=>'MEDICAMENTO CONTROLADO',
            'estado'=>1
        ]);
        DB::table('def__grupoysubgrupomeds')->insert([

            'cod_grupo'=> 2,
            'nombre_grupo'=>'MEDICAMENTO NO CONTROLADO',
            'estado'=>1
        ]);

        DB::table('def__subgrupomeds')->insert([

            'cod_subgrupo'=> 01,            
            'descripcion_subgrupo'=>'MEDICAMENTO REGULADO',
            'grupo_id'=>1
        ]);
        DB::table('def__subgrupomeds')->insert([

            'cod_subgrupo'=> 02,
            'descripcion_subgrupo'=>'MEDICAMENTO NO REGULADO',
            'grupo_id'=>1
        ]);
        DB::table('def__subgrupomeds')->insert([

            'cod_subgrupo'=> 03,
            'descripcion_subgrupo'=>'MEDICAMENTO REGULADO',
            'grupo_id'=>2
        ]);
        DB::table('def__subgrupomeds')->insert([

            'cod_subgrupo'=> 04,
            'descripcion_subgrupo'=>'MEDICAMENTO NO REGULADO',
            'grupo_id'=>2
        ]);
        
        //Volcado de datos a la tabla def__tipos_documentos
        DB::table('def__tipos_documentos')->insert([

            'cod_tipos_documento'=> 'FV',
            'nombre'=>'Factura de venta',
            'estado'=>1
        ]);
        DB::table('def__tipos_documentos')->insert([

            'cod_tipos_documento'=> 'NC',
            'nombre'=>'Nota crédito',
            'estado'=>1
        ]);
        DB::table('def__tipos_documentos')->insert([

            'cod_tipos_documento'=> 'ND',
            'nombre'=>'Nota débito',
            'estado'=>1
        ]);
        DB::table('def__tipos_documentos')->insert([

            'cod_tipos_documento'=> 'OI',
            'nombre'=>'Orden de internación',
            'estado'=>1
        ]);
        
    }
}
