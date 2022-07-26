<div class="modal fade" tabindex="-1" id="modal-procedimiento-detalle" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-xl " role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header with-border">
                            <h3 class="card-title" id="title-procedimiento-detalle"></h3>

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

                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label for="cod_cups" class="col-xs-4 control-label ">Código</label>
                                    <input type="number" name="cod_cups" id="cod_cups" class="form-control " placeholder="CUPS" readonly>
                                </div>
                                <div class="col-lg-3">
                                    <label for="cod_alterno" class="col-xs-4 control-label ">Código Alterno</label>
                                    <input name="cod_alterno" id="cod_alterno" class="form-control" readonly>
                                </div>
                                <!-- <div class="col-lg-8">
                                    <label for="nombre" class="col-xs-4 control-label ">Nombre</label>
                                    <input name="nombre" id="nombre" class="form-control UpperCase" readonly></input>
                                </div> -->
                            </div>
                            
                            <!-- <div class="ln_solid"></div> -->
                            <div class="form-group row">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

                                    <button type="button" class="btn create_items btn-success" name="create_items" id="create_items">
                                        <i class="fa fa-fw fa-plus-circle"></i>Relacionar Profesionales
                                    </button>
                                    <button type="button" class="btn create_items btn-success" name="create_items" id="create_items">
                                        <i class="fa fa-fw fa-plus-circle"></i>Relacionar Servicios
                                    </button>
                                    <button type="button" class="btn create_items btn-success" name="create_items" id="create_items">
                                        <i class="fa fa-fw fa-plus-circle"></i>Relacionar Contrato
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>