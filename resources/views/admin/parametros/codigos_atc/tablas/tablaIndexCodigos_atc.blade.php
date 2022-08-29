<div class="row">
  <div class="col-lg-12">
    @include('includes.form-error')
    @include('includes.form-mensaje')
    <div class="card card-info">
      <div class="card-header with-border">
        <h3 class="card-title-1">Códigos ATC y Forma</h3>
        <div class="card-tools pull-right">
          <button type="button" class="btn btn-default" name="create_paciente" id="create_paciente" data-toggle="modal" data-target="#modal-u"><i class="fa fa-fw fa-plus-circle"></i> Agregar ATC y Forma</button>
          </button>
        </div>
      </div>
      <div class="card-body table-responsive p-2">

        <table id="tatc" class="table table-hover  text-nowrap">
          <thead>
            <tr>
              <th>Acciones</th>
              <th>Código</th>
              <th>ATC</th>
              <th>Forma</th>
              <th>Concentracion</th>
              <th>Via Administración</th>
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