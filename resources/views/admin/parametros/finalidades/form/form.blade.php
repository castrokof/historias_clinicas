    <div class="form-group row">
        <div class="col-lg-2">
            <label for="finalidad" class="col-xs-4 control-label requerido">Finalidad</label>
            <input type="text" name="finalidad" id="finalidad" class="form-control" value="{{old('finalidad')}}" required>
        </div>
        <div class="col-lg-8">
            <label for="nombre" class="col-xs-4 control-label requerido">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}">
        </div>
        <div class="col-lg-2">
            <label for="regimen" class="col-xs-4 control-label ">Régimen</label>
            <select name="regimen" id="regimen" class="form-control select2bs4" style="width: 100%;" required>
                <option value="">---seleccione---</option>
                <option value="Particular">Particular</option>
                <option value="Contributivo">Contributivo</option>
                <option value="Subsidiado">Subsidiado</option>
                <option value="Vinculado">Vinculado</option>
                <option value="Otro régimen">Otro régimen</option>
                <option value="Accidentes de tránsito">Accidentes de tránsito</option>
                <option value="Riesgos profesionales">Riesgos profesionales</option>
                <option value="Desplazado">Desplazado</option>
            </select>
        </div>
        <div class="col-lg-4">
            <label for="eps" class="col-xs-4 control-label ">Empresa</label>
            <select name="eps_id" id="eps" class="form-control select2bs4" style="width: 100%;" required>
            </select>
        </div>

    </div>
    <div class="form-group row">
        
        <div class="col-lg-4">
            <label for="servicio_finalidad" class="col-xs-4 control-label ">Servicio</label>
            <select name="servicio_id" id="servicio_finalidad" class="form-control select2bs4" style="width: 100%;" required>
            </select>
        </div>
        <div class="col-lg-3">
            <label for="edad_min" class="col-xs-4 control-label ">Edad Mininma</label>
            <input type="text" name="edad_min" id="edad_min" class="form-control" value="{{old('edad_min')}}">
        </div>
        <div class="col-lg-3">
            <label for="edad_max" class="col-xs-4 control-label ">Edad Máxima</label>
            <input type="text" name="edad_max" id="edad_max" class="form-control" value="{{old('edad_max')}}">
        </div>
        <div class="col-lg-2">
            <label for="sexo" class="col-xs-4 control-label ">Género</label>
            <select name="sexo" id="sexo" class="form-control select2bs4" style="width: 100%;" required>
                <option value="">---seleccione---</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
        </div>
        <div class="col-lg-3">
            <label for="embarazo" class="col-xs-4 control-label ">Embaraza</label>
            <select name="embarazo" id="embarazo" class="form-control" style="width: 100%;" value="{{old('embarazo')}}" required>
                <option value="" selected>-- Selecciona embarazo --</option>
                <option value="1">SÍ</option>
                <option value="0">NO</option>
            </select>
        </div>

    </div>