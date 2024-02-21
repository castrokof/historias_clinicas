<form>
    <div class="row">
        <div class="col">
            <div class="input-group mb-3">
                <span class="input-group-text col-md-4">Fecha Inicial</span>
                <input type="date" name="fechaini" id="fechaini" class="form-control col-md-6 " value="">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text col-md-4">Fecha Final </span>
                <input type="date" name="fechafin" id="fechafin" class="form-control col-md-6 " value="">
            </div>
        </div>
        <div class="col">
            <div class="input-group mb-3">
                <span class="input-group-text col-md-3">Hora Inicio</span>
                <input type="time" name="timeini" id="timeini" class="form-control col-md-4 " value="">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text col-md-3">Hora Fin</span>
                <input type="time" name="timefin" id="timefin" class="form-control col-md-4" value="">
            </div>


        </div>
    </div>
</form>


<div class="form-group row">
    <div class="col-md-6" id="usuario_info">
        <label for="profesional_select" class="col-xs-2 control-label">Profesional</label>
        <select name="profesional_select" id="profesional_select" class="form-control select2bs4" style="width: 100%;">
        </select>
    </div>
    <div class="col-md-4">
        <label for="intervalo" class="col-xs-2 control-label">Intervalo</label>
        <select name="intervalo" id="intervalo" class="form-control select2bs4" style="width: 100%;">
            <option value="10">10 minutos</option>
            <option value="15">15 minutos</option>
            <option value="20">20 minutos</option>
            <option value="25">25 minutos</option>
            <option value="30">30 minutos</option>
            <option value="35">35 minutos</option>
            <option value="40">40 minutos</option>
            <option value="45">45 minutos</option>
            <option value="50">50 minutos</option>
            <option value="55">55 minutos</option>
            <option value="60">1 hora</option>
        </select>

    </div>
    <div class="col-md-2" id="festivos_id">
        <label for="festivos" class="col-xs-2 control-label">Festivos</label>
        <input type="checkbox" name="festivos" id="festivos" class="form-control select2bs4" style="width: 10%;">
    </div>
</div>

<div class="card card-info">
    <div class="card-header">
        <p class="card-title">Seleccione el día para agregar el horario</p>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" id="frmDias">
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-1" id="festivos_id">
                    <label for="diasemanal" class="col-xs-2 control-label">L</label>
                    <input type="checkbox" name="diasemanal" id="diasemanal" class="case_semana form-control select2bs4" style="width: 100%;">
                </div>
                <div class="col-md-1" id="festivos_id">
                    <label for="diasemanam" class="control-label tooltips" title="Lunes">M</label>
                    <input type="checkbox" name="diasemanam" id="diasemanam" class="case_semana form-control select2bs4" style="width: 100%;">
                </div>
                <div class="col-md-1" id="festivos_id">
                    <label for="diasemanami" class="control-label">MI</label>
                    <input type="checkbox" name="diasemanami" id="diasemanami" class="case_semana form-control select2bs4" style="width: 100%;">
                </div>
                <div class="col-md-1" id="festivos_id">
                    <label for="diasemanaj" class="control-label">J</label>
                    <input type="checkbox" name="diasemanaj" id="diasemanaj" class="case_semana form-control select2bs4" style="width: 100%;">
                </div>
                <div class="col-md-1" id="festivos_id">
                    <label for="diasemanv" class="control-label">V</label>
                    <input type="checkbox" name="diasemanav" id="diasemanav" class="case_semana form-control select2bs4" style="width: 100%;">
                </div>
                <div class="col-md-1" id="festivos_id">
                    <label for="diasemanas" class="control-label">S</label>
                    <input type="checkbox" name="diasemanas" id="diasemanas" class="case_semana form-control select2bs4" style="width: 100%;">
                </div>
                <div class="col-md-1" id="festivos_id">
                    <label for="diasemanad" class="control-label">D</label>
                    <input type="checkbox" name="diasemanad" id="diasemanad" class="case_semana form-control select2bs4" style="width: 100%;">
                </div>
                <div class="col-md-1">
                    <label for="marcarTodas" class="control-label">All</label>
                    <input type="checkbox" name="marcarTodas" id="marcarTodas" class="case_semana form-control select2bs4" style="width: 100%;">
                </div>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="button" class="btn btn-info" name="agregar_horario" id="agregar_horario">Agregar</button>
            <!-- <button type="reset" class="btn btn-Warning" >Cancel</button> -->
            <!-- <button type="checkbox" name="marcarTodas" id="marcarTodas" class="btn btn-info">All</button> -->
        </div>
        <!-- /.card-footer -->
    </form>
</div>

<!-- <div class="form-group row col-md-12">

    <div class="card card-cyan card-outline form-group row col-md-10 p-2" style="padding: 0px, 0px, 0px, 0px">
        <div class="card-title">
            <b>
                <p> Selecciona el día para agregar el horario</p>
            </b>
        </div>
        <div class="form-group row p-2">
            <div class="col-md-1" id="festivos_id">
                <label for="diasemanal" class="control-label">L</label>
                <input type="checkbox" name="diasemanal" id="diasemanal" class="case_semana form-control select2bs4" style="width: 100%;">
            </div>
            <div class="col-md-1" id="festivos_id">
                <label for="diasemanam" class="control-label tooltips" title="Lunes">M</label>
                <input type="checkbox" name="diasemanam" id="diasemanam" class="case_semana form-control select2bs4" style="width: 100%;">
            </div>
            <div class="col-md-1" id="festivos_id">
                <label for="diasemanami" class="control-label">MI</label>
                <input type="checkbox" name="diasemanami" id="diasemanami" class="case_semana form-control select2bs4" style="width: 100%;">
            </div>
            <div class="col-md-1" id="festivos_id">
                <label for="diasemanaj" class="control-label">J</label>
                <input type="checkbox" name="diasemanaj" id="diasemanaj" class="case_semana form-control select2bs4" style="width: 100%;">
            </div>
            <div class="col-md-1" id="festivos_id">
                <label for="diasemanv" class="control-label">V</label>
                <input type="checkbox" name="diasemanav" id="diasemanav" class="case_semana form-control select2bs4" style="width: 100%;">
            </div>
            <div class="col-md-1" id="festivos_id">
                <label for="diasemanas" class="control-label">S</label>
                <input type="checkbox" name="diasemanas" id="diasemanas" class="case_semana form-control select2bs4" style="width: 100%;">
            </div>
            <div class="col-md-1" id="festivos_id">
                <label for="diasemanad" class="control-label">D</label>
                <input type="checkbox" name="diasemanad" id="diasemanad" class="case_semana form-control select2bs4" style="width: 100%;">
            </div>
        </div>
        <div class="col-md-6">

            <label for="agregar_horario" class="control-label">Agregar horario</label><br><br><br>
            <button type="button" class="btn btn-primary col-md-8" name="agregar_horario" id="agregar_horario"><i class="fa fa-plus-circle"></i> Agregar</button>

        </div>

    </div>
    {{-- <div class="card card-cyan card-outline form-group row col-md-12 p-2" id="semana_id">

</div> --}}
</div> -->