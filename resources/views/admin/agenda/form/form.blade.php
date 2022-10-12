<div class="form-group row">
    <div class="col-md-4">
        <div class="form-group row">
            <label for="fechadegestion" class="col-xs-12 control-label ">Fecha Inicial: </label>
            <input type="date" name="fechaini" id="fechaini" class="form-control col-md-6 " value="">
            <!-- <input type="date" name="fechafin" id="fechafin" class="form-control col-md-6 " value=""> -->
        </div>

        <div class="form-group row">
            <label for="fechadegestion" class="col-xs-12 control-label ">Fecha Final: </label>
            <!-- <input type="date" name="fechaini" id="fechaini" class="form-control col-md-6 " value=""> -->
            <input type="date" name="fechafin" id="fechafin" class="form-control col-md-6 " value="">
        </div>

    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label for="horariodiario" class="col-xs-12 control-label ">Hora Inicio: </label>
            <input type="time" name="timeini" id="timeini" class="form-control col-md-6 " value="">
        </div>
        <div class="form-group row">
            <label for="horariodiario" class="col-xs-12 control-label ">Hora Fin: </label>
            <input type="time" name="timefin" id="timefin" class="form-control col-md-6 " value="">
        </div>


    </div>



</div>

<div class="form-group row col-md-12">
    <div class="col-md-2" id="usuario_info">
        <label for="profesional_select" class="col-xs-2 control-label">Profesional</label>
        <select name="profesional_select" id="profesional_select" class="form-control select2bs4" style="width: 100%;">
        </select>
    </div>

    <div class="col-md-2" id="festivos_id">
        <label for="festivos" class="col-xs-2 control-label">Festivos</label>
        <input type="checkbox" name="festivos" id="festivos" class="form-control select2bs4" style="width: 10%;">
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
</div>