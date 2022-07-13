<div class="form-group row">
    <div class="col-lg-3">
    <label for="nombre" class="col-xs-4 control-label requerido">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $data->nombre ?? '')}}" required >
    </div>
    <div class="col-lg-3">
                    <label for="tipo_documento" class="col-xs-4 control-label requerido">Tipo de documento</label>
                    <select name="tipo_documento" id="tipo_documento" class="form-control select2bs4" style="width: 100%;" required>
                        <option value="">---seleccione---</option>
                        <option value="NIT">NIT</option>
                        <option value="DNI">DNI</option>
                        <option value="CC">CC</option>
                        <option value="PASAPORTE">PASAPORTE</option>
                        </select>
    </div>
    <div class="col-lg-3">
        <label for="documento" class="col-xs-4 control-label requerido">Documento</label>
        <input type="text" name="documento" id="documento" class="form-control" value="{{old('documento', $data->documento ?? '')}}" minlength="6"  required >
    </div>
    <div class="col-lg-3">
        <label for="estado" class="col-xs-4 control-label requerido">Estado</label>
                    <select name="activo" id="activo" class="form-control select2bs4" style="width: 100%;" required>
                    <option value="">---seleccione el estado---</option>
                    <option value="1">activo</option>
                    <option value="0">inactivo</option>
                    </select>
        </div>
</div>

