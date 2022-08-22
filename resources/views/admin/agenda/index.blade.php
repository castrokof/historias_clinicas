@extends("theme.$theme.layout")

@section('titulo')
    Informes
@endsection

@section('styles')
    <link href="{{ asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css") }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('scripts')
    <script src="{{ asset("assets/$theme/plugins/datatables/jquery.dataTables.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.js") }}" type="text/javascript">
    </script>

    <script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
@endsection

@section('contenido')
    <div class="content-wrapper" style="min-height: 543px;">
        <!-- Content Header (Page header) -->
        <div class="row">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-12">
                            <h1 class="m-0 text-dark">Creación de agenda</h1>
                        </div><!-- /.col -->

                        @csrf
                        <div class="card-body">

                            @include('admin.admin.form')

                            </tr>
                            </td>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid"> {{-- 4 Widgets --}}
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12 col-6">
                        @include('admin.agenda.tablas.table-procedimientos')
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->

                </div>

            </div><!-- /.container-fluid -->


        </section>
        <!-- /.content -->
        <div class="modal fade" tabindex="-1" id="modal-d" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">


                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="modal-title-d"></h6>
                            <div class="card-tools pull-right">
                                <button type="button" class="btn btn-block bg-gradient-primary btn-sm"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div>


                        <!--tabla -->
                        <div class="card-body table-responsive p-2">

                            <table id="detallePagos" class="table table-hover  text-nowrap  table-striped table-bordered"
                                style="width:100%">

                            </table>
                        </div>
                        <!-- /.class-table-responsive -->
                    </div>
                    <!-- /.card -->

                </div>
            </div>
        </div>

    </div>
@endsection

