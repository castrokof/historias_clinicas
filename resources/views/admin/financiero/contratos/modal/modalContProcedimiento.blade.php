<div class="modal fade" tabindex="-1" id="modal-procedimiento" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog  modal-xl" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-warning">
                        <div class="card-header with-border">
                            <h3 class="card-title">Relación de Contratos con Procedimientos</h3>

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


                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade active show" id="custom-tabs-one-datos-del-relprocedimientos" role="tabpanel" aria-labelledby="custom-tabs-one-datos-del-relprocedimientos-tab">
                                    <div class="card-body">
                                        @csrf
                                        @include('admin.financiero.contratos.tablas.table-relprocedimientos')
                                    </div> 
                                </div>
                            </div>

                            <form id="form-general2" class="form-horizontal" method="POST">
                                @csrf
                                <button value ="addpr"  id="addpr" name="addpr" type="button" class="addss btn btn-success btn-xm col-xs-2">Add+</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>