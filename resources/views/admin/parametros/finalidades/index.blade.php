@extends("theme.$theme.layout")

@section('titulo')
Finalidades
@endsection
@section("styles")
<link href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}" rel="stylesheet" type="text/css" />
<link href="{{asset("assets/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" type="text/css" />
@endsection


@section('scripts')

<script src="{{asset("assets/pages/scripts/admin/usuario/crearuser.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
@include('admin.parametros.finalidades.tablas.tablaIndexFinalidades')
@include('admin.parametros.finalidades.modal.modalFinalidades')
@endsection



@section("scriptsPlugins")
<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/jquery-select2/select2.min.js")}}" type="text/javascript"></script>


<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

<script>
  $(document).ready(function() {


    //initiate dataTables plugin

    var myTable =
      $('#tfinalidades').DataTable({
        language: idioma_espanol,
        processing: true,
        lengthMenu: [
          [25, 50, 100, 500, -1],
          [25, 50, 100, 500, "Mostrar Todo"]
        ],
        processing: true,
        serverSide: true,
        aaSorting: [
          [2, "asc"]
        ],

        ajax: {
          url: "{{ route('finalidades')}}",
        },
        columns: [{
            data: 'action',
            name: 'action',
            orderable: false
          },
          {
            data: 'finalidad',
            name: 'finalidad'
          },
          {
            data: 'nombre',
            name: 'nombre'
          },
          {
            data: 'regimen',
            name: 'regimen'
          },
          {
            data: 'eps_nombre',
            name: 'eps_nombre'
          },
          {
            data: 'servicio',
            name: 'servicio'
          },
          {
            data: 'edad_min',
            name: 'edad_min'
          },
          {
            data: 'edad_max',
            name: 'edad_max'
          },
          {
            data: 'genero',
            name: 'genero'
          },
          {
            data: 'embarazo',
            name: 'embarazo'
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

    $('#create_finalidad').click(function() {
      $('#form-general')[0].reset();
      $('.card-title').text('Agregar Nueva Finalidad');
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
        text = "Estás por crear un Finalidad"
        url = "{{route('guardar_finalidades')}}";
        method = 'post';
      }

      if ($('#action').val() == 'Edit') {
        text = "Estás por actualizar un Finalidad"
        var updateid = $('#hidden_id').val();
        url = "/finalidades/" + updateid;
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
                $('#tfinalidades').DataTable().ajax.reload();
                Swal.fire({
                  icon: 'success',
                  title: 'Finalidad creada correctamente',
                  showConfirmButton: false,
                  timer: 1500

                })


              } else if (data.success == 'ok1') {
                $('#form-general')[0].reset();
                $('#modal-u').modal('hide');
                $('#tfinalidades').DataTable().ajax.reload();
                Swal.fire({
                  icon: 'warning',
                  title: 'Finalidad actualizada correctamente',
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

    //Función para seleccionar el servicio
    $("#servicio_finalidad").select2({
      theme: "bootstrap",
      ajax: {
        url: "{{route('serv_fin')}}",
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
    })

    //Función para seleccionar la eps
    $("#eps").select2({
      theme: "bootstrap",
      ajax: {
        url: "{{route('eps_finalidad')}}",
        dataType: 'json',
        delay: 250,
        processResults: function(data) {
          return {
            results: $.map(data, function(data) {
              return {
                text: data.codigo + ' - ' + data.nombre,
                id: data.id_eps_empresas
              }
            })
          };
        },
        cache: true
      }
    })


    //Funcion para Editar finalidades

    $(document).on('click', '.edit', function() {
      var id = $(this).attr('id');

      $.ajax({
        url: "/finalidades/" + id + "/editar",
        dataType: "json",
        success: function(data) {
          $('#finalidad').val(data.result.finalidad);
          $('#nombre').val(data.result.nombre);
          $('#regimen').val(data.result.regimen);
          $('#eps_empresas_id').val(data.result.eps_empresas_id);
          $('#servicio_id').val(data.result.servicio_id);
          $('#edad_min').val(data.result.edad_min);
          $('#edad_max').val(data.result.edad_max);
          $('#genero').val(data.result.genero);
          $('#embarazo').val(data.result.embarazo);
          $('#hidden_id').val(id);
          $('.card-title').text('Editar Finalidad');
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