<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.form-mensaje')
        <div class="card card-info">
            <div class="card-header with-border">
                <h3 class="card-title">Contratos</h3>
                <div class="card-tools pull-right">
                    <button type="button" class="btn crear_contrato btn-default" name="crear_contrato" id="crear_contrato"><i class="fa fa-fw fa-plus-circle"></i>Agregar</button>
                </div>
            </div>
            <div class="x_panel">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="input-group input-group col-lg-3">
                            <input type="search" name="key" id="key" class="form-control form-control-mb" placeholder="Buscar contrato....">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-mb btn-default" id="buscarp">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <form id="form-general2" class="form-horizontal" method="POST">
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <label for="contrato" class="col-xs-4 control-label ">Contrato</label>
                                <input type="text" name="contrato" id="contrato" class="form-control" readonly>
                            </div>
                            <div class="col-lg-6">
                                <label for="nombre" class="col-xs-4 control-label ">Nombre Contrato</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" readonly>
                            </div>
                            <div class="col-lg-3">
                                <label for="tipo_contrato" class="col-xs-4 control-label ">Tipo de Contrato</label>
                                <input type="text" name="tipo_contrato" id="tipo_contrato" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label for="descripcion" class="col-xs-4 control-label ">Descripcion</label>
                                <!-- <input type="text" name="descripcion" id="descripcion" class="form-control" readonly> -->
                                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" readonly></textarea>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1">
                                    <ul class="nav nav-tabs nav-justified" id="custom-tabs-one-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-one-eps-tab" data-toggle="pill" href="#custom-tabs-one-eps" role="tab" aria-controls="custom-tabs-one-eps" aria-selected="false">EPS Empresa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-datos-del-servicio-tab" data-toggle="pill" href="#custom-tabs-one-datos-del-servicio" role="tab" aria-controls="custom-tabs-one-datos-del-servicio" aria-selected="false">Servicios</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-sede-tab" data-toggle="pill" href="#custom-tabs-one-sede" role="tab" aria-controls="custom-tabs-one-sede" aria-selected="false">Sedes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-datos-del-procedimientos-tab" data-toggle="pill" href="#custom-tabs-one-datos-del-procedimientos" role="tab" aria-controls="custom-tabs-one-datos-del-procedimientos" aria-selected="false">Procedimientos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-medicamentos-tab" data-toggle="pill" href="#custom-tabs-one-medicamentos" role="tab" aria-controls="custom-tabs-one-medicamentos" aria-selected="false">Medicamentos</a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Es estas tablas se pintan los datos que ya estan relacionados entre si -->
                                <!-- Los button abren un modal donde se visualiza los datos de cada item para hacer la relacion -->
                                <div class="card-body">

                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <div class="tab-pane fade active show" id="custom-tabs-one-eps" role="tabpanel" aria-labelledby="custom-tabs-one-eps-tab">
                                            <div class="card-body">
                                                @csrf
                                                @include('admin.financiero.contratos.tablas.table-eps_empresas')
                                            </div>
                                            <button type="button" class="btn relacion_eps btn-success" name="relacion_eps" id="relacion_eps">
                                                <i class="fa fa-fw fa-plus-circle"></i>Relacionar EPS
                                            </button>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-one-datos-del-servicio" role="tabpanel" aria-labelledby="custom-tabs-one-datos-del-servicio-tab">
                                            <div class="card-body">
                                                @csrf
                                                @include('admin.financiero.contratos.tablas.table-servicios')
                                            </div>
                                            <button type="button" class="btn relacion_servicio btn-success" name="relacion_servicio" id="relacion_servicio">
                                                <i class="fa fa-fw fa-plus-circle"></i>Relacionar Servicios
                                            </button>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-one-sede" role="tabpanel" aria-labelledby="custom-tabs-one-sede-tab">
                                            <div class="card-body">
                                                @csrf
                                                @include('admin.financiero.contratos.tablas.table-sede')
                                            </div>
                                            <button type="button" class="btn relacion_sede btn-success" name="relacion_sede" id="relacion_sede">
                                                <i class="fa fa-fw fa-plus-circle"></i>Relacionar Sedes
                                            </button>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-one-datos-del-procedimientos" role="tabpanel" aria-labelledby="custom-tabs-one-datos-del-procedimientos-tab">
                                            <div class="card-body">
                                                @csrf
                                                @include('admin.financiero.contratos.tablas.table-procedimientos')
                                            </div>
                                            <button type="button" class="btn relacion_procedimiento btn-success" name="relacion_procedimiento" id="relacion_procedimiento">
                                                <i class="fa fa-fw fa-plus-circle"></i>Relacionar Procedimientos
                                            </button>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-one-medicamentos" role="tabpanel" aria-labelledby="custom-tabs-one-medicamentos-tab">
                                            <div class="card-body">
                                                @csrf
                                                @include('admin.financiero.contratos.tablas.table-medicamentos')
                                            </div>
                                            <button type="button" class="btn relacion_medicamento btn-success" name="relacion_medicamento" id="relacion_medicamento">
                                                <i class="fa fa-fw fa-plus-circle"></i>Relacionar Medicamentos
                                            </button>
                                        </div>
                                    </div>

                                </div> <!-- card -->
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

                        </div>
                    </div> -->
                </div>
            </div>

            </form>
            <!-- /.card-body -->
        </div>
    </div>
</div>