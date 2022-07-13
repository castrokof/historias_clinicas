 <div class="form-group row">
        <div class="col-lg-9 col-md-6 col-xs-6">
            <label for="cie10_motivo_consulta1" class="col-xs-8 control-label requerido">Busqueda de diagnostico</label>
            <select name="cie10_motivo_consulta1" id="cie10_motivo_consulta1" class="form-control " style="width: 100%;" required>
                <option value="">---consulte el diagnostico---</option>
                @foreach ($cie10_motivo_consultas as $id => $da)
                <option value="{{$da->id_cie10}}" {{old('cie10_motivo_consulta1')}}>{{$da->codigo_cie10.'=>'.$da->nombre}}</option>
                @endforeach
            </select>
        </div>
    
    <div class="col-lg-3">
        <label for="nombre" class="col-xs-4 control-label requerido">Tipo de diagnostico</label>
                    <select name="nombre" id="nombre" class="form-control" style="width: 100%;">
                    <option value="">---seleccione tipo de diagnostico---</option>
                    <option value="PRINCIPAL">PRINCIPAL</option>
                    <option value="RELACIONADO">RELACIONADO</option>
                    
                    </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12">
        <label for="observacion" class="col-xs-4 control-label ">observacion</label>
        <textarea name="observacion" id="observacion" class="form-control" rows="3" placeholder="Ingrese una observación ..." value="{{old('observacion')}}" ></textarea>
    </div>


</div>
<div class="col-lg-3">
    <input type="hidden" name="usuario_id" id="usuario_id" class="form-control" value="{{Session()->get('usuario_id') ?? ''}}" readonly >
</div>
<div class="col-lg-3">
   <input type="hidden" name="paciente_id" id="paciente_id" class="form-control" value="{{old('plan',$datas->id_paciente ?? '')}}" readonly >
</div>



