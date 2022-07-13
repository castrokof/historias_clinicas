<div class="form-group row">
    <div class="col-lg-3">
    <label for="nombre" class="col-xs-4 control-label requerido">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $data->nombre ?? '')}}" required >
    </div>
    <div class="col-lg-3">
                    <label for="tipodedocumento" class="col-xs-4 control-label requerido">Tipo de documento</label>
                    <select name="tipo_documento" id="tipo_documento" class="form-control select2bs4" style="width: 100%;" required>
                        <option value="">---seleccione---</option>
                        <option value="NIT" {{($data->tipo_documento === "NIT") ?  "selected" : ""}}>NIT</option>
                        <option value="DNI" {{($data->tipo_documento === "DNI") ?  "selected" : ""}}>DNI</option>
                        <option value="CC" {{($data->tipo_documento === "CC") ?  "selected" : ""}}>CC</option>
                        <option value="PASAPORTE" {{($data->tipo_documento === "PASAPORTE") ?  "selected" : ""}}>PASAPORTE</option>
                        </select>
    </div>
    <div class="col-lg-3">
        <label for="documento" class="col-xs-4 control-label requerido">Documento</label>
        <input type="documento" name="documento" id="documento" class="form-control" value="{{old('documento', $data->documento ?? '')}}" required >
    </div>
    <div class="col-lg-3">
        <label for="estado" class="col-xs-4 control-label requerido">Estado</label>
                    <select name="activo" id="activo" class="form-control select2bs4" style="width: 100%;" required>
                    <option value="">---seleccione el estado---</option>
                    <option value="1" {{($data->activo === "1") ?  "selected" : ""}}>activo</option>
                    <option value="0" {{($data->activo === "0") ?  "selected" : ""}}>inactivo</option>
                    </select>
    </div>
</div>
