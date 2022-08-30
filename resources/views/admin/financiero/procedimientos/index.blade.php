@extends("theme.$theme.layout")

@section('titulo')
Procedimientos
@endsection
@section('styles')
<link href="{{ asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css") }}" rel="stylesheet" type="text/css" />
<link href="{{asset("assets/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("assets/$theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}" rel="stylesheet" type="text/css" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" type="text/css" />


<link href="{{ asset('assets/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('scripts')
<script src="{{ asset('assets/pages/scripts/admin/procedimientos/index.js') }}"></script>
@endsection

@section('contenido')
@include('admin.financiero.procedimientos.tablas.tablaIndexProcedimientos')
@include('admin.financiero.procedimientos.modal.modalProcedimientos')
@include('admin.financiero.procedimientos.modal.modalProcDetalle')

<!-- Modal para relacionar los profesionales -->
@include('admin.financiero.procedimientos.modal.modalProcProfesional')
<!-- Modal para relacionar los servicios -->
@include('admin.financiero.procedimientos.modal.modalProcServicio')
<!-- Modal para relacionar los contratos -->
@include('admin.financiero.procedimientos.modal.modalProcContrato')

<!-- Modal que carga las tablas y los botones para realizar las relaciones -->
@include('admin.financiero.procedimientos.modal.modalProcDetalleIndex')

@endsection

@section('scriptsPlugins')
<script src="{{ asset("assets/$theme/plugins/datatables/jquery.dataTables.js") }}" type="text/javascript"></script>
<script src="{{ asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.js") }}" type="text/javascript"></script>
<script src="{{ asset("assets/$theme/plugins/datatables-responsive/js/dataTables.responsive.min.js") }}" type="text/javascript"></script>
<script src="{{asset("assets/js/jquery-select2/select2.min.js")}}" type="text/javascript"></script>
<script src="{{ asset('assets/js/jquery-select2/select2.min.js') }}" type="text/javascript"></script>
<!-- <script src="{{ asset('assets/js/gijgo-combined-1.9.13/js/gijgo.min.js') }}" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>


