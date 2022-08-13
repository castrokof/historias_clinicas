<div class="form-group row">
    <div class="col-lg-3">
        <label for="cod_documentos" class="col-xs-4 control-label ">Código</label>
        <input type="text" name="cod_documentos" id="cod_documentos" class="form-control UpperCase" value="{{old('cod_documentos')}}" required>
    </div>
    <div class="col-lg-8">
        <label for="nombre" class="col-xs-4 control-label requerido">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control UpperCase" value="{{old('nombre')}}">
    </div>
</div>
<div class="form-group row">    
    <div class="col-lg-2">
        <label for="tipo_documento" class="col-xs-4 control-label requerido">Tipo Documento</label>
        <select name="tipo_doc_id" id="tipo_documento" class="form-control" style="width: 100%;" required>
        </select>
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
    <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{Session()->get('usuario_id')}}">
    <input type="hidden" name="estado" id="estado" class="form-control" value="1">
</div>