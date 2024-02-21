    <div class="form-group row">
        <div class="col-lg-2">
            <label for="codigo" class="col-xs-4 control-label ">Codigo</label>
            <input type="text" name="codigo" id="codigo" class="form-control" value="{{old('codigo')}}" required>
        </div>
        <div class="col-lg-10">
            <label for="nombre_grupo" class="col-xs-4 control-label requerido">Nombre</label>
            <input type="text" name="nombre_grupo" id="nombre_grupo" class="form-control" value="{{old('nombre_grupo')}}">
        </div>

    </div>    
    <div class="form-group row">
        <!-- <div class="col-lg-3">
            <label for="estado" class="col-xs-4 control-label requerido">Estado</label>
            <select name="estado" id="estado" class="form-control" style="width: 100%;" value="{{old('estado')}}" required>
                <option value="" selected>-- Selecciona estado --</option>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div> -->
        <div class="col-lg-3">
            <input type="hidden" name="usuario_id" id="operador" class="form-control" value="{{Session()->get('usuario_id') ?? ''}}">
        </div>
        <div class="col-lg-3">
            <input type="hidden" name="paciente_id" id="id_paciente" class="form-control" value="{{old('plan',$datas->id_paciente ?? '')}}">
        </div>
    </div>