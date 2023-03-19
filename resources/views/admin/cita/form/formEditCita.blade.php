<div class="form-group row">
    <div class="col-lg-3">
        <label for="fecha_cita_e">Fecha Hora Cita:</label>
        <input type="text" class="form-control" id="fecha_cita_e" name="fechahora_cita" readonly>
    </div>
    <div class="col-lg-3">
        <label for="fecha_solicitada_e">Fecha Solicitada:</label>
        <input type="text" class="form-control" id="fecha_solicitada_e" name="fechahora_solicitada" readonly>
    </div>
    <div class="col-lg-3">
        <label for="fecha_solicitud_e">Fecha Asignación:</label>
        <input name="fechahora_solicitud" id="fecha_solicitud_e" class="form-control" readonly>
    </div>

    <div class="col-lg-3">
        <label for="tipoSolicitud_e" class="col-xs-4 control-label">Tipo Solicitud:</label>
        <input name="tipo_solicitud" id="tipoSolicitud_e" class="form-control" readonly>
    </div>

</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label for="cod_med_e" class="col-xs-4 control-label">Profesional:</label>
        <input class="form-control" id="cod_med_e" name="cod_profesional" readonly>
    </div>
    <div class="col-lg-3">
        <label for="ips_sede_e" class="col-xs-4 control-label ">Sede:</label>
        <input type="text" class="form-control" id="ips_sede_e" name="ips" readonly>
    </div>
    <div class="col-lg-3">
        <label for="estado_e" class="col-xs-4 control-label ">Estado Cita:</label>
        <input class="form-control" id="estado_e" name="status" readonly>
    </div>
</div>


<div class="form-group row">
    <div class="col-lg-1">
        <label for="tipo_id_e" class="col-xs-4 control-label ">Tipo ID</label>
        <input name="tipo_documento" id="tipo_id_e" class="form-control " type="text" readonly>
    </div>
    <div class="col-lg-3">
        <label for="identificacion_e" class="col-xs-4 control-label ">Historia</label>
        <input type="text" class="form-control" id="identificacion_e" name="historia" readonly>
    </div>
    <div class="col-lg-2">
        <label for="firts_pname_e" class="col-xs-4 control-label ">Primer nombre</label>
        <input type="text" name="pnombre" id="firts_pname_e" class="form-control" readonly>
    </div>
    <div class="col-lg-2">
        <label for="firts_sname_e" class="col-xs-4 control-label ">Segundo nombre</label>
        <input type="text" name="snombre" id="firts_sname_e" class="form-control" readonly>
    </div>
    <div class="col-lg-2">
        <label for="last_pname_e" class="col-xs-4 control-label ">Primer apellido</label>
        <input type="text" name="papellido" id="last_pname_e" class="form-control" readonly>
    </div>
    <div class="col-lg-2">
        <label for="last_sname_e" class="col-xs-4 control-label ">Segundo apellido</label>
        <input type="text" name="sapellido" id="last_sname_e" class="form-control" readonly>
    </div>

</div>
<div class="form-group row">
    <div class="col-lg-2">
        <label for="fecha_nacimiento_e" class="col-xs-4 control-label">Fecha nacimiento</label>
        <input type="date" name="futuro2" id="fecha_nacimiento_e" class="form-control" readonly>
    </div>
    <div class="col-lg-1">
        <label for="paciente_edad_e" class="col-xs-4 control-label ">Edad</label>
        <input type="number" name="edad" id="paciente_edad_e" class="form-control" readonly>
    </div>

    <div class="col-lg-3">
        <label for="paciente_pais_e" class="col-xs-4 control-label ">País de Residencia</label>
        <input name="pais" id="paciente_pais_e" class="form-control" readonly>
    </div>
    <div class="col-lg-3">
        <label for="paciente_direccion_e" class="col-xs-4 control-label ">Direccion</label>
        <input name="direccion" id="paciente_direccion_e" class="form-control" readonly>
    </div>
    <div class="col-lg-3">
        <label for="username_e" class="col-xs-4 control-label ">Usuario que creo el registro</label>
        <input name="usuario" id="username_e" class="form-control" readonly>
    </div>

</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label for="servicio_e" class="col-xs-4 control-label ">Servicio</label>
        <input name="servicio_nombre" id="servicio_e" class="form-control" readonly>
    </div>
    <div class="col-lg-6">
        <label for="contrato_e" class="col-xs-4 control-label ">Contrato</label>
        <input name="contrato_nombre" id="contrato_e" class="form-control" readonly>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label for="procedimiento_e" class="col-xs-4 control-label ">Procedimiento</label>
        <input name="cups" id="procedimiento_e" class="form-control" readonly>
    </div>
</div>

@include('admin.cita.tablas.tablaObservaciones')


<input type="hidden" name="cita_id_e" id="cita_id_e" class="form-control">
<input type="hidden" name="usuario_id" id="usuario_id" class="form-control" value="{{Session()->get('usuario_id')}}">
