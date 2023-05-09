@extends("theme.$theme.layout")

@section('titulo')
Contratos
@endsection
@section('styles')
<link href="{{ asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css") }}" rel="stylesheet" type="text/css" />
<link href="{{asset("assets/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("assets/$theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}" rel="stylesheet" type="text/css" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" type="text/css" />

<!-- <link href="{{ asset('assets/js/gijgo-combined-1.9.13/css/gijgo.min.css') }}" rel="stylesheet" type="text/css" /> -->
<link href="{{ asset('assets/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
<script src="{{ asset('assets/pages/scripts/admin/contratos/index.js') }}"></script>
@endsection

@section('contenido')
@include('admin.financiero.contratos.tablas.tablaIndexContratos')
@include('admin.financiero.contratos.modal.modalContratos')
@include('admin.financiero.contratos.modal.modalContDetalle')
@include('admin.financiero.contratos.modal.modalCont_Edit_Med')

<!-- Modal para relacionar los EPS EMPRESAS -->
@include('admin.financiero.contratos.modal.modalContEps')
<!-- Modal para relacionar los procedimientos -->
@include('admin.financiero.contratos.modal.modalContProcedimiento')
<!-- Modal para relacionar los servicios -->
@include('admin.financiero.contratos.modal.modalContServicio')
<!-- Modal para relacionar los medicamentos -->
@include('admin.financiero.contratos.modal.modalContMedicamento')
<!-- Modal para relacionar las sedes -->
@include('admin.financiero.contratos.modal.modalContSedes')

<!-- Modal que carga las tablas y los botones para realizar las relaciones -->
@include('admin.financiero.contratos.modal.modalContDetalleIndex')

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

        // Funcion 2 para pintar con data table tabla de financiero.contratos generales
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
                url: "{{ route('contratosIndex') }}",
            },
            columns: [{
                    data: 'action',
                    order: false,
                    searchable: false
                },
                {
                    data: 'contrato'
                },
                {
                    data: 'nombre'
                },
                {
                    data: 'tipo_contrato'
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


        // Función que envía los datos de contratos al controlador ademas controla los input con sweat alert2

        $('#form-general1').on('submit', function(event) {
            event.preventDefault();
            var url = '';
            var method = '';
            var text = '';


            if ($('#action').val() == 'Add') {
                text = "Estás por crear un contrato"
                url = "{{ route('guardar_contratos') }}";
                method = 'post';
            }
            // console.log("#contrato");
            // console.log("#nombre");
            if ($('#contrato').val() == '' || $('#nombre').val() == '' || $('#tipo_contrato').val() == '' || $('#estado').val() == '') {
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
                                    $('#modal-contratos').modal('hide');
                                    $('#listasGeneral').DataTable().ajax.reload();
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Contrato creado correctamente',
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
            ajaxRequest('contrato-estado', data);
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

        var idcontrato;


        //Función para abrir detalle del registro

        $(document).on('click', '.listasDetalleAll', function() {

            var idlist = $(this).attr('id');
            var idlistp = $(this).attr('id');
            var idlistf = $(this).attr('id');
            idcontrato = $(this).attr('id');

            if (idlistp != '') {
                $('#tservicio').DataTable().destroy();
                fill_datatable(idlistp);
            }
            if (idlistf != '') {
                $('#tepsempresa').DataTable().destroy();
                fill_tableeps(idlistf);
            }
            if (idlistp != '') {
                $('#tprocedimiento').DataTable().destroy();
                fill_tableproce(idlistp);
            }
            if (idlistp != '') {
                $('#tmed').DataTable().destroy();
                fill_tmed(idlistp);
            }

            $.ajax({
                url: "editar_contratos/" + idlist + "",
                dataType: "json",
                success: function(result) {
                    $.each(result, function(i, items) {
                        $('#title-contrato-detalle').text(items.nombre);
                        $('#modal-contrato-detalle').modal({

                            backdrop: 'static',
                            keyboard: false
                        });
                        $('#modal-contrato-detalle').modal('show');

                    });
                }

            }).fail(function(jqXHR, textStatus, errorThrown) {

                if (jqXHR.status === 403) {

                    Manteliviano.notificaciones('No tienes permisos para realizar esta accion',
                        'Sistema Historias Clínicas', 'warning');
                }
            });

        });
        //--------------------------------Tabla relacion contrato vs servicios----------------------------//

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
                    url: "{{ route('relserviciovsContrato')}}",
                    type: "get",
                    // data: {"idlist": procedimiento_idp}
                    data: {
                        id: idlistp
                    }
                },
                columns: [{
                        data: 'actionsr',
                        //orderable: false
                    },
                    {
                        data: 'cod_servicio',
                        name: 'cod_servicio'
                    },
                    {
                        data: 'Servicio',
                        name: 'Servicio'
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

        //--------------------------------Tabla relacion contrato vs eps----------------------------//
        function fill_tableeps(idlistf = '') {
            var tepsempresa = $('#tepsempresa').DataTable({
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
                    url: "{{ route('contratovsEPS')}}",
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
                        data: 'EPS',
                        name: 'EPS'
                    },
                    {
                        data: 'Empresa',
                        name: 'Empresa'
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

        //--------------------------------Tabla relacion contrato vs procedimiento----------------------------//
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
                    url: "{{ route('contrato-procedimiento')}}",
                    //type: "get",
                    // data: {"idlist": procedimiento_idp}
                    data: {
                        id: idlistp
                    }
                },
                columns: [{
                        data: 'actioncp',
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

        //--------------------------------Tabla relacion contrato vs medicamento----------------------------//
        function fill_tmed(idlistp = '') {
            var datatable2 = $('#tmed').DataTable({
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
                    url: "{{ route('contrato-medicamento')}}",
                    //type: "get",
                    // data: {"idlist": procedimiento_idp}
                    data: {
                        id: idlistp
                    }
                },
                columns: [{
                        data: 'actionmd',
                        orderable: false
                    },
                    {
                        data: 'codigo',
                        name: 'codigo'
                    },
                    {
                        data: 'Medicamento',
                        name: 'Medicamento'
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


        //------------------------------------------------------Funciones de relaciones-----------------------------------------//

        //Función para abrir modal y prevenir el cierre de la relacion con las EPS
        $(document).on('click', '.relacion_eps', function() {

            $('#modal-eps').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#modal-eps').modal('show');
            $('#treleps').DataTable().destroy();
            table_eps();
        });

        //--------------------------------Tabla para cargar las EPS y hacer la relacion----------------------------//

        function table_eps() {
            var datatablep = $('#treleps').DataTable({
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
                    url: "{{ route('RelEpsIndex')}}",
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
                    url: "{{ route('relservicioIndex')}}",
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
                    url: "{{ route('rel_cont_procedimiento')}}",
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
                    },
                    {
                        data: 'valor_particular',
                        name: 'valor_particular'
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
                    url: "{{ route('rel_med_contrato')}}",
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
        $(document).on('click', '#addeps', function() {

            var contrato = idcontrato;

            var idp = [];
            if (contrato == '') {

                Swal.fire({
                    target: document.getElementById('modal-eps'),
                    title: 'No hay asociada ninguna EPS',
                    icon: 'warning',
                    buttons: {
                        cancel: "Cerrar"

                    }
                })

            } else {

                Swal.fire({
                    target: document.getElementById('modal-eps'),
                    title: "¿Estás seguro?",
                    text: "Estás por asignar una EPS",
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
                                url: "{{ route('add_eps')}}",
                                method: 'post',
                                data: {
                                    eps_id: idp,
                                    contrato_id: contrato,

                                    "_token": $("meta[name='csrf-token']").attr(
                                        "content")

                                },
                                success: function(respuesta) {
                                    if (respuesta.mensaje = 'ok') {
                                        $('#modal-eps').modal('hide');
                                        $('#tepsempresa').DataTable().ajax.reload();
                                        Manteliviano.notificaciones('EPS relacionadas correctamente', 'Sistema Ips', 'success');
                                    } else if (respuesta.mensaje = 'ok1') {
                                        $('#modal-eps').modal('hide');
                                        $('#tepsempresa').DataTable().ajax.reload();
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
                                target: document.getElementById('modal-eps'),
                                title: 'Por favor seleccione una EPS del checkbox',
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

        //-- Eliminar EPS de la relación

        $(document).on('click', '.eliminarce', function() {
            var id = $(this).attr('id');

            var text = "Estás por retirar un profesional"
            var url = "/contratovsEPS/" + id;
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

                                $('#tepsempresa').DataTable().ajax.reload();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'EPS ha sido retirada correctamente',
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

            var contrato = idcontrato;

            var ids = [];
            if (contrato == '') {

                Swal.fire({
                    target: document.getElementById('modal-servicio'),
                    title: 'No hay asociado ningun servicio',
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
                                url: "{{ route('add_servicio_2') }}",
                                method: 'post',
                                data: {
                                    servicio_id: ids,
                                    contrato_id: contrato,

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
            var url = "/serviciovscontrato/" + id;
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
                            if (data.success == 'ok2') {

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

        //Función para enviar los procedimientos seleccionados al controlador
        $(document).on('click', '#addpr', function() {

            var contrato = idcontrato;
            /* console.log(typeof(valor_particular)); */

            var idp = [];
            if (contrato == '') {

                Swal.fire({
                    target: document.getElementById('modal-procedimiento'),
                    title: 'No hay asociado ningun contrato',
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
                        $('input[type=checkbox]:checked.casepr').each(function() {
                            idp.push($(this).val());
                        });

                        if (idp.length > 0) {

                            $.ajax({
                                beforeSend: function() {
                                    $('.loader').css("visibility", "visible");
                                },
                                url: "{{ route('add_procedimiento_2') }}",
                                method: 'post',
                                data: {
                                    procedimiento_id: idp,
                                    contrato_id: contrato,


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
                    }
                });
            }
        });


        //-- Eliminar Procedimiento de la relación

        $(document).on('click', '.eliminarcp', function() {
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

        //Función para enviar los medicamentos seleccionados al controlador

        $(document).on('click', '#addm', function() {

            var contrato = idcontrato;

            var idm = [];
            if (contrato == '') {

                Swal.fire({
                    target: document.getElementById('modal-medicamento'),
                    title: 'No hay asociado ningun medicamento',
                    icon: 'warning',
                    buttons: {
                        cancel: "Cerrar"

                    }
                })

            } else {

                Swal.fire({
                    target: document.getElementById('modal-medicamento'),
                    title: "¿Estás seguro?",
                    text: "Estás por asociar un/unos medicamento/s",
                    icon: "success",
                    showCancelButton: true,
                    showCloseButton: true,
                    confirmButtonText: 'Aceptar',
                }).then((result) => {
                    if (result.value) {
                        $('input[type=checkbox]:checked.caseme').each(function() {
                            idm.push($(this).val());
                        });

                        if (idm.length > 0) {

                            $.ajax({
                                beforeSend: function() {
                                    $('.loader').css("visibility", "visible");
                                },
                                url: "{{ route('add_medicamento_2') }}",
                                method: 'post',
                                data: {
                                    medicamento_id: idm,
                                    contrato_id: contrato,

                                    "_token": $("meta[name='csrf-token']").attr(
                                        "content")

                                },
                                success: function(respuesta) {
                                    if (respuesta.mensaje = 'ok') {
                                        $('#modal-medicamento').modal('hide');
                                        $('#tmed').DataTable().ajax.reload();
                                        Manteliviano.notificaciones(
                                            'medicamento relacionados correctamente',
                                            'Sistema Ips', 'success');
                                    } else if (respuesta.mensaje = 'ok1') {
                                        $('#modal-medicamento').modal('hide');
                                        $('#tmed').DataTable().ajax.reload();
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
                                target: document.getElementById('modal-medicamento'),
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

        //-- Eliminar Medicamento de la relación

        $(document).on('click', '.eliminarmd', function() {
            var id = $(this).attr('id');

            var text = "Estás por retirar un servicio"
            var url = "/contratovsmedicamento/" + id;
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
                            if (data.success == 'ok5') {

                                $('#tmed').DataTable().ajax.reload();
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

        /* Funciónes para asignar y desasignar las relaciones de los contratos con EPS */

        $("#selectallp").on('click', function() {
            $(".case").prop("checked", this.checked);
        });

        /* Funciónes para asignar y desasignar las relaciones de los contratos con Servicios */

        $("#selectalls").on('click', function() {
            $(".cases").prop("checked", this.checked);
        });

        /* Funciónes para asignar y desasignar las relaciones de los contratos con Procedimientos */

        $("#selectallpr").on('click', function() {
            $(".casepr").prop("checked", this.checked);
        });

        /* Funciónes para asignar y desasignar las relaciones de los contratos con Medicamentos */

        $("#selectallme").on('click', function() {
            $(".caseme").prop("checked", this.checked);
        });


        // Funcion para editar la relacion del Procedimiento para agregar el valor

        $(document).on('click', '.editp', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: "/cont_proce/" + id + "/editar",
                dataType: "json",
                success: function(data) {
                    $('#nombre_n').val(data.result.nombre_c);
                    $('#cod_cups').val(data.result.cups);
                    $('#procedimiento_n').val(data.result.Procedimiento);
                    $('#valor').val(data.result.valor);
                    $('#hidden_id').val(id);
                    $('.card-title').text('Editar Relación');
                    $('#action_button').val('Edit');
                    $('#action').val('Edit');
                    $('#modal-u').modal('show');

                }


            }).fail(function(jqXHR, textStatus, errorThrown) {

                if (jqXHR.status === 403) {

                    Manteliviano.notificaciones('No tienes permisos para realizar esta accion', 'Sistema Historias Clínicas', 'warning');

                }
            });

        });

        $('#form-general').on('submit', function(event) {
            event.preventDefault();
            var url = '';
            var method = '';
            var text = '';

            if ($('#action').val() == 'Add') {
                text = "Estás por crear un País"
                url = "{{route('guardar_pais')}}";
                method = 'post';
            }

            if ($('#action').val() == 'Edit') {
                text = "Estás por actualizar un País"
                var updateid = $('#hidden_id').val();
                url = "/cont_proce/" + updateid;
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
                                    '<div class="alert alert-danger alert-dismissible">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                                    '<h5><i class="icon fas fa-ban"></i> Alerta! Verifica los siguientes datos: </h5>';

                                for (var count = 0; count < data.errors.length; count++) {
                                    html += '<p>' + data.errors[count] + '<p>';
                                }
                                html += '</div>';
                            }

                            if (data.success == 'ok') {
                                $('#form-general')[0].reset();
                                $('#modal-u').modal('hide');
                                $('#tprocedimiento').DataTable().ajax.reload();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Relación creado correctamente',
                                    showConfirmButton: false,
                                    timer: 1500

                                })


                            } else if (data.success == 'ok1') {
                                $('#form-general')[0].reset();
                                $('#modal-u').modal('hide');
                                $('#tprocedimiento').DataTable().ajax.reload();
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Relación actualizada correctamente',
                                    showConfirmButton: false,
                                    timer: 1500

                                })


                            }
                            $('#form_result').html(html)
                        }


                    });
                }
            });


        });

        // Funcion para editar la relacion del Medicamento para agregar el valor

        $(document).on('click', '.editm', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: "/cont_medicamento/" + id + "/editar",
                dataType: "json",
                success: function(data) {
                    $('#nombre_med').val(data.result.nombre_contrato);
                    $('#med_c').val(data.result.codigo_med);
                    $('#medicamento_n').val(data.result.Medicamento);
                    $('#valor').val(data.result.valor);
                    $('#hidden_id').val(id);
                    $('.card-title').text('Editar Relación');
                    $('#action_button').val('Editm');
                    $('#action').val('Editm');
                    $('#modal-med').modal('show');

                }


            }).fail(function(jqXHR, textStatus, errorThrown) {

                if (jqXHR.status === 403) {

                    Manteliviano.notificaciones('No tienes permisos para realizar esta accion', 'Sistema Historias Clínicas', 'warning');

                }
            });

        });

        $('#form-general').on('submit', function(event) {
            event.preventDefault();
            var url = '';
            var method = '';
            var text = '';

            if ($('#action').val() == 'Editm') {
                text = "Estás por actualizar un Medicamento en la relación"
                var updateid = $('#hidden_id').val();
                url = "/cont_medicamento/" + updateid;
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
                                    '<div class="alert alert-danger alert-dismissible">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                                    '<h5><i class="icon fas fa-ban"></i> Alerta! Verifica los siguientes datos: </h5>';

                                for (var count = 0; count < data.errors.length; count++) {
                                    html += '<p>' + data.errors[count] + '<p>';
                                }
                                html += '</div>';
                            }

                            if (data.success == 'ok1') {
                                $('#form-general')[0].reset();
                                $('#modal-med').modal('hide');
                                $('#tmed').DataTable().ajax.reload();
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Relación actualizada correctamente',
                                    showConfirmButton: false,
                                    timer: 1500

                                })


                            }
                            $('#form_result').html(html)
                        }


                    });
                }
            });


        });

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
