@extends("theme.$theme.layout")

@section('titulo')
Citas | Fidem
@endsection
@section('styles')
<link href="{{ asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css") }}" rel="stylesheet" type="text/css" />
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" type="text/css" />

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

@include('admin.cita.modal.modalAddCita')
@include('admin.cita.modal.modalViewCita')
@include('admin.cita.modal.modalEditCita')

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

        // Select2 para estado de cita
        $("#estado_cita").select2({
            theme: "bootstrap",
            placeholder: 'estado cita',
            ajax: {
                url: "{{ route('selectlist')}}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data.type, function(data) {
                            return {
                                text: data.nombre,
                                id: data.nombre
                            }
                        })
                    };
                },
                cache: true
            }
        });

        // variables globales
        var fechaini = '';
        var fechafin = '';
        var profesional = '';
        var status = '';

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
            status = $('#estado_cita').val();


            if (fechaini != '' && fechafin != '' || profesional != '' || status != '') {

                $('#Citas').DataTable().destroy();

                fill_datatable_tabla(fechaini, fechafin, profesional, status);


            } else {

                Swal.fire({
                    title: 'Debes digitar fecha inicial y fecha final, profesional o el estado de la cita',
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
        $('#estado_cita').change(consulta_agenda);

        // Función para filtrar cargar los datos en la tabla
        function fill_datatable_tabla(fechaini = '', fechafin = '', profesional = '', status = '') {
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
                            profesional: profesional,
                            status: status
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
                            data: 'ips',
                            name: 'ips',
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

                                return apellido1 + ' ' + apellido2 + ' ' + name + ' ' + name2;
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
                        } else if (data["estado"] == "CANCELADA") {
                            $(row).css("background-color", '#eedbbd');
                            $(row).addClass("button btn-xs");
                        } else if (data["estado"] == "INCUMPLIDA") {
                            $(row).css("background-color", '#ffbbbb');
                        } else if (data["estado"] == "CONFIRMADA") {
                            $(row).css("background-color", '#7fd1c9');
                            $(row).addClass("button btn-xs");
                        } else if (data["estado"] == "APLAZADA") {
                            $(row).css("background-color", '#a5d8e9');
                            $(row).addClass("button btn-xs");
                        } else if (data["estado"] == "SIN DISPONIBILIDAD") {
                            $(row).css("background-color", '#fff9c0');
                            $(row).addClass("button btn-xs");
                        }
                        if (data["fechahora_cita"] != null) {
                            $(row).addClass("button btn-xs");
                        } else {
                            $(row).addClass("button btn-xs");
                        }

                    }
                });
        }

        var get_observacion_usu = "";

        function getObservaciones(idCita) {
            $.ajax({
                url: "{{ route('cita_observaciones')}}",
                method: "GET",
                data: {
                    id: idCita,
                },
                success: function(response) {

                    // Aquí se procesa la respuesta y muestra las observaciones en la sección correspondiente del HTML
                    get_observacion_usu = response.result.observacion_usu;
                    /* $("#observacion_usu").val(response.result.observacion_usu); */
                    $("#estado").val(response.result.estado);
                    $("#bloqueo").val(response.result.bloqueo);
                    $("#usuario").val(response.result.usuario);
                    $("#cita_id").val(response.result.cita_id);
                    $("#fecha_registro").val(response.result.created_at);
                    $("#fecha_update").val(response.result.updated_at);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                },
            });
        }


        $(document).on('change', '.case', function() {
            if ($(this).prop("checked")) {
                var cita_id = $(this).attr('id');
                selected_cita_id = cita_id; // Almacena el valor de cita_id en la variable global

                $.ajax({
                    type: 'GET',
                    url: "{{ url('cita') }}",
                    data: {
                        'cita_id': cita_id
                    },
                    success: function(data) {
                        // muestra los datos en una ventana emergente o en un div oculto
                        console.log(data); // muestra los datos en la consola del navegador para fines de prueba
                        getObservaciones(cita_id);
                    },
                    error: function(xhr) {
                        alert(xhr.responseText);
                    }
                });
            }
        });


        // Funcion para capturar los datos de fechahora_cita Y prof_cita al hacer clic en el agregar_horario y abrir el modal para agregar una cita
        function getCita(fecha, prof) {
            // Agregar listener de evento al botón agregar_horario
            $('#agregar_horario').on('click', function() {
                /* console.log(fecha, prof); */

                // Mostrar los parámetros en el modal
                $('#fechahora_cita').val(fecha);
                $('#prof_cita').val(prof);
                $('#cita_id').val(selected_cita_id); // Asignar el valor de selected_cita_id al input oculto

                $('#action_button').val('Add');
                $('#action').val('Edit');
                $('#form_result').html('');

                // Abrir el modal
                $('#modal_cita').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#modal_cita').modal('show');
            });

            $('#editar_cita').on('click', function() {
                var id = selected_cita_id;
                var cita_ido = selected_cita_id;

                if (cita_ido != '') {
                    $('#tobservaciones').DataTable().destroy();
                    fill_datatable_f(cita_ido);
                }

                $.ajax({
                    url: "/cita/" + id + "/editar",
                    dataType: "json",
                    success: function(data) {
                        $('#fecha_cita_e').val(data.result.fechahora_cita);
                        $('#fecha_solicitud_e').val(data.result.fechahora_solicitud);
                        $('#fecha_solicitada_e').val(data.result.fechahora_solicitada);
                        $('#tipoSolicitud_e').val(data.result.tipo_solicitud);
                        $('#ips_sede_e').val(data.result.ips);
                        $('#tipo_id_e').val(data.result.tipo_documento);
                        $('#identificacion_e').val(data.result.historia);
                        $('#firts_pname_e').val(data.result.pnombre);
                        $('#firts_sname_e').val(data.result.snombre);
                        $('#last_pname_e').val(data.result.papellido);
                        $('#last_sname_e').val(data.result.sapellido);
                        $('#fecha_nacimiento_e').val(data.result.futuro2);
                        $('#paciente_edad_e').val(data.result.paciente_edad);
                        $('#paciente_direccion_e').val(data.result.paciente_direccion);
                        $('#paciente_pais_e').val(data.result.nombre_pais);
                        $('#servicio_e').val(data.result.servicio_nombre);
                        $('#contrato_e').val(data.result.contrato_nombre);
                        $('#procedimiento_e').val(data.result.cups);
                        $('#estado_e').val(data.result.estado);
                        $('#username_e').val(data.result.usuario);

                        $('#cod_med_e').val(data.result.prof_nombre);

                        /* var newprofesional = new Option(data.result.profesional_id.nombre, data.result.profesional_id.id_profesional, true, true);
                        $('#cod_med_e').append(newprofesional).trigger('change'); */


                        $('#cita_id_e').val(id);

                        $('#form_result_edit').html('');
                        $('#modal_edit_cita').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('#modal_edit_cita').modal('show');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        if (jqXHR.status === 403) {
                            Manteliviano.notificaciones('No tienes permisos para realizar esta accion',
                                'Modulo Citas', 'warning');
                        }
                    }
                });
            });

            $('#consultar_cita').on('click', function() {
                var id = selected_cita_id;
                var cita_ido = selected_cita_id;

                if (cita_ido != '') {
                    $('#tobservaciones').DataTable().destroy();
                    fill_datatable_f(cita_ido);
                }

                $.ajax({
                    url: "/cita/" + id + "/consultar",
                    dataType: "json",
                    success: function(data) {
                        $('#fecha_cita').val(data.result.fechahora_cita);
                        $('#fecha_solicitud').val(data.result.fechahora_solicitud);
                        $('#fecha_solicitada').val(data.result.fechahora_solicitada);
                        $('#tipoSolicitud').val(data.result.tipo_solicitud);
                        $('#ips_sede').val(data.result.ips);
                        $('#tipo_id').val(data.result.tipo_documento);
                        $('#identificacion').val(data.result.historia);
                        $('#firts_pname').val(data.result.pnombre);
                        $('#firts_sname').val(data.result.snombre);
                        $('#last_pname').val(data.result.papellido);
                        $('#last_sname').val(data.result.sapellido);
                        $('#fecha_nacimiento').val(data.result.futuro2);
                        $('#paciente_edad').val(data.result.paciente_edad);
                        $('#paciente_direccion').val(data.result.paciente_direccion);
                        $('#paciente_pais').val(data.result.nombre_pais);
                        $('#servicio').val(data.result.servicio_nombre);
                        $('#contrato').val(data.result.contrato_nombre);
                        $('#procedimiento').val(data.result.cups);
                        $('#estado').val(data.result.estado);
                        $('#username').val(data.result.usuario);

                        $('#cod_med').val(data.result.prof_nombre);
                        $('#cita_id').val(id);

                        $('#form_result_view').html('');
                        $('#modal_view_cita').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('#modal_view_cita').modal('show');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        if (jqXHR.status === 403) {
                            Manteliviano.notificaciones('No tienes permisos para realizar esta accion',
                                'Modulo Citas', 'warning');
                        }
                    }
                });
            });



        }


        $('#Citas tbody').on('click', 'tr', function() {
            var data = $(this).find("td");
            var id = data.filter(":eq(2)").text();
            var document = data.filter(":eq(1)").text();
            var fecha = data.filter(":eq(4)").text();
            var prof = data.filter(":eq(5)").text();

            getCita(fecha, prof);


            $('#detalle').empty();
            $('#detalle1').empty();


            $("#detalle").append(


                '<div class="col-md-12">' +
                '<div class="card card-info direct-chat direct-chat-info">' +
                '<div class="card-header">' +
                '<h3 class="card-title">Observaciones:</h3>' +
                '<div class="card-tools">' +
                '<span title="3 New Messages" class="badge bg-danger">3</span>' +
                '<button type="button" class="btn btn-tool" data-card-widget="collapse">' +
                '<i class="fas fa-minus"></i>' +
                '</button>' +
                '<button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">' +
                '<i class="fas fa-comments"></i>' +
                '</button>' +
                '<button type="button" class="btn btn-tool" data-card-widget="maximize">' +
                '<i class="fas fa-expand"></i>' +
                '</button>' +
                '</div>' +
                '</div>' +

                '<div class="card-body" style="display: block;">' +
                '<div class="direct-chat-messages">' +
                '<div class="direct-chat-msg">' +
                '<div class="direct-chat-infos clearfix">' +
                '<span class="direct-chat-name float-left"> ' + id + '</span>' +
                '<span class="direct-chat-timestamp float-right">' + fecha + '</span>' +
                '</div>' +
                '<img class="direct-chat-img" src="{{asset("assets/lte/dist/img/user_default.jpg")}}" alt="user">' +
                '<div class="direct-chat-text"> ' + get_observacion_usu + ' </div>' +

                '</div>' +
                '</div>' +
                '<div class="direct-chat-contacts">' +
                '<ul class="contacts-list">' +
                '<li>' +
                '<a href="#">' +
                '<img class="contacts-list-img" src="{{asset("assets/lte/dist/img/user_default.jpg")}}" alt="User">' +
                '<div class="contacts-list-info">' +
                '<span class="contacts-list-name">' +
                'Count Dracula' +
                '<small class="contacts-list-date float-right">2/28/2015</small>' +
                '</span>' +
                '<span class="contacts-list-msg">' + id + '</span>' +
                '</div>' +
                '</a>' +
                '</li>' +
                '</ul>' +
                '</div>' +
                '<div class="card-footer">' +
                '<form action="#" method="post">' +
                '<div class="input-group">' +
                '<input type="text" name="message" placeholder="Type Obse ..." class="form-control">' +
                '<span class="input-group-append">' +
                '<button type="button" id="add_obs" class="btn btn-info">Add Obs.</button>' +
                '</span>' +
                '</div>' +
                '</form>' +
                '</div>' +
                '</div>');

        });

        // Callback para filtrar el paciente
        $('#buscarp').click(function() {

            const document = $('#historia').val();

            if (document != '') {
                fill_resumen(document);
            } else {

                Swal.fire({
                    title: 'Debes digitar un numero de documento valido',
                    icon: 'warning',
                    buttons: {
                        cancel: "Cerrar"
                    }
                })
            }
        });

        function fill_resumen(document = '') {

            $.ajax({
                url: "{{ route('pacientefill') }}",
                data: {
                    document: document
                },
                dataType: "json",
                success: function(data) {
                    if (data.pacientes == null) {
                        Manteliviano.notificaciones('Paciente no encontrado',
                            'Sistema Historias Clínicas', 'warning');
                    } else {
                        //Pintar formulario
                        console.log(data);
                        $.each(data, function(i, paciente) {
                            $("#pnombre").val(paciente.pnombre);
                            $("#snombre").val(paciente.snombre);
                            $("#papellido").val(paciente.papellido);
                            $("#sapellido").val(paciente.sapellido);
                            $("#tipo_documento").val(paciente.tipo_documento);
                            $("#documento").val(paciente.documento);
                            $("#futuro2").val(paciente.futuro2);
                            $("#edad").val(paciente.edad);
                            $("#pais_id").val(paciente.pais_id).trigger('change.select2');
                            $("#nombre_pais").val(paciente.nombre_pais);
                            $("#departamento_id").val(paciente.departamento_id).trigger('change.select2');
                            $("#ciudad_id").val(paciente.ciudad_id).trigger('change.select2');
                            $("#nombre_ciudad").val(paciente.nombre_ciudad);
                            $("#direccion").val(paciente.direccion);
                            $("#celular").val(paciente.celular);
                            $("#telefono").val(paciente.telefono);
                            $("#correo").val(paciente.correo);
                            $("#regimen").val(paciente.regimen);
                            $("#codigo_eps").val(paciente.codigo_eps);
                            $("#eps_nombre").val(paciente.eps_nombre);
                            $("#nivel").val(paciente.nivel);
                            $("#numero_afiliacion").val(paciente.numero_afiliacion);
                            $("#codigo_n").val(paciente.codigo_n);
                        });
                    }

                }
            });
        }

        //Select para consultar la EPS, Niveles
        $("#eps").select2({
            language: "es",
            theme: "bootstrap",
            ajax: {
                url: "{{ route('eps')}}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(data) {

                            return {

                                //text: data.codigo,
                                text: data.codigo + " - " + data.nombre,
                                id: data.id_eps_empresas

                            }
                        })
                    };
                },
                cache: true
            }
        });

        //Consulta de datos de la tabla lista-detalle
        $("#regimen").select2({
            language: "es",
            theme: "bootstrap",
            placeholder: 'Seleccione regimen',
            ajax: {
                url: "{{ route('selectlist')}}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data.regimen, function(data) {

                            return {

                                text: data.nombre,
                                id: data.nombre

                            }
                        })
                    };
                },
                cache: true
            }
        });

        /* Se pone este contador para permitir maximo agegar dos procedimientos a la cita,
         **Ojo tener en cuenta que para agregar dos procedimientos a la cita hay que modificar el controller para hacer dos insert o crear otra columna Ej: cups2*/
        /* $(document).ready(function() {
            var contadorFilas = 0;

            $('#agregarFila').click(function() {

                if (contadorFilas < 2) {
                    var centro_produccion = 'valor centro_produccion';
                    var contrato = 'valor contrato';
                    var procedimiento = 'valor contrato';
                    var eliminarFila = '<button type="button" class="btn btn-danger btn-xs eliminarFila"><i class="fas fa-trash"></i></button>';
                    var fila = '<tr><td>' + centro_produccion + '</td><td>' + contrato + '</td><td>' + procedimiento + '</td><td>' + eliminarFila + '</td></tr>';
                    $('#tabla tbody').append(fila);
                    contadorFilas++;
                } else {
                    alert('No se pueden agregar más de 2 Items.');
                }
            });

            $('#tabla').on('click', '.eliminarFila', function() {
                $(this).closest('tr').remove();
                contadorFilas--;
            });
        }); */

        //Select para consultar los servicios
        $("#fact_servicio2").select2({
            theme: "bootstrap",
            ajax: {
                url: "{{ route('servicios_factura')}}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(data) {

                            return {

                                text: data.cod_servicio + ' - ' + data.nombre,
                                id: data.id_servicio

                            }
                        })
                    };
                },
                cache: true
            }
        });

        //Select para consultar los procedimientos
        $("#fact_procedimiento").select2({
            theme: "bootstrap",
            ajax: {
                url: "{{ route('procedimientos_factura')}}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(data) {

                            return {

                                text: data.cod_cups + ' - ' + data.nombre,
                                id: data.id_cups

                            }
                        })
                    };
                },
                cache: true
            }
        });

        //Select para consultar los contratos
        $("#fact_contrato2").select2({
            theme: "bootstrap",
            ajax: {
                url: "{{ route('contratos_factura')}}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(data) {

                            return {

                                text: data.contrato + ' - ' + data.nombre,
                                id: data.id_contrato

                            }
                        })
                    };
                },
                cache: true
            }
        });


        $('#formulario_cita').on('submit', function(event) {
            event.preventDefault();
            var url = '';
            var method = '';
            var text = '';

            if ($('#action').val() == 'Add') {
                text = "Estás por crear un cita"
                url = "{{ route('guardar_cita') }}";
                method = 'post';
            }

            if ($('#action').val() == 'Edit') {
                text = "Estás por actualizar una cita"
                var updateid = $('#cita_id').val();
                url = "/cita/" + updateid;
                method = 'put';
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
                        data: $(this).serialize(),
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
                                $('#formulario_cita')[0].reset();
                                $('#modal_cita').modal('hide');
                                $('#Citas').DataTable().ajax.reload();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'cita creada correctamente',
                                    showConfirmButton: false,
                                    timer: 1500

                                })
                                // Manteliviano.notificaciones('cliente creado correctamente', 'Sistema Ventas', 'success');

                            } else if (data.success == 'ok1') {
                                $('#formulario_cita')[0].reset();
                                $('#modal_cita').modal('hide');
                                $('#Citas').DataTable().ajax.reload();
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Cita asignada correctamente',
                                    showConfirmButton: false,
                                    timer: 1500

                                })


                            } else if (data.success == 'tomada') {
                                //$('#formulario_cita')[0].reset();
                                $('#Citas').DataTable().ajax.reload();
                                //$('#modal_cita').modal('hide');
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Este cupo con el Profesional ya fue tomado por favor selecciona otro horario',
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
                    $('#firts_name').val(data.result.pnombre);
                    $('#snombre').val(data.result.snombre);
                    $('#papellido').val(data.result.papellido);
                    $('#sapellido').val(data.result.sapellido);
                    $('#direccion').val(data.result.direccion).trigger('change.select2')
                    $('#cita_id').val(id);
                    $('.card-title-1').text('Editar cita');
                    $('#action_button').val('Edit');
                    $('#action').val('Edit');
                    $('#modal_view_cita').modal('show');

                }


            }).fail(function(jqXHR, textStatus, errorThrown) {

                if (jqXHR.status === 403) {

                    Manteliviano.notificaciones('No tienes permisos para realizar esta accion',
                        'Modulo Citas', 'warning');

                }
            });

        });

        //--------------------------------Tabla relacion Citas vs Observaciones----------------------------//
        function fill_datatable_f(cita_ido = '') {
            var tobservaciones = $('#tobservaciones').DataTable({
                language: idioma_espanol,
                processing: true,
                lengthMenu: [
                    [25, 50, 100, 500, -1],
                    [25, 50, 100, 500, "Mostrar Todo"]
                ],
                processing: true,
                serverSide: true,
                aaSorting: [
                    [1, "asc"]
                ],
                ajax: {
                    url: "{{ route('observaciones')}}",
                    //type: "get",
                    data: {
                        id: cita_ido
                    }
                },
                columns: [{
                        data: 'actionlv',
                        name: 'actionlv',
                        orderable: false
                    },
                    {
                        data: 'observacion_usu',
                        name: 'observacion_usu'
                    },
                    {
                        data: 'estado',
                        name: 'estado'
                    },
                    {
                        data: 'usuario',
                        name: 'usuario'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    }

                ],

                //Botones----------------------------------------------------------------------

                "dom": '<"row"<"col-xs-1 form-inline"><"col-md-4 form-inline"l><"col-md-5 form-inline"f><"col-md-3 form-inline"B>>rt<"row"<"col-md-8 form-inline"i> <"col-md-4 form-inline"p>>',


                buttons: [{

                        extend: 'copyHtml5',
                        titleAttr: 'Copiar Registros',
                        title: "seguimiento",
                        className: "btn  btn-outline-primary btn-sm"


                    },
                    {

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

                    },
                    {

                        extend: 'pdfHtml5',
                        titleAttr: 'Exportar pdf',
                        className: "btn  btn-outline-secondary btn-sm"

                    }
                ]

            });

        }





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
