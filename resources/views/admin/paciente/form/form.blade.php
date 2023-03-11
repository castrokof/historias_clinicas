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
                <option value="Heterosexual">Heterosexual</option>
                <option value="Homosexual">Homosexual</option>
                <option value="Bisexual">Bisexual</option>
                <option value="Transexual">Transexual</option>
                <option value="Intersexual">Intersexual</option>
                <option value="Otra">Otra</option>
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
            <label for="paciente_departamento" class="col-xs-4 control-label requerido">Departamento</label>
            <select name="departamento_id" id="paciente_departamento" class="form-control" style="width: 100%;" required>
            </select>
        </div>
        <div class="col-lg-2">
            <label for="paciente_ciudad" class="col-xs-4 control-label requerido">Ciudad</label>
            <select name="ciudad_id" id="paciente_ciudad" class="form-control" style="width: 100%;" required>
            </select>
        </div>
        <div class="col-lg-3">
            <label for="paciente_barrio" class="col-xs-4 control-label requerido">Barrio</label>
            <select name="barrio_id" id="paciente_barrio" class="form-control" style="width: 100%;" required>
            </select>
        </div>
        <div class="col-lg-3">
            <label for="direccion" class="col-xs-4 control-label requerido">Direccion</label>
            <input type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion')}}" minlength="6" required>
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
            <label for="paciente_ocupacion" class="col-xs-4 control-label requerido">Ocupación</label>
            <select name="ocupacion_id" id="paciente_ocupacion" class="form-control" style="width: 100%;" required>
            </select>
        </div>
        <div class="col-lg-3">
            <label for="Poblacion_especial" class="col-xs-4 control-label requerido">Poblacion Especial</label>
            <select name="Poblacion_especial" id="Poblacion_especial" class="form-control select2bs4" style="width: 100%;" value="{{old('Poblacion_especial')}}" required>
                <option value="">---seleccione---</option>
                <option value="AMP">Adultos mayores en centros de protección</option>
                <option value="HCME">Habitante de calle mayor de edad</option>
                <option value="HCM">Habitante de calle menor de edad</option>
                <option value="IMA">Indígena mayor de edad</option>
                <option value="IM">Indígena menor de edad</option>
                <option value="MDCA">Menor de edad desvinculado del conflicto armado</option>
                <option value="PIV">Población infantil vulnerable en instituciones diferentes al ICBF</option>
                <option value="PIV-ICBF">Población infantil vulnerable a cargo del ICBF</option>
                <option value="RN">Recién nacido con edad menor o igual a 30 días</option>
                <option value="MD">Mayor de edad desplazado</option>
                <option value="MID">Menor de edad desplazado</option>
                <option value="PCDP">Personas con discapacidad en centros de protección</option>
                <option value="PML">Población menor de edad privada de la libertad</option>
                <option value="PMA">Población mayor de edad privada de la libertad</option>
                <option value="PD">Población desmovilizada</option>
                <option value="ET">Extranjero en tránsito</option>
                <option value="N">Ninguno</option>
            </select>
        </div>

    </div>
    <p><a style="color:#0071c5;"> Régimen de seguridad social:</a> </p>
    <hr>
    <div class="form-group row">

        <div class="col-lg-2">
            <label for="regimen" class="col-xs-4 control-label requerido">Régimen</label>
            <select name="regimen" id="regimen" class="form-control select2bs4" style="width: 100%;" required>
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
            <select name="eps_id" id="eps" class="form-control select2bs4" style="width: 100%;" required>
            </select>
        </div>

        <div class="col-lg-2">
            <label for="afiliacion" class="col-xs-4 control-label requerido">Afiliación</label>
            <select name="afiliacion" id="afiliacion" class="form-control select2bs4" style="width: 100%;" required>
                <option value="">---seleccione---</option>
                <option value="Cotizante">Cotizante</option>
                <option value="Beneficiario">Beneficiario</option>
                <option value="Otro">Otro</option>
            </select>
        </div>
        <div class="col-lg-2">
            <label for="nivel" class="col-xs-4 control-label requerido">Nivel</label>
            <select name="nivel" id="nivel" class="form-control select2bs4" style="width: 100%;" required>
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
            <input type="hidden" name="paciente_id" id="id_paciente" class="form-control" value="{{old('regimen',$datas->id_paciente ?? '')}}">
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
