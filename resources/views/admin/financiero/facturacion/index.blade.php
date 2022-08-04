@extends("theme.$theme.layout")

@section('titulo')
Facturación
@endsection
@section('styles')
<link href="{{ asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
<script src="{{ asset('assets/pages/scripts/admin/usuario/crearuser.js') }}" type="text/javascript"></script>

@endsection

@section('contenido')
@include('admin.financiero.facturacion.modal.modalFactura')
@include('admin.financiero.facturacion.modal.modalFacturaProcedimiento')


@endsection


@section('scriptsPlugins')
<script src="{{ asset("assets/$theme/plugins/datatables/jquery.dataTables.js") }}" type="text/javascript"></script>
<script src="{{ asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.js") }}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/jquery-select2/select2.min.js') }}" type="text/javascript"></script>


<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {


        $('#agregar_cups').click(function() {
            $('#form-general')[0].reset();
            $('.card-title').text('Agregar Procedimiento');
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

            if ($('#action').val() == 'Add') {
                text = "Estás por crear una EPS"
                url = "{{ route('guardar_eps_empresas') }}";
                method = 'post';
            }
            if ($('#action').val() == 'Edit') {
                text = "Estás por actualizar una EPS"
                var updateid = $('#hidden_id').val();
                url = "/eps_empresas/" + updateid;
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
                                    '<h5><i class="icon fas fa-ban"></i> Mensaje fidem</h5>';

                                for (var count = 0; count < data.errors
                                    .length; count++) {
                                    html += '<p>' + data.errors[count] + '<p>';
                                }
                                html += '</div>';
                            }

                            if (data.success == 'ok') {
                                $('#form-general')[0].reset();
                                $('#modal-u').modal('hide');
                                //$('#modal-n').modal('hide');
                                $('#eps').DataTable().ajax.reload();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'EPS creada correctamente',
                                    showConfirmButton: false,
                                    timer: 1500

                                })


                            } else if (data.success == 'ok1') {
                                $('#form-general')[0].reset();
                                $('#modal-u').modal('hide');
                                /* $('#modal-n').modal('hide'); */
                                $('#eps').DataTable().ajax.reload();
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'EPS actualizada correctamente',
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


        // Callback para filtrar el paciente
        $('#buscarp').click(function() {

            const document = $('#key').val();

            if (document != '') {

                fill_resumen(document);


            } else {

                Swal.fire({
                    title: 'Debes digitar un documento valido',
                    icon: 'warning',
                    buttons: {
                        cancel: "Cerrar"

                    }
                })
            }

        });



        function fill_resumen(document = '') {

            $('#form-general1')[0].reset();

            $.ajax({
                url: "{{ route('pacientefill') }}",
                data: {
                    document: document
                },
                dataType: "json",
                success: function(data) {
                    if (data.pacientes == null) {
                        Manteliviano.notificaciones('Paciente no encontrado', 'Sistema Historias Clínicas', 'warning');
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
                            $("#edad").val(paciente.edad);
                            $("#pais_id").val(paciente.pais_id).trigger('change.select2');
                            $("#ciudad").val(paciente.ciudad);
                            $("#direccion").val(paciente.direccion);
                            $("#celular").val(paciente.celular);
                            $("#telefono").val(paciente.telefono);
                            $("#correo").val(paciente.correo);
                            $("#plan").val(paciente.plan);
                            $("#codigo_n").val(paciente.codigo_n);
                        });
                    }

                }
            });
        }


        // Agregar filas a tabla para guardar
        $('#addfila').click(function() {

            const total = parseFloat($('#cantidad').val() * $('#valor').val());

            $('#tcups> tbody:last-child')
                .append(
                    '<tr><td><button type="button" name="eliminar" id="eliminar" class = "btn-float  bg-gradient-danger btn-sm tooltipsC" title="eliminar">' +
                    '<i class="fas fa-trash"></i></button></td>' +
                    '</td>' +
                    '<td>' + $('#profesional').val() + '</td>' +
                    '<td>' + $('#servicio').val() + '</td>' +
                    '<td>' + $('#cod_cups').val() + '</td>' +
                    '<td>' + $('#cod_cups').val() + '</td>' +
                    '<td>' + $('#contrato').val() + '</td>' +
                    '<td>' + $('#cantidad').val() + '</td>' +
                    '<td>' + $('#valor').val() + '</td>' +
                    '<td>' + total + '</td></tr>'

                );


        });

        // eliminar filas de tabla para guardar

        $("#tcups").on("click", "#eliminar", function() {
            $(this).closest("tr").remove();
        });



    });

    var idioma_espanol = {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
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