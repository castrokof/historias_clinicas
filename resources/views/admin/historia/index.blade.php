@extends("theme.$theme.layout")

@section('titulo')
Historia clinica
@endsection
@section("styles")
<link href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>       
<link href="{{asset("assets/css/select2.min.css")}}" rel="stylesheet" type="text/css"/>
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
    <div class="card card-info">
        <div class="card-header with-border">
          <h3 class="card-title">Historias clinicas</h3>
          <div class="card-tools pull-right">
           
          </div>
        </div>
      <div class="card-body table-responsive p-2">
        
      <table id="historiast" class="table table-hover  text-nowrap">
        {{-- class="table table-hover table-bordered text-nowrap" --}}
        <thead>
        <tr>
              <th>Acciones</th>
              <th># de Historia</th>
              <th>Paciente</th>
              <th>Profesional</th>
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

    <div class="modal fade" tabindex="-1" id ="modal-u" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog  modal-xl" role="document">
        <div class="modal-content">   
        <div class="row">
            <div class="col-lg-12">
              
                <span id="form_result"></span>
               {{-- <div class="card card-info"> --}}
                <div class="card card-info" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
                <div class="card-header with-border">
                  <h3 class="card-title">Historia clinica</h3>
                  {{-- <div class="card-tools pull-right">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div> --}}
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="maximize">
                        <i class="fas fa-expand"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      
                        <button type="button" class="btn btn-tool" data-dismiss="modal">
                          <i class="fas fa-times"></i>
                        </button>
                      
                     
                    </div>  
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
                          <li class="nav-item">
                            <a class="nav-link" 
                            id="custom-tabs-one-diagnostico-tab" 
                            data-toggle="pill" 
                            href="#custom-tabs-one-diagnostico" 
                            role="tab" 
                            aria-controls="custom-tabs-one-diagnostico" 
                            aria-selected="false">Impresión diagnóstica</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" 
                            id="custom-tabs-one-analisisr-tab" 
                            data-toggle="pill" 
                            href="#custom-tabs-one-analisisr" 
                            role="tab" 
                            aria-controls="custom-tabs-one-analisisr" 
                            aria-selected="false">Analisis</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" 
                            id="custom-tabs-one-terapeutico-tab" 
                            data-toggle="pill" 
                            href="#custom-tabs-one-terapeutico" 
                            role="tab" 
                            aria-controls="custom-tabs-one-terapeutico" 
                            aria-selected="false">Plan Terapeutico</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" 
                            id="custom-tabs-one-planfarma-tab" 
                            data-toggle="pill" 
                            href="#custom-tabs-one-planfarma" 
                            role="tab" 
                            aria-controls="custom-tabs-one-planfarma" 
                            aria-selected="false">Plan Farmacologico</a>
                          </li>
                          </ul>
                      </div>
                      <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                          <div class="tab-pane fade active show" id="custom-tabs-one-datos-del-paciente" role="tabpanel" aria-labelledby="custom-tabs-one-datos-del-paciente-tab">
                            <div class="card-body">
                            <form  id="form-general" class="form-horizontal" method="POST">
                                @csrf      
                                @include('admin.historia.form')                            
                              </div>
                          </div>
                                          
                          <div class="tab-pane fade" id="custom-tabs-one-consulta" role="tabpanel" aria-labelledby="custom-tabs-one-consulta-tab">
                            <div class="card-body">
                              
                                @include('admin.historia.form-consulta')
                              
                             </div>
                          </div>
        
                          <div class="tab-pane fade" id="custom-tabs-one-examen" role="tabpanel" aria-labelledby="custom-tabs-one-examen-tab">
                            <div class="card-body">
                             
                                 @include('admin.historia.form-examen')
                                         
                             </div>    
                          </div>
                        </form>
                          <div class="tab-pane fade" id="custom-tabs-one-diagnostico" role="tabpanel" aria-labelledby="custom-tabs-one-diagnostico-tab">
                            <div class="card-body">
                              <form  id="form-general-d" class="form-horizontal" method="POST">
                                @csrf
                                  @include('admin.historia.form-analisis')
                                         
                              </form>
                             </div>    
                          </div>

                          <div class="tab-pane fade" id="custom-tabs-one-analisisr" role="tabpanel" aria-labelledby="custom-tabs-one-analisisr-tab">
                            <div class="card-body">
                              <form  id="form-general-a" class="form-horizontal" method="POST">
                                @csrf
                              @include('admin.historia.form-analisisr')
                            </form>         
                             </div>    
                          </div>

                          <div class="tab-pane fade" id="custom-tabs-one-terapeutico" role="tabpanel" aria-labelledby="custom-tabs-one-terapeutico-tab">
                            <div class="card-body">
                             
                              <form  id="form-general-t" class="form-horizontal" method="POST">
                                @csrf
                                  @include('admin.historia.form-terapeutico')
                                         
                              </form>

                                        
                             </div>    
                          </div>

                          <div class="tab-pane fade" id="custom-tabs-one-planfarma" role="tabpanel" aria-labelledby="custom-tabs-one-planfarma-tab">
                            <div class="card-body">
                             
                              <form  id="form-general-f" class="form-horizontal" method="POST">
                                @csrf
                                  @include('admin.historia.form-farmacologico')
                                         
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


