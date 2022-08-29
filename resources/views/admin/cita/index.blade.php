@extends("theme.$theme.layout")

@section('titulo')
    Citas
@endsection
@section('styles')
    <link href="{{ asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css") }}" rel="stylesheet"
        type="text/css" />
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"
        rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css"
        rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <style>
        .table-sm {
            tr {

                th,
                td {
                    padding: 5px;
                    border: 1px solid blue;
                    width: 5%;
                    word-wrap: break-word;
                }
            }
        }
    </style>
@endsection


@section('scripts')
    <script src="{{ asset('assets/pages/scripts/admin/usuario/crearuser.js') }}" type="text/javascript"></script>
@endsection

@section('contenido')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="m-0 p-0 text-dark">Gestion de citas</h1>
                </div><!-- /.col -->


                <div class="card-body col-12 col-lg-12  mt-0 mb-0 pb-0 pt-1 pl-2 pr-2 card-blue">

                    @include('admin.cita.form.form')

                    @csrf



                </div>

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

        <!-- /.content-header -->
    </div>




    <div class="modal fade" tabindex="-1" id="modal-u" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="row">
                    <div class="col-lg-12">
                        @include('includes.form-error')
                        @include('includes.form-mensaje')
                        <span id="form_result"></span>
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title-1"></h3>
                                <div class="card-tools pull-right">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <form id="form-general" class="form-horizontal" method="POST">
                                @csrf
                                <div class="card-body">
                                    @include('admin.cita.form')
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">

                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        @include('includes.boton-form-crear-empresa-empleado-usuario')
                                    </div>
                                </div>
                                <!-- /.card-footer -->
                            </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scriptsPlugins')
    <script src="{{ asset("assets/$theme/plugins/datatables/jquery.dataTables.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.js") }}" type="text/javascript">
    </script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery-select2/select2.min.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>


    <script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function() {

            // variables globales
            var fechaini = '';
            var fechafin = '';
            var profesional = '';
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


            fill_datatable_tabla();


            function consulta_agenda() {

                // Callback para filtrar los datos de la tabla y detalle

                fechaini = $('#fechaini').val();
                fechafin = $('#fechafin').val();
                profesional = $('#profesional_select').val();


                if (fechaini != '' && fechafin != '' || profesional != '') {

                    $('#Citas').DataTable().destroy();

                    fill_datatable_tabla(fechaini, fechafin, profesional);


                } else {

                    Swal.fire({
                        title: 'Debes digitar fecha inicial y fecha final o usuario',
                        icon: 'warning',
                        buttons: {
                            cancel: "Cerrar"

                        }
                    })
                }

            }

            $('#fechaini').change(consulta_agenda);
            $('#fechafin').change(consulta_agenda);
            $('#profesional_select').change(consulta_agenda);

            // Función para filtrar cargar los datos en la tabla

            function fill_datatable_tabla(fechaini = '', fechafin = '', profesional = '') {
                var myTable =
                    $('#Citas').DataTable({
                        language: idioma_espanol,
                        processing: true,
                        lengthMenu: [
                            [500, -1],
                            [500, "Mostrar Todo"]
                        ],
                        serverSide: true,
                        sScrollY: "320px",
                        sScrollX: "320px",
                        aaSorting: [
                            [9, "asc"]
                        ],
                        responsive: true,
                        autoWidth: true,
                        ajax: {
                            url: "{{ route('cita') }}",
                            data: {
                                fechaini: fechaini,
                                fechafin: fechafin,
                                profesional: profesional
                            }
                        },
                        columns: [{
                                data: 'action',
                                name: 'action',
                                orderable: false,
                                "width": "5%"
                            },
                            {
                                data: 'historia',
                                "width": "5%"
                            },
                            {
                                data: 'tipo_documento',

                            },

                            {
                                data: 'papellido',
                                "width": "5%",
                            },
                            {
                                data: 'sapellido'
                            },
                            {
                                data: 'pnombre'
                            },
                            {
                                data: 'snombre'
                            },

                            {
                                data: 'factura',

                            },
                            {
                                data: 'doc_factura',

                            },
                            {
                                data: 'fecha_cita',
                                name: 'fecha_cita',
                                "width": "5%"
                            },
                            {
                                data: 'cod_profesional',
                                name: 'cod_profesional',
                                "width": "5%"
                            },
                            {
                                data: 'cod_cups',
                                name: 'cod_cups',
                                "width": "5%"
                            },
                            {
                                data: 'servicio',
                                name: 'servicio',
                                "width": "5%"
                            },
                            {
                                data: 'estado',
                                name: 'estado',
                                "width": "5%"
                            },

                            {
                                data: 'celular',
                                name: 'celular',
                                "width": "5%"
                            },
                            {
                                data: 'contrato',
                                name: 'contrato',
                                "width": "5%"
                            }

                        ],
                        "columnDefs": [{
                                "render": function(data, type, row) {
                                    var type;
                                    var document;

                                    if (data == null) {
                                        document = '';
                                    } else {
                                        document = data;
                                    }

                                    if (row["tipo_documento"] == null) {
                                        type = '';
                                    } else {
                                        type = row["tipo_documento"];
                                    }

                                    return type + ' ' + document;
                                },
                                "targets": [1]
                            },
                            {
                                "visible": false,
                                "targets": [2]
                            },
                            {
                                "render": function(data, type, row) {
                                    var type_d;
                                    var facturad;

                                    if (data == null) {
                                        facturad = '';
                                    } else {
                                        facturad = data;
                                    }

                                    if (row["doc_factura"] == null) {
                                        type_d = '';
                                    } else {
                                        type_d = row["doc_factura"];
                                    }

                                    return type_d + ' ' + facturad;
                                },
                                "targets": [7]
                            },
                            {
                                "visible": false,
                                "targets": [8]
                            },
                            {
                                "render": function(data, type, row) {

                                    var apellido1;
                                    var apellido2;
                                    var name;
                                    var name2;


                                    if (data == null) {
                                        apellido1 = '';
                                    } else {
                                        apellido1 = data;
                                    }

                                    if (row["sapellido"] == null) {
                                        apellido2 = '';
                                    } else {
                                        apellido2 = row["sapellido"];
                                    }
                                    if (row["pnombre"] == null) {
                                        name = '';
                                    } else {
                                        name = row["pnombre"];
                                    }
                                    if (row["snombre"] == null) {
                                        name2 = '';
                                    } else {
                                        name2 = row["snombre"];
                                    }

                                    return apellido1 + apellido2 + ' ' + name + ' ' + name2;
                                },
                                "targets": [3]
                            },
                            {
                                "visible": false,
                                "targets": [4]
                            },
                            {
                                "visible": false,
                                "targets": [5]
                            },
                            {
                                "visible": false,
                                "targets": [6]
                            },


                        ],

                        //Botones----------------------------------------------------------------------

                        "dom": '<"row"<"col-xs-1 form-inline"><"col-md-4 form-inline"l><"col-md-5 form-inline"f><"col-md-3 form-inline">>rt<"row"<"col-md-8 form-inline"i> <"col-md-4 form-inline"p>>',


                        buttons: [{

                                extend: 'excelHtml5',
                                titleAttr: 'Exportar Excel',
                                title: "seguimiento",
                                className: "btn  btn-outline-success btn-sm"


                            },
                            {

                                extend: 'csvHtml5',
                                titleAttr: 'Exportar csv',
                                className: "btn  btn-outline-warning btn-sm"
                                //text: '<i class="fas fa-file-excel"></i>'

                            }
                        ],


                        "createdRow": function(row, data, dataIndex) {
                            if (data["estado"] == "ASIGNADA") {
                                $(row).css("background-color", '#a3bcff');
                                $(row).addClass("button btn-xs");

                            }
                            if (data["fecha_cita"] != null) {
                                $(row).addClass("button btn-xs");
                            } else {
                                $(row).addClass("button btn-xs");
                            }

                        }
                    });
            }

            $('#Citas tbody').on('click', 'tr', function() {
                var data = $(this).find("td");
                var id = data.filter(":eq(2)").text();
                var document = data.filter(":eq(1)").text();

                $('#detalle').empty();
                $('#detalle1').empty();

                $("#detalle").append(


                    '<div class="col-md-12">'+
                    '<div class="card card-info direct-chat direct-chat-info">'+
                    '<div class="card-header">'+
                    '<h3 class="card-title">Observaciones:</h3>'+
                    '<div class="card-tools">'+
                    '<span title="3 New Messages" class="badge bg-danger">3</span>'+
                    '<button type="button" class="btn btn-tool" data-card-widget="collapse">'+
                    '<i class="fas fa-minus"></i>'+
                    '</button>'+
                    '<button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">'+
                    '<i class="fas fa-comments"></i>'+
                    '</button>'+
                    '<button type="button" class="btn btn-tool" data-card-widget="maximize">'+
                    '<i class="fas fa-expand"></i>'+
                    '</button>'+
                    '</div>'+
                    '</div>'+

                    '<div class="card-body" style="display: block;">'+
                    '<div class="direct-chat-messages">'+
                    '<div class="direct-chat-msg">'+
                    '<div class="direct-chat-infos clearfix">'+
                    '<span class="direct-chat-name float-left">Alexander Pierce</span>'+
                    '<span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>'+
                    '</div>'+
                    '<img class="direct-chat-img" src="{{asset("assets/lte/dist/img/user_default.jpg")}}" alt="user">'+
                    '<div class="direct-chat-text"> '+id+' </div>'+

                    '</div>'+
                    '</div>'+
                    '<div class="direct-chat-contacts">'+
                    '<ul class="contacts-list">'+
                    '<li>'+
                    '<a href="#">'+
                    '<img class="contacts-list-img" src="{{asset("assets/lte/dist/img/user_default.jpg")}}" alt="User">'+
                    '<div class="contacts-list-info">'+
                    '<span class="contacts-list-name">'+
                    'Count Dracula'+
                    '<small class="contacts-list-date float-right">2/28/2015</small>'+
                    '</span>'+
                    '<span class="contacts-list-msg">'+id+'</span>'+
                    '</div>'+
                    '</a>'+
                    '</li>'+
                    '</ul>'+
                    '</div>'+
                    '<div class="card-footer">'+
                    '<form action="#" method="post">'+
                    '<div class="input-group">'+
                    '<input type="text" name="message" placeholder="Type Obse ..." class="form-control">'+
                    '<span class="input-group-append">'+
                    '<button type="button" id="add_obs" class="btn btn-info">Add Obs.</button>'+
                    '</span>'+
                    '</div>'+
                    '</form>'+
                    '</div>'+
                    '</div>');

                // $("#detalle1").append(
                //     '<div class="small-box shadow-lg  l-bg-blue"><div class="inner">' +
                //     '<p>Usuario: <sup style="font-size: 20px">' + document + '</sup></p>' +
                //     '<p><h5><i class="far fa-user"></i> </h5></p>' +
                //     '</div><div class="icon"><i class="fas fa-users"></i></div></div>'
                // );


            });



            $('#create_cita').click(function() {
                $('#form-general')[0].reset();
                $('#paciente').val('').trigger('change.select2');
                $('#profesional').val('').trigger('change.select2');
                $('.card-title-1').text('Agregar nueva cita');
                $('#action_button').val('Add');
                $('#action').val('Add');
                $('#form_result').html('');
                $('#modal-u').modal('show');
            });

            $('#form-general').on('submit', function(event) {
                event.preventDefault();
                var url = '';
                var method = '';
                var text = '';
                var fechahora = '';

                var sede = '';
                var usuario_id = '';
                var paciente_id = '';

                if ($('#action').val() == 'Add') {
                    text = "Estás por crear un cita"
                    url = "{{ route('guardar_cita') }}";
                    method = 'post';
                    fechahora = $('#fechahora').val();
                    sede = $('#sede').val();
                    usuario_id = $('#profesional').val();
                    paciente_id = $('#paciente').val();
                    tipo_cita = $('#tipo_cita').val();
                    fechasp = $('#fechasp').val();

                }

                if ($('#action').val() == 'Edit') {
                    text = "Estás por actualizar un cita"
                    var updateid = $('#hidden_id').val();
                    url = "/cita/" + updateid;
                    method = 'put';
                    fechahora = $('#fechahora').val();
                    sede = $('#sede').val();
                    usuario_id = $('#profesional').val();
                    paciente_id = $('#paciente').val();
                }
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: text,
                    icon: "success",
                    showCancelButton: true,
                    showCloseButton: true,
                    confirmButtonText: 'Aceptar',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: url,
                            method: method,
                            data: {
                                fechahora: fechahora,
                                sede: sede,
                                paciente_id: paciente_id,
                                usuario_id: usuario_id,
                                tipo_cita: tipo_cita,
                                fechasp: fechasp,
                                "_token": $("meta[name='csrf-token']").attr("content")
                            },
                            dataType: "json",
                            success: function(data) {
                                var html = '';
                                if (data.errors) {

                                    html =
                                        '<div class="alert alert-danger alert-dismissible" data-auto-dismiss="3000">'
                                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                                    '<h5><i class="icon fas fa-check"></i> Mensaje Ventas</h5>';

                                    for (var count = 0; count < data.errors
                                        .length; count++) {
                                        html += '<p>' + data.errors[count] + '<p>';
                                    }
                                    html += '</div>';
                                }

                                if (data.success == 'ok') {
                                    $('#form-general')[0].reset();
                                    $('#modal-u').modal('hide');
                                    $('#Citas').DataTable().ajax.reload();
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'cita creada correctamente',
                                        showConfirmButton: false,
                                        timer: 1500

                                    })
                                    // Manteliviano.notificaciones('cliente creado correctamente', 'Sistema Ventas', 'success');

                                } else if (data.success == 'ok1') {
                                    $('#form-general')[0].reset();
                                    $('#modal-u').modal('hide');
                                    $('#Citas').DataTable().ajax.reload();
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'cita actualizado correctamente',
                                        showConfirmButton: false,
                                        timer: 1500

                                    })


                                } else if (data.success == 'tomada') {
                                    //$('#form-general')[0].reset();
                                    $('#Citas').DataTable().ajax.reload();
                                    //$('#modal-u').modal('hide');
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'La hora del Profesional ya fue tomada por favor selecciona otro horario',
                                        showConfirmButton: true,
                                        //timer: 1500

                                    })


                                }
                                $('#form_result').html(html)
                            }


                        });
                    }
                });


            });


            // Edición de cliente

            $(document).on('click', '.edit', function() {
                var id = $(this).attr('id');

                $.ajax({
                    url: "/cita/" + id + "/editar",
                    dataType: "json",
                    success: function(data) {
                        $('#paciente').val(data.result.paciente_id).trigger('change.select2');
                        $('#fechahora').val(data.result.fechahora);
                        $('#sede').val(data.result.sede);
                        $('#fechasp').val(data.result.fechasp);
                        $('#tipo_cita').val(data.result.tipo_cita);
                        $('#profesional').val(data.result.usuario_id).trigger('change.select2')
                        $('#hidden_id').val(id);
                        $('.card-title-1').text('Editar cita');
                        $('#action_button').val('Edit');
                        $('#action').val('Edit');
                        $('#modal-u').modal('show');

                    }


                }).fail(function(jqXHR, textStatus, errorThrown) {

                    if (jqXHR.status === 403) {

                        Manteliviano.notificaciones('No tienes permisos para realizar esta accion',
                            'Sistema Ventas', 'warning');

                    }
                });

            });



        });

        // $.get(
        //   'selectp',
        //    function(pacientes1)
        //   {
        //       $('#paciente').empty();
        //       $('#paciente').append("<option value=''>---seleccione paciente---</option>")
        //       $.each(pacientes1, function(paciente, value){
        //       $('#paciente').append("<option value='" + value + "'>" + value + "</option>")
        //       });
        //   });

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
        }
    </script>
@endsection
