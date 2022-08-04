<div class="row">
  <div class="col-lg-12">
    @include('includes.form-error')
    @include('includes.form-mensaje')
    <div class="card card-info">
      <div class="card-header with-border">
        <h3 class="card-title-1">Pacientes</h3>
        <div class="card-tools pull-right">
          <button type="button" class="btn btn-default" name="create_paciente" id="create_paciente" data-toggle="modal" data-target="#modal-u"><i class="fa fa-fw fa-plus-circle"></i> Nuevo paciente</button>
          </button>
        </div>
      </div>
      <div class="card-body table-responsive p-2">

        <table id="pacientes" class="table table-hover  text-nowrap">
          {{-- class="table table-hover table-bordered text-nowrap" --}}
          <thead>
            <tr>
              <th>Acciones</th>
              <th>Id</th>
              <th>1Nombre</th>
              <th>2Nombre</th>
              <th>1Apellido</th>
              <th>2Apellido</th>
              <th>Tipo documento</th>
              <th>Documento</th>
              <th>Edad</th>
              <th>Ciudad</th>
              <th>Dirección</th>
              <th>Celular</th>
              <th>Telefono</th>
              <th>Correo</th>
              <th>Grupo</th>
              <th>Régimen</th>
              <th>Observaciones</th>
              <th>Fecha de creacion</th>
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
