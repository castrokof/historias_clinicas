<div class="form-group row">
    <div class="col-lg-4">
        <label for="fecha_cita">Fecha Solicitud Cita:</label>
        <input type="text" class="form-control" id="fecha_cita" name="fecha_cita" readonly>
    </div>
    <div class="col-lg-4">
        <label for="fechahora_solicitada">Fecha Solicitada:</label>
        <input type="text" class="form-control" id="fechahora_solicitada" name="fechahora_solicitada">
    </div>
    <div class="col-lg-4">
        <label for="prof_cita">Profesional:</label>
        <input type="text" class="form-control" id="prof_cita" name="prof_cita" readonly>
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

</div>
<label for="fechahora_solicitud">Fecha Asignación:</label>
<input name="fechahora_solicitud" id="fechahora_solicitud" class="form-control" value="{{now()}}" readonly>
