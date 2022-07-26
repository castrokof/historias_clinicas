<div class="form-group row">
    <div class="col-lg-2">
        <label for="cod_cups" class="col-xs-4 control-label requerido">Código</label>
        <input type="number" name="cod_cups" id="cod_cups" class="form-control " placeholder="CUPS" value="{{old('cod_cups')}}" readonly>
    </div>
    <div class="col-lg-2">
        <label for="cod_alterno" class="col-xs-4 control-label ">Código Alterno</label>
        <input name="cod_alterno" id="cod_alterno" class="form-control" value="{{old('cod_alterno')}}">
    </div>
    <div class="col-lg-8">
        <label for="nombre" class="col-xs-4 control-label requerido">Nombre</label>
        <input name="nombre" id="nombre" class="form-control UpperCase" placeholder="Ingrese el nombre del procedimiento..." value="{{old('nombre')}}" required></input>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label for="descripcion" class="col-xs-4 control-label">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control UpperCase" rows="2" placeholder="Ingrese la descripcion del procedimiento..." value="{{old('descripcion')}}"></textarea>
    </div>
    <div class="col-lg-6">
        <label for="observacion" class="col-xs-4 control-label">Observacion</label>
        <textarea name="observacion" id="observacion" class="form-control" rows="2" placeholder="Observaciones..." value="{{old('observacion')}}"></textarea>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-2">
        <label for="grupo" class="col-xs-4 control-label ">Grupo</label>
        <input name="grupo" id="grupo" class="form-control" value="{{old('grupo')}}"></input>
    </div>
    <div class="col-lg-2">
        <label for="finalidad" class="col-xs-4 control-label ">Finalidad</label>
        <input name="finalidad" id="finalidad" class="form-control" value="{{old('finalidad')}}"></input>
    </div>
    <div class="col-lg-2">
        <label for="genero" class="col-xs-4 control-label ">Género</label>
        <select name="genero" id="genero" class="form-control select2bs4" style="width: 100%;">
            <option value="">---seleccione---</option>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        </select>
    </div>
    <div class="col-lg-2">
        <label for="cantidad_maxima" class="col-xs-4 control-label requerido">Cantidad maxima:</label>
        <input type="number" name="cantidad_maxima" id="cantidad_maxima" class="form-control" placeholder="Procedimiento por formula..." value="{{old('cantidad_maxima')}}" required></input>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-2">
        <label for="edad_1" class="col-xs-4 control-label ">Edad Minima</label>
        <input type="number" name="edad_1" id="edad_1" class="form-control" value="{{old('edad_1')}}"></input>
    </div>
    <div class="col-lg-2">
        <label for="edad_2" class="col-xs-4 control-label ">Edad Maxima</label>
        <input type="number" name="edad_2" id="edad_2" class="form-control" value="{{old('edad_2')}}"></input>
    </div>
    <div class="col-lg-2">
        <label for="valor_SOAT" class="col-xs-4 control-label ">Varlor SOAT</label>
        <input type="number" name="valor_SOAT" id="valor_SOAT" class="form-control" value="{{old('valor_SOAT')}}"></input>
    </div>
    <div class="col-lg-2">
        <label for="valor_particular" class="col-xs-4 control-label ">Varlor Particular</label>
        <input type="number" name="valor_particular" id="valor_particular" class="form-control" value="{{old('valor_particular')}}"></input>
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


    <input type="hidden" name="user_id" id="user_id1" class="form-control" value="{{Session()->get('usuario_id')}}">    
    <input type="hidden" name="listas_id" id="list_id" class="form-control" value="">
    <input type="hidden" name="estado" id="estado1" class="form-control" value="1">
</div>



<!-- <div class="form-group row">
    <div class="col-lg-4">
        <label for="slug1" class="col-xs-4 control-label requerido">Slug1-Código</label>
        <input type="text" name="slug" id="slug1" class="form-control UpperCase" value="{{old('surname')}}" required >
        <br>
        <label for="nombre1" class="col-xs-4 control-label requerido">Nombre1</label>
        <input type="text" name="nombre" id="nombre1" class="form-control UpperCase" value="{{old('ssurname')}}" required >
    </div>

    <div class="col-lg-6">
        <label for="descripcion1" class="col-xs-4 control-label requerido">Descripción</label>
        <textarea name="descripcion" id="descripcion1" class="form-control UpperCase" rows="4" placeholder="Ingrese la descripcion1 de la lista..." value="{{old('descripcion')}}" required></textarea>
    </div>
    <div class="col-lg-2" style="display: block;">
        <label for="customSwitch2" class="col-xs-4 control-label requerido">Desactivar/Activar</label><br>
        <div class="form-group">
            <div class="custom-control custom-switch custom-switch-off-ligth custom-switch-on-success">
            <input type="checkbox" class="custom-control-input form-control" id="customSwitch2" checked>
            <label class="custom-control-label" for="customSwitch2"></label>
            </div>
        </div> -->