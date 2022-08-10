@extends("theme.$theme.layout")

@section('titulo')
Pacientes
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
@include('admin.paciente.modal.modalPacientes')
@include('admin.paciente.tablas.tablaIndexPacientes')
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

    //initiate dataTables plugin

    var myTable =
      $('#pacientes').DataTable({
        language: idioma_espanol,
        processing: true,
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
          url: "{{ route('paciente')}}",
        },
        columns: [{
            data: 'action',
            name: 'action',
            orderable: false
          },
          {
            data: 'id_paciente',
            name: 'id_paciente'
          },
          {
            data: 'pnombre',
            name: 'pnombre'
          },
          {
            data: 'snombre',
            name: 'snombre'
          },
          {
            data: 'papellido',
            name: 'papellido'
          },
          {
            data: 'sapellido',
            name: 'sapellido'
          },
          {
            data: 'tipo_documento',
            name: 'tipo_documento'
          },
          {
            data: 'documento',
            name: 'documento'
          },
          {
            data: 'edad',
            name: 'edad'
          },
          {
            data: 'ciudad',
            name: 'ciudad'
          },
          {
            data: 'direccion',
            name: 'direccion'
          },
          {
            data: 'celular',
            name: 'celular'
          },
          {
            data: 'telefono',
            name: 'telefono'
          },
          {
            data: 'correo',
            name: 'correo'
          },
          {
            data: 'grupo',
            name: 'grupo'
          },
          {
            data: 'plan',
            name: 'plan'
          },
          {
            data: 'observaciones',
            name: 'observaciones'
          },
          {
            data: 'created_at',
            name: 'created_at'
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

    $('#create_paciente').click(function() {
      $('#form-general')[0].reset();
      $('.card-title').text('Agregar Nuevo paciente');
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
                $('#modal-u').modal('hide');
                $('#pacientes').DataTable().ajax.reload();
                Swal.fire({
                  icon: 'success',
                  title: 'paciente creado correctamente',
                  showConfirmButton: false,
                  timer: 1500

                })


              } else if (data.success == 'ok1') {
                $('#form-general')[0].reset();
                $('#modal-u').modal('hide');
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


    // Edición de cliente

    $(document).on('click', '.edit', function() {
      var id = $(this).attr('id');

      $.ajax({
        url: "/paciente/" + id + "/editar",
        dataType: "json",
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
          $('.card-title').text('Editar Paciente');
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
  });



  $("#plan").select2({
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