<div class="form-group row">
    <div class="col-lg-2">
        <label for="contrato" class="col-xs-4 control-label requerido">Código</label>
        <input type="text" name="contrato" id="contrato" class="form-control UpperCase" value="{{old('contrato')}}" required>
    </div>
    <div class="col-lg-7">
        <label for="nombre" class="col-xs-4 control-label requerido">Nombre</label>
        <input name="nombre" id="nombre" class="form-control UpperCase" placeholder="Ingrese el nombre del contrato..." value="{{old('nombre')}}" required></input>
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
        <label for="descripcion" class="col-xs-4 control-label ">Descripción</label>
        <!-- <input type="text" name="descripcion" id="descripcion" class="form-control" > -->
        <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-3">
        <label for="fecha_ini" class="col-xs-4 control label">Fecha Inicial</label>
        <input type="date" name="fecha_ini" id="fecha_ini" class="form-control">
    </div>
    <div class="col-lg-3">
        <label for="fecha_fin" class="col-xs-4 control label">Fecha Final</label>
        <input type="date" name="fecha_fin" id="fecha_fin" class="form-control">
    </div>
    <div class="col-lg-3">
        <label for="tipo_contrato" class="col-xs-4 control-label requerido">Tipo de Contrato</label>
        <!-- <input type="text" name="tipo_contrato" id="tipo_contrato" class="form-control"> -->
        <select name="tipo_contrato" id="tipo_contrato" class="form-control select2bs4" style="width: 100%;" required>
                <option value="">---seleccione---</option>
                <option value="Capita">Capita</option>
                <option value="Evento">Evento</option>
                <option value="PFM">PFM</option>
            </select>
    </div>

    <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{Session()->get('usuario_id')}}">
    <input type="hidden" name="estado" id="estado" class="form-control" value="1">
</div>