// $.get('cie10d',
//    function(cien10c)
//   {  
//       $('#cie10_motivo_consulta1').empty();
//       $('#cie10_motivo_consulta1').append("<option value=''>---seleccione diagnostico---</option>")
//       $.each(cien10c, function(cie10, value){
//       $('#cie10_motivo_consulta1').append("<option value='" + value.id_cie10 + "'>" + value.codigo_cie10 +"=>"+ value.nombre + "</option>")
//       });
//   }); 


$.get('cups',
   function(cupsc)
  {   
      $('#cups').empty();
      $('#cups').append("<option value=''>---seleccione cups---</option>")
      $.each(cupsc, function(cups, value){
      $('#cups').append("<option value='" + value.id_cups + "'>" + value.cod_cups +"=>"+ value.nombre + "</option>")
      });

  });

$.get('via',
   function(vias)
  {   
      $('#via_administracion').empty();
      $('#via_administracion').append("<option value=''>---seleccione via---</option>")
      $.each(vias, function(via, value){
      $('#via_administracion').append("<option value='" + value + "'>" + value +"</option>")
      });

  });

  

// $.get('cums',
//    function(cumsc)
//   {   
//       $('#cums').empty();
//       $('#cums').append("<option value=''>---seleccione medicamento---</option>")
//       $.each(cumsc, function(cums, value){
//       $('#cums').append("<option value='" + value.id_cums + "'>" + value.codigo_cums +"=>"+ value.nombre + "</option>")
//       });

      
//   });


//--------- validacion de input solo decimales -------//   
$('.decimales').on('input', function () {
  this.value = this.value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');
  });

//--------- validacion de input solo valores enteros -------//    
$(function(){

    $('.validanumericos').keypress(function(e) {
    if(isNaN(this.value + String.fromCharCode(e.charCode))) 
      return false;
    })
    .on("cut copy paste",function(e){
    e.preventDefault();
    });

  });


//--------- select2 -------//       
$("#cups").select2({
          theme: "bootstrap"

        });
$("#via_administracion").select2({
          theme: "bootstrap"

        });

$("#cums").select2({
          theme: "bootstrap",
          ajax: {
          url: "{{ route('cums')}}",
          dataType: 'json',
          delay: 250,
          processResults: function(data){
            return{
                results: $.map(data, function(data){

                  return{

                      text: data.nombre_medto+"=>"+data.observacion+"=>"+data.cantidad+data.unidad_medida+"=>"+data.descripcion_medto,
                      id: data.id_cums
                     
                  }
                }) 
            };
          },
          cache: true
          }

        });

$("#cie10_motivo_consulta1").select2({
          theme: "bootstrap",
          ajax: {
          url: "{{ route('cie10d')}}",
          dataType: 'json',
          delay: 250,
          processResults: function(data){
            return{
                results: $.map(data, function(data){

                  return{

                      text: data.codigo_cie10+"=>"+data.nombre,
                      id: data.id_cie10
                     
                  }
                }) 
            };
          },
          cache: true
          }
        });

$("#profesional").select2({
          theme: "bootstrap"

        });
$("#unidad_medida").select2({
          theme: "bootstrap"

        });

//------ tabla historia -------//

