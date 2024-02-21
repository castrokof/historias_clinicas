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
            'area'=>strtoupper('sistemas'),
            'observacion'=>strtoupper('Prueba'),
            // 'ips'=>strtoupper('atencion fidem s.a.s'),
            'activo'=>'1'
            ]);

            DB::table('usuario')->insert([
                'papellido'=>strtoupper('Bejarano'),
                'sapellido'=>strtoupper('Barbosa'),
                'pnombre'=>strtoupper('Carlos'),
                'snombre'=>null,
                'tipo_documento'=>strtoupper('CC'),
                'documento'=>'1130639211',
                'usuario'=>'cbejarano',
                'password'=>bcrypt('123456'),
                'remenber_token'=>bcrypt('123456'),
                'email'=>'pruebas@gmail.com',
                'cod_retus'=>'0123',
                'celular'=>'12352623528',
                'telefono'=>'30253689',
                'profesion'=>strtoupper('Full Stack Developer'),
                'area'=>strtoupper('Full Stack Developer'),
                'observacion'=>strtoupper('Prueba'),
                // 'ips'=>strtoupper('salud vitalia s.a.s'),
                'activo'=>'1'
                ]);

                DB::table('usuario')->insert([
                    'papellido'=>strtoupper('Pinillos'),
                    'sapellido'=>strtoupper('Pedroza'),
                    'pnombre'=>strtoupper('Nathalia'),
                    'snombre'=>null,
                    'tipo_documento'=>strtoupper('CC'),
                    'documento'=>'1143857667',
                    'usuario'=>'npinillos',
                    'password'=>bcrypt('123456'),
                    'remenber_token'=>bcrypt('123456'),
                    'email'=>'pinillos_dra@gmail.com',
                    'cod_retus'=>'0123',
                    'celular'=>'12352623528',
                    'telefono'=>'30253689',
                    'profesion'=>strtoupper('medico'),
                    'area'=>strtoupper('dolor y cuidados paliativos'),
                    'observacion'=>strtoupper('Prueba'),
                    // 'ips'=>strtoupper('salud vitalia s.a.s'),
                    'activo'=>'1'
                    ]);



        DB::table('usuario_rol')->insert([

            'rol_id'=>1,
            'usuario_id'=>1,

        ]);

        DB::table('usuario_rol')->insert([

            'rol_id'=>1,
            'usuario_id'=>2,

        ]);

        DB::table('usuario_rol')->insert([

            'rol_id'=>7,
            'usuario_id'=>3,

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

            'menu_id'=> 48,
            'nombre'=>'Paciente',
            'url'=>'paciente',
            'orden'=>5,
            'icono'=>'fas fa-angle-right'
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

            'menu_id'=> 59,
            'nombre'=>'Eps empresas',
            'url'=>'eps_empresas',
            'orden'=>0,
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

            'menu_id'=> 61,
            'nombre'=>'Sedes',
            'url'=>'sedes',
            'orden'=>0,
            'icono'=>'fas fa-angle-right'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 61,
            'nombre'=>'Servicios',
            'url'=>'servicios',
            'orden'=>1,
            'icono'=>'fas fa-angle-right'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 48,
            'nombre'=>'Países',
            'url'=>'paises',
            'orden'=>1,
            'icono'=>'fas fa-angle-right'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 48,
            'nombre'=>'Departamentos',
            'url'=>'departamentos',
            'orden'=>2,
            'icono'=>'fas fa-angle-right'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 48,
            'nombre'=>'Ciudades',
            'url'=>'ciudades',
            'orden'=>3,
            'icono'=>'fas fa-angle-right'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 48,
            'nombre'=>'Barrios',
            'url'=>'barrios',
            'orden'=>4,
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

            'menu_id'=> 60,
            'nombre'=>'Documentos',
            'url'=>'documento_financiero',
            'orden'=>0,
            'icono'=>'fas fa-angle-right'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 60,
            'nombre'=>'Consecutivos',
            'url'=>'documentos_consecutivo',
            'orden'=>1,
            'icono'=>'fas fa-angle-right'
        ]);
        
        DB::table('menu')->insert([

            'menu_id'=> 50,
            'nombre'=>'Medicamentos',
            'url'=>'medicamentos',
            'orden'=>3,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 54,
            'nombre'=>'Procedimientos',
            'url'=>'procedimientos',
            'orden'=>2,
            'icono'=>'fas fa-angle-right'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 59,
            'nombre'=>'Contratos',
            'url'=>'contratos',
            'orden'=>1,
            'icono'=>'fas fa-angle-right'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 57,
            'nombre'=>'Profesionales',
            'url'=>'profesionales',
            'orden'=>1,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 33,
            'nombre'=>'Pacientes',
            'url'=>'#',
            'orden'=>3,
            'icono'=>''
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 48,
            'nombre'=>'Ocupaciones',
            'url'=>'ocupaciones',
            'orden'=>0,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 34,
            'nombre'=>'Medicamentos',
            'url'=>'#',
            'orden'=>2,
            'icono'=>''
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 50,
            'nombre'=>'Codigos ATC',
            'url'=>'codigos_atc',
            'orden'=>0,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 50,
            'nombre'=>'Grupos y Subgrupos',
            'url'=>'grupo_subgrupo',
            'orden'=>1,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 50,
            'nombre'=>'Marcas',
            'url'=>'marcas',
            'orden'=>2,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 34,
            'nombre'=>'Procedimientos',
            'url'=>'#',
            'orden'=>3,
            'icono'=>''
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 54,
            'nombre'=>'Finalidades',
            'url'=>'finalidades',
            'orden'=>0,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 54,
            'nombre'=>'Agrupaciones',
            'url'=>'agrupaciones',
            'orden'=>1,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 34,
            'nombre'=>'Profesionales',
            'url'=>'#',
            'orden'=>6,
            'icono'=>''
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 57,
            'nombre'=>'Especialidades',
            'url'=>'especialidades',
            'orden'=>0,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 34,
            'nombre'=>'Administradoras',
            'url'=>'#',
            'orden'=>5,
            'icono'=>''
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 34,
            'nombre'=>'Documentos Financieros',
            'url'=>'#',
            'orden'=>0,
            'icono'=>''
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 33,
            'nombre'=>'Empresa',
            'url'=>'#',
            'orden'=>1,
            'icono'=>''
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 36,
            'nombre'=>'Documentos Inventario',
            'url'=>'#',
            'orden'=>0,
            'icono'=>''
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 36,
            'nombre'=>'Proveedores',
            'url'=>'#',
            'orden'=>1,
            'icono'=>''
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 36,
            'nombre'=>'Almacenes',
            'url'=>'#',
            'orden'=>2,
            'icono'=>''
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 36,
            'nombre'=>'Artículos',
            'url'=>'#',
            'orden'=>3,
            'icono'=>''
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 62,
            'nombre'=>'Documentos',
            'url'=>'documentos',
            'orden'=>0,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 62,
            'nombre'=>'Consecutivos',
            'url'=>'consecutivos',
            'orden'=>1,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 63,
            'nombre'=>'Proveedor',
            'url'=>'proveedores',
            'orden'=>0,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 64,
            'nombre'=>'Bodega',
            'url'=>'bodegas',
            'orden'=>0,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 65,
            'nombre'=>'Unidad de medida',
            'url'=>'unidades',
            'orden'=>0,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 65,
            'nombre'=>'Categoria',
            'url'=>'categorias',
            'orden'=>1,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 65,
            'nombre'=>'Marca',
            'url'=>'marcas',
            'orden'=>2,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 65,
            'nombre'=>'Artículos',
            'url'=>'articulos',
            'orden'=>3,
            'icono'=>'fas fa-angle-right'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 20,
            'nombre'=>'Cotizaciones',
            'url'=>'cotizaciones',
            'orden'=>0,
            'icono'=>'fas fa-receipt'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 20,
            'nombre'=>'Orden de Compra',
            'url'=>'ordenes_compras',
            'orden'=>1,
            'icono'=>'fas fa-file-alt'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 20,
            'nombre'=>'Compras',
            'url'=>'compras',
            'orden'=>2,
            'icono'=>'fas fa-shopping-cart'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 20,
            'nombre'=>'Devoluciones',
            'url'=>'devoluciones',
            'orden'=>3,
            'icono'=>'fas fa-truck'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 20,
            'nombre'=>'Baja de Inventario',
            'url'=>'bajas',
            'orden'=>4,
            'icono'=>'fas fa-trash-alt'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 20,
            'nombre'=>'Ventas',
            'url'=>'ventas',
            'orden'=>5,
            'icono'=>'fas fa-hand-holding-usd'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 20,
            'nombre'=>'Inventario',
            'url'=>'#',
            'orden'=>6,
            'icono'=>''
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 80,
            'nombre'=>'Salidas',
            'url'=>'salidas',
            'orden'=>0,
            'icono'=>'fas fa-door-open'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 80,
            'nombre'=>'Traslados',
            'url'=>'traslados',
            'orden'=>1,
            'icono'=>'fas fa-door-open'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 80,
            'nombre'=>'Iniciar',
            'url'=>'iniciar',
            'orden'=>2,
            'icono'=>'fas fa-archive'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 80,
            'nombre'=>'Cerrar',
            'url'=>'cerrar',
            'orden'=>3,
            'icono'=>'fas fa-briefcase'
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

            'rol_id'=> 1,
            'menu_id'=> 48
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 49
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 50
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 51
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 52
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 53
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 54
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 55
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 56
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 57
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 58
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 59
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 60
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 61
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 62
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 63
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 64
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 65
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 66
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 67
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 68
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 69
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 70
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 71
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 72
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 73
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 74
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 75
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 76
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 77
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 78
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 79
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 80
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 81
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 82
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 83
        ]);

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 84
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
