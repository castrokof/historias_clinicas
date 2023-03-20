<!-- Estos datos deben ser insertados en la tabla fc__factura__procedimientos, junto con el sede_id y factura_id -->
<div class="form-group row">
  <div class="col-lg-6">
    <label for="fact_servicio2" class="col-xs-4 control-label requerido">Servicio</label>
    <select name="servicio_id" id="fact_servicio2" class="form-control " required>
    </select>
  </div>

  <div class="col-lg-6">
    <label for="fact_profesional2" class="col-xs-4 control-label requerido">Profesional</label>
    <select name="profesional_id" id="fact_profesional2" class="form-control " required>
    </select>
  </div>
</div>
<div class="form-group row">

  <div class="col-lg-6">
    <label for="fact_procedimiento" class="col-xs-4 control-label requerido">Procedimiento</label>
    <select name="procedimiento_id" id="fact_procedimiento" class="form-control " style="width: 100%;" required>
    </select>
  </div>
  <div class="col-lg-6">
    <label for="fact_contrato2" class="col-xs-4 control-label requerido">Contrato</label>
    <select name="contrato_id" id="fact_contrato2" class="form-control " style="width: 100%;" required>
    </select>
  </div>

</div>
<div class="form-group row">
  <div class="col-lg-6">
    <label for="cantidad" class="col-xs-4 control-label requerido">Cantidad</label>
    <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{old('cantidad')}}">
  </div>


  <div class="col-lg-6">
    <label for="valor" class="col-xs-4 control-label ">Valor Unitario</label>
    <input type="number" name="valor" id="valor" class="form-control" placeholder="$0.00" readonly>
  </div>
</div>

<div class="form-group row">
  <div class="col-lg-6">
    <label for="usuario_id" class="col-xs-4 control-label ">Cajero</label>
    <input name="usuario_id" id="usuario_id" class="form-control" value="{{Session()->get('usuario') ?? ''}}" readonly>
  </div>

  <div class="col-lg-6">
    <label for="created_at" class="col-xs-4 control-label ">Fecha</label>
    <input name="created_at" id="created_at" class="form-control" value="{{now() ?? ''}}" readonly>
  </div>
</div>

<div class="col-lg-3">
  <input type="hidden" name="usuario_id" id="usuario_id" class="form-control" value="{{Session()->get('usuario_id') ?? ''}}" readonly>
</div>
<div class="col-lg-3">
  <input type="hidden" name="historia_id" id="historia_idp" class="form-control" value="{{old('historia_id')}}" readonly>
</div>