var myTable = 
        $('#historiast').DataTable({
        language: idioma_espanol,
        processing: true,
        lengthMenu: [ [25, 50, 100, 500, -1 ], [25, 50, 100, 500, "Mostrar Todo"] ],
        processing: true,
        serverSide: true,
        aaSorting: [[ 4, "desc" ]],
        
        ajax:{
          url:"{{ route('historia')}}",
              },
        columns: [
          {data:'action',
           name:'action',
           orderable: false
          },
          {data:'id_historia',
          name: 'id_historia'
          },
          {data:'paciente',
           name:'paciente'
          },
          {data:'profesional',
          name:'profesional'
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


// ----- funcion para traer datos de historia para agregar diagnosticos y planes --- //
$(document).on('click', '.agregardpfpt', function(){
  var id = $(this).attr('id');
  
  $.ajax({
    url:"/historia/"+id+"/editar",
    dataType:"json",
    success:function(data){
      $.each(data.result, function(i, value){
      $('#pnombre').val(value.pnombre);
      $('#snombre').val(value.snombre);
      $('#papellido').val(value.papellido);
      $('#sapellido').val(value.sapellido);
      $('#tipo_documento').val(value.tipo_documento);
      $('#documento').val(value.documento);
      $('#edad').val(value.edad);
      $('#ciudad').val(value.ciudad);
      $('#direccion').val(value.direccion);
      $('#correo').val(value.correo);
      $('#celular').val(value.celular);
      $('#telefono').val(value.telefono);
      $('#plan').val(value.plan);
      $('#motivo_consulta').val(value.motivo_consulta);
      $('#cie10_motivo_consulta').val(value.cie10_motivo_consulta).trigger('change.select2');
      $('#enfermedad_actual').val(value.enfermedad_actual);
      $('#antecedente_farma').val(value.antecedente_farma);
      $('#antecedente_qui').val(value.antecedente_qui);
      $('#alergia').val(value.alergia);
      $('#familiares').val(value.familiares);
      $('#traumatico').val(value.traumatico);
      $('#presion_arterial_1').val(value.presion_arterial_1);
      $('#presion_arterial_2').val(value.presion_arterial_2);
      $('#pulson').val(value.pulson);
      $('#frecuencia_cardiaca').val(value.frecuencia_cardiaca);
      $('#saturacion_oxigeno').val(value.saturacion_oxigeno);
      $('#temperatura').val(value.temperatura);
      $('#cabezacuello').val(value.cabezacuello);
      $('#torax').val(value.torax);
      $('#abdomen').val(value.abdomen);
      $('#extremidad').val(value.extremidad);
      $('#genitourinario').val(value.genitourinario);
      $('#sis_nervioso_cen').val(value.sis_nervioso_cen);
      $('#obsteomuscular').val(value.obsteomuscular);
      $('#recomendacionesg').val(value.recomendacionesg);
      $('#peso').val(value.peso);
      $('#talla').val(value.talla);
      $('#imc').val(value.imc);
      $('#cuello').val(value.cuello);
      $('#patologico').val(value.patologico);
      $('#hospitalario').val(value.hospitalario);
      $('#toxico').val(value.toxico);
      $('#car_pulmonar').val(value.car_pulmonar);
                 
    });
    
      $('#modal-u').modal({backdrop: 'static', keyboard: false});
      $('#modal-u').modal('show');
      $('#form-general-d')[0].reset();
      $('#form-general-t')[0].reset();
      $('#form-general-a')[0].reset();
      $('#form-general-f')[0].reset();
      $('#hidden_id').val(id);
      $('#historia_idp').val(id);
      $('#historia_idp1').val(id);
      $('#historia_idp2').val(id);
      $('#historia_idp3').val(id);
      $('#action_button').val('Add');
      $('#action').val('Add');
      var historia_idp =  $('#historia_idp').val();
      var historia_idp1 = $('#historia_idp').val();
      var historia_idp2 = $('#historia_idp').val();
      var historia_idp3 = $('#historia_idp').val();
      
      
      
      $('#tdiagnostico').DataTable().destroy();
      $('#tterapeutico').DataTable().destroy();
      $('#tfarmacologico').DataTable().destroy();
      $('#tanalisis').DataTable().destroy();
     
      fill_datatable(historia_idp);
      fill_datatable_t(historia_idp1);
      fill_datatable_f(historia_idp2);
      fill_datatable_ae(historia_idp3);

  }}).fail( function( jqXHR, textStatus, errorThrown ) {

  if (jqXHR.status === 403) {

  Manteliviano.notificaciones('No tienes permisos para realizar esta accion', 'Sistema Ventas', 'warning');

  }}); 
 
 });


//--------------------------------Tabla diagnostico----------------------------//
function fill_datatable( historia_idp = '')
  {
  var tdiagnostico = 
        $('#tdiagnostico').DataTable({
        language: idioma_espanol,
        lengthMenu: [ [25, 50, 100, 500, -1 ], [25, 50, 100, 500, "Mostrar Todo"] ],
        processing: true,
        serverSide: true,
        aaSorting: [[ 1, "asc" ]],
        ajax:{
          url:"{{ route('diagnostico')}}",
          type:"get",
          data: {"historia_idp": historia_idp}
              },
        columns: [
          {data:'actiond',
           orderable: false
          },
          {data:'codigo_cie10'},
          {data:'nombre'},
          {data:'tipo'},
          {data:'observacion'},
          {data:'created_at'}
                   
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

                //   "createdRow": function(row, data, dataIndex) { 
                //   if (data["asistio"] == "PROGRAMADA") { 
                //   $("asistio", row).addClass("button btn-xs success");
                  
                //   }
      
                //  }


        
    
        });
  }
 $('#form-general-d').on('submit', function(event){
    event.preventDefault(); 
    var url = '';
    var method = '';
    var text = '';
    
    
  if($('#action').val() == 'Add')
  {
    text = "Estás por crear un diagnostico"
    url = "{{route('guardar_diagnostico')}}";
    method = 'post';
    
    

  }   

  if($('#action').val() == 'Edit')
  {
    text = "Estás por eliminar un diagnostico"
    var destroyid = $('#hidden_id').val();
    url = "/diagnostico/"+destroyid;
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
           data: $('#form-general-d').serialize(),
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
                      $('#form-general-d')[0].reset();
                      $('#cie10_motivo_consulta1').val('').trigger('change.select2');
                      $('#tdiagnostico').DataTable().ajax.reload();
                      Swal.fire(
                        {
                          icon: 'success',
                          title: 'diagnostico creado correctamente',
                          showConfirmButton: false,
                          timer: 1000
                          
                        }
                      )
                      // Manteliviano.notificaciones('cliente creado correctamente', 'Sistema Historias clinicas', 'success');
                      
                    }else if(data.success == 'ok1'){
                      $('#form-general-d')[0].reset();
                      $('#cie10_motivo_consulta1').val('').trigger('change.select2');
                      $('#tdiagnostico').DataTable().ajax.reload();
                      Swal.fire(
                        {
                          icon: 'warning',
                          title: 'Diagnostico eliminado correctamente',
                          showConfirmButton: false,
                          timer: 1500
                          
                        }
                      )
                     

                    }else if(data.success == 'okdp'){
                      //$('#form-general')[0].reset();
                      //$('#Citas').DataTable().ajax.reload();
                      //$('#modal-u').modal('hide');
                      Swal.fire(
                        {
                          icon: 'warning',
                          title: 'No puedes crear un diagnostico repetido',
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




//--------------------------------Tabla terapeutico----------------------------//
function fill_datatable_t( historia_idp1 = '')
  {
  var tplantera = 
        $('#tterapeutico').DataTable({
        language: idioma_espanol,
        lengthMenu: [ [25, 50, 100, 500, -1 ], [25, 50, 100, 500, "Mostrar Todo"] ],
        processing: true,
        serverSide: true,
        aaSorting: [[ 1, "asc" ]],
        ajax:{
          url:"{{ route('terapeutico')}}",
          type:"get",
          data: {"historia_idp": historia_idp1}
              },
        columns: [
          {data:'actionpt',
           orderable: false
          },
          {data:'cod_cups'},
          {data:'nombre'},
          {data:'observacion'},
          {data:'created_at'}
                   
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

                //   "createdRow": function(row, data, dataIndex) { 
                //   if (data["asistio"] == "PROGRAMADA") { 
                //   $("asistio", row).addClass("button btn-xs success");
                  
                //   }
      
                //  }


        
    
        });
  }
  $('#form-general-t').on('submit', function(event){
    event.preventDefault(); 
    var url = '';
    var method = '';
    var text = '';
    
    
  if($('#action').val() == 'Add')
  {
    text = "Estás por crear un plan terapeutico"
    url = "{{route('guardar_terapeutico')}}";
    method = 'post';
    
    

  }   

  if($('#action').val() == 'Edit')
  {
    text = "Estás por actualizar un cita"
    var updateid = $('#hidden_id').val();
    url = "/terapeutico/"+updateid;
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
           data: $('#form-general-t').serialize(),
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
                      $('#form-general-t')[0].reset();
                      $('#cups').val('').trigger('change.select2');
                      $('#tterapeutico').DataTable().ajax.reload();
                      Swal.fire(
                        {
                          icon: 'success',
                          title: 'Plan terapeutico creado correctamente',
                          showConfirmButton: false,
                          timer: 1000
                          
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
                          title: 'cita actualizado correctamente',
                          showConfirmButton: false,
                          timer: 1500
                          
                        }
                      )
                     

                    }else if(data.success == 'tomada'){
                      //$('#form-general')[0].reset();
                      $('#Citas').DataTable().ajax.reload();
                      //$('#modal-u').modal('hide');
                      Swal.fire(
                        {
                          icon: 'warning',
                          title: 'La hora del Profesional ya fue tomada por favor selecciona otro horario',
                          showConfirmButton: true,
                          //timer: 1500
                          
                        }
                      )
                     

                    }
                    $('#form_result').html(html)  
              }


           });
          }
        });
          

  });


//--------------------------------Tabla farmacologico----------------------------//
function fill_datatable_f( historia_idp2 = '')

  {
  var tplanfarma = 
        $('#tfarmacologico').DataTable({
        language: idioma_espanol,
        lengthMenu: [ [25, 50, 100, 500, -1 ], [25, 50, 100, 500, "Mostrar Todo"] ],
        processing: true,
        serverSide: true,
        aaSorting: [[ 1, "asc" ]],
        ajax:{
          url:"{{ route('farmacologico')}}",
          type:"get",
          data: {"historia_idp": historia_idp2}
              },
        columns: [
          {data:'actionpf',
           orderable: false
          },
          {data:'cums'},
          {data:'nombre'},
          {data:'descripcion'},
          {data:'via'},
          {data:'dosis'},
          {data:'frecuencia'},
          {data:'duracion_tmto'},
          {data:'total_dosis'},
          {data:'observacion'},
          {data:'created_at'}
                   
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

                //   "createdRow": function(row, data, dataIndex) { 
                //   if (data["asistio"] == "PROGRAMADA") { 
                //   $("asistio", row).addClass("button btn-xs success");
                  
                //   }
      
                //  }


        
    
        });
  }
  
  $('#form-general-f').on('submit', function(event){
    event.preventDefault(); 
    var url = '';
    var method = '';
    var text = '';
    
    
  if($('#action').val() == 'Add')
  {
    text = "Estás por formular un medicamento"
    url = "{{route('guardar_farmacologico')}}";
    method = 'post';
    
    

  }   

  if($('#action').val() == 'Edit')
  {
    text = "Estás por actualizar un cita"
    var updateid = $('#hidden_id').val();
    url = "/farmacologico/"+updateid;
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
           data: $('#form-general-f').serialize(),
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
                      $('#form-general-f')[0].reset();
                      $('#cums').val('').trigger('change.select2');
                      $('#tfarmacologico').DataTable().ajax.reload();
                      Swal.fire(
                        {
                          icon: 'success',
                          title: 'Medicamento formulado correctamente',
                          showConfirmButton: false,
                          timer: 1000
                          
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
                          title: 'cita actualizado correctamente',
                          showConfirmButton: false,
                          timer: 1500
                          
                        }
                      )
                     

                    }else if(data.success == 'tomada'){
                      //$('#form-general')[0].reset();
                      $('#Citas').DataTable().ajax.reload();
                      //$('#modal-u').modal('hide');
                      Swal.fire(
                        {
                          icon: 'warning',
                          title: 'La hora del Profesional ya fue tomada por favor selecciona otro horario',
                          showConfirmButton: true,
                          //timer: 1500
                          
                        }
                      )
                     

                    }
                    $('#form_result').html(html)  
              }


           });
          }
        });
          

  });








