    <div class="form-group row">
        <div class="col-lg-2">
            <label for="cod_atc" class="col-xs-4 control-label ">Codigo</label>
            <input type="text" name="cod_atc" id="cod_atc" class="form-control" value="{{old('cod_atc')}}" required>
        </div>
        <div class="col-lg-10">
            <label for="nombre" class="col-xs-4 control-label requerido">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}">
        </div>

    </div>
    <div class="form-group row">

        <div class="col-lg-3">
            <label for="consecutivo_forma" class="col-xs-4 control-label ">Consecutivo</label>
            <input type="text" name="consecutivo_forma" id="consecutivo_forma" class="form-control" value="{{old('consecutivo_forma')}}" required>
        </div>
        <div class="col-lg-3">
            <label for="forma" class="col-xs-4 control-label requerido">Forma</label>
            <input type="text" name="forma" id="forma" class="form-control" value="{{old('forma')}}">
        </div>
        <div class="col-lg-3">
            <label for="concentracion" class="col-xs-4 control-label requerido">Concentración</label>
            <input type="text" name="concentracion" id="concentracion" class="form-control" value="{{old('concentracion')}}">
        </div>
        <div class="col-lg-3">
            <label for="via_administracion" class="col-xs-4 control-label requerido">Via Administración</label>
            <input type="text" name="via_administracion" id="via_administracion" class="form-control" value="{{old('via_administracion')}}">
        </div>
    </div>