<div class="modal fade" tabindex="-1" id="modal_edit_cita" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog  modal-xl" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-lg-12">
                    @include('includes.form-error')
                    @include('includes.form-mensaje')
                    <span id="form_result_edit"></span>
                    <div class="card card-primary">
                        <div class="card-header with-border">
                            <h3 class="card-title">Editar Cita</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-dismiss="modal">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="formulario_cita" class="form-horizontal" method="POST">
                                @csrf
                                @include('admin.cita.form.formEditCita')
                                @include('includes.boton-form-crear-empresa-empleado-usuario')

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
