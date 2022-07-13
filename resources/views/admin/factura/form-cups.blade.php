<div class="form-group row">
  <div class="col-lg-2">
    <label for="codigo_cie10" class="col-xs-4 control-label requerido">Procedimiento</label>
    <select name="cie10_id" id="cie10_motivo_consulta1" class="form-control " style="width: 100%;" required>
    </select>
  </div>
  <div class="col-lg-2">
    <label for="servicio" class="col-xs-4 control-label requerido">Servicio</label>
    <select name="servicio" id="servicio" class="form-control " value="{{old('servicio')}}" required>
    </select>
  </div>
  <div class="col-lg-2">
    <label for="profesional" class="col-xs-4 control-label requerido">Profesional</label>
    <select name="profesional" id="profesional" class="form-control " value="{{old('profesional')}}" required>
    </select>
  </div>
  <div class="col-lg-2">
    <label for="cantidad" class="col-xs-4 control-label requerido">Cantidad</label>
    <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{old('cantidad')}}">
  </div>
  <div class="col-lg-2">
    <label for="contrato" class="col-xs-4 control-label requerido">Contrato</label>
    <input type="text" name="contrato" id="contrato" class="form-control" value="{{old('contrato')}}">
  </div>
</div>

<div class="form-group row">
  <div class="col-lg-2">
    <label for="usuario_id" class="col-xs-4 control-label ">Cajero</label>
    <input name="usuario_id" id="usuario_id" class="form-control" value="{{Session()->get('usuario') ?? ''}}" readonly>
  </div>
  <div class="col-lg-2">
    <label for="contrato" class="col-xs-4 control-label ">Fecha</label>
    <input name="contrato" id="contrato" class="form-control" value="{{now() ?? ''}}" readonly>
  </div>
  <div class="col-lg-2">
    <label for="valor" class="col-xs-4 control-label ">Valor Unitario</label>
    <input type="number" name="valor" id="valor" class="form-control" placeholder="$0.00" readonly>
  </div>
</div>

<div class="col-lg-3">
  <input type="hidden" name="usuario_id" id="usuario_id" class="form-control" value="{{Session()->get('usuario_id') ?? ''}}" readonly>
</div>
<div class="col-lg-3">
  <input type="hidden" name="historia_id" id="historia_idp" class="form-control" value="{{old('historia_id')}}" readonly>
</div>
<div class="form-group row">

</div>