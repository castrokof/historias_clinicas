<div class="form-group row">
    <div class="col-lg-2">
        <label for="codigo" class="col-xs-4 control-label requerido">Código</label>
        <input name="codigo" id="codigo" class="form-control " value="{{old('codigo')}}" required>
    </div>    
    <div class="col-lg-8">
        <label for="nombre" class="col-xs-4 control-label requerido">Nombre</label>
        <input name="nombre" id="nombre" class="form-control UpperCase" placeholder="Ingrese el nombre del profesional..." value="{{old('nombre')}}" required></input>
    </div>
    <div class="col-lg-2">
        <label for="reg_profesional" class="col-xs-4 control-label ">Registro Profesional</label>
        <input type="number" name="reg_profesional" id="reg_profesional" class="form-control" value="{{old('reg_profesional')}}">
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-3">
        <label for="cod_usuario" class="col-xs-4 control-label">Usuario</label> <!-- Este es el usuario con el cual se ingresa al sistema -->
        <input name="cod_usuario" id="cod_usuario" class="form-control" value="{{old('cod_usuario')}}" ></input>
    </div>
    <div class="col-lg-3">
        <label for="tipo" class="col-xs-4 control-label">Tipo</label> <!-- Este es el tipo de profesional Ej:Auxiliar de enfermería,Médico especialista, Médico general     -->
        <input name="tipo" id="tipo" class="form-control" value="{{old('tipo')}}" ></input>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-2">
        <label for="especialidad" class="col-xs-4 control-label ">Especialidad</label>
        <input name="especialidad" id="especialidad" class="form-control" value="{{old('especialidad')}}" ></input>
    </div>
    <div class="col-lg-2">
        <label for="sede" class="col-xs-4 control-label ">Sede</label><!-- Se crea una lista con las sedes para hacer el select2 -->
        <input name="sede" id="sede" class="form-control" value="{{old('sede')}}" ></input>
    </div>
</div>
<div class="form-group row">    
    <div class="col-lg-2" style="display: block;">
        <label for="customSwitch1" class="col-xs-4 control-label requerido">Desactivar/Activar</label><br>
        <div class="form-group">
            <div class="custom-control custom-switch custom-switch-off-ligth custom-switch-on-success">
                <input type="checkbox" class="custom-control-input form-control" id="customSwitch1" checked>
                <label class="custom-control-label" for="customSwitch1"></label>
            </div>
        </div>
    </div>

    <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{Session()->get('usuario_id')}}">
    <input type="hidden" name="estado" id="estado" class="form-control" value="1">
</div>