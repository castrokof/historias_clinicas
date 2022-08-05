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
                                                    <a class="nav-link active" id="custom-tabs-one-profesional-tab" 
                                                    data-toggle="pill" href="#custom-tabs-one-profesional" role="tab" 
                                                    aria-controls="custom-tabs-one-profesional" aria-selected="false">Profesional</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-servicios-tab" 
                                                    data-toggle="pill" href="#custom-tabs-one-servicios" role="tab" 
                                                    aria-controls="custom-tabs-one-servicios" aria-selected="false">Servicios</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-contrato-tab" 
                                                    data-toggle="pill" href="#custom-tabs-one-contrato" role="tab" 
                                                    aria-controls="custom-tabs-one-contrato" aria-selected="false">Contrato</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                                <div class="tab-pane fade active show" id="custom-tabs-one-profesional" role="tabpanel" aria-labelledby="custom-tabs-one-profesional-tab">
                                                    <div class="card-body">

                                                        @csrf
                                                        @include('admin.financiero.procedimientos.tablas.table-profesionales')

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-servicios" role="tabpanel" aria-labelledby="custom-tabs-one-servicios-tab">
                                                    <div class="card-body">

                                                        @csrf
                                                        @include('admin.financiero.procedimientos.tablas.table-servicios')

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-contrato" role="tabpanel" aria-labelledby="custom-tabs-one-contrato-tab">
                                                    <div class="card-body">

                                                        @csrf
                                                        @include('admin.financiero.procedimientos.tablas.table-contratos')

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <!-- Cada Boton abre un modal donde se visualiza los datos de cada item para hacer la relacion entre las partes -->
                                    <button type="button" class="btn relacion_profesional btn-success" name="relacion_profesional" id="relacion_profesional">
                                        <i class="fa fa-fw fa-plus-circle"></i>Relacionar Profesionales
                                    </button>
                                    <button type="button" class="btn relacion_servicio btn-success" name="relacion_servicio" id="relacion_servicio">
                                        <i class="fa fa-fw fa-plus-circle"></i>Relacionar Servicios
                                    </button>
                                    <button type="button" class="btn relacion_contrato btn-success" name="relacion_contrato" id="relacion_contrato">
                                        <i class="fa fa-fw fa-plus-circle"></i>Relacionar Contrato
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>