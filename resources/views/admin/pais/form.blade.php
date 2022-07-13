    <div class="form-group row">
        <div class="col-lg-3">
            <label for="cod_pais" class="col-xs-4 control-label ">Codigo</label>
            <input type="text" name="cod_pais" id="cod_pais" class="form-control" value="{{old('cod_pais')}}" required>
        </div>
        <div class="col-lg-3">
            <label for="nombre" class="col-xs-4 control-label requerido">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}">
        </div>
        <div class="col-lg-3">
            <!--Este es el estado de la EPS si esta activa o inactiva -->
            <label for="estado" class="col-xs-4 control-label requerido">Estado</label>
            <select name="estado" id="estado" class="form-control" style="width: 100%;" value="{{old('estado')}}" required>
                <option value="" selected>-- Selecciona estado --</option>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>
        <div class="col-lg-3">
            <input type="hidden" name="usuario_id" id="operador" class="form-control" value="{{Session()->get('usuario_id') ?? ''}}">
        </div>
        <div class="col-lg-3">
            <input type="hidden" name="paciente_id" id="id_paciente" class="form-control" value="{{old('plan',$datas->id_paciente ?? '')}}">
        </div>
    </div>