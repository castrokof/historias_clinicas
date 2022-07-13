<div class="form-group row">
    <div class="col-lg-3">
        <label for="usuario" class="col-xs-4 control-label requerido">Usuario</label>
        <input type="text" name="usuario" id="usuario" class="form-control" value="{{old('usuario', $data->usuario ?? '')}}" required disabled>
    </div>
    <div class="col-lg-3">
                    <label for="tipo_de_usuario" class="col-xs-4 control-label requerido">tipo de usuario</label>
                    <select name="tipo_de_usuario" id="tipo_de_usuario" class="form-control select2bs4" style="width: 100%;">
                        <option value="">---seleccione el estado---</option>
                        <option value="office" {{($data->tipo_de_usuario === "office") ?  "selected" : ""}}>office</option>
                        <option value="movil" {{($data->tipo_de_usuario === "movil") ?  "selected" : ""}}>movil</option>
                        </select>
    </div>
    <div class="col-lg-3">
        <label for="email" class="col-xs-4 control-label requerido">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" value="{{old('email', $data->email ?? '')}}" required >
    </div>
    <div class="col-lg-3">
        <label for="empleado_id" class="col-xs-4 control-label requerido">Nombre Empleado</label>
                        <select name="empleado_id" id="empleado_id" class="form-control select2bs4" style="width: 100%;" disabled>
                        <option value="">---seleccione el empleado---</option>
                        @foreach ($Empleados as $id => $nombre)
                        <option value="{{$id}}" {{old('empleado_id', $data->empleado_id ?? "") == $id ? "selected" : ""}}>{{$nombre}}</option>
                        @endforeach
                        </select>
    </div>  
</div>
<div class="form-group row">

    <div class="col-lg-3">
        <label for="activo" class="col-xs-4 control-label requerido">Estado</label>
                    <select name="activo" id="activo" class="form-control select2bs4" style="width: 100%;">
                    <option value="">---seleccione el estado---</option>
                    <option value="1" {{($data->activo === "1") ?  "selected" : ""}}>activo</option>
                    <option value="0" {{($data->activo === "0") ?  "selected" : ""}}>inactivo</option>
                    </select>
    </div>
 

    <div class="col-lg-3">
        <label for="rol_id" class="col-xs-4 control-label requerido">Rol</label>
                        <select name="rol_id" id="rol_id" class="form-control select2bs4" style="width: 100%;">
                        <option value="">---seleccione el rol---</option>
                        @foreach ($Rols1 as $id => $nombre)
                        <option value="{{$id}}" {{old('rol_id', $data->roles1[0]->id ?? "") == $id ? "selected" : ""}}>{{$nombre}}</option>
                        @endforeach
                        </select>
    </div>   


   

</div>
