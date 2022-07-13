    <div class="form-group row">
    <div class="col-lg-3">
        <label for="pnombre" class="col-xs-4 control-label ">Primer nombre</label>
        <input type="text" name="pnombre" id="pnombre" class="form-control" value="{{old('pnombre')}}" required >
    </div>
    <div class="col-lg-3">
        <label for="snombre" class="col-xs-4 control-label requerido">Segundo nombre</label>
        <input type="text" name="snombre" id="snombre" class="form-control" value="{{old('snombre')}}"  >
    </div>
    <div class="col-lg-3">
        <label for="papellido" class="col-xs-4 control-label requerido">Primer apellido</label>
        <input type="text" name="papellido" id="papellido" class="form-control" value="{{old('papellido')}}" required >
    </div>
    <div class="col-lg-3">
        <label for="sapellido" class="col-xs-4 control-label ">Segundo apellido</label>
        <input type="text" name="sapellido" id="sapellido" class="form-control" value="{{old('sapellido')}}"  >
    </div>
    </div>
    <div class="form-group row">
    <div class="col-lg-2">
        <label for="tipo_documento" class="col-xs-4 control-label requerido">Tipo de documento</label>
        <select name="tipo_documento" id="tipo_documento" class="form-control select2bs4" style="width: 100%;" required>
            <option value="">---seleccione---</option>
            <option value="AS">AS</option>
            <option value="CC">CC</option>
            <option value="CE">CE</option>
            <option value="MS">MS</option>
            <option value="NI">NI</option>
            <option value="NU">NU</option>
            <option value="PE">PE</option>
            <option value="RC">RC</option>
            <option value="TI">TI</option>
        </select>
    </div>
    <div class="col-lg-3">
        <label for="documento" class="col-xs-4 control-label requerido">Documento</label>
        <input type="text" name="documento" id="documento" class="form-control" value="{{old('documento')}}" minlength="6"  required >
    </div>

    <div class="col-lg-2">
        <label for="futuro2" class="col-xs-4 control-label requerido">Fecha nacimiento</label>
        <input type="date" name="futuro2" id="futuro2" class="form-control" value="{{old('futuro2')}}" required >
        </div>
    <div class="col-lg-1">
        <label for="edad" class="col-xs-4 control-label ">Edad</label>
        <input type="number" name="edad" id="edad" class="form-control" value="{{old('edad')}}" placeholder = "Edad"readonly >
    </div>
    <div class="col-lg-2">
        <label for="futuro3" class="col-xs-4 control-label requerido">Departamento</label>
        <input type="text" name="futuro3" id="futuro3" class="form-control" value="{{old('ciudad')}}" required >
    </div>
    <div class="col-lg-2">
        <label for="ciudad" class="col-xs-4 control-label requerido">Ciudad</label>
        <input type="text" name="ciudad" id="ciudad" class="form-control" value="{{old('ciudad')}}" required >
    </div>

    </div>
    <div class="form-group row">
    <div class="col-lg-3">
    <label for="direccion" class="col-xs-4 control-label requerido">Direccion</label>
    <input type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion')}}" minlength="6" required >
    </div>
    <div class="col-lg-3">
        <label for="celular" class="col-xs-4 control-label requerido">Celular</label>
        <input type="tel" name="celular" id="celular" class="form-control" value="{{old('celular')}}" required>
    </div>
    <div class="col-lg-3">
        <label for="telefono" class="col-xs-4 control-label ">Telefono</label>
        <input type="tel" name="telefono" id="telefono" class="form-control" value="{{old('telefono')}}" >
    </div>

    <div class="col-lg-3">
        <label for="correo" class="col-xs-4 control-label ">E-mail</label>
        <input type="email" name="correo" id="correo" class="form-control" value="{{old('correo')}}">
    </div>

    </div>
    <div class="form-group row">
        <div class="col-lg-3">
            <label for="sexo" class="col-xs-4 control-label requerido">Sexo</label>
            <select name="sexo" id="sexo" class="form-control select2bs4" style="width: 100%;" required>
                <option value="">---seleccione---</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </div>
        <div class="col-lg-3">
            <label for="eps" class="col-xs-4 control-label requerido">eps</label>
            <select name="eps" id="eps" class="form-control select2bs4" style="width: 100%;" required>
            <option value="">---seleccione---</option>
            <option value="COMFENALCO">COMFENALCO</option>
            <option value="SOS">SOS</option>
        </select>
        </div>
    <div class="col-lg-2">
        <label for="plan" class="col-xs-4 control-label requerido">plan</label>
        <select name="plan" id="plan" class="form-control select2bs4" style="width: 100%;" required>
            <option value="">---seleccione---</option>
            <option value="CONTRIBUTIVO">CONTRIBUTIVO</option>
            <option value="SUBSIDIADO">SUBSIDIADO</option>
        </select>
    </div>
    <div class="col-lg-2">
        <label for="futuro" class="col-xs-4 control-label requerido">tipo plan</label>
        <select name="futuro" id="futuro" class="form-control select2bs4" style="width: 100%;" required>
        <option value="">---seleccione---</option>
        <option value="BENEFICIARIO">BENEFICIARIO</option>
        <option value="COTIZANTE">COTIZANTE</option>
    </select>
    </div>
    <div class="col-lg-2">
        <label for="futuro1" class="col-xs-4 control-label requerido">Nivel</label>
        <select name="futuro1" id="futuro1" class="form-control select2bs4" style="width: 100%;" required>
        <option value="">---seleccione---</option>
        <option value="A">NIVEL A</option>
        <option value="B">NIVEL B</option>
        <option value="C">NIVEL C</option>
        <option value="1">NIVEL 0</option>
    </select>
    </div>


    <div class="col-lg-3">
        <input type="hidden" name="usuario_id" id="operador" class="form-control" value="{{Session()->get('usuario_id') ?? ''}}" >
    </div>
    <div class="col-lg-3">
        <input type="hidden" name="paciente_id" id="id_paciente" class="form-control" value="{{old('plan',$datas->id_paciente ?? '')}}" >
    </div>
    </div>
    <div class="form-group row">
    <div class="col-lg-3">
        <label for="observaciones" class="col-xs-8 control-label ">Observación</label>
        <textarea name="observaciones" id="observaciones" class="form-control" rows="3" placeholder="Enter ..." ></textarea>
    </div>
    </div>
