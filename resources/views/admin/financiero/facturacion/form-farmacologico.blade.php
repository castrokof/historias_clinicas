<div class="card card-info p-2">
    <div class="card-header with-border row p-2">
        <h6 class="card-title-1 col-lg-10">Farmacologico</h6>
      
    </div>
      <div class="card card-info p-2">   
      <div class="card-body with-border">        
      <div class="form-group row">
        <div class="col-lg-9 col-md-6 col-xs-6">
            <label for="cums" class="col-xs-6 control-label requerido">Busqueda de medicamentos</label>
            <select name="cums_id" id="cums" class="form-control" style="width: 100%;" required>
               
            </select>
        </div>

        <div class="col-lg-3 col-md-6 col-xs-6">
            <label for="via_administracion" class="col-xs-6 control-label requerido">Vía de administración</label>
            <select name="via_administracion" id="via_administracion" class="form-control " style="width: 100%;" required>
               
            </select>
        </div>
        
        
    
    
    </div>
<div class="form-group row">
<div class="card card-info col-4 p-1">   
<div class="card-body with-border"> 
  <div class="col-lg-12">
    <div class="card-header with-border p-2">
        <h6 class="card-title col-lg-12 control-label">Dosis</h6>
      
    </div>
      <div class="row p-2">
          
          
            <div class="col-lg-4">
            <label for="dosis" class="col-xs-6 control-label">Cantidad</label>
              <input type="text" name="dosis" id="dosis" class="validanumericos form-control" value="{{old('dosis')}}" required>
            </div> 
            <div class="col-lg-8">
                <label for="activo" class="col-xs-6 control-label requerido">Unidad de medida</label>
                            <select name="unidad_medida" id="unidad_medida" class="form-control select2bs4" style="width: 100%;">
                            <option value="">---seleccione---</option>
                            <option value="DOSIS">DOSIS</option>
                            <option value="% (V/V)">% (V/V)</option>
                            <option value="% (W/V)">% (W/V)</option>
                            <option value="% (W/W)">% (W/W)</option>
                            <option value="csp">csp</option>
                            <option value="DICC50">DICC50</option>
                            <option value="g/l">g/l</option>
                            <option value="GBq">GBq</option>
                            <option value="GBq/ml">GBq/ml</option>
                            <option value="gramos">gramos</option>
                            <option value="IOU">IOU</option>
                            <option value="IR (U.reactividad)">IR (U.reactividad)</option>
                            <option value="IU">IU</option>
                            <option value="kBq">kBq</option>
                            <option value="Lf">Lf</option>
                            <option value="LfU">LfU</option>
                            <option value="m">m</option>
                            <option value="M.U.I.">M.U.I.</option>
                            <option value="m3">m3</option>
                            <option value="MBq">MBq</option>
                            <option value="mcg">mcg</option>
                            <option value="mCi">mCi</option>
                            <option value="mEq">mEq</option>
                            <option value="mEq/ml">mEq/ml</option>
                            <option value="mg">mg</option>
                            <option value="mg/mL">mg/mL</option>
                            <option value="mg/CAP">mg/CAP</option>
                            <option value="mg/parche">mg/parche</option>
                            <option value="microgramos">microgramos</option>
                            <option value="miligramos">miligramos</option>
                            <option value="million CFU">million CFU</option>
                            <option value="million IU">million IU</option>
                            <option value="Millon de UI">Millon de UI</option>
                            <option value="millones">millones</option>
                            <option value="millones UI">millones UI</option>
                            <option value="ml">ml</option>
                            <option value="mmol">mmol</option>
                            <option value="MU">MU</option>
                            <option value="MUI">MUI</option>
                            <option value="UNIDAD">UNIDAD</option>
                            <option value="U FIP">U FIP</option>
                            <option value="U Ph.Eu">U Ph.Eu</option>
                            <option value="UD">UD</option>
                            <option value="UFC">UFC</option>
                            <option value="UFP">UFP</option>
                            <option value="ug">ug</option>
                            <option value="UI">UI</option>
                            <option value="UI / mL">UI / mL</option>
                            <option value="UI CGB">UI CGB</option>
                            <option value="unidades ELISA">unidades ELISA</option>
                            <option value="USP">USP</option>
                            <option value="UT">UT</option>
                        </select>
            </div> 
        </div>    
  </div>
