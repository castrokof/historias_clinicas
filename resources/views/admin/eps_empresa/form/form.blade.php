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
<input type="hidden" name="id_eps_empresas" id="hidden_id" class="form-control" readonly>
</div>