//--------------------------------Tabla analisis evolución----------------------------//
function fill_datatable_ae( historia_idp3 = '')
  {
  var tanalisisevo = 
      $('#tanalisis').DataTable({
      
      language: idioma_espanol,
      lengthMenu: [ [25, 50, 100, 500, -1 ], [25, 50, 100, 500, "Mostrar Todo"] ],
      processing: true,
      serverSide: true,
      aaSorting: [[ 1, "asc" ]],
      ajax:{
        url:"{{ route('historiaana')}}",
        type:"get",
        data: {"historia_idp": historia_idp3}
            },
      columns: [
        {data:'id_historia'},
        {data:'recomendacionesd'},
                         
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

              //   "createdRow": function(row, data, dataIndex) { 
              //   if (data["asistio"] == "PROGRAMADA") { 
              //   $("asistio", row).addClass("button btn-xs success");
                
              //   }
    
              //  }


      
  
      });
 }
  $('#form-general-a').on('submit', function(event){
    event.preventDefault(); 
    var url = '';
    var method = '';
    var text = '';
    
    
  if($('#action').val() == 'Add')
  {
    text = "Estás por crear un analisis de evolución"
    var updateid = $('#historia_idp3').val();
    url = "/historiaanalisis/"+updateid;
    method = 'put';
    

  }   

  if($('#action').val() == 'Edit')
  {
    text = "Estás por actualizar un cita"
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
           data: $('#form-general-a').serialize(),
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
                      $('#form-general-a')[0].reset();
                      $('#tanalisis').DataTable().ajax.reload();
                      Swal.fire(
                        {
                          icon: 'success',
                          title: 'plan de evolucion creado correctamente',
                          showConfirmButton: false,
                          timer: 1000
                          
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
                          title: 'cita actualizado correctamente',
                          showConfirmButton: false,
                          timer: 1500
                          
                        }
                      )
                     

                    }else if(data.success == 'tomada'){
                      //$('#form-general')[0].reset();
                      $('#Citas').DataTable().ajax.reload();
                      //$('#modal-u').modal('hide');
                      Swal.fire(
                        {
                          icon: 'warning',
                          title: 'La hora del Profesional ya fue tomada por favor selecciona otro horario',
                          showConfirmButton: true,
                          //timer: 1500
                          
                        }
                      )
                     

                    }
                    $('#form_result').html(html)  
              }


           });
          }
        });
          

  });









  });





