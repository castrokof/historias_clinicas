    <div class="form-group row">
        <div class="col-lg-3">
            <label for="pnombre" class="col-xs-4 control-label ">Primer nombre</label>
            <input type="text" name="pnombre" id="pnombre" class="form-control" value="{{old('pnombre')}}" required>
        </div>
        <div class="col-lg-3">
            <label for="snombre" class="col-xs-4 control-label requerido">Segundo nombre</label>
            <input type="text" name="snombre" id="snombre" class="form-control" value="{{old('snombre')}}">
        </div>
        <div class="col-lg-3">
            <label for="papellido" class="col-xs-4 control-label requerido">Primer apellido</label>
            <input type="text" name="papellido" id="papellido" class="form-control" value="{{old('papellido')}}" required>
        </div>
        <div class="col-lg-3">
            <label for="sapellido" class="col-xs-4 control-label ">Segundo apellido</label>
            <input type="text" name="sapellido" id="sapellido" class="form-control" value="{{old('sapellido')}}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-2">
            <label for="tipo_documento" class="col-xs-4 control-label requerido">Tipo de documento</label>
            <select name="tipo_documento" id="tipo_documento" class="form-control select2bs4" style="width: 100%;" required>

            </select>
        </div>
        <div class="col-lg-3">
            <label for="documento" class="col-xs-4 control-label requerido">Documento</label>
            <input type="text" name="documento" id="documento" class="form-control" value="{{old('documento')}}" minlength="6" required>
        </div>

        <div class="col-lg-2">
            <label for="futuro2" class="col-xs-4 control-label requerido">Fecha nacimiento</label>
            <input type="date" name="futuro2" id="futuro2" class="form-control" value="{{old('futuro2')}}" required>
        </div>
        <div class="col-lg-1">
            <label for="edad" class="col-xs-4 control-label ">Edad</label>
            <input type="number" name="edad" id="edad" class="form-control" value="{{old('edad')}}" placeholder="Edad" readonly>
        </div>
        <div class="col-lg-2">
            <label for="sexo" class="col-xs-4 control-label requerido">Género</label>
            <select name="sexo" id="sexo" class="form-control select2bs4" style="width: 100%;" required>
                <option value="">---seleccione---</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </div>
        <div class="col-lg-2">
            <label for="orientacion_sexual" class="col-xs-4 control-label requerido">Orientación Sexual</label>
            <select name="orientacion_sexual" id="orientacion_sexual" class="form-control select2bs4" style="width: 100%;" required>
                <option value="">---seleccione---</option>
                <option value="He">Heterosexual</option>
                <option value="Ho">Homosexual</option>
                <option value="Bi">Bisexual</option>
                <option value="Tr">Transexual</option>
                <option value="In">Intersexual</option>
                <option value="Ot">Otra</option>
            </select>
        </div>

    </div>
    <div class="form-group row">
        <div class="col-lg-2">
            <label for="paciente_pais" class="col-xs-4 control-label requerido">País de Residencia</label>
            <select name="pais_id" id="paciente_pais" class="form-control" style="width: 100%;" required>
            </select>
        </div>
        <div class="col-lg-2">
            <label for="futuro3" class="col-xs-4 control-label requerido">Departamento</label>
            <input type="text" name="futuro3" id="futuro3" class="form-control" value="{{old('futuro3')}}" required>
        </div>
        <div class="col-lg-2">
            <label for="ciudad" class="col-xs-4 control-label requerido">Ciudad</label>
            <input type="text" name="ciudad" id="ciudad" class="form-control" value="{{old('ciudad')}}" required>
        </div>
        <div class="col-lg-3">
            <label for="direccion" class="col-xs-4 control-label requerido">Direccion</label>
            <input type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion')}}" minlength="6" required>
        </div>
        <div class="col-lg-3">
            <label for="Poblacion_especial" class="col-xs-4 control-label requerido">Poblacion Especial</label>
            <select name="Poblacion_especial" id="Poblacion_especial" class="form-control select2bs4" style="width: 100%;" value="{{old('Poblacion_especial')}}" required>
                <option value="">---seleccione---</option>
                <option value="AMP">Adultos mayores en centros de protección</option>
                <option value="F">Habitante de calle mayor de edadHomosexual</option>
                <option value="F">Habitante de calle menor de edad</option>
                <option value="F">Indígena mayor de edad</option>
                <option value="F">Indígena menor de edad</option>
                <option value="F">Menor de edad desvinculado del conflicto armado</option>
                <option value="F">Población infantil vulnerable en instituciones diferentes al ICBF</option>
                <option value="F">Población infantil vulnerable a caro del ICBF</option>
                <option value="F">Recién nacido con edad menor o igual a 30 días</option>
                <option value="F">Mayor de edad desplazado</option>
                <option value="F">Menor de edad desplazado</option>
                <option value="F">Personas con discapacidad en centros de protección</option>
                <option value="F">Población menor de edad privada de la libertad</option>
                <option value="F">Población mayor de edad privada de la libertad</option>
                <option value="F">Población desmovilizada</option>
                <option value="F">Extranjero en transito</option>
                <option value="F">Ninguno</option>
            </select>
        </div>

    </div>
    <div class="form-group row">

        <div class="col-lg-2">
            <label for="celular" class="col-xs-4 control-label requerido">Celular</label>
            <input type="tel" name="celular" id="celular" class="form-control" value="{{old('celular')}}" required>
        </div>
        <div class="col-lg-2">
            <label for="telefono" class="col-xs-4 control-label ">Telefono</label>
            <input type="tel" name="telefono" id="telefono" class="form-control" value="{{old('telefono')}}">
        </div>

        <div class="col-lg-2">
            <label for="correo" class="col-xs-4 control-label ">E-mail</label>
            <input type="email" name="correo" id="correo" class="form-control" value="{{old('correo')}}">
        </div>
        <div class="col-lg-3">
            <label for="Ocupacion" class="col-xs-4 control-label requerido">Ocupación</label>
            <input type="text" name="Ocupacion" id="Ocupacion" class="form-control" value="{{old('Ocupacion')}}" minlength="6" required>
        </div>

    </div>
    <p><a style="color:#0071c5;"> Régimen de seguridad social:</a> </p>
    <hr>
    <div class="form-group row">

        <div class="col-lg-2">
            <label for="plan" class="col-xs-4 control-label requerido">Régimen</label>
            <select name="plan" id="plan" class="form-control select2bs4" style="width: 100%;" required>
                {{-- <option value="">---seleccione---</option>
                <option value="Particular">Particular</option>
                <option value="Contributivo">Contributivo</option>
                <option value="Subsidiado">Subsidiado</option>
                <option value="Vinculado">Vinculado</option>
                <option value="Otro régimen">Otro régimen</option>
                <option value="Accidentes de tránsito">Accidentes de tránsito</option>
                <option value="Riesgos profesionales">Riesgos profesionales</option>
                <option value="Desplazado">Desplazado</option> --}}
            </select>
        </div>
        <div class="col-lg-4">
            <label for="eps" class="col-xs-4 control-label requerido">Empresa</label>
            <select name="eps" id="eps" class="form-control select2bs4" style="width: 100%;" required>
            </select>
        </div>

        <div class="col-lg-2">
            <label for="futuro" class="col-xs-4 control-label requerido">Afiliación</label>
            <select name="futuro" id="futuro" class="form-control select2bs4" style="width: 100%;" required>
                <option value="">---seleccione---</option>
                <option value="Cotizante">Cotizante</option>
                <option value="Beneficiario">Beneficiario</option>
                <option value="Otro">Otro</option>
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
        <div class="col-lg-2">
            <label for="numero_afiliacion" class="col-xs-4 control-label ">Número Afiliación</label>
            <input type="number" name="numero_afiliacion" id="numero_afiliacion" class="form-control" value="{{old('numero_afiliacion')}}">
        </div>

        <div class="col-lg-3">
            <input type="hidden" name="usuario_id" id="usuario_id" class="form-control" value="{{Session()->get('usuario_id') ?? ''}}">
        </div>
        <div class="col-lg-3">
            <input type="hidden" name="paciente_id" id="id_paciente" class="form-control" value="{{old('plan',$datas->id_paciente ?? '')}}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3">
            <label for="observaciones" class="col-xs-8 control-label ">Observación</label>
            <textarea name="observaciones" id="observaciones" class="form-control" rows="3" placeholder="Enter ..."></textarea>
        </div>
        <div class="col-lg-2">
            <label for="usuario_id" class="col-xs-4 control-label ">Usuario que creo el registro</label>
            <input name="usuario" id="usuario_id" class="form-control" value="{{Session()->get('usuario') ?? ''}}" readonly>
        </div>
    </div>
