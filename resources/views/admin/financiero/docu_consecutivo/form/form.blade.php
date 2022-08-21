<div class="form-group row">
    <div class="col-lg-3">
        <label for="doc_conse" class="col-xs-4 control-label requerido">Documento</label>
        <select name="documento_id" id="doc_conse" class="form-control" style="width: 100%;" required>
        </select>
    </div>
    <div class="col-lg-3">
        <label for="consecutivo" class="col-xs-4 control-label requerido">Consecutivo</label>
        <input type="number" name="consecutivo" id="consecutivo" class="form-control UpperCase" value="{{old('consecutivo')}}">
    </div>
    <div class="col-lg-6">
        <label for="sede_docu" class="col-xs-4 control-label requerido">Sede</label>
        <select name="sede_id" id="sede_docu" class="form-control" style="width: 100%;" required>
        </select>
    </div>

</div>
<div class="form-group row">

    <div class="col-lg-12">
        <label for="observaciones" class="col-xs-8 control-label ">Observación</label>
        <textarea name="observaciones" id="observaciones" class="form-control" rows="3" placeholder="Enter ..."></textarea>
    </div>

    <!-- <div class="col-lg-2" style="display: block;">
        <label for="customSwitch1" class="col-xs-4 control-label requerido">Desactivar/Activar</label><br>
        <div class="form-group">
            <div class="custom-control custom-switch custom-switch-off-ligth custom-switch-on-success">
                <input type="checkbox" class="custom-control-input form-control" id="customSwitch1" checked>
                <label class="custom-control-label" for="customSwitch1" ></label>
            </div>
        </div>
    </div> -->
    <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{Session()->get('usuario_id')}}">
    <!-- <input type="hidden" name="nombre" id="nombre" class="form-control" value="1"> -->
</div>