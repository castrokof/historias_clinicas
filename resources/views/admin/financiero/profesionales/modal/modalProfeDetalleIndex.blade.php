<div class="modal fade" tabindex="-1" id="modal-profesional-detalle" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-xl " role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header with-border">
                            <h3 class="card-title" id="title-profesional-detalle"></h3>

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

                            <!-- <div class="form-group row">
                                <div class="col-lg-3">
                                    <label for="cod_cups" class="col-xs-4 control-label ">Código</label>
                                    <input name="cod_cups" id="cod_cups" class="form-control " placeholder="CUPS" readonly>
                                </div>
                                <div class="col-lg-3">
                                    <label for="cod_alterno" class="col-xs-4 control-label ">Código Alterno</label>
                                    <input name="cod_alterno" id="cod_alterno" class="form-control" readonly>
                                </div>
                                <div class="col-lg-6">
                                    <label for="nombre" class="col-xs-4 control-label ">Nombre</label>
                                    <input name="nombre" id="nombre" class="form-control UpperCase" readonly></input>
                                </div>
                            </div> -->

                            <!-- En cada pestaña debe ir pintado en una table los datos que ya estan relacionados entre si 
                                es decir los procedimientos que estan asociados a los procedimientos, servicios y medicamentos
                                los cuales estan en la tabla intermedia de cada relacion: rel__profesionalvsprocedimientos,
                                rel__contratovsprocedimientos, rel__serviciovsprocedimientos
                             -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-datos-del-procedimientos-tab" 
                                        data-toggle="pill" href="#custom-tabs-one-datos-del-procedimientos" role="tab" 
                                        aria-controls="custom-tabs-one-datos-del-procedimientos" aria-selected="false">Procedimientos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-datos-del-servicio-tab" 
                                        data-toggle="pill" href="#custom-tabs-one-datos-del-servicio" role="tab" 
                                        aria-controls="custom-tabs-one-datos-del-servicio" aria-selected="false">Servicios</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-medicamentos-tab" 
                                        data-toggle="pill" href="#custom-tabs-one-medicamentos" role="tab" 
                                        aria-controls="custom-tabs-one-medicamentos" aria-selected="false">Medicamentos</a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Es estas tablas se pintan los datos que ya estan relacionados entre si -->
                            <div class="card-body">

                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade active show" id="custom-tabs-one-datos-del-procedimientos" role="tabpanel" aria-labelledby="custom-tabs-one-datos-del-procedimientos-tab">
                                        <div class="card-body">
                                            @csrf
                                            @include('admin.financiero.profesionales.tablas.table-procedimientos')
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="custom-tabs-one-datos-del-servicio" role="tabpanel" aria-labelledby="custom-tabs-one-datos-del-servicio-tab">
                                        <div class="card-body">
                                            @csrf
                                            @include('admin.financiero.profesionales.tablas.table-servicios')
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-medicamentos" role="tabpanel" aria-labelledby="custom-tabs-one-medicamentos-tab">
                                        <div class="card-body">
                                            @csrf
                                            @include('admin.financiero.profesionales.tablas.table-medicamentos')
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <!-- Cada Boton abre un modal donde se visualiza los datos de cada item para hacer la relacion entre las partes -->
                                    <button type="button" class="btn relacion_profesional btn-success" name="relacion_profesional" id="relacion_profesional">
                                        <i class="fa fa-fw fa-plus-circle"></i>Relacionar Procedimientos
                                    </button>
                                    <button type="button" class="btn create_items btn-success" name="create_items" id="create_items">
                                        <i class="fa fa-fw fa-plus-circle"></i>Relacionar Servicios
                                    </button>
                                    <button type="button" class="btn create_items btn-success" name="create_items" id="create_items">
                                        <i class="fa fa-fw fa-plus-circle"></i>Relacionar Medicamentos
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>