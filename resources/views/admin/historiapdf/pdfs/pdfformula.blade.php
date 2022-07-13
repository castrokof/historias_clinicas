<!DOCTYPE html>
<html style="height: auto;" lang="en">
<head>
 

  <title>Formular pdf</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<style>
  @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }
 
  body {
    font-family: "Times New Roman", serif;
    font-size: 9;
    margin: 2cm 1cm 2cm ;
  }

  header {
            position: fixed;
            top: 0.5cm;
            left: 1cm;
            right: 0cm;
            height: 0cm;
            background-color: white;
            color: black;
            text-align: left;
            line-height: 30px;
        }
  table, th, td {
  
  border: 0.5px solid black;
  
}

footer {
            position: fixed;
            bottom: 0cm;
            left: 2cm;
            right: 0cm;
            height: 2cm;
            background-color: white;
            color: black;
            text-align: left;
            line-height: 35px;
        }

</style>


</head>
<body>
  
<div class="container">
        @foreach ($datas as $item)
<header>
  
  <p><img src="{{public_path("assets/img/Fidem.png")}}" align="left" style="width: 150px; height: 50px;">
    <h5><br>Fecha y hora: {{$item->created_at_h}} # Historia: {{$item->id_historia_h}}</h5>
  </p>  
  
 
   
</header>
<footer>
   <p><h5>Dirección: Carrea 66 # 9 - 20 B/Gran Limonar  Cali-Colombia Celulares: 317-8516952  315-7155252</h5></p>
  
</footer>
                 <p><b>FORMULA MEDICA</b></p>
                 <p class="lead-center">
                  <div class="table-responsive">
                    <table style="width:100%" class="table table-hover table-striped">
                      <thead>
                        <tr style="width:100%"> <th colspan="6">DATOS PACIENTE</th>
                       
                                               
                     </thead> 
                    
                    </table>
                   
                  </div>
                   <div class="table-responsive">
                    <table style="width:100%" class="table table-hover table-striped">
                    <thead>
                                          
                        <tr><td><b>Nombres: </b></td> <td>{{$item->pnombre_p}} {{$item->snombre_p}}</td> <td><b>Apellidos: </b></td> <td>{{$item->papellido_p}} {{$item->sapellido_p}}</td> <td><b>Edad: </b></td> <td>{{$item->edad_p}}</td></tr>
                        <tr><td><b>Fecha: </b></td> <td colspan="5">{{now()}}</td></tr>
                        <tr><td><b>Medico: </b></td><td colspan="5"> {{$item->pnombre_u}} {{$item->snombre_u}} {{$item->papellido_u}} {{$item->sapellido_u}}</td></tr>
                      @endforeach                         
                    </thead> 
                      
                    <tbody>
                                                                    
                    </tbody>
                    </table>
                  
                  </div>
                  <div class="table-responsive">
                    <table style="width:100%" class="table table-hover table-striped">
                     
                      <thead>
                                            
                        <tr>
                          <th>Codigo Diagnostico</th>
                          <th>Descripcion</th>
                          <th>Tipo Diagnostico</th>
                          <th>Observacion</th>
                          
                        </tr>
                                                    
                      
                    </thead> 
                    <tbody>
                      @foreach ($datas2 as $item2)
                      <tr>
                      {{-- @if ($item2->tipo_d === 'PRINCIPAL') --}}
                          
                       
                      <td>{{$item2->codigo_cie10}}</td>  
                      <td>{{$item2->nombre_cie10}}</td>
                      <td>{{$item2->tipo_d}}</td>
                      <td>{{$item2->obs_d}}</td>
                      {{-- @endif  --}}
                      </tr>
                      @endforeach                                      
                    </tbody>
                    </table>
                  
                  </div>
                  <BR><BR>
                  <div class="table-responsive">
                      <table style="width:100%" class="table table-hover table-striped">
                        <thead>
                          <tr style="width:100%"> <th colspan="10">PLAN FARMACOLOGICO</th></tr>
                      
                      </table>
                      
                    </div>
                <div class="table-responsive">
                  <table style="width:100%" class="table table-hover table-striped">
                   
                    <thead>
                                          
                      <tr>
                        <th>Nombre medicamento</th>
                        <th>Descripcion</th>
                        <th>Forma</th>
                        <th>Activo</th>
                        <th>Via administración</th>
                        <th>Dosis</th>
                        <th>Frecuencia</th>
                        <th>Duración tratamiento</th>
                        <th>Total dosis</th>
                        <th>Observacion</th>
                      </tr>
                                                  
                    
                  </thead> 
                  <tbody>
                    @foreach ($datas4 as $item4)
                    <tr>
                    <td>{{$item4->nombre_medto}}</td>
                    <td>{{$item4->descripcion_medto}}</td>
                    <td>{{$item4->forma_farmaceutica}}</td>
                    <td>{{$item4->obs_cums}}</td>
                    <td>{{$item4->via_administracion}}</td>  
                    <td>{{$item4->dosis}}</td>
                    <td>{{$item4->frecuencia_hora}}</td>
                    <td>{{$item4->duracion_tmto}}</td>
                    <td>{{$item4->total_dosis}}</td>
                    <td>{{$item4->obs_pf}}</td>
                    
                    
                    </tr>
                    @endforeach                                      
                  </tbody>
                  </table>
                
                </div>
                
                 

                   
              
             </div>     
<script>

</script>

</body>
</html>