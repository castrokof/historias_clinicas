<div class="form-group row">
    <div class="col-lg-2">
        <label for="codigo" class="col-xs-4 control-label requerido">Código</label>
        <input name="codigo" id="codigo" class="form-control " value="{{old('codigo')}}" required>
    </div>
    <div class="col-lg-7">
        <label for="nombre" class="col-xs-4 control-label requerido">Nombre medicamento</label>
        <input name="nombre" id="nombre" class="form-control UpperCase" placeholder="Ingrese el nombre del medicamento..." value="{{old('nombre')}}" required></input>
    </div>
    <div class="col-lg-2" style="display: block;">
        <label for="customSwitch1" class="col-xs-4 control-label requerido">Desactivar/Activar</label><br>
        <div class="form-group">
            <div class="custom-control custom-switch custom-switch-off-ligth custom-switch-on-success">
                <input type="checkbox" class="custom-control-input form-control" id="customSwitch1" checked>
                <label class="custom-control-label" for="customSwitch1"></label>
            </div>
        </div>
    </div>

</div>
<div class="form-group row">
    <div class="col-lg-12">
        <label for="detalle" class="col-xs-4 control-label ">Detalle</label>
        <input type="text" name="detalle" id="detalle" class="form-control" value="{{old('detalle')}}">
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-2">
        <label for="marca" class="col-xs-4 control-label requerido">Marca</label>
        <input name="marca" id="marca" class="form-control" value="{{old('marca')}}"></input>
    </div>
    <div class="col-lg-2">
        <label for="CUMS" class="col-xs-4 control-label">CUMS</label>
        <input name="CUMS" id="CUMS" class="form-control" value="{{old('CUMS')}}"></input>
    </div>
    <div class="col-lg-2">
        <label for="ATC_id" class="col-xs-4 control-label ">ATC</label>
        <input name="ATC_id" id="ATC_id" class="form-control" value="{{old('ATC_id')}}"></input>
    </div>
    <div class="col-lg-2">
        <label for="IUM" class="col-xs-4 control-label ">IUM</label>
        <input name="IUM" id="IUM" class="form-control" value="{{old('IUM')}}"></input>
    </div>
    <div class="col-lg-2">
        <label for="invima" class="col-xs-4 control-label requerido">Invima</label>
        <input name="invima" id="invima" class="form-control" value="{{old('invima')}}"></input>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-2">
        <label for="tipo" class="col-xs-4 control-label requerido">Tipo Medicamento</label>
        <input name="tipo" id="tipo" class="form-control" value="{{old('tipo')}}"></input>
    </div>
    <div class="col-lg-2">
        <label for="valor_particular" class="col-xs-4 control-label ">Valor Particular</label>
        <input type="number" name="valor_particular" id="valor_particular" class="form-control" value="{{old('valor_particular')}}"></input>
    </div>
    <div class="col-lg-2">
        <label for="stock_max" class="col-xs-4 control-label ">Stock Max</label>
        <input type="number" name="stock_max" id="stock_max" class="form-control" value="{{old('stock_max')}}"></input>
    </div>
    <div class="col-lg-2">
        <label for="stock_min" class="col-xs-4 control-label ">Stock Min</label>
        <input type="number" name="stock_min" id="stock_min" class="form-control" value="{{old('stock_min')}}"></input>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label for="cantidad_maxima" class="col-xs-4 control-label ">Cantidad máxima</label>
        <input type="number" name="cantidad_maxima" id="cantidad_maxima" class="form-control" placeholder="Cantidad máxima de medicamento por formula médica..." value="{{old('cantidad_maxima')}}"></input>
    </div>
    <div class="col-lg-6">
        <label for="cantidad_dias" class="col-xs-4 control-label ">Cantidad de días</label>
        <input type="number" name="cantidad_dias" id="cantidad_dias" class="form-control" placeholder="Cantidad de días entre cada formula médica..." value="{{old('cantidad_dias')}}"></input>
    </div>

    <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{Session()->get('usuario_id')}}">
    <input type="hidden" name="estado" id="estado" class="form-control" value="1">
</div>