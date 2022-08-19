@extends("theme.$theme.layout")

@section('titulo')
    Profesionales
@endsection
@section('styles')
    <link href="{{ asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css") }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("assets/$theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}" rel="stylesheet"
        type="text/css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"
        rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css"
        rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/js/gijgo-combined-1.9.13/css/gijgo.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('scripts')
    <script src="{{ asset('assets/pages/scripts/admin/profesionales/index.js') }}"></script>
@endsection

@section('contenido')
    @include('admin.financiero.profesionales.tablas.tablaIndexProfesionales')
    @include('admin.financiero.profesionales.modal.modalProfesionales')
    <!-- Modal para relacionar los procedimientos -->
    @include('admin.financiero.profesionales.modal.modalProfeProcedimiento')
    <!-- Modal para relacionar los servicios -->
    @include('admin.financiero.profesionales.modal.modalProfeServicio')
    <!-- Modal para relacionar los medicamentos -->
    @include('admin.financiero.profesionales.modal.modalProfeMedicamentos')

    @include('admin.financiero.profesionales.modal.modalProfeDetalleIndex')
@endsection

@section('scriptsPlugins')
    <script src="{{ asset("assets/$theme/plugins/datatables/jquery.dataTables.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.js") }}" type="text/javascript">
    </script>
    <script src="{{ asset("assets/$theme/plugins/datatables-responsive/js/dataTables.responsive.min.js") }}"
        type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery-select2/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/gijgo-combined-1.9.13/js/gijgo.min.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>


    <script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function() {

            // Funcion 2 para pintar con data table tabla de financiero.profesionales generales
            var datatable = $('#listasGeneral').DataTable({
                language: idioma_espanol,
                processing: true,
                lengthMenu: [
                    [25, 50, 100, 500, -1],
                    [25, 50, 100, 500, "Mostrar Todo"]
                ],
                processing: true,
                serverSide: true,
                aaSorting: [
                    [0, "desc"]
                ],
                ajax: {
                    url: "{{ route('profesionalesIndex') }}",
                },
                columns: [{
                        data: 'action',
                        order: false,
                        searchable: false
                    },
                    {
                        data: 'codigo'
                    },
                    {
                        data: 'nombre'
                    },
                    {
                        data: 'especialidad'
                    },
                    {
                        data: 'sede'
                    },
                    {
                        data: 'estado'
                    }
                ],

                //Botones----------------------------------------------------------------------

                "dom": '<"row"<"col-xs-1 form-inline"><"col-md-4 form-inline"l><"col-md-5 form-inline"f><"col-md-3 form-inline"B>>rt<"row"<"col-md-8 form-inline"i> <"col-md-4 form-inline"p>>',

                buttons: [{

                        extend: 'copyHtml5',
                        titleAttr: 'Copiar Registros',
                        title: "Control de horas",
                        className: "btn  btn-outline-primary btn-sm"


                    },
                    {

                        extend: 'excelHtml5',
                        titleAttr: 'Exportar Excel',
                        title: "Control de horas",
                        className: "btn  btn-outline-success btn-sm"


                    },
                    {

                        extend: 'csvHtml5',
                        titleAttr: 'Exportar csv',
                        className: "btn  btn-outline-warning btn-sm"

                    },
                    {

                        extend: 'pdfHtml5',
                        titleAttr: 'Exportar pdf',
                        className: "btn  btn-outline-secondary btn-sm"


                    }
                ]

            });


            // Función que envía los datos de profesionales.profesionales al controlador ademas controla los input con sweat alert2

            $('#form-general1').on('submit', function(event) {
                event.preventDefault();
                var url = '';
                var method = '';
                var text = '';


                if ($('#action').val() == 'Add') {
                    text = "Estás por crear un profesional"
                    url = "{{ route('guardar_profesionales') }}";
                    method = 'post';
                }

                if ($('#codigo').val() == '' || $('#nombre').val() == '' || $('#reg_profesional').val() ==
                    '' || $('#cod_usuario').val() == '' || $('#tipo').val() == '' || $('#especialidad')
                    .val() == '' || $('#especialidad').val() == '') {
                    Swal.fire({
                        title: "Debes de rellenar todos los campos del formulario",
                        text: "Respuesta verifique los campos",
                        icon: "warning",
                        showCloseButton: true,
                        confirmButtonText: 'Aceptar',
                    });
                } else {

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
                                data: $('#form-general1').serialize(),
                                dataType: "json",
                                success: function(data) {
                                    if (data.success == 'ok') {
                                        $('#form-general1')[0].reset();
                                        $('#modal-listas').modal('hide');
                                        $('#listasGeneral').DataTable().ajax.reload();
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Procedimiento creado correctamente',
                                            showConfirmButton: false,
                                            timer: 2000
                                        })
                                    } else if (data.errors != null) {
                                        Swal.fire({
                                            icon: 'error',
                                            title: data.errors,
                                            showConfirmButton: false,
                                            timer: 3000
                                        })
                                    }
                                }

                            });
                        }
                    });

                }

            });

            // Función para cambio de check y obtener el cambio del dom

            $(document).on('click', '.check_98', function() {

                if ($(this).is(':checked')) {
                    var data = {
                        id: $(this).val(),
                        _token: $('input[name=_token]').val()
                    };
                }
                //Si se ha desmarcado se ejecuta el siguiente mensaje.
                else {
                    var data = {
                        id: $(this).val(),
                        _token: $('input[name=_token]').val()
                    }
                }
                ajaxRequest('profesional-estado', data);
            });


            // Función envío de datos para activar o desactivar

            function ajaxRequest(url, data) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    success: function(data) {

                        $('#listasGeneral').DataTable().ajax.reload();
                        Manteliviano.notificaciones(data.respuesta, data.titulo, data.icon);
                    }
                });
            }



            var idprofesional;

            //Función para abrir detalle del registro

            $(document).on('click', '.listasDetalleAll', function() {

                var idlist = $(this).attr('id');
                var idlistp = $(this).attr('id');
                idprofesional = $(this).attr('id');

                if (idlistp != '') {
                    $('#tservicio').DataTable().destroy();
                    fill_datatable(idlistp);
                }
                if (idlistp != '') {
                    $('#tprocedimiento').DataTable().destroy();
                    fill_tableproce(idlistp);
                    //function_addp(idlistp);
                }
                if (idlistp != '') {
                    $('#tmedicamento').DataTable().destroy();
                    fill_tablemedicamento(idlistp);
                }

                $.ajax({
                    url: "editar_profesionales/" + idlist + "",
                    dataType: "json",
                    success: function(result) {
                        $.each(result, function(i, items) {
                            $('#title-profesional-detalle').text(items.nombre);
                            $('#modal-profesional-detalle').modal({

                                backdrop: 'static',
                                keyboard: false
                            });
                            $('#modal-profesional-detalle').modal('show');
                        });
                    }

                }).fail(function(jqXHR, textStatus, errorThrown) {

                    if (jqXHR.status === 403) {

                        Manteliviano.notificaciones('No tienes permisos para realizar esta accion',
                            'Sistema Historias Clínicas', 'warning');
                    }
                });

            });
            //--------------------------------Tabla relacion profesional vs servicios----------------------------//
            //fill_datatable();
            function fill_datatable(idlistp = '') {
                var datatable1 = $('#tservicio').DataTable({
                    language: idioma_espanol,
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
                        url: "{{ route('relserviciovsprofesional') }}",
                        type: "get",
                        // data: {"idlist": procedimiento_idp}
                        data: {
                            id: idlistp
                        }
                    },
                    columns: [{
                            data: 'actionps',
                            orderable: false
                        },
                        {
                            data: 'cod_servicio',
                            name: 'cod_servicio'
                        },
                        {
                            data: 'nombre',
                            name: 'nombre'
                        },
                        {
                            data: 'codigo',
                            name: 'codigo'
                        },
                        {
                            data: 'Profesional',
                            name: 'Profesional'
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
                    ],
                });
            }

            //--------------------------------Tabla relacion profesional vs procedimiento----------------------------//
            function fill_tableproce(idlistp = '') {
                var datatable2 = $('#tprocedimiento').DataTable({
                    language: idioma_espanol,
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
                        url: "{{ route('procedimientovsprofesional') }}",
                        //type: "get",
                        // data: {"idlist": procedimiento_idp}
                        data: {
                            id: idlistp
                        }
                    },
                    columns: [{
                            data: 'actionpp',
                            orderable: false
                        },
                        {
                            data: 'cups',
                            name: 'cups'
                        },
                        {
                            data: 'Procedimiento',
                            name: 'Procedimiento'
                        },
                        {
                            data: 'codigo',
                            name: 'codigo'
                        },
                        {
                            data: 'nombre',
                            name: 'nombre'
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
                    ],
                });
            }

            //--------------------------------Tabla relacion profesional vs medicamento----------------------------//
            function fill_tablemedicamento(idlistp = '') {
                var datatable3 = $('#tmedicamento').DataTable({
                    language: idioma_espanol,
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
                        url: "{{ route('profesionalvsmedicamento') }}",
                        //type: "get",
                        // data: {"idlist": procedimiento_idp}
                        data: {
                            id: idlistp
                        }
                    },
                    columns: [{
                            data: 'actionpm',
                            orderable: false
                        },
                        {
                            data: 'cod_medicamento',
                            name: 'cod_medicamento'
                        },
                        {
                            data: 'medicamento',
                            name: 'medicamento'
                        },
                        {
                            data: 'codigo',
                            name: 'codigo'
                        },
                        {
                            data: 'Profesional',
                            name: 'Profesional'
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
                    ],
                });
            }

            //------------------------------------------------------Funciones de relaciones-----------------------------------------//

            //Función para abrir modal y prevenir el cierre de la relacion con los profesionales
            $(document).on('click', '.relacion_procedimiento', function() {

                $('#modal-procedimiento').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#modal-procedimiento').modal('show');
                $('#trelprocedimiento').DataTable().destroy();
                table_procedimiento();
            });

            //--------------------------------Tabla para cargar los procedimientos y hacer la relacion----------------------------//

            function table_procedimiento() {
                var trelprocedimiento = $('#trelprocedimiento').DataTable({
                    language: idioma_espanol,
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
                        url: "{{ route('relproceIndex') }}",
                        type: "get",
                    },
                    columns: [{
                            data: 'checkbox',
                            name: 'checkbox',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'cod_cups',
                            name: 'cod_cups'
                        },
                        {
                            data: 'nombre',
                            name: 'nombre'
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
                    ],
                });
            }

            //Función para abrir modal y prevenir el cierre de la relacion con los servicios
            $(document).on('click', '.relacion_servicio', function() {
                $('#modal-servicio').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#modal-servicio').modal('show');
                $('#trelservicio').DataTable().destroy();
                table_servicio();
            });

            //--------------------------------Tabla para cargar los servicios y hacer la relacion----------------------------//
            function table_servicio() {
                var trelservicio = $('#trelservicio').DataTable({
                    language: idioma_espanol,
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
                        url: "{{ route('relservicio_profesionalIndex') }}",
                        type: "get",
                    },
                    columns: [


                        {
                            data: 'checkbox',
                            name: 'checkbox',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'cod_servicio',
                            name: 'cod_servicio'
                        },
                        {
                            data: 'nombre',
                            name: 'nombre'
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


                        },
                        {

                            extend: 'pdfHtml5',
                            titleAttr: 'Exportar pdf',
                            className: "btn  btn-outline-secondary btn-sm"


                        }
                    ],
                });
            }

            //Función para abrir modal y prevenir el cierre de la relacion con los medicamento
            $(document).on('click', '.relacion_medicamento', function() {
                $('#modal-medicamento').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#modal-medicamento').modal('show');
                $('#trelmedicamento').DataTable().destroy();
                table_medicamento();
            });

            //--------------------------------Tabla para cargar los Medicamentos y hacer la relacion----------------------------//
            function table_medicamento() {
                var trelcontrato = $('#trelmedicamento').DataTable({
                    language: idioma_espanol,
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
                        url: "{{ route('relmedicamentoIndex') }}",
                        type: "get",
                    },
                    columns: [

                        {
                            data: 'checkbox',
                            name: 'checkbox',
                            orderable: false,
                            searchable: false

                        },
                        {
                            data: 'codigo',
                            name: 'codigo'
                        },
                        {
                            data: 'nombre',
                            name: 'nombre'
                        },
                        {
                            data: 'CUMS',
                            name: 'CUMS'
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
                    ],
                });
            }




            //Función para enviar los procedimientos seleccionados al controlador


            $(document).on('click', '#addp', function() {

                var profesional = idprofesional;

                var idp = [];
                if (profesional == '') {

                    Swal.fire({
                        target: document.getElementById('modal-procedimiento'),
                        title: 'No hay asociado ningun profesional',
                        icon: 'warning',
                        buttons: {
                            cancel: "Cerrar"

                        }
                    })

                } else {

                    Swal.fire({
                        target: document.getElementById('modal-procedimiento'),
                        title: "¿Estás seguro?",
                        text: "Estás por asignar ordenes",
                        icon: "success",
                        showCancelButton: true,
                        showCloseButton: true,
                        confirmButtonText: 'Aceptar',
                    }).then((result) => {
                        if (result.value) {
                            $('input[type=checkbox]:checked.case').each(function() {
                                idp.push($(this).val());
                            });

                            if (idp.length > 0) {

                                $.ajax({
                                    beforeSend: function() {
                                        $('.loader').css("visibility", "visible");
                                    },
                                    url: "{{ route('add_procedimiento') }}",
                                    method: 'post',
                                    data: {
                                        procedimiento_id: idp,
                                        profesional_id: profesional,

                                        "_token": $("meta[name='csrf-token']").attr(
                                            "content")

                                    },
                                    success: function(respuesta) {
                                        if (respuesta.mensaje = 'ok') {
                                            $('#modal-procedimiento').modal('hide');
                                            $('#tprocedimiento').DataTable().ajax
                                                .reload();
                                            Manteliviano.notificaciones(
                                                'Procedimientos relacionados correctamente',
                                                'Sistema Ips', 'success');
                                        } else if (respuesta.mensaje = 'ok1') {
                                            $('#modal-procedimiento').modal('hide');
                                            $('#tprocedimiento').DataTable().ajax
                                                .reload();
                                            Manteliviano.notificaciones(
                                                'Ya existe la realación',
                                                'Sistema Ips');
                                        }
                                    },
                                    complete: function() {
                                        $('.loader').css("visibility", "hide");
                                    }
                                });

                            } else {

                                Swal.fire({
                                    target: document.getElementById('modal-procedimiento'),
                                    title: 'Por favor seleccione un procedimiento del checkbox',
                                    icon: 'warning',
                                    buttons: {
                                        cancel: "Cerrar"

                    }
              })
            }
       }});
       }
    });






            //-- Eliminar Procedimiento de la relación

            $(document).on('click', '.eliminarpp', function() {
                var id = $(this).attr('id');

                var text = "Estás por retirar un Procedimiento"
                var url = "/profesionalvsprocedimiento/" + id;
                var method = 'delete';

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
                                "_token": $("meta[name='csrf-token']").attr("content")
                            },
                            dataType: "json",
                            success: function(data) {
                                if (data.success == 'ok3') {

                                    $('#tprocedimiento').DataTable().ajax.reload();
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Procedimiento ha sido retirado correctamente',
                                        showConfirmButton: false,
                                        timer: 1000

                                    })

                                }
                            }
                        });

                    }
                })

            });



            //Función para enviar los servicios seleccionados al controlador

            $(document).on('click', '#adds', function() {

                var profesional = idprofesional;

                var ids = [];
                if (profesional == '') {

                    Swal.fire({
                        target: document.getElementById('modal-servicio'),
                        title: 'No hay asociado ningun profesional',
                        icon: 'warning',
                        buttons: {
                            cancel: "Cerrar"

                        }
                    })
                }
        });

        //-- Eliminar Servicio de la relación

            $(document).on('click', '.eliminarps', function() {
                var id = $(this).attr('id');

                var text = "Estás por retirar un Servicio"
                var url = "/serviciovsprofesional/" + id;
                var method = 'delete';

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
                                "_token": $("meta[name='csrf-token']").attr("content")
                            },
                            dataType: "json",
                            success: function(data) {
                                if (data.success == 'ok1') {

                                    $('#tservicio').DataTable().ajax.reload();
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Servicio ha sido retirado correctamente',
                                        showConfirmButton: false,
                                        timer: 1000

                                    })

                            }
                        }
                    });

                }
            })

        });

        //-- Eliminar Medicamento de la relación

            $(document).on('click', '.eliminarpm', function() {
                var id = $(this).attr('id');

                var text = "Estás por retirar un Medicamento"
                var url = "/medicamentovsprofesional/" + id;
                var method = 'delete';

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
                                "_token": $("meta[name='csrf-token']").attr("content")
                            },
                            dataType: "json",
                            success: function(data) {
                                if (data.success == 'ok3') {

                                    $('#tmedicamento').DataTable().ajax.reload();
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Medicamento ha sido retirado correctamente',
                                        showConfirmButton: false,
                                        timer: 1000

                                    })

                                }
                            }
                        });

                    }
                })

            });

    });