</div>
</div>
<div class="card card-info col-4 p-2">   
<div class="card-body with-border"> 
  <div class="col-lg-12">
    <div class="card-header with-border p-2">
        <h6 class="card-title col-lg-12 control-label">Frecuencia de administración</h6>
      
    </div>
  <div class="row p-2">
      
      <div class="col-4 col-md-4">
      
        <label for="cada" class="col-xs-3 control-label requerido">Cada</label>
        
      <input type="text" name="cada" id="cada" class="validanumericos form-control" value="{{old('cada')}}" required >
      </div>
      <div class="col-8 col-md-8">
        <label for="unidad_tiempo" class="col-xs-6 control-label requerido">Unidad de tiempo</label>
                    <select name="unidad_tiempo_1" id="unidad_tiempo_1" class="form-control select2bs4" style="width: 100%;">
                    <option value="">---seleccione---</option>
                    <option value="Minuto(s)">Minuto(s)</option>
                    <option value="Hora(s)">Hora(s)</option>
                    <option value="Dia(s)">Día(s)</option>
                    <option value="Semana(s)">Semana(s)</option>
                    <option value="Mes(es)">Mes(es)</option>
                    <option value="Año">Año</option>
                    <option value="srt">Según respuesta al tratamiento</option>
                    </select>
    </div> 
     
      
</div>
</div>
</div>
</div>
  <div class="card card-info col-4 p-2"> 
  <div class="card-body with-border"> 
    <div class="col-lg-12">
      <div class="card-header with-border p-2">
          <h6 class="card-title col-lg-12 control-label">Duracion tratamiento</h6>
        
      </div>
      <div class="row p-2">
      <div class="col-4 col-md-4">
      <label for="duracion" class="col-xs-3 control-label">Durante:</label>
      
      <input type="text"  name="duracion" id="duracion" class="validanumericos form-control" value="{{old('duracion')}}" required >
      </div>
      <div class="col-8 col-md-8">
        <label for="unidad_tiempo_2" class="col-xs-6 control-label requerido">Periodo</label>
                    <select name="unidad_tiempo_2" id="unidad_tiempo_2" class="form-control select2bs4" style="width: 100%;">
                    <option value="">---seleccione---</option>
                    <option value="Minuto(s)">Minuto(s)</option>
                    <option value="Hora(s)">Hora(s)</option>
                    <option value="Dia(s)">Día(s)</option>
                    <option value="Semana(s)">Semana(s)</option>
                    <option value="Mes(es)">Mes(es)</option>
                    <option value="Año">Año</option>
                    </select>
      </div> 
      
  </div>
</div>
</div>
</div>
</div>  
</div>
</div>
<div class="card card-info p-2">   
  <div class="card-body with-border"> 
<div class="form-group row">
<div class="card card-info col-6 p-2">   
  <div class="card-body with-border"> 
    <div class="col-lg-12">
      <div class="card-header with-border p-2">
          <h6 class="card-title col-lg-12 control-label">Cantidad Total</h6>
        
      </div>
    <div class="row p-2">
        
        <div class="col-6 col-md-6">
        <label for="total_dosis" class="col-xs-3 control-label requerido">Número</label>
        <input type="text" name="total_dosis" id="total_dosis" class="validanumericos form-control" value="{{old('total_dosis')}}" required >
        </div>
             
        
  </div>
  </div>
  </div>
  </div>
  <div class="card card-info col-6 p-2">   
    <div class="card-body with-border"> 
      <div class="col-lg-12">
        <div class="card-header with-border p-2">
            <h6 class="card-title col-12 col-md-12 control-label">Recomendación u observacion</h6>
          
        </div>
      <div class="row p-2">
          
          <div class="col-lg-12 col-md-12">
            <label for="observacion" class="col-xs-6 control-label "></label>
            <textarea name="observacion" id="observacion" class="form-control" rows="3" placeholder="Ingrese una observación ..." value="{{old('observacion')}}" ></textarea>
          </div>
               
          
    </div>
    </div>
    </div>
    </div>
  </div>
</div>
</div>

    



  <div class="col-lg-3">
    <input type="hidden" name="usuario_id" id="usuario_id" class="form-control" value="{{Session()->get('usuario_id') ?? ''}}" readonly >
  </div>
  <div class="col-lg-3">
       <input type="hidden" name="historia_id" id="historia_idp2" class="form-control" value="{{old('historia_id')}}" readonly >
  </div>
        @include('includes.boton-form-crear-empresa-empleado-usuario')  
    
</div>
<div class="card-body with-border">   
    
  <div class="card-body table-responsive p-2">
        
        <table id="tfarmacologico" class="table table-hover  text-nowrap">
          <thead>
          <tr>
                <th>Acciones</th>
                <th>Cums</th>
                <th>Nombre medicamento</th>
                <th>Descripcion y forma</th>
                <th>Via administración</th>
                <th>Dosis</th>
                <th>Frecuencia</th>
                <th>Duración tratamiento</th>
                <th>Cantidad </th>
                <th>Observacion</th>
                <th>Creacion</th>
          </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
    </div>
</div>
</div>


 