<div class="card card-info p-2">
    <div class="card-header with-border row p-2">
        <h6 class="card-title-1 col-lg-10">Plan terapeutico</h6>
      
      </div>
      <div class="card card-info p-2">   
      <div class="card-body with-border">        
      <div class="form-group row">
        <div class="col-lg-9 col-md-6 col-xs-6">
            <label for="cups" class="col-xs-8 control-label requerido">Busqueda de cups</label>
            <select name="cups_id" id="cups" class="form-control " style="width: 100%;" required>
               
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
       <input type="hidden" name="historia_id" id="historia_idp1" class="form-control" value="{{old('historia_id')}}" readonly >
  </div>
        @include('includes.boton-form-crear-empresa-empleado-usuario')  
    </div>
</div>
<div class="card-body with-border">   
    
  <div class="card-body table-responsive p-2">
        
        <table id="tterapeutico" class="table table-hover  text-nowrap">
          <thead>
          <tr>
                <th>Acciones</th>
                <th>Codigo cups</th>
                <th>Descripcion</th>
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


 