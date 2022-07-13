<div class="card card-info p-2">
    <div class="card-header with-border row p-2">
        <h6 class="card-title-1 col-lg-10">Diagnostico</h6>
      
      </div>
      <div class="card card-info p-2">   
      <div class="card-body with-border">        
      <div class="form-group row">
        <div class="col-lg-9 col-md-6 col-xs-6">
            <label for="codigo_cie10" class="col-xs-8 control-label requerido">Busqueda de diagnostico</label>
            <select name="cie10_id" id="cie10_motivo_consulta1" class="form-control " style="width: 100%;" required>
               
            </select>
        </div>
    
    <div class="col-lg-3">
        <label for="tipo" class="col-xs-4 control-label requerido">Tipo de diagnostico</label>
                    <select name="tipo" id="tipo" class="form-control" style="width: 100%;">
                    <option value="">---seleccione tipo de diagnostico---</option>
                    <option value="PRINCIPAL">PRINCIPAL</option>
                    <option value="RELACIONADO">RELACIONADO</option>
                    
                    </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12">
        <label for="observacion" class="col-xs-4 control-label ">observacion</label>
        <textarea name="observacion" id="observacion" class="form-control" rows="3" placeholder="Ingrese una observación ..." value="{{old('observacion')}}" ></textarea>
</div>


</div>
  <div class="col-lg-3">
    <input type="hidden" name="usuario_id" id="usuario_id" class="form-control" value="{{Session()->get('usuario_id') ?? ''}}" readonly >
  </div>
  <div class="col-lg-3">
       <input type="hidden" name="historia_id" id="historia_idp" class="form-control" value="{{old('historia_id')}}" readonly >
  </div>
        @include('includes.boton-form-crear-empresa-empleado-usuario')  
    </div>
</div>
<div class="card-body with-border">   
    
  <div class="card-body table-responsive p-2">
        
        <table id="tdiagnostico" class="table table-hover  text-nowrap">
          <thead>
          <tr>
                <th>Acciones</th>
                <th>Codigo Diagnostico</th>
                <th>Descripcion</th>
                <th>Tipo Diagnostico</th>
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


 