//-- Eliminar diagnostio -- //

$(document).on('click', '.eliminard', function(){
    var id = $(this).attr('id');
    
    var text = "Estás por eliminar un diagnostico"
    var url = "/diagnostico/"+id;
    var method = 'put';
   
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
    method: method,
    data:{"_token": $("meta[name='csrf-token']").attr("content")},
    dataType:"json",
    success:function(data){
      if(data.success == 'ok1') {
                      
                     $('#tdiagnostico').DataTable().ajax.reload();
                      Swal.fire(
                        {
                          icon: 'success',
                          title: 'Diagnostico eliminado correctamente',
                          showConfirmButton: false,
                          timer: 1000
                          
                        }
                      )
                                            
                    }
      }
    });

  }})

 });


//-- Eliminar plan terapeutico -- //

$(document).on('click', '.eliminarpt', function(){
    var id = $(this).attr('id');
    
    var text = "Estás por eliminar un plan terapeutico"
    var url = "/terapeutico/"+id;
    var method = 'put';
   
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
    method: method,
    data:{"_token": $("meta[name='csrf-token']").attr("content")},
    dataType:"json",
    success:function(data){
      if(data.success == 'ok1') {
                      
                     $('#tterapeutico').DataTable().ajax.reload();
                      Swal.fire(
                        {
                          icon: 'success',
                          title: 'plan terapeutico eliminado correctamente',
                          showConfirmButton: false,
                          timer: 1000
                          
                        }
                      )
                                            
                    }
      }
    });

  }})

 });


//-- Eliminar plan farmacologico -- //

$(document).on('click', '.eliminarpf', function(){
    var id = $(this).attr('id');
    
    var text = "Estás por eliminar un medicamento formulado"
    var url = "/farmacologico/"+id;
    var method = 'put';
   
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
    method: method,
    data:{"_token": $("meta[name='csrf-token']").attr("content")},
    dataType:"json",
    success:function(data){
      if(data.success == 'ok1') {
                      
                     $('#tfarmacologico').DataTable().ajax.reload();
                      Swal.fire(
                        {
                          icon: 'success',
                          title: 'Medicamento eliminado correctamente',
                          showConfirmButton: false,
                          timer: 1000
                          
                        }
                      )
                                            
                    }
      }
    });

  }})

 });


//-- variable para cambiar idioma a español de data table -- //
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

