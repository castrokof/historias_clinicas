<div class="form-group row">
    <div class="col-lg-3">
        <label for="paciente" class="col-xs-4 control-label requerido">Paciente</label>
        <select name="paciente" id="paciente" class="form-control " style="width: 100%;" required>
            <option value="">---seleccione el profesional---</option>
            @foreach ($pacientes as $id => $pa)
            <option value="{{$pa->id_paciente}}" {{old('paciente')}}>{{$pa->documento.'=>'.$pa->paciente}}</option>
            @endforeach
        </select>   
        </div>
    <div class="col-lg-3">
        <label for="fechahora" class="col-xs-4 control-label requerido">fecha y hora</label>
        <input nombre = "fechahora" id="fechahora" class="form-control" value="{{old('fechahora')}}" required>
    </div>
    <div class="col-lg-3">
        <label for="sede" class="col-xs-4 control-label requerido">Sede</label>
                    <select name="sede" id="sede" class="form-control" style="width: 100%;">
                    <option value="">---seleccione la sede---</option>
                    <option value="ATENCION FIDEM S.A.S">ATENCION FIDEM S.A.S</option>
                    <option value="TEMPUS ATENCION INTEGRAL EN SALUD EU">TEMPUS ATENCION INTEGRAL EN SALUD EU</option>
                    <option value="OPORTUNIDAD DE VIDAD S.A.S">OPORTUNIDAD DE VIDAD S.A.S</option>
                    </select>
    </div>
    <div class="col-lg-3">
        <label for="profesional" class="col-xs-4 control-label requerido">Profesional</label>
                        <select name="profesional" id="profesional" class="form-control" style="width: 100%;">
                        <option value="">---seleccione el profesional---</option>
                        @foreach ($profesionales as $id => $pro)
                        <option value="{{$pro->id}}" {{old('profesional')}}>{{$pro->documento.'=>'.$pro->profesional.'=>'.$pro->especialidad}}</option>
                        @endforeach
                        </select>
    </div>  
 
</div>
<div class="form-group row">
    <div class="col-lg-3">
        <label for="tipo_cita" class="col-xs-4 control-label requerido">Tipo de cita</label>
                    <select name="tipo_cita" id="tipo_cita" class="form-control" style="width: 100%;">
                    <option value="">---seleccione---</option>
                    <option value="PRIMERA_GENERAL">PRIMERA VEZ GENERAL</option>
                    <option value="SEGUIMIENTO_GENERAL">SEGUIMIENTO GENERAL</option>
                    <option value="PRIMERA_ESPECIALISTA">PRIMERA VEZ ESPECIALISTA</option>
                    <option value="SEGUIMIENTO_ESPECIALISTA">SEGUIMIENTO ESPECIALISTA</option>
                    </select>
    </div>
    <div class="col-lg-3">
        <label for="fecha_p" class="col-xs-4 control-label requerido">fecha solicitada</label>
        <input type="date" nombre = "fechasp" id="fechasp" class="form-control" value="{{old('fecha_p')}}" required>
    </div>
   
 
</div>


