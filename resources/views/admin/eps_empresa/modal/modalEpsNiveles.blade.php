<div class="modal fade" tabindex="-1" id="modal-n" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-lg-12">
                    @include('includes.form-error')
                    @include('includes.form-mensaje')
                    <span id="form_result_n"></span>
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-tools pull-right">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <form id="form-general-n" class="form-horizontal" method="POST">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-2">
                                        <label for="codigo_n" class="col-xs-4 control-label ">Código</label>
                                        <input type="text" name="codigo_n" id="codigo_n" class="form-control" readonly>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="nombre_n" class="col-xs-4 control-label requerido">Razón Social</label>
                                        <input type="text" name="nombre" id="nombre_n" class="form-control" readonly>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="NIT_n" class="col-xs-4 control-label requerido">NIT</label>
                                        <input type="number" name="NIT" id="NIT_n" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>

                            @csrf
                            <div class="card-body">
                                @include('admin.eps_empresa.form-niveles')
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>