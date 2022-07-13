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

            'menu_id'=> 1,
            'nombre'=>'Eps empresas',
            'url'=>'eps_empresas',
            'orden'=>5,
            'icono'=>'far fa-building'
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
            'nombre'=>'Servicvios',
            'url'=>'servicvios',
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
            'icono'=>''
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 29,
            'nombre'=>'Facturar',
            'url'=>'facturas',
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
    }
}
