<div class="row">
  <div class="col-lg-12">
    @include('includes.form-error')
    @include('includes.form-mensaje')
    <div class="card card-success">
      <div class="card-header with-border form-group row">
        <h3 class="card-title-1 col-lg-10">Eps Empresas</h3>
        <div class="card-tools pull-right col-lg-2">
          <button type="button" class="btn btn-default" name="create_eps" id="create_eps" data-toggle="modal" data-target="#modal-u"><i class="fa fa-fw fa-plus-circle"></i> Crear EPS</button>
          </button>
        </div>
      </div>
      <div class="card-body table-responsive p-2">

        <table id="eps" class="table table-hover  text-nowrap">
          {{-- class="table table-hover table-bordered text-nowrap" --}}
          <thead>
            <tr>
              <th>Acciones</th>
              <th>Código</th>
              <th>Nombre EPS</th>
              <th>NIT</th>
              <!--<th>Color</th>         -->
              <th>Habilitado</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      </form>
      <!-- /.card-body -->
    </div>
  </div>
</div>