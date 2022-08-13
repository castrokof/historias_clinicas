@extends("theme.$theme.layout")

@section('titulo')
Documentos Financieros
@endsection
@section("styles")
<link href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}" rel="stylesheet" type="text/css" />
<link href="{{asset("assets/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("assets/$theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}" rel="stylesheet" type="text/css" />

<!-- <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('scripts')
<!-- <script src="{{asset("assets/pages/scripts/admin/usuario/crearuser.js")}}" type="text/javascript"></script> -->
<script src="{{ asset('assets/pages/scripts/admin/documentos/index.js') }}"></script>
@endsection

@section('contenido')
@include('admin.financiero.documentos.tablas.tablaIndexDocumentos')
@include('admin.financiero.documentos.modal.modalDocumentos')
@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/jquery-select2/select2.min.js")}}" type="text/javascript"></script>
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

        // Funcion para pintar en una talba los documentos creados
        var tdocumento = $('#tdocumento').DataTable({
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
                url: "{{ route('documento_financiero') }}",
            },
            columns: [{
                    data: 'action',
                    order: false,
                    searchable: false
                },
                {
                    data: 'cod_documentos'
                },
                {
                    data: 'nombre'
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

        $('#form-general1').on('submit', function(event) {
            event.preventDefault();
            var url = '';
            var method = '';
            var text = '';


            if ($('#action').val() == 'Add') {
                text = "Estás por crear un documento"
                url = "{{ route('guardar_doc_fin') }}";
                method = 'post';
            }

            if ($('#cod_documentos').val() == '' || $('#nombre').val() == '' || $('#estado').val() == '') {
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
                                    $('#modal-documentos').modal('hide');
                                    $('#tdocumento').DataTable().ajax.reload();
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Documento creado correctamente',
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
            ajaxRequest('documento_fin_estado', data);
        });

        // Función envío de datos para activar o desactivar

        function ajaxRequest(url, data) {
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(data) {

                    $('#tdocumento').DataTable().ajax.reload();
                    Manteliviano.notificaciones(data.respuesta, data.titulo, data.icon);
                }
            });
        }

        //Select para consultar los tipos de documentos
        $("#tipo_documento").select2({
            theme: "bootstrap",
            ajax: {
                url: "{{ route('tipo_documento')}}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(data) {

                            return {

                                text: data.cod_tipos_documento + "-" + data.nombre,
                                id: data.id_tipo_doc

                            }
                        })
                    };
                },
                cache: true
            }
        });


        // Funcion para editar el documento

        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: "/documento_financiero/" + id + "/editar",
                dataType: "json",
                success: function(data) {
                    $('#cod_documentos').val(data.result.cod_documentos);
                    $('#nombre').val(data.result.nombre);
                    $('#hidden_id').val(id);
                    //$('.card-title').text('Editar Documento');
                    $('#action_button').val('Edit');
                    $('#action').val('Edit');
                    $('#modal-documentos').modal('show');

                }


            }).fail(function(jqXHR, textStatus, errorThrown) {

                if (jqXHR.status === 403) {

                    Manteliviano.notificaciones('No tienes permisos para realizar esta accion', 'Sistema Historias Clínicas', 'warning');

                }
            });

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
    }
</script>


@endsection