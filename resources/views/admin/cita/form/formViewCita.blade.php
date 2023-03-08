<div class="form-group row">
    <div class="col-lg-3">
        <label for="fecha_cita">Fecha Hora Cita:</label>
        <input type="text" class="form-control" id="fecha_cita" name="fechahora_cita" readonly>
    </div>
    <div class="col-lg-3">
        <label for="fecha_solicitada">Fecha Solicitada:</label>
        <input type="text" class="form-control" id="fecha_solicitada" name="fechahora_solicitada" readonly>
    </div>
    <div class="col-lg-3">
        <label for="fecha_solicitud">Fecha Asignación:</label>
        <input name="fechahora_solicitud" id="fecha_solicitud" class="form-control" readonly>
    </div>

    <div class="col-lg-3">
        <label for="tipoSolicitud" class="col-xs-4 control-label">Tipo Solicitud:</label>
        <input name="tipo_solicitud" id="tipoSolicitud" class="form-control" readonly>
    </div>

</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label for="cod_med" class="col-xs-4 control-label">Profesional:</label>
        <input class="form-control" id="cod_med" name="cod_profesional" readonly>
    </div>
    <div class="col-lg-3">
        <label for="ips_sede" class="col-xs-4 control-label ">Sede:</label>
        <input type="text" class="form-control" id="ips_sede" name="ips" readonly>
    </div>
    <div class="col-lg-3">
        <label for="estado" class="col-xs-4 control-label ">Estado Cita:</label>
        <input class="form-control" id="estado" name="status" readonly>
    </div>
</div>


<div class="form-group row">
    <div class="col-lg-1">
        <label for="tipo_id" class="col-xs-4 control-label ">Tipo ID</label>
        <input name="tipo_documento" id="tipo_id" class="form-control " type="text" readonly>
    </div>
    <div class="col-lg-3">
        <label for="identificacion" class="col-xs-4 control-label ">Historia</label>
        <input type="text" class="form-control" id="identificacion" name="historia" readonly>
    </div>
    <div class="col-lg-2">
        <label for="firts_pname" class="col-xs-4 control-label ">Primer nombre</label>
        <input type="text" name="pnombre" id="firts_pname" class="form-control" readonly>
    </div>
    <div class="col-lg-2">
        <label for="firts_sname" class="col-xs-4 control-label ">Segundo nombre</label>
        <input type="text" name="snombre" id="firts_sname" class="form-control" readonly>
    </div>
    <div class="col-lg-2">
        <label for="last_pname" class="col-xs-4 control-label ">Primer apellido</label>
        <input type="text" name="papellido" id="last_pname" class="form-control" readonly>
    </div>
    <div class="col-lg-2">
        <label for="last_sname" class="col-xs-4 control-label ">Segundo apellido</label>
        <input type="text" name="sapellido" id="last_sname" class="form-control" readonly>
    </div>

</div>
<div class="form-group row">
    <div class="col-lg-2">
        <label for="fecha_nacimiento" class="col-xs-4 control-label">Fecha nacimiento</label>
        <input type="date" name="futuro2" id="fecha_nacimiento" class="form-control" readonly>
    </div>
    <div class="col-lg-1">
        <label for="paciente_edad" class="col-xs-4 control-label ">Edad</label>
        <input type="number" name="edad" id="paciente_edad" class="form-control" readonly>
    </div>

    <div class="col-lg-3">
        <label for="nombre_pais" class="col-xs-4 control-label ">País de Residencia</label>
        <input name="pais" id="nombre_pais" class="form-control" readonly>
    </div>
    <div class="col-lg-3">
        <label for="paciente_direccion" class="col-xs-4 control-label ">Direccion</label>
        <input name="direccion" id="paciente_direccion" class="form-control" readonly>
    </div>

</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label for="servicio" class="col-xs-4 control-label ">Servicio</label>
        <input name="servicio_nombre" id="servicio" class="form-control" readonly>
    </div>
    <div class="col-lg-6">
        <label for="contrato" class="col-xs-4 control-label ">Contrato</label>
        <input name="contrato_nombre" id="contrato" class="form-control" readonly>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label for="procedimiento" class="col-xs-4 control-label ">Procedimiento</label>
        <input name="cups" id="procedimiento" class="form-control" readonly>
    </div>
</div>

<input type="hidden" name="cita_id" id="cita_id" class="form-control">
<input type="hidden" name="usuario_id" id="usuario_id" class="form-control" value="{{Session()->get('usuario_id')}}">

