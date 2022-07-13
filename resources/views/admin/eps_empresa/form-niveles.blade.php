<div class="form-group row">
  <div class="col-lg-2">
    <label for="codigo_n" class="col-xs-4 control-label ">Código</label>
    <input type="text" name="codigo_empresa" id="codigo_n" class="form-control" readonly>
  </div>
  <div class="col-lg-4">
    <label for="nombre_n" class="col-xs-4 control-label requerido">Razón Social</label>
    <input type="text" name="nombre" id="nombre_n" class="form-control" readonly>
  </div>
  <div class="col-lg-2">
    <label for="NIT_n" class="col-xs-4 control-label requerido">NIT</label>
    <input type="number" name="NIT" id="NIT_n" class="form-control" readonly>
  </div>
</div>

<!-- <p><a style="color:#0071c5;"> Niveles y cuotas de recuperación:</a> </p>
    <hr>-->

<div class="card card-info p-2">
  <!--<div class="card-header with-border row p-2"> -->
  <div class="card-header with-border">
    <h6 class="card-title-1">Niveles y cuotas de recuperación:</h6>
  </div>
  <div class="card card-info p-2">
    <div class="card-body with-border">
      <div class="form-group row">
        <div class="col-lg-2">
          <label for="nivel" class="col-xs-6 control-label">Nivel</label>
          <input type="text" name="nivel" id="nivel" class="form-control" value="{{old('nivel')}}" required>
        </div>
        <div class="col-lg-4">
          <label for="descripcion_nivel" class="col-xs-6 control-label">Descripcion</label>
          <input type="text" name="descripcion_nivel" id="descripcion_nivel" class="form-control" value="{{old('descripcion_nivel')}}" required>
        </div>
        <div class="col-lg-2">
          <label for="regimen" class="col-xs-6 control-label">Régimen</label>
          <!--<input type="text" name="regimen" id="regimen" class="form-control" value="{{old('regimen')}}" required> -->
          <select name="regimen" id="regimen" class="form-control" style="width: 100%;" value="{{old('regimen')}}" required>
            <option value="" selected>-- Seleccionar --</option>
            <!-- <option value="Particular">Particular</option> -->
            <option value="Contributivo">Contributivo</option>
            <option value="Subsidiado">Subsidiado</option>
            <option value="Vinculado">Vinculado</option>
            <option value="Otro régimen">Otro régimen</option>
            <option value="Accidentes de tránsito">Accidentes de tránsito</option>
            <option value="Riesgos profesionales">Riesgos profesionales</option>
            <option value="Desplazado">Desplazado</option>
          </select>
        </div>
        <div class="col-lg-3">
          <label for="tipo_recuperacion" class="col-xs-6 control-label">Tipo Recaudo</label>
          <!-- <input type="text" name="tipo_recuperacion" id="tipo_recuperacion" class="form-control" value="{{old('tipo_recuperacion')}}" required> -->
          <select name="tipo_recuperacion" id="tipo_recuperacion" class="form-control" style="width: 100%;" value="{{old('tipo_recuperacion')}}" required>
            <option value="" selected>-- Seleccionar --</option>
            <option value="Copago">Copago</option>
            <option value="Cuota Moderadora">Cuota Moderadora</option>
          </select>
        </div>

      </div>

      <div class="form-group row">
        <div class="col-lg-2">          
          <label for="afiliacion" class="col-xs-6 control-label">Afiliación</label>
          <!--<input type="text" name="afiliacion" id="afiliacion" class="form-control" value="{{old('afiliacion')}}" required>-->
          <select name="afiliacion" id="afiliacion" class="form-control" style="width: 100%;" value="{{old('afiliacion')}}" >
            <option value="" selected>-- Seleccionar --</option>
            <option value="Cotizante">Cotizante</option>
            <option value="Beneficiario">Beneficiario</option>
            <option value="Todos">Todos</option>
          </select>          
        </div>

        <div class="col-lg-4">
          <label for="servicios" class="col-xs-6 control-label">Servicios</label>
          <input type="text" name="servicios" id="servicios" class="form-control" value="{{old('servicios')}}" required>
        </div>
        <div class="col-lg-2">
          <label for="vlr_copago" class="col-xs-6 control-label">Valor</label>
          <input type="number" name="vlr_copago" id="vlr_copago" class="validanumericos form-control" placeholder="$" value="{{old('vlr_copago')}}" required>
        </div>
        <div class="col-lg-3">
          <label for="estado" class="col-xs-4 control-label requerido">Habilitado</label>
          <select name="estado" id="estado" class="form-control" style="width: 100%;" value="{{old('habilitado')}}" required>
            <option value="" selected>-- Seleccionar --</option>
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
          </select>
        </div>

      </div>
      <div class="col-lg-3">
        <input type="hidden" name="usuario_id" id="usuario_id" class="form-control" value="{{Session()->get('usuario_id') ?? ''}}" readonly>
      </div>
      <div class="col-lg-3">
        <input type="hidden" name="eps_empresas_id" id="eps_empresas_id" class="form-control" value="{{old('eps_empresas_id')}}" readonly>
      </div>
      <div class="col-lg-3">
        <input type="hidden" name="id_eps_niveles" id="id_eps_niveles" class="form-control" value="{{old('id_eps_niveles')}}" readonly>
      </div>
      @include('includes.boton-form-crear-empresa-empleado-usuario')
    </div>
  </div>
  <div class="card-body with-border">
    <div class="card-body table-responsive p-2">

      <table id="tniveles" class="table table-hover  text-nowrap">

        <thead>
          <tr>
            <th>Acciones</th>
            <th>Nivel</th>
            <th>Descripcion</th>
            <th>Régimen</th>
            <th>Recuperación</th>
            <th>Afiliación</th>
            <th>Servicios</th>
            <th>Valor</th>
            <th>Habilitado</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>