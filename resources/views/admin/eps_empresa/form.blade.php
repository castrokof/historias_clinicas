<div class="form-group row">
    <div class="col-lg-2">
        <label for="codigo" class="col-xs-4 control-label ">Código</label>
        <input type="text" name="codigo" id="codigo" class="form-control" value="{{old('codigo')}}" required>
    </div>
    <div class="col-lg-4">
        <label for="nombre" class="col-xs-4 control-label requerido">Razón Social</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}">
    </div>
    <div class="col-lg-2">
        <label for="NIT" class="col-xs-4 control-label requerido">NIT</label>
        <input type="number" name="NIT" id="NIT" class="form-control" value="{{old('NIT')}}" required>
    </div>
    <div class="col-lg-1">
        <label for="color" class="col-xs-4 control-label requerido">Color</label>
        <input type="color" name="color" id="color" class="form-control" value="{{old('color')}}">
    </div>
    <div class="col-lg-3">
        <!--Este es el estado de la EPS si esta activa o inactiva -->
        <label for="estado" class="col-xs-4 control-label requerido">Estado</label>
        <select name="estado" id="estado" class="form-control" style="width: 100%;" value="{{old('estado')}}" required>
            <option value="" selected>-- Selecciona estado --</option>
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>
</div>
<div class="form-group row">

</div>
<!-- <p><a style="color:#0071c5;"> Niveles y cuotas de recuperación:</a> </p>
<hr> -->


<!--<div class="form-group row">
        
        <div class="col-lg-2">
        <label for="plan" class="col-xs-4 control-label requerido">Régimen</label>
        <select name="plan" id="plan" class="form-control select2bs4" style="width: 100%;" required>
            <option value="">---seleccione---</option>
            <option value="CONTRIBUTIVO">CONTRIBUTIVO</option>
            <option value="SUBSIDIADO">SUBSIDIADO</option>
        </select>
    </div>
        <div class="col-lg-4">
            <label for="eps" class="col-xs-4 control-label requerido">Empresa</label>
            <select name="eps" id="eps" class="form-control select2bs4" style="width: 100%;" required>
            <option value="">---seleccione---</option>
            <option value="COMFENALCO">COMFENALCO</option>
            <option value="SOS">SOS</option>
        </select>
        </div>
    
    <div class="col-lg-2">
        <label for="futuro" class="col-xs-4 control-label requerido">Afiliación</label>
        <select name="futuro" id="futuro" class="form-control select2bs4" style="width: 100%;" required>
        <option value="">---seleccione---</option>
        <option value="BENEFICIARIO">BENEFICIARIO</option>
        <option value="COTIZANTE">COTIZANTE</option>
    </select>
    </div>
    <div class="col-lg-2">
        <label for="futuro1" class="col-xs-4 control-label requerido">Nivel</label>
        <select name="futuro1" id="futuro1" class="form-control select2bs4" style="width: 100%;" required>
        <option value="">---seleccione---</option>
        <option value="A">NIVEL A</option>
        <option value="B">NIVEL B</option>
        <option value="C">NIVEL C</option>
        <option value="1">NIVEL 0</option>
    </select>
    </div>    

    <div class="col-lg-3">
        <input type="hidden" name="usuario_id" id="operador" class="form-control" value="{{Session()->get('usuario_id') ?? ''}}" >
    </div>
    <div class="col-lg-3">
        <input type="hidden" name="paciente_id" id="id_paciente" class="form-control" value="{{old('plan',$datas->id_paciente ?? '')}}" >
    </div>
    </div>
    <div class="form-group row">
    
    </div>-->