<div class="form-group row">
    <div class="col-lg-3">
        <label for="pnombre" class="col-xs-4 control-label requerido">Primer nombre</label>
        <input type="text" name="pnombre" id="pnombre" class="form-control" value="{{old('pnombre')}}" required >
    </div>
    <div class="col-lg-3">
        <label for="snombre" class="col-xs-4 control-label requerido">Segundo nombre</label>
        <input type="text" name="snombre" id="snombre" class="form-control" value="{{old('snombre')}}"  >
    </div>
    <div class="col-lg-3">
        <label for="papellido" class="col-xs-4 control-label requerido">Primer apellido</label>
        <input type="text" name="papellido" id="papellido" class="form-control" value="{{old('papellido')}}" required >
    </div>
    <div class="col-lg-3">
        <label for="sapellido" class="col-xs-4 control-label requerido">Segundo apellido</label>
        <input type="text" name="sapellido" id="sapellido" class="form-control" value="{{old('sapellido')}}"  >
    </div>
</div>   
<div class="form-group row">
    <div class="col-lg-3">
        <label for="tipo_documento" class="col-xs-4 control-label requerido">Tipo de documento</label>
        <select name="tipo_documento" id="tipo_documento" class="form-control select2bs4" style="width: 100%;" required>
            <option value="">---seleccione---</option>
            <option value="CE">AS</option>
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
        <label for="documento" class="col-xs-4 control-label requerido">Documento</label>
        <input type="text" name="documento" id="documento" class="form-control" value="{{old('documento')}}" minlength="6"  required >
    </div>
    <div class="col-lg-3">
        <label for="usuario" class="col-xs-4 control-label requerido">Usuario</label>
        <input type="text" name="usuario" id="usuario" class="form-control" value="{{old('usuario')}}" required >
    </div>
    <div class="col-lg-3">
        <label for="email" class="col-xs-4 control-label requerido">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" required >
    </div>
    
</div>
<div class="form-group row">
    <div class="col-lg-3">
    <label for="password" class="col-xs-4 control-label requerido">Password</label>
    <input type="password" name="password" id="password" class="form-control" value="{{old('password')}}" minlength="6" required >
    </div>
    
    <div class="col-lg-3">
    <label for="remenber_token" class="col-xs-4 control-label requerido">repita el password</label>
    <input type="password" name="remenber_token" id="remenber_token" class="form-control" value="{{old('remenber_token')}}"  minlength="6" required >
    </div>
    
    <div class="col-lg-3">
        <label for="cod_retus" class="col-xs-4 control-label requerido">Retus</label>
        <input type="text" name="cod_retus" id="cod_retus" class="form-control" value="{{old('cod_retus')}}"  >
    </div>
    <div class="col-lg-3">
        <label for="celular" class="col-xs-4 control-label requerido">Celular</label>
        <input type="text" name="celular" id="celular" class="form-control" value="{{old('celular')}}" required >
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-3">
        <label for="telefono" class="col-xs-4 control-label requerido">Telefono</label>
        <input type="text" name="telefono" id="telefono" class="form-control" value="{{old('telefono')}}"  >
    </div>
    <div class="col-lg-3">
        <label for="profesion" class="col-xs-4 control-label requerido">Profesión</label>
        <input type="text" name="profesion" id="profesion" class="form-control" value="{{old('profesion')}}" required >
    </div>
    <div class="col-lg-3">
        <label for="especialidad" class="col-xs-4 control-label requerido">Especialidad</label>
        <input type="text" name="especialidad" id="especialidad" class="form-control" value="{{old('especialidad')}}" required >
    </div>
    <div class="col-lg-3">
        <label for="ips" class="col-xs-4 control-label requerido">Ips</label>
                    <select name="ips" id="ips" class="form-control select2bs4" style="width: 100%;">
                    <option value="">---seleccione la ips---</option>
                    <option value="ATENCION FIDEM S.A.S">ATENCION FIDEM S.A.S</option>
                    <option value="TEMPUS ATENCION INTEGRAL EN SALUD EU">TEMPUS ATENCION INTEGRAL EN SALUD EU</option>
                    <option value="OPORTUNIDAD DE VIDAD S.A.S">OPORTUNIDAD DE VIDAD S.A.S</option>
                    </select>
    </div>
</div>
 
<div class="form-group row">
    <div class="col-lg-3">
        <label for="rol_id" class="col-xs-4 control-label requerido">Rol</label>
                        <select name="rol_id" id="rol_id" class="form-control select2bs4" style="width: 100%;">
                        <option value="">---seleccione el rol---</option>
                        @foreach ($Rols1 as $id => $nombre)
                        <option value="{{$id}}" {{old('rol_id', $data->roles1[0]->id ?? "") == $id ? "selected" : ""}}>{{$nombre}}</option>
                        @endforeach
                        </select>
    </div>   
    
    <div class="col-lg-3">
        <label for="activo" class="col-xs-4 control-label requerido">Estado</label>
                    <select name="activo" id="activo" class="form-control select2bs4" style="width: 100%;">
                    <option value="">---seleccione el estado---</option>
                    <option value="1">activo</option>
                    <option value="0">inactivo</option>
                    </select>
    </div>
    <div class="col-lg-6">
        <label for="observacion" class="col-xs-8 control-label requerido">Observación</label>
        <textarea name="observacion" id="observacion" class="form-control" rows="3" placeholder="Enter ..." value="{{old('observacion')}}"></textarea>
    </div>

</div>
