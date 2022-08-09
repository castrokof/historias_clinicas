<div class="modal fade" tabindex="-1" id="modal-contrato-detalle" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-xl " role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header with-border">
                            <h3 class="card-title" id="title-contrato-detalle"></h3>

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

                            <!-- En cada pestaña debe ir pintado en una table los datos que ya estan relacionados entre si 
                                es decir los procedimientos que estan asociados a los profesionales, servicios y contratos
                                los cuales estan en la tabla intermedia de cada relacion: rel__profesionalvsprocedimientos,
                                rel__contratovsprocedimientos, rel__serviciovsprocedimientos
                             -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-primary card-tabs">
                                        <div class="card-header p-0 pt-1">
                                            <ul class="nav nav-tabs nav-justified" id="custom-tabs-one-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="custom-tabs-one-eps-tab" 
                                                    data-toggle="pill" href="#custom-tabs-one-eps" role="tab" 
                                                    aria-controls="custom-tabs-one-eps" aria-selected="false">EPS Empresa</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-datos-del-servicio-tab" 
                                                    data-toggle="pill" href="#custom-tabs-one-datos-del-servicio" role="tab" 
                                                    aria-controls="custom-tabs-one-datos-del-servicio" aria-selected="false">Servicios</a>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>