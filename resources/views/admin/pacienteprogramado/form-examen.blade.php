<div class="card card-info p-2">
    <div class="card-header with-border">
        <h5 class="card-title">Signos vitales</h5>
       
    </div>   
<div class="card-body with-border">   
<div class="form-group row">
<div class="col-lg-3">
    <label for="presion_arterial" class="col-xs-3 control-label requerido">Presión Arterial</label>
    <div class="row">
        
            <div class="col-4">  
            <input type="text" name="presion_arterial_1" id="presion_arterial_1" class="validanumericos form-control" value="{{old('presion_arterial_1')}}" required >
        </div>    
            <div class="col-4">  
            <input type="text" name="presion_arterial_2" id="presion_arterial_2" class="validanumericos form-control" value="{{old('presion_arterial_2')}}" required >
        </div>    
            
            <button type="button" class="btn-sm btn-info btn-flat">mmHg</button>
                
    </div>
</div>
<div class="col-lg-3">
    <label for="frecuencia_cardiaca" class="col-xs-3 control-label requerido">F Cardiaca</label>
    <div class="row">
    <div class="col-6">
    <input type="text" name="frecuencia_cardiaca" id="frecuencia_cardiaca" class="validanumericos form-control" value="{{old('frecuencia_cardiaca')}}" required >
    </div>
    
    <button type="button" class="btn-sm btn-info btn-flat">Pul/Min</button>
    
    </div>
    
</div>
<div class="col-lg-3">
    <label for="pulson" class="col-xs-3 control-label requerido">F Respiratoria</label>
    <div class="row">
    <div class="col-6">
    <input type="text"  name="pulson" id="pulson" class="validanumericos form-control" value="{{old('pulson')}}" required >
    </div>
    
        <button type="button" class="btn-sm btn-info btn-flat">Res/Min</button>
    
    </div>
    
</div>

<div class="col-lg-3">
    <label for="saturacion_oxigeno" class="col-xs-4 control-label requerido">SPO2</label>
    <div class="row">
        <div class="col-6">
        <input type="text" name="saturacion_oxigeno" id="saturacion_oxigeno" class="validanumericos form-control" value="{{old('saturacion_oxigeno')}}" required >
        </div>
            <button type="button" class="btn-sm btn-info btn-flat">%</button>
    </div>
</div>

</div>
<div class="form-group row">
    <div class="col-lg-3">
        <label for="temperatura" class="col-xs-4 control-label requerido">Temperatura</label>
        <div class="row">
            <div class="col-6">
            <input type="text" name="temperatura" id="temperatura" class="decimales form-control" value="{{old('temperatura')}}" required >
            </div>
                <button type="button" class="btn-sm btn-danger btn-flat">°C</button>
        </div>
    </div>
    <div class="col-lg-3">
        <label for="peso" class="col-xs-4 control-label requerido">Peso</label>
        <div class="row">
            <div class="col-6">
            <input type="text" name="peso" id="peso" class="validanumericos form-control" value="{{old('peso')}}" required >
            </div>
                <button type="button" class="btn-sm btn-info btn-flat">Kg</button>
        </div>
    </div>
    <div class="col-lg-3">
        <label for="talla" class="col-xs-4 control-label requerido">Talla</label>
        <div class="row">
            <div class="col-6">
            <input type="text" name="talla" id="talla" class="validanumericos form-control" value="{{old('talla')}}" required >
            </div>
                <button type="button" class="btn-sm btn-info btn-flat">cm</button>
        </div>
    </div>
    <div class="col-lg-3">
        <label for="imc" class="col-xs-4 control-label requerido">Imc</label>
        <div class="row">
            <div class="col-6">
            <input type="text" name="imc" id="imc" class="decimales form-control" value="{{old('imc')}}" readonly >
            </div>
                <button type="button" class="btn-sm btn-info btn-flat">imc</button>
        </div>
    </div>

</div>
</div>
</div>
<div class="form-group row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="cabezacuello" class="col-xs-8 control-label requerido">Cabeza</label>
        <textarea name="cabezacuello" id="cabezacuello" class="form-control" rows="3" placeholder="Ingrese el estado de la cabeza ..." value="{{old('cabezacuello')}}" required></textarea>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="cuello" class="col-xs-8 control-label requerido">Cuello</label>
        <textarea name="cuello" id="cuello" class="form-control" rows="3" placeholder="Ingrese el estado del cuello ..." value="{{old('cuello')}}" required></textarea>
    </div>
</div>   
<div class="form-group row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="torax" class="col-xs-8 control-label requerido">Tórax</label>
        <textarea name="torax" id="torax" class="form-control" rows="3" placeholder="Ingrese el estado del tórax ..." value="{{old('torax')}}" required></textarea>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="car_pulmonar" class="col-xs-8 control-label requerido">Cardio pulmonar</label>
        <textarea name="car_pulmonar" id="car_pulmonar" class="form-control" rows="3" placeholder="Ingrese el estado del sistema cardio pulmonar ..." value="{{old('car_pulmonar')}}" required></textarea>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="abdomen" class="col-xs-8 control-label requerido">Abdomen</label>
        <textarea name="abdomen" id="abdomen" class="form-control" rows="3" placeholder="Ingrese el estado del abdomen..." value="{{old('abdomen')}}" required></textarea>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="genitourinario" class="col-xs-8 control-label requerido">Genitourinario</label>
        <textarea name="genitourinario" id="genitourinario" class="form-control" rows="3" placeholder="Ingrese ..." value="{{old('genitourinario')}}" required></textarea>
    </div>
</div>   
<div class="form-group row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="extremidad" class="col-xs-8 control-label requerido">Extremidades</label>
        <textarea name="extremidad" id="extremidad" class="form-control" rows="3" placeholder="Ingrese el estado de las extremidades ..." value="{{old('extremidad')}}" required></textarea>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="obsteomuscular" class="col-xs-8 control-label requerido">Obsteo muscular</label>
        <textarea name="obsteomuscular" id="obsteomuscular" class="form-control" rows="3" placeholder="Ingrese el estado del sistema ..." value="{{old('obsteomuscular')}}" required></textarea>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="sis_nervioso_cen" class="col-xs-8 control-label requerido tooltipsC"  title="Sistema nervioso central">SNC</label>
        <textarea name="sis_nervioso_cen" id="sis_nervioso_cen" class="form-control" rows="3" placeholder="Ingrese el estado del sistema ..." value="{{old('sis_nervioso_cen')}}" required></textarea>
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="recomendacionesg" class="col-xs-8 control-label requerido">Observacion general</label>
        <textarea name="recomendacionesg" id="recomendacionesg" class="form-control" rows="3" placeholder="Ingrese observacion general  ..." value="{{old('recomendacionesg')}}" required></textarea>
    </div>
</div>
