@extends("theme.$theme.layout")

@section('titulo')
    Facturación
@endsection
@section('styles')
    <link href="{{ asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css") }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"
        rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css"
        rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <script src="{{ asset('assets/pages/scripts/admin/usuario/crearuser.js') }}" type="text/javascript"></script>
    {{-- <script>
  $(document).ready(function() {

    $('#key').on('keyup', function() {
      var key = $(this).val();
      var dataString = 'key=' + key;
      $.ajax({
        type: "GET",
        //url: "/paciente/" + key + "/buscarp",
        url: "{{ route('pacientefact')}}",
data: dataString,
//dataType: "json",
success: function(data) {
$('#pnombre').val(data.result.pnombre);
$('#snombre').val(data.result.snombre);
$('#papellido').val(data.result.papellido);
$('#sapellido').val(data.result.sapellido);
$('#tipo_documento').val(data.result.tipo_documento);
$('#documento').val(data.result.documento);
$('#edad').val(data.result.edad);
$('#ciudad').val(data.result.ciudad);
$('#direccion').val(data.result.direccion);
$('#correo').val(data.result.correo);
$('#celular').val(data.result.celular);
$('#telefono').val(data.result.telefono);
$('#eps').val(data.result.eps);
$('#sexo').val(data.result.sexo);
$('#plan').val(data.result.plan);
$('#Ocupacion').val(data.result.Ocupacion);
$('#observacion').val(data.result.observacion);
$('#hidden_id').val(id);
}
});
});
});
</script> --}}
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-error')
            @include('includes.form-mensaje')
            <div class="card card-info">
                <div class="card-header with-border">
                    <h3 class="card-title-1">Facturación Ambulatoria</h3>
                    <div class="card-tools pull-right">
                    </div>
                </div>
                <div class="x_panel">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="input-group input-group col-lg-3">
                                <input type="search" name="key" id="key" class="form-control form-control-mb"
                                    placeholder="Buscar paciente digite documento....">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-mb btn-default" id="buscarp">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>

                            {{-- <div class="input-group input-group-sm">
                                    <input type="text" class="form-control">
                                    <span class="input-group-append">
                                    <button type="button" class="btn btn-info btn-flat">Go!</button>
                                    </span>
                                    </div> --}}
                            {{-- <div class="input-group col-lg-2">
                                <input class="search_query form-control" type="text" name="key" id="key"
                                    placeholder="Buscar..." required>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-info btn-flat"><i
                                            class="fa fa-search"></i></button>
                                </span>
                            </div> --}}
                        </div>

                        <form id="form-general1" class="form-horizontal" method="POST">
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label for="documento" class="col-xs-4 control-label ">Historia</label>
                                    <input type="text" name="documento" id="documento" class="form-control" readonly>
                                    <!-- <select name="documento" id="paciente_id" class="form-control" style="width: 100%;"  required>
                              </select> -->
                                </div>
                                <div class="col-lg-1">
                                    <label for="tipo_documento" class="col-xs-4 control-label ">Tipo ID</label>
                                    <input name="tipo_documento" id="tipo_documento" class="form-control select2bs4"
                                        type="text" readonly>
                                </div>
                                <div class="col-lg-2">
                                    <label for="pnombre" class="col-xs-4 control-label ">Primer nombre</label>
                                    <input type="text" name="pnombre" id="pnombre" class="form-control" readonly>
                                </div>
                                <div class="col-lg-2">
                                    <label for="snombre" class="col-xs-4 control-label ">Segundo nombre</label>
                                    <input type="text" name="snombre" id="snombre" class="form-control" readonly>
                                </div>
                                <div class="col-lg-2">
                                    <label for="papellido" class="col-xs-4 control-label ">Primer apellido</label>
                                    <input type="text" name="papellido" id="papellido" class="form-control" readonly>
                                </div>
                                <div class="col-lg-2">
                                    <label for="sapellido" class="col-xs-4 control-label ">Segundo apellido</label>
                                    <input type="text" name="sapellido" id="sapellido" class="form-control" readonly>
                                </div>
                                <div class="col-lg-1">
                                    <label for="edad" class="col-xs-4 control-label ">Edad</label>
                                    <input type="number" name="edad" id="edad" class="form-control"
                                        placeholder="Edad" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label for="pais_id" class="col-xs-4 control-label ">País de Residencia</label>
                                    <input name="pais_id" id="pais_id" class="form-control" readonly>
                                </div>
                                <div class="col-lg-2">
                                    <label for="ciudad" class="col-xs-4 control-label ">Ciudad</label>
                                    <input type="text" name="ciudad" id="ciudad" class="form-control" readonly>
                                </div>
                                <div class="col-lg-2">
                                    <label for="direccion" class="col-xs-4 control-label ">Direccion</label>
                                    <input type="text" name="direccion" id="direccion" class="form-control" readonly>
                                </div>
                                <div class="col-lg-2">
                                    <label for="celular" class="col-xs-4 control-label ">Celular</label>
                                    <input type="tel" name="celular" id="celular" class="form-control" readonly>
                                </div>
                                <div class="col-lg-2">
                                    <label for="telefono" class="col-xs-4 control-label ">Telefono</label>
                                    <input type="tel" name="telefono" id="telefono" class="form-control" readonly>
                                </div>
                                <div class="col-lg-2">
                                    <label for="correo" class="col-xs-4 control-label ">E-mail</label>
                                    <input type="email" name="correo" id="correo" class="form-control" readonly>
                                </div>
                            </div>
                            <p><a style="color:#0071c5;"> Datos de afiliación:</a> </p>
                            <hr>
                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <label for="plan" class="col-xs-6 control-label">Régimen</label>
                                    <!--<input type="text" name="regimen" id="regimen" class="form-control" value="{{ old('regimen') }}" required> -->
                                    <select name="regimen" id="plan" class="form-control" style="width: 100%;"
                                        value="{{ old('regimen') }}" required>
                                        <option value="" selected>-- Seleccionar --</option>
                                        <!-- <option value="Particular">Particular</option> -->
                                        <option value="Contributivo">Contributivo</option>
                                        <option value="Subsidiado">Subsidiado</option>
                                        <option value="Vinculado">Vinculado</option>
                                        <option value="Otro régimen">Otro régimen</option>
                                        <option value="Accidentes de tránsito">Accidentes de tránsito</option>
                                        <option value="Riesgos profesionales">Riesgos profesionales</option>
                                        <option value="Desplazado">Desplazado</option>
                                    </select>
                                </div>
                                <div class="col-lg-1">
                                    <label for="codigo_n" class="col-xs-4 control-label ">EPS</label>
                                    <input type="text" name="codigo_empresa" id="codigo_n" class="form-control">
                                </div>
                                <div class="col-lg-3">
                                    <label for="nombre_n" class="col-xs-4 control-label requerido"></label>
                                    <input type="text" name="nombre" id="nombre_n" class="form-control"
                                        placeholder="Razón Social" readonly>
                                </div>
                                <div class="col-lg-1">
                                    <label for="nivel" class="col-xs-6 control-label">Nivel</label>
                                    <input type="text" name="nivel" id="nivel" class="form-control"
                                        value="{{ old('nivel') }}" required>
                                </div>
                                <div class="col-lg-2">
                                    <label for="descripcion_nivel" class="col-xs-6 control-label">Descripcion</label>
                                    <input type="text" name="descripcion_nivel" id="descripcion_nivel"
                                        class="form-control" value="{{ old('descripcion_nivel') }}" required>
                                </div>
                                <div class="col-lg-2">
                                    <label for="numero_afiliacion" class="col-xs-4 control-label ">Número
                                        Afiliación</label>
                                    <input type="number" name="numero_afiliacion" id="numero_afiliacion"
                                        class="form-control" value="{{ old('numero_afiliacion') }}">
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-datos-del-paciente-tab"
                                        data-toggle="pill" href="#custom-tabs-one-datos-del-paciente" role="tab"
                                        aria-controls="custom-tabs-one-datos-del-paciente"
                                        aria-selected="false">Procedimientos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-consulta-tab" data-toggle="pill"
                                        href="#custom-tabs-one-consulta" role="tab"
                                        aria-controls="custom-tabs-one-Consulta" aria-selected="false">Medicamentos</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade active show" id="custom-tabs-one-datos-del-paciente"
                                    role="tabpanel" aria-labelledby="custom-tabs-one-datos-del-paciente-tab">
                                    <div class="card-body">
                                        <form id="form-general" class="form-horizontal" method="POST">
                                            @csrf
                                            @include('admin.factura.table.table-procedimientos')
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="custom-tabs-one-consulta" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-consulta-tab">
                                    <div class="card-body">

                                        @include('admin.factura.table.table-medicamento')

                                    </div>
                                </div>
                            </div>
                        </div>
                        <p><a style="color:#0071c5;"> Total documento:</a> </p>
                        <hr>

                    </div>
                </div>

                </form>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
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
                            Manteliviano.notificaciones('Paciente no encontrado', 'Fidem', 'warning');
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
