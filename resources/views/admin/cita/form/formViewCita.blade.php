<div class="form-group row">
    <div class="col-lg-3">
        <label for="fechahora_cita">Fecha Hora Cita:</label>
        <input type="text" class="form-control" id="fechahora_cita" name="fechahora_cita" readonly>
    </div>
    <div class="col-lg-3">
        <label for="fechahora_solicitada">Fecha Solicitada:</label>
        <input type="datetime-local" class="form-control" id="fechahora_solicitada" name="fechahora_solicitada">
    </div>
    <div class="col-lg-3">
        <label for="fechahora_solicitud">Fecha Asignación:</label>
        <input name="fechahora_solicitud" id="fechahora_solicitud" class="form-control" value="{{now()}}" readonly>
    </div>

    <div class="col-lg-3">
        <label for="tipo_solicitud" class="col-xs-4 control-label requerido">Tipo Solicitud:</label>
        <select name="tipo_solicitud" id="tipo_solicitud" class="form-control" style="width: 100%;" value="{{old('tipo_solicitud')}}" required>
            <option value="" selected>-- Seleccionar --</option>
            <option value="Presencial">Presencial</option>
            <option value="Teleconsulta">Teleconsulta</option>
        </select>
    </div>

</div>
<div class="form-group row">
    <div class="col-lg-4">
        <label for="prof_cita">Profesional:</label>
        <input type="text" class="form-control" id="prof_cita" name="prof_cita" readonly>
    </div>
    <div class="col-lg-3">
        <label for="ips" class="col-xs-4 control-label requerido">Sede:</label>
        <select name="ips" id="ips" class="form-control" style="width: 100%;" value="{{old('ips')}}" required>
            <option value="" selected>-- Seleccionar --</option>
            <option value="Copago">Copago</option>
            <option value="Cuota Moderadora">Cuota Moderadora</option>
        </select>
    </div>
</div>


<div class="form-group row">
    <div class="col-lg-1">
        <label for="tipo_documento" class="col-xs-4 control-label ">Tipo ID</label>
        <input name="tipo_documento" id="tipo_documento" class="form-control select2bs4" type="text" readonly>
    </div>
    <div class="col-lg-3">
        <label for="historia" class="col-xs-4 control-label ">Historia</label>
        <div class="input-group">
            <button type="button" class="btn btn-mb btn-default" id="buscarp">
                <i class="fa fa-search"></i>
            </button>
            <input type="search" name="historia" id="historia" class="form-control form-control-mb" placeholder="Buscar paciente digite documento....">
        </div>
    </div>
    <div class="col-lg-2">
        <label for="pnombre" class="col-xs-4 control-label ">Primer nombre</label>
        <input type="text" name="pnombre" id="pnombre" class="form-control" readonly>
    </div>
    <div class="col-lg-2">
        <label for="snombre" class="col-xs-4 control-label ">Segundo nombre</label>
        <input type="text" name="snombre" id="snombre" class="form-control" readonly>
    </div>
    <div class="col-lg-2">
        <label for="papellido" class="col-xs-4 control-label ">Primer apellido</label>
        <input type="text" name="papellido" id="papellido" class="form-control" readonly>
    </div>
    <div class="col-lg-2">
        <label for="sapellido" class="col-xs-4 control-label ">Segundo apellido</label>
        <input type="text" name="sapellido" id="sapellido" class="form-control" readonly>
    </div>

</div>
<div class="form-group row">
    <div class="col-lg-2">
        <label for="futuro2" class="col-xs-4 control-label requerido">Fecha nacimiento</label>
        <input type="date" name="futuro2" id="futuro2" class="form-control" value="{{old('futuro2')}}" readonly>
    </div>
    <div class="col-lg-1">
        <label for="edad" class="col-xs-4 control-label ">Edad</label>
        <input type="number" name="edad" id="edad" class="form-control" value="{{old('edad')}}" placeholder="Edad" readonly>
    </div>

    <div class="col-lg-2">
        <label for="nombre_pais" class="col-xs-4 control-label ">País de Residencia</label>
        <input name="nombre_pais" id="nombre_pais" class="form-control" readonly>
    </div>
    <div class="col-lg-3">
        <label for="direccion" class="col-xs-4 control-label ">Direccion</label>
        <input type="text" name="direccion" id="direccion" class="form-control" minlength="6" readonly>
    </div>
    <div class="col-lg-3">
        <label for="cita_id" class="col-xs-4 control-label ">Id de cita</label>
        <input type="text" name="cita_id" id="cita_id" class="form-control" minlength="6" readonly>
    </div>

</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label for="fact_servicio2" class="col-xs-4 control-label requerido">Servicio</label>
        <select name="servicio_id" id="fact_servicio2" class="form-control select2bs4" style="width: 100%;" required>
        </select>
    </div>
    <div class="col-lg-6">
        <label for="fact_contrato2" class="col-xs-4 control-label requerido">Contrato</label>
        <select name="contrato_id" id="fact_contrato2" class="form-control select2bs4" style="width: 100%;" required>
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label for="fact_procedimiento" class="col-xs-4 control-label requerido">Procedimiento</label>
        <select name="cups_id" id="fact_procedimiento" class="form-control select2bs4" style="width: 100%;" required>
        </select>
    </div>
</div>

<input type="hidden" name="cita_id" id="cita_id" class="form-control">
<input type="hidden" name="usuario_id" id="usuario_id" class="form-control" value="{{Session()->get('usuario_id')}}">
<!-- <button type="button" id="agregarFila" name="agregarFila" class="btn btn-primary btn-xs col-md-2 float-right"><i class="fa fa-plus-circle"></i> Agregar fila</button>
<table id="tabla" class="table">
    <thead>
        <tr>
            <th>Centro de producción</th>
            <th>Contrato</th>
            <th>Procedimiento</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table> -->
