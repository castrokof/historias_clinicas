@extends("theme.$theme.layout")

@section('titulo')
Crear Agendas
@endsection

@section('styles')
<link href="{{ asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css") }}" rel="stylesheet" type="text/css" />
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


<style>
    /*btn flotante*/
    .btn-flotante {
        font-size: 14px;
        /* Cambiar el tamaño de la tipografia */
        text-transform: uppercase;
        /* Texto en mayusculas */
        font-weight: bold;
        /* Fuente en negrita o bold */
        color: #ffffff;
        /* Color del texto */
        border-radius: 120px;
        /* Borde del boton */
        letter-spacing: 2px;
        /* Espacio entre letras */
        background: linear-gradient(to right, #1216ef, #88e6e6) !important;
        /* Color de fondo */
        /*background-color: #e9321e; /* Color de fondo */
        padding: 18px 30px;
        /* Relleno del boton */
        position: fixed;
        bottom: 40px;
        right: 40px;
        transition: all 300ms ease 0ms;
        box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.5);
        z-index: 99;
        border: none;
        outline: none;
    }

    .btn-flotante:hover {
        background-color: #2c2fa5;
        /* Color de fondo al pasar el cursor */
        box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
        transform: translateY(-7px);
    }

    @media only screen and (max-width: 600px) {
        .btn-flotante {
            font-size: 14px;
            padding: 12px 20px;
            bottom: 20px;
            right: 20px;
        }
    }
</style>


@section('contenido')
<div class="content-wrapper" style="min-height: 1604px;">
    <!-- Content Header (Page header) -->
    
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h1 class="m-0 text-dark">Creación de agenda</h1>
                    </div><!-- /.col -->

                    @csrf
                    <div class="card-body">

                        @include('admin.agenda.form.form')

                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
   
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid"> {{-- 4 Widgets --}}
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
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
                            <button type="button" class="btn btn-block bg-gradient-primary btn-sm" data-dismiss="modal">Close</button>
                        </div>
                    </div>


                    <!--tabla -->
                    <div class="card-body table-responsive p-2">

                        <table id="detallePagos" class="table table-hover  text-nowrap  table-striped table-bordered" style="width:100%">

                        </table>
                    </div>
                    <!-- /.class-table-responsive -->
                </div>
                <!-- /.card -->

            </div>
        </div>
    </div>
    <button type="button" class="btn-flotante tooltipsC" id="create_agenda" title="Crear agenda"><i class="fas fa-save fa-2x"></i></button>
</div>
@endsection

@section('scriptsPlugins')
<script src="{{ asset('assets/js/jquery-select2/select2.min.js') }}" type="text/javascript"></script>

