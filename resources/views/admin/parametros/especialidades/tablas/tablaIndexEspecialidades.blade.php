<div class="row">
  <div class="col-lg-12">
    @include('includes.form-error')
    @include('includes.form-mensaje')
    <div class="card card-info">
      <div class="card-header with-border">
        <h3 class="card-title-1">Especialidades</h3>
        <div class="card-tools pull-right">
          <button type="button" class="btn btn-default" name="create_especialidad" id="create_especialidad" data-toggle="modal" data-target="#modal-u"><i class="fa fa-fw fa-plus-circle"></i> Nueva Especialidad</button>
          </button>
        </div>
      </div>
      <div class="card-body table-responsive p-2">

        <table id="tespecialidad" class="table table-hover  text-nowrap">
          <thead>
            <tr>
              <th>Acciones</th>
              <th>Código</th>
              <th>Especialidad</th>
              <th>Estado</th>
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