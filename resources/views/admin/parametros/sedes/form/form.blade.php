    <div class="form-group row">
        <div class="col-lg-2">
            <label for="cod_sede" class="col-xs-4 control-label ">Codigo</label>
            <input type="text" name="cod_sede" id="cod_sede" class="form-control" value="{{old('cod_sede')}}" required>
        </div>
        <div class="col-lg-10">
            <label for="sede" class="col-xs-4 control-label requerido">Nombre</label>
            <input type="text" name="sede" id="sede" class="form-control" value="{{old('sede')}}">
        </div>

    </div>
    <div class="form-group row">
        <div class="col-lg-5">
            <label for="direccion" class="col-xs-4 control-label requerido">Direccion</label>
            <input type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion')}}">
        </div>
        <div class="col-lg-3">
            <label for="telefono" class="col-xs-4 control-label requerido">Telefono</label>
            <input type="number" name="telefono" id="telefono" class="form-control" value="{{old('telefono')}}">
        </div>
        <div class="col-lg-4">
            <label for="email" class="col-xs-4 control-label requerido">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
        </div>

    </div>
    <div class="form-group row">
        <div class="col-lg-3">
            <label for="sede_ciudad" class="col-xs-4 control-label requerido">Ciudad</label>
            <select name="ciudad_id" id="sede_ciudad" class="form-control" style="width: 100%;" required>
            </select>
        </div>
        <!-- <div class="col-lg-3">
            <label for="logo" class="col-xs-4 control-label requerido">Logo</label>
            <input type="image" name="logo" id="logo" class="form-control">
        </div> -->
        <div class="col-lg-6">
            <label for="logo" class="col-xs-4 control-label ">Logo </label>
            <input type="file" name="logo" id="logo" class="form-control">

        </div>
        <div class="col-lg-3">
            <label for="estado" class="col-xs-4 control-label requerido">Estado</label>
            <select name="estado" id="estado" class="form-control" style="width: 100%;" value="{{old('estado')}}" required>
                <option value="" selected>-- Selecciona estado --</option>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>
        <div class="col-lg-3">
            <input type="hidden" name="usuario_id" id="operador" class="form-control" value="{{Session()->get('usuario_id') ?? ''}}">
        </div>
        <div class="col-lg-3">
            <input type="hidden" name="paciente_id" id="id_paciente" class="form-control" value="{{old('plan',$datas->id_paciente ?? '')}}">
        </div>
    </div>