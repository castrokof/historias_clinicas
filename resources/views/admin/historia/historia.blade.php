@extends("theme.$theme.layout")

@section('titulo')
    Historia clinica
@endsection
@section("styles")
<link href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>       
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" type="text/css" />

<link href="{{asset("assets/css/select2.min.css")}}" rel="stylesheet" type="text/css"/>
@endsection


@section('scripts')

<script src="{{asset("assets/pages/scripts/admin/usuario/crearuser.js")}}" type="text/javascript"></script>    
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.form-mensaje')
    <div class="card card-info">
        <div class="card-header with-border">
          <h3 class="card-title">Historia clinica</h3>
         
        </div>
        
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" 
                    id="custom-tabs-one-datos-del-paciente-tab" 
                    data-toggle="pill" 
                    href="#custom-tabs-one-datos-del-paciente" 
                    role="tab" 
                    aria-controls="custom-tabs-one-datos-del-paciente" 
                    aria-selected="false">Datos del paciente</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" 
                    id="custom-tabs-one-consulta-tab" 
                    data-toggle="pill" 
                    href="#custom-tabs-one-consulta" 
                    role="tab" 
                    aria-controls="custom-tabs-one-Consulta" 
                    aria-selected="false">Consulta</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" 
                    id="custom-tabs-one-examen-tab" 
                    data-toggle="pill" 
                    href="#custom-tabs-one-examen" 
                    role="tab" 
                    aria-controls="custom-tabs-one-examen" 
                    aria-selected="false">Examen fisico</a>
                  </li>
                 </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade active show" id="custom-tabs-one-datos-del-paciente" role="tabpanel" aria-labelledby="custom-tabs-one-datos-del-paciente-tab">
                    <div class="card-body">
                       <form  id="form-general" class="form-horizontal" method="POST">
                        @csrf      
                        @include('admin.pacienteprogramado.form')
                    
                      </div>
                  </div>
                                  
                  <div class="tab-pane fade" id="custom-tabs-one-consulta" role="tabpanel" aria-labelledby="custom-tabs-one-consulta-tab">
                    <div class="card-body">
                      
                                  @include('admin.pacienteprogramado.form-consulta')
                      
                     </div>
                  </div>

                  <div class="tab-pane fade" id="custom-tabs-one-examen" role="tabpanel" aria-labelledby="custom-tabs-one-examen-tab">
                    <div class="card-body">
                     
                                  @include('admin.pacienteprogramado.form-examen')
                                  <div class="card-footer">
                                
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                    @include('includes.boton-form-crear-empresa-empleado-usuario')    
                                </div>
                                 </div>
                      </form>
                     </div>    
                  </div>
                 </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
          
        </div>
</div>
</div>
</div>


<div class="modal fade" tabindex="-1" id ="modal-u" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-xl" role="document">
  <div class="modal-content">   
  <div class="row">
      <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.form-mensaje')
        <span id="form_result"></span>
         <div class="card card-success">
          <div class="card-header">
            <div class="row">
            <div class="col-10">  
            <h6 class="card-title2"></h6>
            </div>
            <div class="col-2">  
            <div class="card-tools pull-right">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          </div>
          </div>
        <form  id="form-general" class="form-horizontal" method="POST">
          @csrf
          <div class="card-body">
                            @include('admin.pacienteprogramado.form-diag')
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
@endsection



