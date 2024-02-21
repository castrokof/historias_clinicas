@extends("theme.$theme.layout")

@section('titulo')
Facturación Demo
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
<script src="{{ asset('assets/pages/scripts/admin/facturacion/main.js') }}"></script>
@endsection

@section('contenido')
@include('admin.financiero.factura-demo.modal.modalFactura')


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



<script>
    $(document).ready(function() {
        $('#agregar_cups').click(function() {

        });

         // Agregar filas a tabla para guardar
         $('#addfila').click(function() {


            const total = parseFloat($('#cantidad').val() * $('#valor').val());

            $('#tcups> tbody:last-child')
                .append(
                    '<tr><td><button type="button" name="eliminar" id="eliminar" class = "btn-float  bg-gradient-danger btn-sm tooltipsC" title="eliminar">' +
                    '<i class="fas fa-trash"></i></button></td>' +
                    '</td>' +
                    '<td>' + $('#fact_profesional2').val() + '</td>' +
                    '<td>' + $('#fact_servicio2').val() + '</td>' +
                    '<td>' + $('#fact_procedimiento').val() + '</td>' +
                    '<td>' + $('#fact_contrato2').val() + '</td>' +
                    '<td>' + $('#cantidad').val() + '</td>' +
                    '<td>' + $('#valor').val() + '</td>' +
                    '<td>' + total + '</td></tr>'

                );


        });
    });

    // $(document).ready(function() {
</script>




@endsection


















