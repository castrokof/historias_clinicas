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
          <select name="afiliacion" id="afiliacion" class="form-control" style="width: 100%;" value="{{old('afiliacion')}}">
            <option value="" selected>-- Seleccionar --</option>
            <option value="Cotizante">Cotizante</option>
            <option value="Beneficiario">Beneficiario</option>
            <option value="Todos">Todos</option>
          </select>
        </div>

        <div class="col-lg-2">
          <label for="servicio" class="col-xs-4 control-label requerido">Servicios</label>
          <select name="servicio_id" id="servicio" class="form-control" style="width: 100%;" required>
          </select>
        </div>
        <!-- <div class="col-lg-4">
          <label for="servicios" class="col-xs-6 control-label">Servicios</label>
          <input type="text" name="servicios" id="servicios" class="form-control" value="{{old('servicios')}}" required>
        </div> -->
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

        <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{Session()->get('usuario_id')}}">
        <input type="hidden" name="eps_empresas_id" id="eps_empresas_id" class="form-control" readonly>
        <!-- <input type="hidden" name="id_eps_niveles" id="id_eps_niveles" class="form-control" readonly> -->

      </div>


      @include('includes.boton-form-crear-empresa-empleado-usuario')
    </div>
  </div>
  @include('admin.eps_empresa.tablas.table-eps-niveles')
</div>