@section("scriptsPlugins")
<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}" type="text/javascript"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src="{{asset("assets/js/jquery-select2/select2.min.js")}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>


<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

<script>
 




 $(document).ready(function(){

  $('#create_diagnostico').click(function(){
  $('#form-general')[0].reset();
  $('.card-title2').text('Agregar Nuevo diagnostico');
  $('#action_button').val('Add');
  $('#action').val('Add');
  $('#form_result').html('');
  $('#modal-u').modal('show');
 });


$('.decimales').on('input', function () {
  this.value = this.value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');
 });

  $(function(){

    $('.validanumericos').keypress(function(e) {
    if(isNaN(this.value + String.fromCharCode(e.charCode))) 
      return false;
    })
    .on("cut copy paste",function(e){
    e.preventDefault();
    });

});
     //initiate dataTables plugin
           
        $("#cie10_motivo_consulta").select2({
          theme: "bootstrap"

        });

        $("#cie10_motivo_consulta1").select2({
          theme: "bootstrap"

        });

        $("#profesional").select2({
          theme: "bootstrap"

        });

        // $("#sede").select2({
        //   theme: "bootstrap"

        // });

        var myTable = 
        $('#diagnostico10').DataTable({
        language: idioma_espanol,
        processing: true,
        lengthMenu: [ [25, 50, 100, 500, -1 ], [25, 50, 100, 500, "Mostrar Todo"] ],
        processing: true,
        serverSide: true,
        aaSorting: [[ 1, "asc" ]],
        
        ajax:{
          url:"{{ route('historia')}}",
              },
        columns: [
          {data:'action',
           name:'action',
           orderable: false
          },
          {data:'id_cita',
          name: 'id_cita'
          },
          {data:'paciente',
           name:'paciente'
          },
          {data:'fechahora',
          name: 'fechahora'
          },
          {data:'sede',
           name:'sede'
          },
          {data:'profesional',
          name:'profesional'
          },
          {data:'asistio',
          name:'asistio',
          },
          {data:'created_at',
           name:'created_at'
          }
                   
        ],

         //Botones----------------------------------------------------------------------
         
         "dom":'<"row"<"col-xs-1 form-inline"><"col-md-4 form-inline"l><"col-md-5 form-inline"f><"col-md-3 form-inline"B>>rt<"row"<"col-md-8 form-inline"i> <"col-md-4 form-inline"p>>',
         

                   buttons: [
                      {
    
                   extend:'copyHtml5',
                   titleAttr: 'Copiar Registros',
                   title:"seguimiento",
                   className: "btn  btn-outline-primary btn-sm"
    
    
                      },
                      {
    
                   extend:'excelHtml5',
                   titleAttr: 'Exportar Excel',
                   title:"seguimiento",
                   className: "btn  btn-outline-success btn-sm"
    
    
                      },
                       {
    
                   extend:'csvHtml5',
                   titleAttr: 'Exportar csv',
                   className: "btn  btn-outline-warning btn-sm"
                   //text: '<i class="fas fa-file-excel"></i>'
                   
                      },
                      {
    
                   extend:'pdfHtml5',
                   titleAttr: 'Exportar pdf',
                   className: "btn  btn-outline-secondary btn-sm"
    
    
                      }
                   ],

                  "createdRow": function(row, data, dataIndex) { 
                  if (data["asistio"] == "PROGRAMADA") { 
                  $("asistio", row).addClass("button btn-xs success");
                  
                  }
      
                 }


        
    
        });


 $('#form-general').on('submit', function(event){
    event.preventDefault(); 
    var url = '';
    var method = '';
    var text = '';
    var fechahora = '';
    
    var sede = '';
    var usuario_id = '';
    var paciente_id = '';

  if($('#action').val() == 'Add')
  {
    text = "Estás por crear una historia"
    url = "{{route('guardar_historia')}}";
    method = 'post';
    usuario_id = $('#usuario_id').val();
    paciente_id = $('#paciente_id').val();

  }   

  if($('#action').val() == 'Edit')
  {
    text = "Estás por actualizar una cita"
    var updateid = $('#hidden_id').val();
    url = "/historia/"+updateid;
    method = 'put';
  }  
    Swal.fire({
     title: "¿Estás seguro?",
     text: text,
     icon: "success", 
     showCancelButton: true,
     showCloseButton: true,
     confirmButtonText: 'Aceptar',
     }).then((result)=>{
    if(result.value){ 
    $.ajax({
           url:url,
           method:method,
           data:$(this).serialize(),
           dataType:"json",
           success:function(data){
              var html = '';
                    if(data.errors){

                    html = '<div class="alert alert-danger alert-dismissible" data-auto-dismiss="3000">'
                      '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                        '<h5><i class="icon fas fa-check"></i> Mensaje Ventas</h5>';
                                     
                    for (var count = 0; count < data.errors.length; count++)
                    {
                      html += '<p>' + data.errors[count]+'<p>';
                    }         
                    html += '</div>';
                    }
                    
                    if(data.success == 'ok') {
                      $('#form-general')[0].reset();
                      $('#modal-u').modal('hide');
                      $('#Citas').DataTable().ajax.reload();
                      Swal.fire(
                        {
                          icon: 'success',
                          title: 'Historia creado correctamente',
                          showConfirmButton: false,
                          timer: 1500
                          
                        }
                      )
                      // Manteliviano.notificaciones('cliente creado correctamente', 'Sistema Ventas', 'success');
                      
                    }else if(data.success == 'ok1'){
                      $('#form-general')[0].reset();
                      $('#modal-u').modal('hide');
                      $('#Citas').DataTable().ajax.reload();
                      Swal.fire(
                        {
                          icon: 'warning',
                          title: 'Historia actualizado correctamente',
                          showConfirmButton: false,
                          timer: 1500
                          
                        }
                      )
                     

                    }
                    $('#form_result').html(html)  
              }


           });
          }
        });
          

  });


// Edición de cliente

$(document).on('click', '.edit', function(){
    var id = $(this).attr('id');
    
  $.ajax({
    url:"/historia/"+id+"/editar",
    dataType:"json",
    success:function(data){
      $('#paciente').val(data.result.paciente_id).trigger('change.select2');
      $('#fechahora').val(data.result.fechahora);
      $('#sede').val(data.result.sede);
      $('#profesional').val(data.result.usuario_id).trigger('change.select2')
      $('#hidden_id').val(id);
      $('.card-title-1').text('Editar cita');
      $('#action_button').val('Edit');
      $('#action').val('Edit');
      $('#modal-u').modal('show');
     
    }
    

  }).fail( function( jqXHR, textStatus, errorThrown ) {

if (jqXHR.status === 403) {

  Manteliviano.notificaciones('No tienes permisos para realizar esta accion', 'Sistema Ventas', 'warning');

}});

 });



});

$.get(
  'selectp',
   function(pacientes1)
  {   
      $('#paciente').empty();
      $('#paciente').append("<option value=''>---seleccione paciente---</option>")
      $.each(pacientes1, function(paciente, value){
      $('#paciente').append("<option value='" + value + "'>" + value + "</option>")
      });
  }); 

   var idioma_espanol =
                 {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
                }   
       
  </script>
   

@endsection

