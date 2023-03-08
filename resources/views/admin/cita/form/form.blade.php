<div class="card card-outline card-info pt-0 col-12 col-lg-12">
    <div class="form-group row mt-0 mb-0 pb-0 pt-2 pl-2 pr-2    ">
        <div class="col-md-4">
            <label for="fechadegestion" class="col-xs-4 control-label requerido">Rango de fechas</label>
            <div class="form-group row">
                <input type="date" name="fechaini" id="fechaini" class="form-control btn-xs col-md-6 " value="">
                <input type="date" name="fechafin" id="fechafin" class="form-control  btn-xs col-md-6 " value="">
            </div>
        </div>

        <div class="col-md-2" id="usuario_info">
            <label for="profesional_select" class="col-xs-4 control-label">Profesional</label>
            <select name="profesional_select" id="profesional_select" class="form-control select2bs4 btn-xs" style="width: 100%;">
            </select>
        </div>
        <div class="col-md-2" id="estado_citas">
            <label for="estado_cita" class="col-xs-4 control-label">Estado de cita</label>
            <select name="estado_cita" id="estado_cita" class="form-control select2bs4 btn-xs " style="width: 100%;">
            </select>
        </div>
        <br>
        <div class="form-group col-12 row">
            <button type="button" class="btn btn-primary btn-xs col-md-2" name="agregar_horario" id="agregar_horario"><i class="fa fa-plus-circle"></i> Asignar cita</button>
            <button type="button" class="btn btn-success btn-xs col-md-2" name="consultar_cita" id="consultar_cita"><i class="fa fa-search"></i> Consultar cita</button>
            <button type="button" class="btn btn-warning btn-xs col-md-2" name="agregar_horario" id="agregar_horario"><i class="fa fa-edit"></i> Editar cita</button>
            <button type="button" class="btn btn-danger btn-xs col-md-2" name="eliminar_cita" id="eliminar_cita"><i class="fa fa-trash"></i> Eliminar cita</button>
        </div>

    </div>

    @include('admin.cita.tablas.tablacitas')

</div>
