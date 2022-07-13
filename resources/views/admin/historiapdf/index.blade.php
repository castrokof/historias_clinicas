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
          <h3 class="card-title">Historias clinicas</h3>
          <div class="card-tools pull-right">
           
          </div>
        </div>
      <div class="card card-body accent-blue row-cols-12 p2 border-white">  
      <form id="form-general-h" class="form-horizontal"  type=post>
        @csrf
        @include('admin.historiapdf.form-consulta')
        <div class="card-footer">
                        
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <button value ="" id="buscarhis" type="button" class="btn btn-success">Buscar</button>  
        </div>
       </div>
      </form>
      </div>
      <div class="card-body table-responsive p-2">
      
      <table id="thistoriaspdf" class="table table-hover  text-nowrap">
       
        <thead>
        <tr>
              <th>Acciones</th>
              <th># de Historia</th>
              <th>Paciente</th>
              <th>Documento</th>
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


//------ tabla historia -------//

fill_datatable();

function fill_datatable( fechaini = '', fechafin = '', tipo_documento = '', documento='')
  {

var myTable = 
        $('#thistoriaspdf').DataTable({
        language: idioma_espanol,
        processing: true,
        lengthMenu: [ [25, 50, 100, 500, -1 ], [25, 50, 100, 500, "Mostrar Todo"] ],
        processing: true,
        serverSide: true,
        aaSorting: [[ 4, "desc" ]],
        
        ajax:{
          url:"{{ route('historiapdf')}}",
          type:"get",
          data:{fechaini:fechaini, fechafin:fechafin, tipo_documento:tipo_documento, documento:documento },
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
          {data:'documento',
           name:'documento'
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

}

$('#buscarhis').click(function(){
    
    var fechaini = $('#fechaini').val();
    var fechafin = $('#fechafin').val();
    var tipo_documento = $('#tipo_documento').val();
    var documento = $('#documento').val();
    
    
    
    if((fechaini != '' && fechafin != '') || (tipo_documento != '' &&  documento != '' )){
    
       $('#thistoriaspdf').DataTable().destroy();
       fill_datatable(fechaini, fechafin, tipo_documento, documento);
    
    }else{
    
      Swal.fire(
                        {
                          icon: 'warning',
                          title: 'Debes ingresar las fechas de inicio y fin de la historia o el tipo y numedo de documento',
                          showConfirmButton: false,
                          timer: 1000
                          
                        }
                      )
    }
    });  

  $('#form-general-h').on('submit', function(event){
    event.preventDefault(); 
    
    var fechaini = $('#fechaini').val();
    var fechafin = $('#fechafin').val();
    var tipo_documento = $('#tipo_documento').val();
    var documento = $('#documento').val();
    
    
    
    if((fechaini != '' && fechafin != '') || (tipo_documento != '' &&  documento != '' )){
    
       $('#thistoriaspdf').DataTable().destroy();
       fill_datatable(fechaini, fechafin, tipo_documento, documento);
    
    }else{
    
      Swal.fire(
                        {
                          icon: 'success',
                          title: 'Debes ingresar las fechas de inicio y fin de la historia o el tipo y numedo de documento',
                          showConfirmButton: false,
                          timer: 1000
                          
                        }
                      )
    }
      

  });


// Click para descarga de historia clinica
  $(document).on('click', '.ipdf', function(){
  var idh = $(this).attr('id');
  
  $.ajax({
          url:"{{route('exportarpdfh')}}",
          type:"get",
          data:{idh:idh},
          xhrFields: {
        responseType: 'blob' // to avoid binary data being mangled on charset conversion
    },
    success: function(blob, status, xhr) {
        // check for a filename
        var filename = "";
        var disposition = xhr.getResponseHeader('Content-Disposition');
        if (disposition && disposition.indexOf('attachment') !== -1) {
            var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
            var matches = filenameRegex.exec(disposition);
            if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
        }

        if (typeof window.navigator.msSaveBlob !== 'undefined') {
            // IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
            window.navigator.msSaveBlob(blob, filename);
        } else {
            var URL = window.URL || window.webkitURL;
            var downloadUrl = URL.createObjectURL(blob);

            if (filename) {
                // use HTML5 a[download] attribute to specify filename
                var a = document.createElement("a");
                // safari doesn't support this yet
                if (typeof a.download === 'undefined') {
                    window.location.href = downloadUrl;
                } else {
                    a.href = downloadUrl;
                    a.download = filename;
                    document.body.appendChild(a);
                    a.click();
                }
            } else {
                window.location.href = downloadUrl;
            }

            setTimeout(function () { URL.revokeObjectURL(downloadUrl); }, 100); // cleanup
        }
    }
 
    });


  });


// Click para descarga de formula medica
$(document).on('click', '.ifm', function(){
  var idh = $(this).attr('id');
  
  $.ajax({
          url:"{{route('exportarpdff')}}",
          type:"get",
          data:{idh:idh},
          xhrFields: {
        responseType: 'blob' // to avoid binary data being mangled on charset conversion
    },
    success: function(blob, status, xhr) {
        // check for a filename
        var filename = "";
        var disposition = xhr.getResponseHeader('Content-Disposition');
        if (disposition && disposition.indexOf('attachment') !== -1) {
            var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
            var matches = filenameRegex.exec(disposition);
            if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
        }

        if (typeof window.navigator.msSaveBlob !== 'undefined') {
            // IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
            window.navigator.msSaveBlob(blob, filename);
        } else {
            var URL = window.URL || window.webkitURL;
            var downloadUrl = URL.createObjectURL(blob);

            if (filename) {
                // use HTML5 a[download] attribute to specify filename
                var a = document.createElement("a");
                // safari doesn't support this yet
                if (typeof a.download === 'undefined') {
                    window.location.href = downloadUrl;
                } else {
                    a.href = downloadUrl;
                    a.download = filename;
                    document.body.appendChild(a);
                    a.click();
                }
            } else {
                window.location.href = downloadUrl;
            }

            setTimeout(function () { URL.revokeObjectURL(downloadUrl); }, 100); // cleanup
        }
    }
 
    });


  });

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

