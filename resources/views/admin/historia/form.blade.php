<div class="form-group row">
    <div class="col-lg-3">
        <label for="pnombre" class="col-xs-4 control-label ">Primer nombre</label>
        <input type="text" name="pnombre" id="pnombre" class="form-control" value="{{old('pnombre')}}" readonly >
    </div>
    <div class="col-lg-3">
        <label for="snombre" class="col-xs-4 control-label sololectura">Segundo nombre</label>
        <input type="text" name="snombre" id="snombre" class="form-control" value="{{old('snombre')}}" readonly >
    </div>
    <div class="col-lg-3">
        <label for="papellido" class="col-xs-4 control-label sololectura">Primer apellido</label>
        <input type="text" name="papellido" id="papellido" class="form-control" value="{{old('papellido')}}" readonly >
    </div>
    <div class="col-lg-3">
        <label for="sapellido" class="col-xs-4 control-label sololectura">Segundo apellido</label>
        <input type="text" name="sapellido" id="sapellido" class="form-control" value="{{old('sapellido')}}" readonly >
    </div>
</div>   
<div class="form-group row">
    <div class="col-lg-3">
        <label for="tipo_documento" class="col-xs-4 control-label sololectura">Tipo de documento</label>
        <select name="tipo_documento" id="tipo_documento" class="form-control select2bs4" style="width: 100%;" readonly>
            <option value="">---seleccione---</option>
            <option value="AS">AS</option>
            <option value="CC">CC</option>
            <option value="CE">CE</option>
            <option value="MS">MS</option>
            <option value="NI">NI</option>
            <option value="NU">NU</option>
            <option value="PE">PE</option>
            <option value="RC">RC</option>
            <option value="TI">TI</option>
        </select>
    </div>
    <div class="col-lg-3">
        <label for="documento" class="col-xs-4 control-label sololectura">Documento</label>
        <input type="text" name="documento" id="documento" class="form-control" value="{{old('documento')}}" minlength="6"  readonly >
    </div>
    <div class="col-lg-3">
        <label for="edad" class="col-xs-4 control-label sololectura">Edad</label>
        <input type="number" name="edad" id="edad" class="form-control" value="{{old('edad')}}" readonly >
    </div>
    <div class="col-lg-3">
        <label for="ciudad" class="col-xs-4 control-label sololectura">Ciudad</label>
        <input type="text" name="ciudad" id="ciudad" class="form-control" value="{{old('ciudad')}}" readonly >
    </div>
    
</div>
<div class="form-group row">
    <div class="col-lg-3">
    <label for="direccion" class="col-xs-4 control-label sololectura">Direccion</label>
    <input type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion')}}" minlength="6" readonly >
    </div>
    <div class="col-lg-3">
        <label for="celular" class="col-xs-4 control-label sololectura">Celular</label>
        <input type="tel" name="celular" id="celular" class="form-control" value="{{old('celular')}}" readonly>
    </div>
    <div class="col-lg-3">
        <label for="telefono" class="col-xs-4 control-label sololectura">Telefono</label>
        <input type="tel" name="telefono" id="telefono" class="form-control" value="{{old('telefono')}}" readonly>
    </div>
    
    <div class="col-lg-3">
        <label for="correo" class="col-xs-4 control-label sololectura">E-mail</label>
        <input type="email" name="correo" id="correo" class="form-control" value="{{old('correo')}}" readonly>
    </div>
    
</div>
<div class="form-group row">
    
    <div class="col-lg-3">
        <label for="plan" class="col-xs-4 control-label sololectura">plan</label>
        <input type="text" name="plan" id="plan" class="form-control" value="{{old('plan')}}" readonly >
    </div>
    <div class="col-lg-6">
        <label for="observaciones" class="col-xs-8 control-label sololectura">Observación</label>
        <textarea name="observaciones" id="observaciones" class="form-control" rows="3" placeholder="Enter ..." readonly></textarea>
    </div>
    <div class="col-lg-3">
         <input type="hidden" name="usuario_id" id="operador" class="form-control" value="{{Session()->get('usuario_id') ?? ''}}" readonly >
    </div>
    <div class="col-lg-3">
        <input type="hidden" name="paciente_id" id="id_paciente" class="form-control" value="{{old('plan',$datas->id_paciente ?? '')}}" readonly >
   </div>
</div>
 