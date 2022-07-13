@extends("theme.$theme.layout")

@section('titulo')
Eps Empresas
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
<div class="row">
  <div class="col-lg-12">
    @include('includes.form-error')
    @include('includes.form-mensaje')
    <div class="card card-success">
      <div class="card-header with-border form-group row">
        <h3 class="card-title-1 col-lg-10">Eps Empresas</h3>
        <div class="card-tools pull-right col-lg-2">
          <button type="button" class="btn btn-default" name="create_eps" id="create_eps" data-toggle="modal" data-target="#modal-u"><i class="fa fa-fw fa-plus-circle"></i> Crear EPS</button>
          </button>
        </div>
      </div>
      <div class="card-body table-responsive p-2">

        <table id="eps" class="table table-hover  text-nowrap">
          {{-- class="table table-hover table-bordered text-nowrap" --}}
          <thead>
            <tr>
              <th>Acciones</th>
              <th>Código</th>
              <th>Nombre EPS</th>
              <th>NIT</th>
              <!--<th>Color</th>         -->
              <th>Fecha de creacion</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      </form>
      <!-- /.card-body -->
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="modal-u" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="row">
        <div class="col-lg-12">
          @include('includes.form-error')
          @include('includes.form-mensaje')
          <span id="form_result"></span>
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title"></h3>
              <div class="card-tools pull-right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            <form id="form-general" class="form-horizontal" method="POST">
              @csrf
              <div class="card-body">
                @include('admin.eps_empresa.form')
              </div>
              <!-- /.card-body -->
              <div class="card-footer">

                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                  @include('includes.boton-form-crear-empresa-empleado-usuario')
                </div>
              </div>
              <!-- /.card-footer -->
            </form>



          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="modal-n" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="row">
        <div class="col-lg-12">
          @include('includes.form-error')
          @include('includes.form-mensaje')
          <span id="form_result_n"></span>
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title"></h3>
              <div class="card-tools pull-right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            <form id="form-general-n" class="form-horizontal" method="POST">
              @csrf
              <div class="card-body">
                @include('admin.eps_empresa.form-niveles')
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                </div>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


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
      $('#eps').DataTable({
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
          url: "{{ route('eps_empresas')}}",
        },
        columns: [{
            data: 'action',
            name: 'action',
            orderable: false
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
            data: 'NIT',
            name: 'NIT'
          },
          /*{data:'color',
          name:'color'
          },*/
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

    $('#create_eps').click(function() {
      $('#form-general')[0].reset();
      $('.card-title').text('Agregar Nueva EPS');
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
        url = "{{route('guardar_eps_empresas')}}";
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

                for (var count = 0; count < data.errors.length; count++) {
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


    // Edición de cliente

    $(document).on('click', '.edit', function() {
      var id = $(this).attr('id');

      $.ajax({
        url: "/eps_empresas/" + id + "/editar",
        dataType: "json",
        success: function(data) {
          $('#codigo').val(data.result.codigo);
          $('#nombre').val(data.result.nombre);
          $('#NIT').val(data.result.NIT);
          $('#color').val(data.result.color);
          $('#hidden_id').val(id);
          $('.card-title').text('Editar EPS');
          $('#action_button').val('Edit');
          $('#action').val('Edit');
          $('#modal-u').modal('show');
        }


      }).fail(function(jqXHR, textStatus, errorThrown) {

        if (jqXHR.status === 403) {

          Manteliviano.notificaciones('No tienes permisos para realizar esta accion', 'Sistema Fidem', 'warning');

        }
      });

    });

  });


  // Tabla para consultar los niveles 
  $(document).on('click', '.agregarnivel', function() {
    var id = $(this).attr('id');

    $.ajax({
      url: "/eps_niveles/" + id + "/editarn",
      dataType: "json",
      success: function(data) {
        $('#codigo_n').val(data.result.codigo);
        $('#nombre_n').val(data.result.nombre);
        $('#NIT_n').val(data.result.NIT);
        $('#eps_empresas_id').val(id);
        $('.card-title').text('Agregar Nivel');
        $('#action_button').val('Add');
        $('#action').val('Add');
        $('#modal-n').modal('show');
      }

     /*  var nivel_idp2 = $('#nivel_idp').val();
      $('#tniveles').DataTable().destroy();
      fill_datatable_f(nivel_idp2); */

    }).fail(function(jqXHR, textStatus, errorThrown) {

      if (jqXHR.status === 403) {

        Manteliviano.notificaciones('No tienes permisos para realizar esta accion', 'Sistema Fidem', 'warning');
      }
    });

  });

  function fill_datatable_f(nivel_idp2 = '')

  {
    var myTable2 =
      $('#tniveles').DataTable({
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
          url: "{{ route('eps_niveles')}}",          
        },
        columns: [
          /* {
                    data: 'action',
                    name: 'action',
                    orderable: false
                  }, */
          {
            data: 'nivel',
            name: 'nivel'
          },
          {
            data: 'descripcion_nivel',
            name: 'descripcion_nivel'
          },
          {
            data: 'regimen',
            name: 'regimen'
          },
          {
            data: 'tipo_recuperacion',
            name: 'tipo_recuperacion'
          },
          {
            data: 'afiliacion',
            name: 'afiliacion'
          },
          {
            data: 'servicios',
            name: 'servicios'
          },
          {
            data: 'vlr_copago',
            name: 'vlr_copago'
          },
          {
            data: 'estado',
            name: 'estado'
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

  }
  //Funcion para agregar niveles y copagos  


  $('#form-general-n').on('submit', function(event) {
    event.preventDefault();
    var url = '';
    var method = '';
    var text = '';

    if ($('#action').val() == 'Add') {
      text = "Estás por crear un Nivel"
      url = "{{route('agregarnivel_eps_empresas')}}";
      method = 'post';
    }
    if ($('#action').val() == 'Edit') {
      text = "Estás por actualizar un Nivel"
      var updateid = $('#id_eps_niveles').val();
      url = "/eps_niveles/" + updateid;
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

              for (var count = 0; count < data.errors.length; count++) {
                html += '<p>' + data.errors[count] + '<p>';
              }
              html += '</div>';
            }

            if (data.success == 'okn1') {
              $('#form-general-n')[0].reset();
              //$('#modal-u').modal('hide');
              $('#modal-n').modal('hide');
              $('#tniveles').DataTable().ajax.reload();
              Swal.fire({
                icon: 'success',
                title: 'NIVEL creado correctamente',
                showConfirmButton: false,
                timer: 1500

              })


            } else if (data.success == 'okn2') {
              $('#form-general-n')[0].reset();
              /* $('#modal-u').modal('hide'); */
              $('#modal-n').modal('hide');
              $('#tniveles').DataTable().ajax.reload();
              Swal.fire({
                icon: 'warning',
                title: 'NIVEL actualizada correctamente',
                showConfirmButton: false,
                timer: 1500

              })


            }
            $('#form_result_n').html(html)
          }


        });
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