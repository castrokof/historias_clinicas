@php
$iduser = Session()->get('usuario');
$id= Session()->get('usuario_id');
@endphp

<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.form-mensaje')
        <div class="card card-info">
            <div class="card-header with-border">
                <h3 class="card-title">Facturación Ambulatoria</h3>
                <div class="card-tools pull-right">
                    <button type="button" class="btn create_paciente btn-default" name="create_paciente" id="create_paciente"><i class="fa fa-user "></i> Paciente</button>
                    <button type="button" class="btn create_listas btn-default" name="create_listas" id="create_listas"><i class="fa fa-calendar "></i> Citas</button>
                </div>
            </div>
            <div class="x_panel">
                <div class="card-body">
                    <form id="form-general2" class="form-horizontal" method="POST">
                        <div class="form-group row">
                            <div class="input-group input-group col-lg-3">
                                <input type="search" name="key" id="key" class="form-control form-control-mb" placeholder="Buscar paciente digite documento....">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-mb btn-default" id="buscarp">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>

                            @foreach ( $documento_consecutivo as $item)


                            <div class="input-group input-group col-lg-2">
                                <input type="search" name="key2" id="key2" class="form-control form-control-mb" placeholder="Documento factura..." value="{{$item->cod_documentos}}" readonly>
                                <div class="input-group-append">
                                    <span type="button" class="btn btn-mb btn-default" id="doc_conse">
                                        <i class="fas fa-file"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="input-group input-group col-lg-1">
                                <input type="text" name="numero_factura" id="numero_factura" class="form-control form-control-mb" placeholder="Número..." value="{{$item->consecutivo}}" readonly>
                                <div class="input-group-append">
                                    <span type="button" class="btn btn-mb btn-default">
                                        <i class="fas fa-tag"></i>
                                    </span>
                                </div>
                            </div>
                            @endforeach
                            <div class="input-group input-group col-lg-2">
                                <input type="text" name="created_at" id="created_at" class="form-control form-control-mb" placeholder="Fecha y hora del sistema" value="{{now() ?? ''}}" readonly>
                                <div class="input-group-append">
                                    <span type="button" class="btn btn-mb btn-default">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="input-group input-group col-lg-2">
                                <input type="text" name="created_at" id="created_at" class="form-control form-control-mb" placeholder="Fecha y hora del sistema" value="{{$iduser ?? ''}}" readonly>
                                <div class="input-group-append">
                                    <span type="button" class="btn btn-mb btn-default">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <!-- Aqui termina el form2 -->
                    </form>

                    <form id="form-general1" class="form-horizontal" method="POST">
                        <div class="form-group row">
                            <div class="col-lg-2">
                                <label for="documento" class="col-xs-4 control-label ">Historia</label>
                                <input type="text" name="documento" id="documento" class="form-control" readonly>
                                <!-- <select name="documento" id="paciente_id" class="form-control" style="width: 100%;"  required>
                              </select> -->
                            </div>
                            <div class="col-lg-1">
                                <label for="tipo_documento" class="col-xs-4 control-label ">Tipo ID</label>
                                <input name="tipo_documento" id="tipo_documento" class="form-control select2bs4" type="text" readonly>
                            </div>
                            <div class="col-lg-2">
                                <label for="pnombre" class="col-xs-4 control-label ">Primer nombre</label>
                                <input type="text" name="pnombre" id="pnombre" class="form-control" readonly>
                            </div>
                            <div class="col-lg-2">
                                <label for="snombre" class="col-xs-4 control-label ">Segundo nombre</label>
                                <input type="text" name="snombre" id="snombre" class="form-control" readonly>
                            </div>
                            <div class="col-lg-2">
                                <label for="papellido" class="col-xs-4 control-label ">Primer apellido</label>
                                <input type="text" name="papellido" id="papellido" class="form-control" readonly>
                            </div>
                            <div class="col-lg-2">
                                <label for="sapellido" class="col-xs-4 control-label ">Segundo apellido</label>
                                <input type="text" name="sapellido" id="sapellido" class="form-control" readonly>
                            </div>
                            <div class="col-lg-1">
                                <label for="edad" class="col-xs-4 control-label ">Edad</label>
                                <input type="number" name="edad" id="edad" class="form-control" placeholder="Edad" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-2">
                                <label for="nombre_pais" class="col-xs-4 control-label ">País de Residencia</label>
                                <input name="nombre_pais" id="nombre_pais" class="form-control" readonly>
                            </div>
                            <div class="col-lg-2">
                                <label for="nombre_ciudad" class="col-xs-4 control-label ">Ciudad</label>
                                <input name="nombre_ciudad" id="nombre_ciudad" class="form-control" readonly>
                            </div>
                            <div class="col-lg-2">
                                <label for="direccion" class="col-xs-4 control-label ">Direccion</label>
                                <input type="text" name="direccion" id="direccion" class="form-control" readonly>
                            </div>
                            <div class="col-lg-2">
                                <label for="celular" class="col-xs-4 control-label ">Celular</label>
                                <input type="tel" name="celular" id="celular" class="form-control" readonly>
                            </div>
                            <div class="col-lg-2">
                                <label for="telefono" class="col-xs-4 control-label ">Telefono</label>
                                <input type="tel" name="telefono" id="telefono" class="form-control" readonly>
                            </div>
                            <div class="col-lg-2">
                                <label for="correo" class="col-xs-4 control-label ">E-mail</label>
                                <input type="email" name="correo" id="correo" class="form-control" readonly>
                            </div>
                        </div>
                        <hr>
                        <p><a style="color:#0071c5;"> Datos de afiliación:</a> </p>
                        <div class="form-group row">
                            <div class="col-lg-2">
                                <label for="regimen" class="col-xs-4 control-label ">Régimen</label>
                                <input name="regimen" id="regimen" class="form-control" readonly>
                            </div>
                            <div class="col-lg-1">
                                <label for="codigo_eps" class="col-xs-4 control-label ">EPS</label>
                                <input name="codigo_eps" id="codigo_eps" class="form-control" readonly>
                            </div>
                            <div class="col-lg-3">
                                <label for="eps_nombre" class="col-xs-4 control-label requerido"></label>
                                <input name="eps_nombre" id="eps_nombre" class="form-control" placeholder="Razón Social" readonly>
                            </div>
                            <div class="col-lg-1">
                                <label for="nivel" class="col-xs-6 control-label">Nivel</label>
                                <input name="nivel" id="nivel" class="form-control" readonly>
                            </div>
                            <div class="col-lg-2">
                                <label for="numero_afiliacion" class="col-xs-4 control-label ">Número Afiliación</label>
                                <input name="numero_afiliacion" id="numero_afiliacion" class="form-control" readonly>
                            </div>
                        </div>
                        <hr>
                        <p><a style="color:#0071c5;"> Generar factura con cargo a:</a> </p>
                        <div class="form-group row">
                            <div class="col-lg-2">
                                <label for="plan" class="col-xs-6 control-label">Régimen</label>
                                <!--<input type="text" name="regimen" id="regimen" class="form-control" value="{{ old('regimen') }}" required> -->
                                <select name="regimen" id="plan" class="form-control" style="width: 100%;" value="{{ old('regimen') }}" required>
                                    <option value="" selected>-- Seleccionar --</option>
                                    <option value="Particular">Particular</option>
                                    <option value="Contributivo">Contributivo</option>
                                    <option value="Subsidiado">Subsidiado</option>
                                    <option value="Vinculado">Vinculado</option>
                                    <option value="Otro régimen">Otro régimen</option>
                                    <option value="Accidentes de tránsito">Accidentes de tránsito</option>
                                    <option value="Riesgos profesionales">Riesgos profesionales</option>
                                    <option value="Desplazado">Desplazado</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="eps_fact" class="col-xs-4 control-label ">Cliente</label>
                                <select name="eps_id" id="eps_fact" class="form-control" style="width: 100%;" required>
                                </select>
                            </div>

                            <div class="col-lg-1">
                                <label for="nivel_eps" class="col-xs-4 control-label">Nivel</label>
                                <select name="nivel_eps" id="listaNivelesEps" class="form-control" style="width: 100%;">
                                <!-- Aquí se mostrarán las opciones de nivel de la EPS -->
                                </select>
                                <!-- <input type="text" name="nivel_eps" id="nivel_eps" class="form-control"  required> -->
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-datos-del-paciente-tab" data-toggle="pill" href="#custom-tabs-one-datos-del-paciente" role="tab" aria-controls="custom-tabs-one-datos-del-paciente" aria-selected="false">Procedimientos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-consulta-tab" data-toggle="pill" href="#custom-tabs-one-consulta" role="tab" aria-controls="custom-tabs-one-Consulta" aria-selected="false">Medicamentos</a>
                            </li>
                        </ul>

                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade active show" id="custom-tabs-one-datos-del-paciente" role="tabpanel" aria-labelledby="custom-tabs-one-datos-del-paciente-tab">
                                    <div class="card-body">
                                        <form id="form-general" class="form-horizontal" method="POST">
                                            @csrf
                                            @include('admin.financiero.facturacion.tablas.table-procedimientos')
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="custom-tabs-one-consulta" role="tabpanel" aria-labelledby="custom-tabs-one-consulta-tab">
                                    <div class="card-body">

                                        @include('admin.financiero.facturacion.tablas.table-medicamento')

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p><a style="color:#0071c5;"> Detalle del documento de venta:</a> </p>

                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label for="cant_procedure" class="col-xs-4 control-label ">Procedimiento:</label>
                            <input type="text" name="cant_procedure" id="cant_procedure" class="form-control" readonly>
                        </div>
                        <div class="col-lg-2">
                            <label for="fact_subtotal" class="col-xs-4 control-label ">Subtotal:</label>
                            <input type="text" name="fact_subtotal" id="fact_subtotal" class="form-control" readonly>
                        </div>
                        <div class="col-lg-2">
                            <label for="fact_iva" class="col-xs-4 control-label ">IVA:</label>
                            <input type="text" name="fact_iva" id="fact_iva" class="form-control" readonly>
                        </div>
                        <div class="col-lg-2">
                            <label for="fac_total" class="col-xs-4 control-label ">Total Facturado:</label>
                            <input type="text" name="fac_total" id="fac_total" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label for="cant_medicamentos" class="col-xs-4 control-label ">Medicamento:</label>
                            <input type="text" name="cant_medicamentos" id="cant_medicamentos" class="form-control" readonly>
                        </div>
                        <div class="col-lg-2">
                            <label for="descuentos" class="col-xs-4 control-label ">Descuentos:</label>
                            <input type="text" name="descuentos" id="descuentos" class="form-control" readonly>
                        </div>
                        <div class="col-lg-2">
                            <label for="copago" class="col-xs-4 control-label ">Recuperado / Copago:</label>
                            <input type="text" name="copago" id="copago" class="form-control" readonly>
                        </div>
                        <div class="col-lg-2">
                            <label for="valorFactura" class="col-xs-4 control-label ">Valor a cancelar:</label>
                            <input type="text" name="valorFactura" id="valorFactura" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            </form>
            <!-- /.card-body -->
        </div>
    </div>
</div>
