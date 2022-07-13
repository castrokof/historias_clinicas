<div class="card card-info p-2">
    <div>
        <!-- Modal -->
        <button type="button" class="btn btn-primary" name="agregar_cups" id="agregar_cups" data-toggle="modal" data-target="#modal-u"><i class="fa fa-plus-circle"></i> Agregar</button>
    </div>

    <div class="x_panel">
        <div class="card-body with-border">

            <div class="card-body table-responsive p-2">
                <table id="tcups" class="table table-hover  text-nowrap">
                    {{-- class="table table-hover table-bordered text-nowrap" --}}
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Profesional</th>
                            <th>Servicio</th>
                            <th>Procedimiento</th>
                            <th>Descripción</th>
                            <th>Contrato</th>
                            <th>Cantidad</th>
                            <th>Unitario</th>
                            <th>Subtotal</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modal-u" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="row">
        <div class="col-lg-12">
          @include('includes.form-error')
          @include('includes.form-mensaje')
          <span id="form_result"></span>
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title"></h3>
              <div class="card-tools pull-right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            <form id="form-general" class="form-horizontal" method="POST">
              @csrf
              <div class="card-body">
                @include('admin.factura.form-cups')
              </div>
              <!-- /.card-body -->
              <div class="card-footer">

                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                  @include('includes.boton-form-crear-empresa-empleado-usuario')
                </div>
              </div>
              <!-- /.card-footer -->
            </form>



          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>

</script>