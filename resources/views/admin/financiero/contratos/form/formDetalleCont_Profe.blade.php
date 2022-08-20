<div class="form-group row">
    <div class="col-lg-6">
        <label for="nombre_n" class="col-xs-4 control-label ">Contrato</label>
        <input type="text" name="nombre_c" id="nombre_n" class="form-control" readonly></input>
    </div>

    <div class="col-lg-2">
        <label for="valor" class="col-xs-4 control-label requerido">Valor</label>
        <input type="number" name="valor" id="valor" class="form-control UpperCase" value="{{old('valor')}}" required></input>
    </div>

</div>
<div class="form-group row">
<div class="col-lg-3">
        <label for="cod_cups" class="col-xs-4 control-label ">Codigo CUPS</label>
        <input name="cups" id="cod_cups" class="form-control" readonly></input>
    </div>
    <div class="col-lg-8">
        <label for="procedimiento_n" class="col-xs-4 control-label ">Procedimiento</label>
        <input name="Procedimiento" id="procedimiento_n" class="form-control" readonly></input>
    </div>
</div>