<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {

        // Funcion 2 para pintar con data table de financiero.procedimientos generales
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
                url: "{{ route('procedimientosIndex') }}",
            },
            columns: [{
                    data: 'action',
                    order: false,
                    searchable: false
                },
                {
                    data: 'cod_cups'
                },
                {
                    data: 'cod_alterno'
                },
                {
                    data: 'nombre'
                },
                {
                    data: 'descripcion'
                },
                {
                    data: 'valor_particular'
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


        // Función que envía los datos de procedimientos al controlador ademas controla los input con sweat alert2

        $('#form-general1').on('submit', function(event) {
            event.preventDefault();
            var url = '';
            var method = '';
            var text = '';


            if ($('#action').val() == 'Add') {
                text = "Estás por crear un procedimiento"
                url = "{{ route('guardar_procedimientos') }}";
                method = 'post';
            }

            if ($('#cod_cups').val() == '' || $('#nombre').val() == '' || $('#estado').val() == '') {
                Swal.fire({
                    title: "Debes de rellenar todos los campos del formulario",
                    text: "Sistema de Historias Clínicas",
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
            ajaxRequest('procedimiento-estado', data);
        });

        //Select para consultar los grupos para asociar al procedimiento
        $("#grupo_procedure").select2({
            theme: "bootstrap",
            ajax: {
                url: "{{ route('agrupaciones_proce')}}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(data) {

                            return {

                                text: data.codigo + " - " + data.nombre_grupo,
                                id: data.id_grupo

                            }
                        })
                    };
                },
                cache: true
            }
        });

        //Select para consultar las finalidades para asociar al procedimiento
        $("#finalidad_procedure").select2({
            theme: "bootstrap",
            ajax: {
                url: "{{ route('finalidad_proce')}}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(data) {

                            return {

                                text: data.finalidad + " - " + data.nombre,
                                id: data.id_finalidad

                            }
                        })
                    };
                },
                cache: true
            }
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

        var idprocedimiento;

        //Función para abrir detalle del registro

        $(document).on('click', '.listasDetalleAll', function() {

            var idlist = $(this).attr('id');
            var idlistp = $(this).attr('id');
            var idlistf = $(this).attr('id');
            idprocedimiento = $(this).attr('id');

            if (idlistp != '') {
                $('#tservicio').DataTable().destroy();
                fill_datatable(idlistp);
            }
            if (idlistf != '') {
                $('#tprofesional').DataTable().destroy();
                fill_tableprofe(idlistf);
            }
            if (idlistp != '') {
                $('#tcontrato').DataTable().destroy();
                fill_tablecontrato(idlistp);
            }

            $.ajax({
                url: "editar_procedimientos/" + idlist + "",
                dataType: "json",
                success: function(result) {
                    $.each(result, function(i, items) {
                        $('#title-procedimiento-detalle').text(items.nombre);
                        $('#modal-procedimiento-detalle').modal({

                            backdrop: 'static',
                            keyboard: false
                        });
                        $('#modal-procedimiento-detalle').modal('show');

                    });
                }

            }).fail(function(jqXHR, textStatus, errorThrown) {

                if (jqXHR.status === 403) {

                    Manteliviano.notificaciones('No tienes permisos para realizar esta accion',
                        'Sistema Historias Clínicas', 'warning');
                }
            });

        });
        //--------------------------------Tabla relacion procedimiento vs servicios----------------------------//

        function fill_datatable(idlistp = '') {
            var tservicio = $('#tservicio').DataTable({
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
                    url: "{{ route('relserviciovsprocedimiento')}}",
                    type: "get",
                    // data: {"idlist": procedimiento_idp}
                    data: {
                        id: idlistp
                    }
                },
                columns: [{
                        data: 'actionpt',
                        //orderable: false
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
                        data: 'cups',
                        name: 'cups'
                    },
                    {
                        data: 'Procedimiento',
                        name: 'Procedimiento'
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

        //--------------------------------Tabla relacion procedimiento vs profesionales----------------------------//
        function fill_tableprofe(idlistf = '') {
            var tprofesional = $('#tprofesional').DataTable({
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
                    url: "{{ route('profesionalvsprocedimiento')}}",
                    type: "get",
                    // data: {"idlist": procedimiento_idp}
                    data: {
                        id: idlistf
                    }
                },
                columns: [{
                        data: 'actionpt',
                        //orderable: false
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
                        data: 'cups',
                        name: 'cups'
                    },
                    {
                        data: 'Procedimiento',
                        name: 'Procedimiento'
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

        //--------------------------------Tabla relacion procedimiento vs contratos----------------------------//
        function fill_tablecontrato(idlistp = '') {
            var datatable2 = $('#tcontrato').DataTable({
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
                    url: "{{ route('contratovsprocedimiento')}}",
                    type: "get",
                    // data: {"idlist": procedimiento_idp}
                    data: {
                        id: idlistp
                    }
                },
                columns: [{
                        data: 'actionpt',
                        //orderable: false
                    },
                    {
                        data: 'contrato',
                        name: 'contrato'
                    },
                    {
                        data: 'nombre',
                        name: 'nombre'
                    },
                    {
                        data: 'precio',
                        name: 'precio'
                    },
                    {
                        data: 'cups',
                        name: 'cups'
                    },
                    {
                        data: 'Procedimiento',
                        name: 'Procedimiento'
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
        $(document).on('click', '.relacion_profesional', function() {

            $('#modal-profesional').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#modal-profesional').modal('show');
            $('#trelprofesional').DataTable().destroy();
            table_profesional();
        });

        //--------------------------------Tabla para cargar los profesionales y hacer la relacion----------------------------//

        function table_profesional() {
            var datatablep = $('#trelprofesional').DataTable({
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
                    url: "{{ route('relprofeIndex')}}",
                    type: "get",
                },
                columns: [{
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
                        data: 'nombre_profesional',
                        name: 'nombre_profesional'
                    },
                    {
                        data: 'nombre_especialidad',
                        name: 'nombre_especialidad'
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
            var datatable2 = $('#trelservicio').DataTable({
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
                    url: "{{ route('proce_servicio')}}",
                    type: "get",
                },
                columns: [{
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

        //Función para abrir modal y prevenir el cierre de la relacion con los contratos
        $(document).on('click', '.relacion_contrato', function() {
            $('#modal-contrato').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#modal-contrato').modal('show');
            $('#trelcontrato').DataTable().destroy();
            table_contrato();
        });

        //--------------------------------Tabla para cargar los contratos y hacer la relacion----------------------------//
        function table_contrato() {
            var trelcontrato = $('#trelcontrato').DataTable({
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
                    url: "{{ route('relcontratoIndex')}}",
                    type: "get",
                },
                columns: [{
                        data: 'checkbox',
                        name: 'checkbox',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'contrato',
                        name: 'contrato'
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

        //Función para enviar los profesionales seleccionados al controlador
        $(document).on('click', '#addp', function() {

            var procedimiento = idprocedimiento;

            var idp = [];
            if (procedimiento == '') {

                Swal.fire({
                    target: document.getElementById('modal-profesional'),
                    title: 'No hay asociado ningun profesional',
                    icon: 'warning',
                    buttons: {
                        cancel: "Cerrar"

                    }
                })

            } else {

                Swal.fire({
                    target: document.getElementById('modal-profesional'),
                    title: "¿Estás seguro?",
                    text: "Estás por asignar profesional",
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
                                url: "{{ route('add_profesional') }}",
                                method: 'post',
                                data: {
                                    profesional_id: idp,
                                    procedimiento_id: procedimiento,

                                    "_token": $("meta[name='csrf-token']").attr(
                                        "content")

                                },
                                success: function(respuesta) {
                                    if (respuesta.mensaje = 'ok') {
                                        $('#modal-profesional').modal('hide');
                                        $('#tprofesional').DataTable().ajax
                                            .reload();
                                        Manteliviano.notificaciones(
                                            'Profesionales relacionados correctamente',
                                            'Sistema Ips', 'success');
                                    } else if (respuesta.mensaje = 'ok1') {
                                        $('#modal-profesional').modal('hide');
                                        $('#tprofesional').DataTable().ajax
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
                                target: document.getElementById('modal-profesional'),
                                title: 'Por favor seleccione un profesional del checkbox',
                                icon: 'warning',
                                buttons: {
                                    cancel: "Cerrar"

                                }
                            })
                        }
                    }
                });
            }
        });

        //-- Eliminar Profesional de la relación
        $(document).on('click', '.eliminarpp', function() {
            var id = $(this).attr('id');

            var text = "Estás por retirar un profesional"
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

                                $('#tprofesional').DataTable().ajax.reload();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Profesional ha sido retirado correctamente',
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

            var procedimiento = idprocedimiento;

            var ids = [];
            if (procedimiento == '') {

                Swal.fire({
                    target: document.getElementById('modal-servicio'),
                    title: 'No hay asociado ningun servicios',
                    icon: 'warning',
                    buttons: {
                        cancel: "Cerrar"

                    }
                })

            } else {

                Swal.fire({
                    target: document.getElementById('modal-servicio'),
                    title: "¿Estás seguro?",
                    text: "Estás por asociar un/unos servicio/s",
                    icon: "success",
                    showCancelButton: true,
                    showCloseButton: true,
                    confirmButtonText: 'Aceptar',
                }).then((result) => {
                    if (result.value) {
                        $('input[type=checkbox]:checked.cases').each(function() {
                            ids.push($(this).val());
                        });

                        if (ids.length > 0) {

                            $.ajax({
                                beforeSend: function() {
                                    $('.loader').css("visibility", "visible");
                                },
                                url: "{{ route('add_servicio_proce') }}",
                                method: 'post',
                                data: {
                                    servicio_id: ids,
                                    procedimiento_id: procedimiento,

                                    "_token": $("meta[name='csrf-token']").attr(
                                        "content")

                                },
                                success: function(respuesta) {
                                    if (respuesta.mensaje = 'ok') {
                                        $('#modal-servicio').modal('hide');
                                        $('#tservicio').DataTable().ajax.reload();
                                        Manteliviano.notificaciones(
                                            'Servicios relacionados correctamente',
                                            'Sistema Ips', 'success');

                                    } else if (respuesta.mensaje = 'ok1') {
                                        $('#modal-servicio').modal('hide');
                                        $('#tservicio').DataTable().ajax.reload();
                                        Manteliviano.notificaciones(
                                            'Ya existe la relación',
                                            'Sistema Ips');
                                    }
                                },
                                complete: function() {
                                    $('.loader').css("visibility", "hide");
                                }
                            });

                        } else {

                            Swal.fire({
                                target: document.getElementById('modal-servicio'),
                                title: 'Por favor seleccione un servicio del checkbox',
                                icon: 'warning',
                                buttons: {
                                    cancel: "Cerrar"

                                }
                            })
                        }
                    }
                });
            }
        });

        //-- Eliminar Servicio de la relación

        $(document).on('click', '.eliminarss', function() {
            var id = $(this).attr('id');

            var text = "Estás por retirar un servicio"
            var url = "/serviciovsprocedimiento/" + id;
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
                            if (data.success == 'ok4') {

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

        //Función para enviar los contratos seleccionados al controlador

        $(document).on('click', '#addcont', function() {

            var procedimiento = idprocedimiento;

            var idm = [];
            if (procedimiento == '') {

                Swal.fire({
                    target: document.getElementById('modal-contrato'),
                    title: 'No hay asociado ningun contrato',
                    icon: 'warning',
                    buttons: {
                        cancel: "Cerrar"

                    }
                })

            } else {

                Swal.fire({
                    target: document.getElementById('modal-contrato'),
                    title: "¿Estás seguro?",
                    text: "Estás por asociar un/unos contrato/s",
                    icon: "success",
                    showCancelButton: true,
                    showCloseButton: true,
                    confirmButtonText: 'Aceptar',
                }).then((result) => {
                    if (result.value) {
                        $('input[type=checkbox]:checked.casec').each(function() {
                            idm.push($(this).val());
                        });

                        if (idm.length > 0) {

                            $.ajax({
                                beforeSend: function() {
                                    $('.loader').css("visibility", "visible");
                                },
                                url: "{{ route('add_contrato') }}",
                                method: 'post',
                                data: {
                                    contrato_id: idm,
                                    procedimiento_id: procedimiento,

                                    "_token": $("meta[name='csrf-token']").attr(
                                        "content")

                                },
                                success: function(respuesta) {
                                    if (respuesta.mensaje = 'ok') {
                                        $('#modal-contrato').modal('hide');
                                        $('#tcontrato').DataTable().ajax.reload();
                                        Manteliviano.notificaciones(
                                            'Servicios relacionados correctamente',
                                            'Sistema Ips', 'success');
                                    } else if (respuesta.mensaje = 'ok1') {
                                        $('#modal-contrato').modal('hide');
                                        $('#tcontrato').DataTable().ajax.reload();
                                        Manteliviano.notificaciones(
                                            'Ya existe la relación',
                                            'Sistema Ips');
                                    }
                                },
                                complete: function() {
                                    $('.loader').css("visibility", "hide");
                                }
                            });

                        } else {

                            Swal.fire({
                                target: document.getElementById('modal-contrato'),
                                title: 'Por favor seleccione un medicamento del checkbox',
                                icon: 'warning',
                                buttons: {
                                    cancel: "Cerrar"

                                }
                            })
                        }
                    }
                });
            }
        });

        //-- Eliminar Contrato de la relación

        $(document).on('click', '.eliminarco', function() {
            var id = $(this).attr('id');

            var text = "Estás por retirar un servicio"
            var url = "/contratovsprocedimiento/" + id;
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
                            if (data.success == 'ok9') {

                                $('#tcontrato').DataTable().ajax.reload();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Contrato ha sido retirado correctamente',
                                    showConfirmButton: false,
                                    timer: 1000

                                })

                            }
                        }
                    });

                }
            })

        });

        //Función asignar y desasignar profesional a relacionar

        $("#selectallp").on('click', function() {
            $(".case").prop("checked", this.checked);
        });

        //Función asignar y desasignar servicio a relacionar

        $("#selectalls").on('click', function() {
            $(".cases").prop("checked", this.checked);
        });

        //Función asignar y desasignar contrato a relacionar

        $("#selectallc").on('click', function() {
            $(".casec").prop("checked", this.checked);
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
    }
</script>


@endsection