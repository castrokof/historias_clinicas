<div class="form-group row">
    <div class="col-lg-6">
        <label for="nombre_med" class="col-xs-4 control-label ">Contrato</label>
        <input type="text" name="nombre_contrato" id="nombre_med" class="form-control" readonly></input>
    </div>

    <div class="col-lg-2">
        <label for="valor" class="col-xs-4 control-label requerido">Valor</label>
        <input type="number" name="valor" id="valor" class="form-control UpperCase" value="{{old('valor')}}" required></input>
    </div>

</div>
<div class="form-group row">
<div class="col-lg-3">
        <label for="med_c" class="col-xs-4 control-label ">Codigo Med</label>
        <input name="codigo_med" id="med_c" class="form-control" readonly></input>
    </div>
    <div class="col-lg-8">
        <label for="medicamento_n" class="col-xs-4 control-label ">Medicamento</label>
        <input name="Medicamento" id="medicamento_n" class="form-control" readonly></input>
    </div>
</div>