//Función asignar y desasignar

            $("#selectallp").on('click', function() {
                $(".case").prop("checked", this.checked);
            });


            //Función asignar y desasignar procedimientos a relacionar

            $("#selectallm").on('click', function() {
                $(".casem").prop("checked", this.checked);
            });


            //Función asignar y desasignar procedimientos a relacionar

            $("#selectalls").on('click', function() {
                $(".cases").prop("checked", this.checked);
            });


            // Función para multimodal

            (function($, window) {
                'use strict';

                var MultiModal = function(element) {
                    this.$element = $(element);
                    this.modalCount = 0;
                };

                MultiModal.BASE_ZINDEX = 1040;

                MultiModal.prototype.show = function(target) {
                    var that = this;
                    var $target = $(target);
                    var modalIndex = that.modalCount++;

                    $target.css('z-index', MultiModal.BASE_ZINDEX + (modalIndex * 20) + 10);

                    // Bootstrap triggers the show event at the beginning of the show function and before
                    // the modal backdrop element has been created. The timeout here allows the modal
                    // show function to complete, after which the modal backdrop will have been created
                    // and appended to the DOM.
                    window.setTimeout(function() {
                        // we only want one backdrop; hide any extras
                        if (modalIndex > 0)
                            $('.modal-backdrop').not(':first').addClass('hidden');

                        that.adjustBackdrop();
                    });
                };

                MultiModal.prototype.hidden = function(target) {
                    this.modalCount--;

                    if (this.modalCount) {
                        this.adjustBackdrop();
                        // bootstrap removes the modal-open class when a modal is closed; add it back
                        $('body').addClass('modal-open');
                    }
                };

                MultiModal.prototype.adjustBackdrop = function() {
                    var modalIndex = this.modalCount - 1;
                    $('.modal-backdrop:first').css('z-index', MultiModal.BASE_ZINDEX + (modalIndex * 20));
                };

                function Plugin(method, target) {
                    return this.each(function() {
                        var $this = $(this);
                        var data = $this.data('multi-modal-plugin');

                        if (!data)
                            $this.data('multi-modal-plugin', (data = new MultiModal(this)));

                        if (method)
                            data[method](target);
                    });
                }

        $.fn.multiModal = Plugin;
        $.fn.multiModal.Constructor = MultiModal;

        $(document).on('show.bs.modal', function(e) {
            $(document).multiModal('show', e.target);
        });

        $(document).on('hidden.bs.modal', function(e) {
            $(document).multiModal('hidden', e.target);
        });
    }(jQuery, window));



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
