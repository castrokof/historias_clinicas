<div class="card card-info p-2">
    <div class="card-header with-border">
        <h5 class="card-title">Analisis Evolución</h5>
       
    </div> 
<div class="form-group row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="recomendaciones" class="col-xs-8 control-label "></label>
        <textarea name="recomendacionesd" id="recomendacionesd" class="form-control" rows="10" placeholder="Ingrese el analisis de la evolución..."  required></textarea>
    </div>
</div> 
<div class="col-lg-3">
    <input type="hidden" name="historia_id" id="historia_idp3" class="form-control" value="{{old('historia_id')}}" readonly >
</div>

@include('includes.boton-form-crear-empresa-empleado-usuario')  

<div class="card-body with-border">   
    
    <div class="card-body table-responsive p-2">
          
          <table id="tanalisis" class="table table-hover table-striped table-bordered ">
            <thead>
            <tr>
                  <th>Historia</th>
                  <th>Analisis evolucion</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
      </div>
  </div>
</div>


 