<script>
    $(document).ready(function() {



        // Btn flotante
        $('.botonF1').hover(function() {

        })


        // Funcion para obtener el cambio del check primero se inicializa

        festivosc();

        function festivosc() {

            if ($(this).is(':checked')) {

                $('#festivos').val('1');
            }
            //Si se ha desmarcado se ejecuta el siguiente mensaje.
            else {
                $('#festivos').val('0');
            }


        }


        $("#festivos").change(festivosc);

        //Función para seleccionar todos los checkbox y listar los que se han seleccionado
        $("#frmDias").submit(function(evento) {
            evento.preventDefault();
            const contador = $("input.checked").length;
            if (!contador) {
                $(".error").show();
                $("#resultado").text("");
                return;
            }
            const resultado = '';
            $("input.checked").each(function(indice, opcion) {
                resultado += $(opcion).attr("name") + ", ";
            })
            $("#resultado").text(`-Los días seleccionados son: ${resultado}`);

        });

        $("#marcarTodas").click(function() {
            
            $('.case_semana').attr("checked", $("#marcarTodas").is(":checked"));
        }); 

        




        // Agregar filas a tabla para horarios
        $('#agregar_horario').click(function() {


            const timeini = $('#timeini').val();
            const timefin = $('#timefin').val();
            const intervalo = $('#intervalo').val();
            const horariosa = [];

            //console.log(intervalo);

            const now = new Date('2019-09-13 ' + timeini);

            const minutos_timeini = timeini.split(':')
                .reduce((p, c) => parseInt(p) * 60 + parseInt(c));

            const minutos_timefin = timefin.split(':')
                .reduce((p, c) => parseInt(p) * 60 + parseInt(c));

            const turnos = minutos_timefin - minutos_timeini;
            const turnos1 = (turnos / intervalo) - 1;
            const horarios = [];

            now.setMinutes(now.getMinutes(timeini));
            horarios.push(now.getHours() + ":" + ("00" + now.getMinutes()).slice(-2))

            for (var i = 0; i < turnos1; i++) {

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

                    horarios.forEach(espacios => {



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
                    horarios.forEach(espacios => {



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
                    horarios.forEach(espacios => {



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
                    horarios.forEach(espacios => {



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
                    horarios.forEach(espacios => {




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
                    horarios.forEach(espacios => {




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
                    horarios.forEach(espacios => {



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

        function limpiartablas() {

            $('tbody').empty();
            $('.case_semana').prop('checked', false);
            $('#timeini').val('');
            $('#timefin').val('');
            $('#intervalo').val('');
            $('#fechaini').val('');
            $('#fechafin').val('');
            $('#festivos').val('');
            $('#profesional_select').empty();
            $('#profesional_select').change();

        }

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





        $('#create_agenda').click(function() {

            //Array de horarios, fechas, profesional y festivos

            let fechaini;
            let fechafin;
            let festivos;
            let profesional;
            const arraylunes = [];
            const arraymartes = [];
            const arraymiercoles = [];
            const arrayjueves = [];
            const arrayviernes = [];
            const arraysabado = [];
            const arraydomingo = [];


            fechaini = $('#fechaini').val();
            fechafin = $('#fechafin').val();
            festivos = $('#festivos').val();
            profesional = $('#profesional_select').val();

            if (fechaini > fechafin) {

                Swal.fire({
                    title: 'La fecha inicial debe ser menor que la fecha final',
                    icon: 'warning',
                    showConfirmButton: true,
                    timer: 1000
                })

            } else if (fechaini == null || fechafin == null || profesional == null) {


                Swal.fire({
                    title: 'Fecha inicial, final y profesional son obligatorios',
                    icon: 'warning',
                    showConfirmButton: true,
                    timer: 1000
                })

            } else {



                $("#tlunes> tbody tr").each(function(el) {

                    var alunes = {};

                    var tds = $(this).find("td");
                    alunes.horario = tds.filter(":eq(1)").text();

                    // Ingreso cada array en la variable arraylunes
                    arraylunes.push(alunes);




                });

                $("#tmartes> tbody tr").each(function(el) {

                    var amartes = {};


                    var tds = $(this).find("td");
                    amartes.horario = tds.filter(":eq(1)").text();

                    // Ingreso cada array en la variable arraymartes
                    arraymartes.push(amartes);



                });

                $("#tmiercoles> tbody tr").each(function(el) {

                    var amiercoles = {};

                    var tds = $(this).find("td");
                    amiercoles.horario = tds.filter(":eq(1)").text();



                    // Ingreso cada array en la variable arraymiercoles
                    arraymiercoles.push(amiercoles);




                });

                $("#tjueves> tbody tr").each(function(el) {

                    var ajueves = {};

                    var tds = $(this).find("td");
                    ajueves.horario = tds.filter(":eq(1)").text();

                    // Ingreso cada array en la variable arrayjueves
                    arrayjueves.push(ajueves);




                });

                $("#tviernes> tbody tr").each(function(el) {

                    var aviernes = {};


                    var tds = $(this).find("td");
                    aviernes.horario = tds.filter(":eq(1)").text();

                    // Ingreso cada array en la variable arrayviernes
                    arrayviernes.push(aviernes);



                });

                $("#tsabado> tbody tr").each(function(el) {

                    var asabado = {};

                    var tds = $(this).find("td");
                    asabado.horario = tds.filter(":eq(1)").text();



                    // Ingreso cada array en la variable arraysabado
                    arraysabado.push(asabado);




                });


                $("#tdomingo> tbody tr").each(function(el) {

                    var adomingo = {};

                    var tds = $(this).find("td");
                    adomingo.horario = tds.filter(":eq(1)").text();



                    // Ingreso cada array en la variable arraysabado
                    arraydomingo.push(adomingo);




                });



                if (fechaini != null && fechafin != null && profesional != null && (arraylunes.length >
                        0 ||
                        arraymartes.length > 0 || arraymiercoles.length > 0 ||
                        arrayjueves.length > 0 || arrayviernes.length > 0 || arraysabado.length > 0 ||
                        arraydomingo.length > 0)) {
                    Swal.fire({
                            title: 'Espere por favor !',
                            html: 'Creando los cupos', // add html attribute if you want or remove
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            willOpen: () => {
                                Swal.showLoading()
                            },
                        }),

                        $.ajax({
                            beforeSend: function() {
                                $('.loader').css("visibility", "visible");
                            },
                            url: "{{ route('programar_agenda') }}",
                            method: 'post',
                            data: {
                                lunes: arraylunes,
                                martes: arraymartes,
                                miercoles: arraymiercoles,
                                jueves: arrayjueves,
                                viernes: arrayviernes,
                                sabado: arraysabado,
                                domingo: arraydomingo,
                                fechaini: fechaini,
                                fechafin: fechafin,
                                profesional: profesional,
                                festivos: festivos,
                                "_token": $("meta[name='csrf-token']").attr("content")
                            },
                            dataType: "json",
                            success: function(data) {
                                if (data.success == 'ya') {
                                    limpiartablas();
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Información',
                                        text: 'Ya Fue programado por favor revisar',
                                        showConfirmButton: true,
                                        timer: 3000
                                    })
                                }
                                //$('#mipres').DataTable().destroy();
                                else if (data.success == 'ok') {
                                    limpiartablas();
                                    Swal.fire({
                                        icon: 'info',
                                        title: 'Información',
                                        text: 'Fue programado correctamente la agenda del profesional con ' +
                                            data.cupos + ' cupos',
                                        showConfirmButton: true,
                                        timer: 3000
                                    })
                                }


                            },
                            complete: function() {
                                $('.loader').css("visibility", "hidden");
                            }


                        });


                } else {
                    Swal.fire({
                        title: 'Debes seleccionar un horario',
                        icon: 'warning',
                        buttons: {
                            cancel: "Cerrar"

                        }
                    })


                }
            }
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