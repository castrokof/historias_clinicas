<div class="row">
  <div class="col-lg-12">
    @include('includes.form-error')
    @include('includes.form-mensaje')
    <div class="card card-info">
      <div class="card-header with-border">
        <h3 class="card-title-1">Finalidades</h3>
        <div class="card-tools pull-right">
          <button type="button" class="btn btn-default" name="create_finalidad" id="create_finalidad" data-toggle="modal" data-target="#modal-u"><i class="fa fa-fw fa-plus-circle"></i> Nueva Finalidad</button>
          </button>
        </div>
      </div>
      <div class="card-body table-responsive p-2">

        <table id="tfinalidades" class="table table-hover  text-nowrap">
          <thead>
            <tr>
              <th>Acciones</th>
              <th>Finalidad</th>
              <th>Nombre</th>
              <th>Régimen</th>
              <th>EPS Empresa</th>
              <th>Servicio</th>
              <th>Edad Min</th>
              <th>Edad Max</th>
              <th>Genero</th>
              <th>Embarazo</th>
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