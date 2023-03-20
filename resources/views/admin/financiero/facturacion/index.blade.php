@extends("theme.$theme.layout")

@section('titulo')
Facturación | Fidem
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
<script src="{{ asset('assets/pages/scripts/admin/facturacion/index.js') }}"></script>
@endsection

@section('contenido')
@include('admin.financiero.facturacion.modal.modalFactura')
@include('admin.financiero.facturacion.modal.modalFacturaProcedimiento')
@include('admin.financiero.facturacion.modal.modalFacturaMedicamento')
@include('admin.financiero.facturacion.modal.modalPacientes')

@endsection


@section('scriptsPlugins')
<script src="{{ asset("assets/$theme/plugins/datatables/jquery.dataTables.js") }}" type="text/javascript"></script>
<script src="{{ asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.js") }}" type="text/javascript"></script>
<script src="{{asset("assets/js/jquery-select2/select2.min.js")}}" type="text/javascript"></script>

<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>


<!-- Funcion para ingresar al modulo Pacientes y poder crearlos desde el modulo de Facturación -->
<script>
    $(document).ready(function() {

            //funcion de edad
            function edad() {

                let fecha1 = new Date($("#futuro2").val());
                let fecha2 = new Date();
                let resta = new Date(fecha2.getDate - fecha1.getDate);
                let edad = Math.round(resta);
            }



            function edad() {

                let hoy = new Date();

                if ($('#futuro2').val() != null) {

                    var nacimiento = new Date($('#futuro2').val());
                    let edad = hoy.getFullYear() - nacimiento.getFullYear();
                    let meses = hoy.getMonth() - nacimiento.getMonth();

                    if (meses < 0 || (meses === 0 && hoy.getDate() < nacimiento.getDate())) {
                        edad--;
                    }
                    console.log(edad);

                    $('#edad').val(edad);

                } else {

                    $('#edad').val();
                }
            }

            $("#futuro2").change(edad);


            //Funcion para ingresar al modulo Pacientes y poder crearlos desde el modulo de Facturación
            $('#create_paciente').click(function() {
                $('#form-general')[0].reset();
                $('.card-title').text('Agregar Nuevo paciente');
                $('#action_button').val('Add');
                $('#action').val('Add');
                $('#form_result').html('');
                $('#modal-paciente').modal('show');
            });

            $('#form-general').on('submit', function(event) {
                event.preventDefault();
                var url = '';
                var method = '';
                var text = '';

                if ($('#action').val() == 'Add') {
                    text = "Estás por crear un paciente"
                    url = "{{route('guardar_paciente')}}";
                    method = 'post';
                }

                if ($('#action').val() == 'Edit') {
                    text = "Estás por actualizar un paciente"
                    var updateid = $('#hidden_id').val();
                    url = "/paciente/" + updateid;
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
                                    $('#modal-paciente').modal('hide');
                                    $('#pacientes').DataTable().ajax.reload();
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'paciente creado correctamente',
                                        showConfirmButton: false,
                                        timer: 1500

                                    })


                                } else if (data.success == 'ok1') {
                                    $('#form-general')[0].reset();
                                    $('#modal-paciente').modal('hide');
                                    $('#pacientes').DataTable().ajax.reload();
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'paciente actualizado correctamente',
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


            // Funciones para los select de Pacientes //

            //Select para consultar las Ocupaciones
            $("#paciente_ocupacion").select2({
                theme: "bootstrap",
                ajax: {
                    url: "{{ route('ocupacion')}}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(data) {

                                return {

                                    text: data.nombre,
                                    id: data.id_ocupacion

                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            //Select para consultar los Paises
            $("#paciente_pais").select2({
                theme: "bootstrap",
                ajax: {
                    url: "{{ route('pais')}}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(data) {

                                return {

                                    text: data.nombre,
                                    id: data.id_pais

                                }
                            })
                        };
                    },
                    cache: true
                }
            });

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

            //Select para consultar el Departamento
            $("#paciente_departamento").select2({
                theme: "bootstrap",
                ajax: {
                    url: "{{ route('departamento')}}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(data) {

                                return {

                                    text: data.nombre,
                                    id: data.id_departamento

                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            //Select para consultar la Ciudad
            $("#paciente_ciudad").select2({
                theme: "bootstrap",
                ajax: {
                    url: "{{ route('ciudad')}}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(data) {

                                return {

                                    text: data.nombre,
                                    id: data.id_ciudad

                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            //Select para consultar el Barrio
            $("#paciente_barrio").select2({
                theme: "bootstrap",
                ajax: {
                    url: "{{ route('barrio')}}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(data) {

                                return {

                                    text: data.nombre,
                                    id: data.id_barrio

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

            $("#tipo_documento").select2({
                theme: "bootstrap",
                placeholder: 'tipo documento',
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
        }

    )
</script>

<script>
    $(document).ready(function() {


        //Funcion que abre modal donde se deben seleccionar los procedimientos que se iran cargando en la factura
        $('#agregar_cups').click(function() {
            $('#form-general_1')[0].reset();
            // $('.card-title').text('Agregar Procedimiento');
            $('#action_button').val('Add');
            $('#action').val('Add');
            $('#form_result_1').html('');
            $('#modal-procedimiento').modal('show');
        });

        $('#form-general_1').on('submit', function(event) {
            event.preventDefault();
            var url = '';
            var method = '';
            var text = '';

            if ($('#action').val() == 'Add') {
                text = "Estás por Agregar los procedimientos a la factura"
                url = "{{ route('guardar_eps_empresas') }}";
                method = 'post';
            }
            if ($('#action').val() == 'Edit') {
                text = "Estás por actualizar los procedimientos"
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
                                $('#form-general_1')[0].reset();
                                $('#modal-procedimiento').modal('hide');
                                //$('#modal-n').modal('hide');
                                $('#tcups').DataTable().ajax.reload();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'EPS creada correctamente',
                                    showConfirmButton: false,
                                    timer: 1500

                                })


                            } else if (data.success == 'ok1') {
                                $('#form-general_1')[0].reset();
                                $('#modal-procedimiento').modal('hide');
                                /* $('#modal-n').modal('hide'); */
                                $('#tcups').DataTable().ajax.reload();
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'EPS actualizada correctamente',
                                    showConfirmButton: false,
                                    timer: 1500

                                })


                            }
                            $('#form_result_1').html(html)
                        }

                    });
                }
            });

        });


        //Funcion que abre modal donde se deben seleccionar los medicamentos que se iran cargando en la factura
        $('#agregar_cums').click(function() {
            $('#form-general_2')[0].reset();
            // $('.card-title').text('Agregar Procedimiento');
            $('#action_button').val('Add');
            $('#action').val('Add');
            $('#form_result_2').html('');
            $('#modal-medicamento').modal('show');
        });

        $('#form-general_2').on('submit', function(event) {
            event.preventDefault();
            var url = '';
            var method = '';
            var text = '';

            if ($('#action').val() == 'Add') {
                text = "Estás por Agregar los medicamentos a la factura"
                url = "{{ route('guardar_eps_empresas') }}";
                method = 'post';
            }
            if ($('#action').val() == 'Edit') {
                text = "Estás por actualizar los medicamentos de la factura"
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
                                $('#form-general_2')[0].reset();
                                $('#modal-medicamento').modal('hide');
                                //$('#modal-n').modal('hide');
                                $('#tmedicamentos').DataTable().ajax.reload();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Factura con medicamentos creada correctamente',
                                    showConfirmButton: false,
                                    timer: 1500

                                })


                            } else if (data.success == 'ok1') {
                                $('#form-general_2')[0].reset();
                                $('#modal-medicamento').modal('hide');
                                /* $('#modal-n').modal('hide'); */
                                $('#tmedicamentos').DataTable().ajax.reload();
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Factura con medicamentos actualizada correctamente',
                                    showConfirmButton: false,
                                    timer: 1500

                                })


                            }
                            $('#form_result_2').html(html)
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

        // Callback para filtrar el Documentos
        $('#doc_conse').click(function() {

            const document = $('#key2').val();

            if (document != '') {

                fill_documentos(document);


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

        function fill_documentos(document = '') {

            $('#form-general2')[0].reset();

            $.ajax({
                url: "{{ route('documento') }}",
                data: {
                    document: document
                },
                dataType: "json",
                success: function(data) {
                    if (data.pacientes == null) {
                        Manteliviano.notificaciones('Documento no encontrado',
                            'Sistema Historias Clínicas', 'warning');
                    } else {
                        //Pintar formulario
                        console.log(data);
                        $.each(data, function(i, paciente) {
                            $("#cod_documentos").val(paciente.cod_documentos);
                            $("#nombre").val(paciente.nombre);
                            $("#papellido").val(paciente.papellido);
                        });
                    }

                }
            });
        }


        // Variables globales para almacenar la suma de cantidad y total cada vez que se ejecute la fucnion #addfila_cups
        let totalCantidad = 0;
        let totalCantidadMed = 0;
        let totalTotal = 0;
        // Agregar filas a tabla para guardar
        $('#addfila_cups').click(function() {


            // Obtener el nombre del profesional, procedimiento y contrato seleccionado desde Procedimientos
            const profesional = $('#fact_profesional2 option:selected').text();
            const servicio = $('#fact_servicio2 option:selected').text();
            const procedimiento = $('#fact_procedimiento option:selected').text();
            const contrato = $('#fact_contrato2 option:selected').text();
            const cantidad = parseFloat($('#cantidad').val() || 0);
            const valor = parseFloat($('#valor').val() || 0);
            const total = parseFloat(cantidad * valor);

            // Actualizar las variables globales de cantidad y total
            totalCantidad += cantidad;
            totalTotal += total;

            $('#tcups> tbody:last-child')
                .append(
                    '<tr><td><button type="button" name="eliminar" id="eliminar" class = "btn-float  bg-gradient-danger btn-sm tooltipsC" title="eliminar">' +
                    '<i class="fas fa-trash"></i></button></td>' +
                    '</td>' +
                    '<td>' + profesional + '</td>' +
                    '<td>' + servicio + '</td>' +
                    '<td>' + procedimiento + '</td>' +
                    '<td>' + contrato + '</td>' +
                    '<td>' + cantidad + '</td>' +
                    '<td>' + valor + '</td>' +
                    '<td>' + total + '</td></tr>'

                );
            // Actualizar los valores en los campos del formulario modalFactura
            $('#cant_procedure').val(totalCantidad);
            $('#fact_subtotal').val(totalTotal);

        });

        // Funcion para agregar filas a la tabla Medicamentos
        $('#addfila_cums').click(function() {

            // Obtener el nombre del profesional, medicamento y contrato seleccionado desde Medicamentos
            const profesional_med = $('#fact_profesional option:selected').text();
            const servicio_med = $('#fact_servicio option:selected').text();
            const medicamento = $('#fact_medicamento option:selected').text();
            const contrato_med = $('#fact_contrato option:selected').text();
            const cantidad_med_orde = parseFloat($('#cantidad_ordenada').val() || 0);
            const cantidad_med = parseFloat($('#cantidad_med').val() || 0);
            const valor_med = parseFloat($('#valor_med').val() || 0);
            const total_med = parseFloat(cantidad_med * valor_med);

            totalCantidadMed += cantidad_med;
            totalTotal += total_med;

            $('#tmedicamentos> tbody:last-child')
                .append(
                    '<tr><td><button type="button" name="eliminar" id="eliminar" class = "btn-float  bg-gradient-danger btn-sm tooltipsC" title="eliminar">' +
                    '<i class="fas fa-trash"></i></button></td>' +
                    '</td>' +
                    '<td>' + profesional_med + '</td>' +
                    '<td>' + servicio_med + '</td>' +
                    '<td>' + medicamento + '</td>' +
                    '<td>' + contrato_med + '</td>' +
                    '<td>' + cantidad_med_orde + '</td>' +
                    '<td>' + cantidad_med + '</td>' +
                    '<td>' + valor_med + '</td>' +
                    '<td>' + total_med + '</td></tr>'

                );

            $('#cant_medicamentos').val(totalCantidadMed);
            $('#fact_subtotal').val(totalTotal);
        });

        // eliminar filas de la tabla procedimientos para guardar
        $("#tcups").on("click", "#eliminar", function() {
            $(this).closest("tr").remove();
        });

        // eliminar filas de la tabla procedimientos para guardar
        $("#tmedicamentos").on("click", "#eliminar", function() {
            $(this).closest("tr").remove();
        });

        // Función para consultar el nivel de la eps seleccionada
        function getNivelEps(id_eps_empresas) {
            $.ajax({
                type: 'GET',
                url: "{{ route('get_nivel_eps') }}",
                data: {
                    'eps_empresas_id': id_eps_empresas
                },
                dataType: 'json',
                success: function(response) {
                    if (response.niveles_eps) {
                        // Borra la lista de opciones anterior
                        $('#listaNivelesEps').empty();
                        // Agrega las nuevas opciones a la lista
                        $.each(response.niveles_eps, function(i, nivel_eps) {
                            $('#listaNivelesEps').append('<option value="' + nivel_eps + '">' + nivel_eps + '</option>');
                        });
                        // Asigna el valor seleccionado al input correspondiente
                        $('#listaNivelesEps a').on('click', function(e) {
                            e.preventDefault();
                            $('#nivel_eps').val($(this).data('nivel-eps'));

                        });
                    } else {
                        // Si no hay resultados, borra el valor del input
                        $('#nivel_eps').val('');
                    }
                },
                error: function() {
                    // Si hay un error, borra el valor del input
                    $('#nivel_eps').val('');
                }
            });
        }


        //Select para consultar la EPS
        $("#eps_fact").select2({
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
        }).on('change', function() {

            const id_eps_empresas = $(this).val();
            if (id_eps_empresas) {
                getNivelEps(id_eps_empresas);
            } else {
                $('#nivel_eps').val('');
            }
        });

        //Select para consultar los servicios desde Medicamentos
        $("#fact_servicio").select2({
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

        //Select para consultar los servicios desde Procedimientos
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

        //Select para consultar los profesionales desde Medicamentos
        $("#fact_profesional").select2({
            theme: "bootstrap",
            ajax: {
                url: "{{ route('profesionales_factura')}}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(data) {

                            return {

                                text: data.codigo + ' - ' + data.nombre,
                                id: data.id_profesional

                            }
                        })
                    };
                },
                cache: true
            }
        });

        //Select para consultar los profesionales desde Procedimientos
        $("#fact_profesional2").select2({
            theme: "bootstrap",
            ajax: {
                url: "{{ route('profesionales_factura')}}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(data) {

                            return {

                                text: data.codigo + ' - ' + data.nombre,
                                id: data.id_profesional

                            }
                        })
                    };
                },
                cache: true
            }
        });

        // Función para consultar el valor particular del procedimiento seleccionado
        function getValorParticular(id_cups) {
            $.ajax({
                type: 'GET',
                url: "{{ route('get_valor_cups') }}",
                data: {
                    'id_cups': id_cups
                },
                dataType: 'json',
                success: function(response) {
                    if (response.valor_particular) {
                        $('#valor').val(response.valor_particular);
                    } else {
                        $('#valor').val('');
                    }
                },
                error: function() {
                    $('#valor').val('');
                }
            });
        }

        // Select para consultar los procedimientos
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
        }).on('change', function() {

            const id_cups = $(this).val();
            if (id_cups) {
                getValorParticular(id_cups);
            } else {
                $('#valor').val('');
            }
        });

        //Select para consultar los contratos desde Medicamentos
        $("#fact_contrato").select2({
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

        //Select para consultar los contratos desde Procedimientos
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

        // Función para consultar el valor particular del procedimiento seleccionado
        function getValorMedicamento(id_medicamento) {
            $.ajax({
                type: 'GET',
                url: "{{ route('get_valor_med') }}",
                data: {
                    'id_medicamento': id_medicamento
                },
                dataType: 'json',
                success: function(response) {
                    if (response.valor_particular) {
                        $('#valor_med').val(response.valor_particular);
                    } else {
                        $('#valor_med').val('');
                    }
                },
                error: function() {
                    $('#valor_med').val('');
                }
            });
        }

        //Select para consultar los medicamentos
        $("#fact_medicamento").select2({
            theme: "bootstrap",
            ajax: {
                url: "{{ route('medicamento_factura')}}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(data) {

                            return {

                                text: data.codigo + ' - ' + data.nombre,
                                id: data.id_medicamento

                            }
                        })
                    };
                },
                cache: true
            }
        }).on('change', function() {

            const id_medicamento = $(this).val();
            if (id_medicamento) {
                getValorMedicamento(id_medicamento);
            } else {
                $('#valor_med').val('');
            }
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
