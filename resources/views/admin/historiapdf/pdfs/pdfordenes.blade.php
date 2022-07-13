<!DOCTYPE html>
<html style="height: auto;" lang="en">
<head>
 

  <title>Ordenes pdf</title>
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
  
 </div>
 
  
</header>
<footer>
  
  <p><h6>Firmado por: {{$item->pnombre_u}} {{$item->snombre_u}} {{$item->papellido_u}} {{$item->sapellido_u}} Especialidad: {{$item->especialidad_u}} </h6></p>
</footer>
                 <p><b>Ordenes</b></p>
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
                                              
                        <tr><td><b>Nombres: </b></td><td>{{$item->pnombre_p}} {{$item->snombre_p}}</td>
                        <td><b>Apellidos: </b></td><td colspan="3">{{$item->papellido_p}} {{$item->sapellido_p}}</td></tr>
                        <tr><td><b>Id: </b></td><td>{{$item->tipo_documento_p}}-{{$item->documento_p}}</td><td><b>Sexo: </b></td><td>{{$item->sexo_p}}</td><td><b>Edad: </b></td><td>{{$item->edad_p}}</td></tr>
                        <tr><td><b>Plan: </b></td><td>{{$item->plan_p}}</td><td><b>Eps: </b></td><td colspan="3">{{$item->eps_p}}</td></tr>
                                                   
                      
                    </thead> 
                      
                    <tbody>
                                                                    
                    </tbody>
                    </table>
                  
                  </div>

                  <BR><BR>
                   <div class="row">
                   <label for="periodo" class="col-xs-4 control-label requerido">MOTIVO DE CONSULTA</label>
                   </div>
                   @foreach ($datas1 as $item1)
                   <div class="row">
                   {{$item1->motivo_consulta}}
                   </div>
                  
                  <BR>
                    <div class="row">
                     <label for="periodo" class="col-xs-4 control-label requerido">ENFERMEDAD ACTUAL</label>
                    </div>
                     <BR>
                    <div class="row">
                      {{$item1->enfermedad_actual}}
                    </div>
                  <BR><BR>
                    <div class="table-responsive">
                      <table style="width:100%" class="table table-hover table-striped">
                        <thead>
                          <tr style="width:100%"> <th colspan="6">ANTECEDENTES</th>
                         
                       </thead> 
                      
                      </table>
                     
                    </div> 
                    <BR>
                    <div class="row">
                      <label for="periodo" class="col-xs-4 control-label requerido">PATOLOGICOS</label>
                    </div>
                    <div class="row">
                      &nbsp; &nbsp; &nbsp;{{$item1->patologico}}
                    </div>
                    <BR>
                    <div class="row">
                      <label for="periodo" class="col-xs-4 control-label requerido">FARMACOLOGICO</label>
                    </div>
                    <div class="row">
                      &nbsp; &nbsp; &nbsp;{{$item1->antecedente_farma}}
                    </div>
                    <BR>
                      <div class="row">
                        <label for="periodo" class="col-xs-4 control-label requerido">QUIRURGICOS</label>
                      </div>
                      <div class="row">
                        &nbsp; &nbsp; &nbsp;{{$item1->antecedente_qui}}
                      </div>
                      <BR>
                        <div class="row">
                          <label for="periodo" class="col-xs-4 control-label requerido">TÓXICOS</label>
                        </div>
                        <div class="row">
                          &nbsp; &nbsp; &nbsp;{{$item1->toxico}}
                        </div>
                        <BR>
                          <div class="row">
                            <label for="periodo" class="col-xs-4 control-label requerido">ALERGICOS</label>
                          </div>
                          <div class="row">
                            &nbsp; &nbsp; &nbsp;{{$item1->alergia}}
                          </div>
                          <BR>
                            <div class="row">
                              <label for="periodo" class="col-xs-4 control-label requerido">TRAUMATICOS</label>
                            </div>
                            <div class="row">
                              &nbsp; &nbsp; &nbsp;{{$item1->traumatico}}
                            </div>
                            <BR>
                              <div class="row">
                                <label for="periodo" class="col-xs-4 control-label requerido">FAMILIARES</label>
                              </div>
                              <div class="row">
                                &nbsp; &nbsp; &nbsp;{{$item1->familiares}}
                              </div>
                              <BR><BR>
                                <div class="table-responsive">
                                  <table style="width:100%" class="table table-hover table-striped">
                                    <thead>
                                      <tr style="width:100%"> <th colspan="6">EXAMEN FISICO</th>
                                    </thead> 
                                  
                                  </table>
                                 
                                </div>
                                <BR>
                                  <div class="row">
                                    <label  class="col-xs-4 control-label">SIGNOS VITALES</label>
                                  </div>
                                  <BR>
                                  <div class="row">
                                    <label class="col-xs-4 control-label">Presión arterial: </label><button type="button" class="btn-sm btn-info btn-flat">{{$item1->presion_arterial_1}} - {{$item1->presion_arterial_2}}&nbsp;mmHg</button>&nbsp;
                                    <label class="col-xs-4 control-label">Frecuencia cardiaca: </label><button type="button" class="btn-sm btn-info btn-flat">{{$item1->frecuencia_cardiaca}}&nbsp;Pul/Min</button>&nbsp; 
                                    <label class="col-xs-4 control-label">Frecuencia respiratoria: </label><button type="button" class="btn-sm btn-info btn-flat">{{$item1->pulson}}&nbsp;Res/Min</button> 
                                  </div>
                                  <div class="row">
                                    <label class="col-xs-4 control-label">SPO2: </label><button type="button" class="btn-sm btn-info btn-flat">{{$item1->saturacion_oxigeno}}&nbsp;%</button>&nbsp;
                                    <label class="col-xs-4 control-label">Temperatura: </label><button type="button" class="btn-sm btn-info btn-flat">{{$item1->temperatura}}&nbsp;°C</button>&nbsp;
                                    <label class="col-xs-4 control-label">Peso: </label><button type="button" class="btn-sm btn-info btn-flat">{{$item1->peso}}&nbsp;Kg</button>&nbsp; 
                                    <label class="col-xs-4 control-label">Talla: </label><button type="button" class="btn-sm btn-info btn-flat">{{$item1->talla}}&nbsp;cm</button>&nbsp;
                                    <label class="col-xs-4 control-label">Imc: </label><button type="button" class="btn-sm btn-info btn-flat">{{$item1->imc}}&nbsp;imc</button> 
                                  </div>
                            
                                  <BR>
                                    <div class="row">
                                      <label for="periodo" class="col-xs-4 control-label requerido">CABEZA</label>
                                    </div>
                                    <div class="row">
                                      &nbsp; &nbsp; &nbsp;{{$item1->cabezacuello}}
                                    </div>
                                  <BR>
                                    <div class="row">
                                      <label for="periodo" class="col-xs-4 control-label requerido">CUELLO</label>
                                    </div>
                                    <div class="row">
                                      &nbsp; &nbsp; &nbsp;{{$item1->cuello}}
                                    </div>
                                  <BR>
                                    <div class="row">
                                      <label for="periodo" class="col-xs-4 control-label requerido">TÓRAX</label>
                                    </div>
                                    <div class="row">
                                      &nbsp; &nbsp; &nbsp;{{$item1->torax}}
                                    </div>
                                  <BR>
                                    <div class="row">
                                      <label for="periodo" class="col-xs-4 control-label requerido">CARDIO PULMONAR</label>
                                    </div>
                                    <div class="row">
                                      &nbsp; &nbsp; &nbsp;{{$item1->car_pulmonar}}
                                    </div>
                                  <BR>
                                    <div class="row">
                                      <label for="periodo" class="col-xs-4 control-label requerido">ABDOMEN</label>
                                    </div>
                                    <div class="row">
                                      &nbsp; &nbsp; &nbsp;{{$item1->abdomen}}
                                    </div>
                                  <BR>
                                    <div class="row">
                                      <label for="periodo" class="col-xs-4 control-label requerido">GENITOURINARIO</label>
                                    </div>
                                    <div class="row">
                                      &nbsp; &nbsp; &nbsp;{{$item1->genitourinario}}
                                    </div>
                                  <BR>
                                    <div class="row">
                                      <label for="periodo" class="col-xs-4 control-label requerido">EXTREMIDADES</label>
                                    </div>
                                    <div class="row">
                                      &nbsp; &nbsp; &nbsp;{{$item1->extremidad}}
                                    </div>
                                  <BR>
                                    <div class="row">
                                      <label for="periodo" class="col-xs-4 control-label requerido">OBSTEO MUSCULAR</label>
                                    </div>
                                    <div class="row">
                                      &nbsp; &nbsp; &nbsp;{{$item1->obsteomuscular}}
                                    </div>
                                  <BR>
                                    <div class="row">
                                      <label for="periodo" class="col-xs-4 control-label requerido">SISTEMA NERVIOSO CENTRAL</label>
                                    </div>
                                    <div class="row">
                                      &nbsp; &nbsp; &nbsp;{{$item1->sis_nervioso_cen}}
                                    </div>
                                  <BR>
                                    <div class="row">
                                      <label for="periodo" class="col-xs-4 control-label requerido">OBSERVACIÓN GENERAL</label>
                                    </div>
                                    <div class="row">
                                      &nbsp; &nbsp; &nbsp;{{$item1->recomendacionesg}}
                                    </div>
                                  <BR>
                      
                        <div class="table-responsive">
                          <table style="width:100%" class="table table-hover table-striped">
                            <thead>
                              <tr style="width:100%"> <th colspan="6">DIAGNÓSTICO Y PLAN</th></tr>
                            </thead> 
                          
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
                        <td>{{$item2->codigo_cie10}}</td>  
                        <td>{{$item2->nombre_cie10}}</td>
                        <td>{{$item2->tipo_d}}</td>
                        <td>{{$item2->obs_d}}</td>
                        
                        </tr>
                        @endforeach                                      
                      </tbody>
                      </table>
                    
                    </div>
                    <BR>
                      <div class="row">
                        <label for="periodo" class="col-xs-4 control-label requerido">PLAN</label>
                      </div>
                      <div class="row">
                        &nbsp; &nbsp; &nbsp;{{$item1->recomendacionesd}}
                      </div>
                      <BR>
                      <div class="table-responsive">
                        <table style="width:100%" class="table table-hover table-striped">
                          <thead>
                            <tr style="width:100%"> <th colspan="6">PLAN TERAPEUTICO</th></tr>
                        
                        </table>
                        
                      </div>
                  <div class="table-responsive">
                    <table style="width:100%" class="table table-hover table-striped">
                     
                      <thead>
                                            
                        <tr>
                          <th>Codigo cups</th>
                          <th>Descripcion</th>
                          <th>Observacion</th>
                          
                          
                        </tr>
                                                    
                      
                    </thead> 
                    <tbody>
                      @foreach ($datas3 as $item3)
                      <tr>
                      <td>{{$item3->cod_cups}}</td>  
                      <td>{{$item3->nombre_cups}}</td>
                      <td>{{$item3->obs_pt}}</td>
                      
                      
                      </tr>
                      @endforeach                                      
                    </tbody>
                    </table>
                  
                  </div>
                  <BR>
                  <BR>
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
                
                    @endforeach
                    <header>
  
                      <p><img src="{{public_path("assets/img/Fidem.png")}}" align="left" style="width: 150px; height: 50px;">
                        <h5><br>Fecha y hora: {{$item->created_at_h}} # Historia: {{$item->id_historia_h}}</h5>
                      </p>  
                      
                     </div>
                     
                      
                    </header>
                    <footer>
                     
                      <p><h6>Firmado por: {{$item->pnombre_u}} {{$item->snombre_u}} {{$item->papellido_u}} {{$item->sapellido_u}} Especialidad: {{$item->especialidad_u}}</h6></p>
                    </footer>
               @endforeach    
             </div>     
<script>

</script>

</body>
</html>