@section('scriptsPlugins')
    <script src="{{ asset('assets/js/jquery-select2/select2.min.js') }}" type="text/javascript"></script>

    <script>
        $(document).ready(function() {


            // Agregar filas a tabla para horarios
            $('#agregar_horario').click(function() {


                const timeini = $('#timeini').val();
                const timefin = $('#timefin').val();
                const intervalo = $('#intervalo').val();
                const horariosa = [];

                console.log(intervalo);

                const now = new Date('2019-09-13 '+timeini);

                const minutos_timeini = timeini.split(':')
                 .reduce((p, c) => parseInt(p) * 60 + parseInt(c));

                 const minutos_timefin = timefin.split(':')
                 .reduce((p, c) => parseInt(p) * 60 + parseInt(c));

                const  turnos = minutos_timefin - minutos_timeini;
                const  turnos1 = (turnos/intervalo)-1;
                const horarios = [];

                now.setMinutes(now.getMinutes(timeini));
                horarios.push(now.getHours() + ":" + ("00" + now.getMinutes()).slice(-2))

                for(var i = 0; i < turnos1; i++){

                now.setMinutes(now.getMinutes(timeini) + parseInt(intervalo));

                horarios.push(now.getHours() + ":" + ("00" + now.getMinutes()).slice(-2));

                }





                const dias = [];







                $('input[type=checkbox]:checked.case_semana').each(function() {
                    dias.push($(this).attr('id'));
                });

                if (dias.length > 0) {

                    dias.forEach(element => {



                            agregarhorario(element, horarios);

                        }


                    );



                }









            });


            function agregarhorario(element = '', horarios = '') {


                switch (element) {


                    case "diasemanal":

                    $('#tlunes> tbody').empty();

                    horarios.forEach(espacios =>{


                        $('#tlunes> tbody:last-child')
                            .append(
                                '<tr><td><button type="button" name="eliminar" id="eliminar" class = "btn-float  bg-gradient-danger btn-sm tooltipsC" title="eliminar">' +
                                '<i class="fas fa-trash"></i></button></td>' +
                                '<td>' + espacios + '</td>' +
                                '</tr>'

                            );
                        });
                        break;
                    case "diasemanam":

                    $('#tmartes> tbody').empty();
                    horarios.forEach(espacios =>{
                        $('#tmartes> tbody:last-child')
                            .append(
                                '<tr><td><button type="button" name="eliminar" id="eliminar" class = "btn-float  bg-gradient-danger btn-sm tooltipsC" title="eliminar">' +
                                '<i class="fas fa-trash"></i></button></td>' +
                                '<td>' + espacios + '</td>' +
                                '</tr>'

                            );
                    });
                        break;

                    case "diasemanami":


                    $('#tmiercoles> tbody').empty();
                    horarios.forEach(espacios =>{
                        $('#tmiercoles> tbody:last-child')
                            .append(
                                '<tr><td><button type="button" name="eliminar" id="eliminar" class = "btn-float  bg-gradient-danger btn-sm tooltipsC" title="eliminar">' +
                                '<i class="fas fa-trash"></i></button></td>' +
                                '<td>' + espacios + '</td>' +
                                '</tr>'

                            );
                        });

                        break;

                    case "diasemanaj":

                    $('#tjueves> tbody').empty();
                    horarios.forEach(espacios =>{
                        $('#tjueves> tbody:last-child')
                            .append(
                                '<tr><td><button type="button" name="eliminar" id="eliminar" class = "btn-float  bg-gradient-danger btn-sm tooltipsC" title="eliminar">' +
                                '<i class="fas fa-trash"></i></button></td>' +
                                '<td>' + espacios + '</td>' +
                                '</tr>'

                            );
                        });

                        break;

                    case "diasemanav":

                    $('#tviernes> tbody').empty();
                    horarios.forEach(espacios =>{
                        $('#tviernes> tbody:last-child')
                            .append(
                                '<tr><td><button type="button" name="eliminar" id="eliminar" class = "btn-float  bg-gradient-danger btn-sm tooltipsC" title="eliminar">' +
                                '<i class="fas fa-trash"></i></button></td>' +
                                '<td>' + espacios + '</td>' +
                                '</tr>'

                            );
                        });

                        break;

                    case "diasemanas":

                    $('#tsabado> tbody').empty();
                    horarios.forEach(espacios =>{
                        $('#tsabado> tbody:last-child')
                            .append(
                                '<tr><td><button type="button" name="eliminar" id="eliminar" class = "btn-float  bg-gradient-danger btn-sm tooltipsC" title="eliminar">' +
                                '<i class="fas fa-trash"></i></button></td>' +
                                '<td>' + espacios + '</td>' +
                                '</tr>'

                            );
                        });
                        break;

                    case "diasemanad":

                    $('#tdomingo> tbody').empty();
                    horarios.forEach(espacios =>{
                        $('#tdomingo> tbody:last-child')
                            .append(
                                '<tr><td><button type="button" name="eliminar" id="eliminar" class = "btn-float  bg-gradient-danger btn-sm tooltipsC" title="eliminar">' +
                                '<i class="fas fa-trash"></i></button></td>' +
                                '<td>' + espacios + '</td>' +
                                '</tr>'

                            );


                    });

                    break;

                    default:
                        0;

                }

            }


            // eliminar filas de tabla para guardar

            $("#tlunes").on("click", "#eliminar", function() {
                $(this).closest("tr").remove();
            });

            $("#tmartes").on("click", "#eliminar", function() {
                $(this).closest("tr").remove();
            });

            $("#tmiercoles").on("click", "#eliminar", function() {
                $(this).closest("tr").remove();
            });

            $("#tjueves").on("click", "#eliminar", function() {
                $(this).closest("tr").remove();
            });

            $("#tviernes").on("click", "#eliminar", function() {
                $(this).closest("tr").remove();
            });

            $("#tsabado").on("click", "#eliminar", function() {
                $(this).closest("tr").remove();
            });

            $("#tdomingo").on("click", "#eliminar", function() {
                $(this).closest("tr").remove();
            });

            fill_datatable();

            function fill_datatable(periodo1 = '', zona1 = '') {
                var datatable = $('#tablero').DataTable({
                    language: idioma_espanol,
                    lengthMenu: [-1],
                    processing: true,
                    serverSide: true,


                    ajax: {
                        url: "{{ route('tablero') }}",
                        data: {
                            periodo1: periodo1,
                            zona1: zona1
                        }
                    },
                    columns: [{
                            data: 'Ciclo',
                            name: 'Ciclo'
                        },
                        {
                            data: 'Periodo',
                            name: 'Periodo'
                        },
                        {
                            data: 'nombreu'

                        },
                        {
                            data: 'Usuario'

                        },
                        {
                            data: 'idDivision',
                            name: 'idDivision'
                        },
                        {
                            data: 'Asignados',
                            name: 'Asignados'
                        },
                        {
                            data: 'Pendientes',
                            name: 'Pendientes'
                        },
                        {
                            data: 'Ejecutadas',
                            name: 'Ejecutadas'
                        },
                        {
                            data: 'Altos',
                            name: 'Altos'
                        },
                        {
                            data: 'Bajos',
                            name: 'Bajos'
                        },
                        {
                            data: 'Negativo',
                            name: 'Negativo'
                        },
                        {
                            data: 'Consumo_cero',
                            name: 'Consumo_cero'
                        },
                        {
                            data: 'Normales',
                            name: 'Normales'
                        },
                        {
                            data: 'Causados',
                            name: 'Causados'
                        },

                        {
                            data: 'inicio',
                            name: 'inicio'
                        },
                        {
                            data: 'Final',
                            name: 'Final'
                        }

                    ],
                    "footerCallback": function(row, data, start, end, display) {
                        var api = this.api(),
                            data;


                        var intVal = function(i) {
                            return typeof i === 'string' ?
                                i.replace(/[\$,]/g, '') * 1 :
                                typeof i === 'number' ?
                                i : 0;
                        };


                        asignadas = api
                            .column(5, {
                                page: 'current'
                            })
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        pendientes = api
                            .column(6, {
                                page: 'current'
                            })
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        ejecutadas = api
                            .column(7, {
                                page: 'current'
                            })
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);
                        altos = api
                            .column(8, {
                                page: 'current'
                            })
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        bajos = api
                            .column(9, {
                                page: 'current'
                            })
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        negativo = api
                            .column(10, {
                                page: 'current'
                            })
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        consumo_cero = api
                            .column(11, {
                                page: 'current'
                            })
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        normales = api
                            .column(12, {
                                page: 'current'
                            })
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        causados = api
                            .column(13, {
                                page: 'current'
                            })
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);





                        $(api.column(5).footer()).html(
                            asignadas
                        );
                        $(api.column(6).footer()).html(
                            pendientes
                        );
                        $(api.column(7).footer()).html(
                            ejecutadas
                        );
                        $(api.column(8).footer()).html(
                            altos
                        );
                        $(api.column(9).footer()).html(
                            bajos
                        );
                        $(api.column(10).footer()).html(
                            negativo
                        );
                        $(api.column(11).footer()).html(
                            consumo_cero
                        );
                        $(api.column(12).footer()).html(
                            normales
                        );
                        $(api.column(13).footer()).html(
                            causados
                        );




                    },
                    //Botones----------------------------------------------------------------------
                    "dom": 'Bfrtip',
                    buttons: [{

                            extend: 'copyHtml5',
                            titleAttr: 'Copy',
                            className: "btn btn-info"


                        },
                        {

                            extend: 'excelHtml5',
                            titleAttr: 'Excel',
                            className: "btn btn-success"


                        },
                        {

                            extend: 'csvHtml5',
                            titleAttr: 'csv',
                            className: "btn btn-warning"


                        },
                        {

                            extend: 'pdfHtml5',
                            titleAttr: 'pdf',
                            className: "btn btn-primary"


                        }
                    ]
                });
            }



            $('#buscar').click(function() {

                var periodo1 = $('#periodo1').val();
                var zona1 = $('#zona1').val();

                if (periodo1 != '' && zona1 != '') {

                    $('#tablero').DataTable().destroy();
                    fill_datatable(periodo1, zona1);

                } else {

                    swal({
                        title: 'Debes digitar periodo y zona',
                        icon: 'warning',
                        buttons: {
                            cancel: "Cerrar"

                        }
                    })
                }

            });

            $('#reset').click(function() {
                $('#zona1').val('');
                $('#periodo1').val('');
                $('#tablero').DataTable().destroy();
                fill_datatable();
            });
        });



        //Select para consultar los Profesionales
        $("#profesional_select").select2({
            theme: "bootstrap",
            ajax: {
                url: "{{ route('selectprofesional') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(data) {

                            return {

                                text: data.nombre,
                                id: data.id_profesional

                            }
                        })
                    };
                },
                cache: true
            }
        });



        //Detalle pagos

        $(document).on('click', '.pagos', function() {

            //var id = $(this).attr('id');
            $("#detallePago").empty();

            $.ajax({
                url: "{{ route('detalle_pagos') }}",
                dataType: "json",
                success: function(dataPagos) {
                    $("#detallePagos").append(
                        '<thead><tr><th align="center" style="dislay: none;">Numero de Prestamo</th>' +
                        '<th align="center" style="dislay: none;">Numero de cuota</th>' +
                        '<th align="center" style="dislay: none;">Valor Abono</th>' +
                        '<th align="center" style="dislay: none;">Fecha de Pago</th>' +
                        '</tr></thead>'
                    );
                    $.each(dataPagos.result1, function(i, items) {
                        $("#detallePagos").append(

                            //Para colocar en tabla

                            '<tr>' +
                            '<td>' + items.prestamo_id + '</td>' +
                            '<td>' + items.numero_cuota + '</td>' +
                            '<td>' + items.valor_abono + '</td>' +
                            '<td>' + items.fecha_pago + '</td>' +
                            '</tr>'

                        );
                    });
                    $('.modal-title-p').text('Detalle de pagos');
                    $('#modal-p').modal('show');


                }



            });
        });

        var idioma_espanol = {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla =(",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        };
    </script>
@endsection
