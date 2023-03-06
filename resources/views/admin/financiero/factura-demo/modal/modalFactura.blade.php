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
                <h3 class="card-title">Facturación DEMO</h3>
                <div class="card-tools pull-right">
                    <button type="button" class="btn create_paciente btn-default" name="create_paciente" id="create_paciente"><i class="fa fa-user "></i> Paciente</button>
                    <button type="button" class="btn create_listas btn-default" name="crear_cita" id="crear_cita"><i class="fa fa-calendar "></i> Citas</button>
                </div>
            </div>
            <div class="x_panel">
                <div class="card-body">
                    <div class="paper-wrapper">
                        <div class="paper">

                            <div class="row">
                                <div class="col">
                                    <table>
                                        <tr>
                                            <td halign="right" width="138"> <label for="">Paciente <span class="req" style="color: red;" require>*</span></label> </td>
                                            <td><input type="search" name="key" id="key" class="form-control form-control-mb" placeholder="Buscar paciente digite documento...."></td>
                                        </tr>
                                        <tr>
                                            <td halign="right" width="138"> <label for="">Tipo ID </label> </td>
                                            <td><input name="tipo_documento" id="tipo_documento" class="form-control form-control-mb" readonly></td>
                                        </tr>
                                        <tr>
                                            <td halign="right" width="138"> <label for="">Historia </label> </td>
                                            <td><input type="text" name="documento" id="documento" class="form-control form-control-mb" readonly></td>
                                        </tr>
                                        <tr>
                                            <td halign="right" width="138"> <label for="">Nombre </label> </td>
                                            <td><input type="text" name="documento" id="documento" class="form-control form-control-mb" readonly></td>
                                        </tr>
                                        <tr>
                                            <td halign="right" width="138"> <label for="">Apellido </label> </td>
                                            <td><input type="text" name="documento" id="documento" class="form-control form-control-mb" readonly></td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="col">
                                    <table>
                                        <tr>
                                            <td halign="right" width="138"> <label for="">Celular </label> </td>
                                            <td><input name="celular" id="celular" class="form-control form-control-mb" readonly></td>
                                        </tr>
                                        <tr>
                                            <td halign="right" width="138"> <label for="">País </label> </td>
                                            <td><input name="pais" id="pais" class="form-control form-control-mb" readonly></td>
                                        </tr>
                                        <tr>
                                            <td halign="right" width="138"> <label for="">Régimen </label> </td>
                                            <td><input name="tipo_documento" id="tipo_documento" class="form-control form-control-mb" readonly></td>
                                        </tr>
                                        <tr>
                                            <td halign="right" width="138"> <label for="">Empresa EPS </label> </td>
                                            <td><input type="text" name="eps" id="eps" class="form-control form-control-mb" readonly></td>
                                        </tr>
                                        <tr>
                                            <td halign="right" width="138"> <label for="">Nivel </label> </td>
                                            <td><input type="text" name="nivel" id="nivel" class="form-control form-control-mb" readonly></td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="col">
                                    <table>
                                        <tr>
                                            <td halign="right" width="138"> <label for="">Fecha </label> </td>
                                            <td><input type="text" name="created_at" id="created_at" class="form-control form-control-mb" value="{{now() ?? ''}}" readonly></td>
                                        </tr>
                                        <tr>
                                            <td halign="right" width="138"> <label for="">Forma de Pago </label> </td>
                                            <td><select name="regimen" id="plan" class="form-control" style="width: 100%;" value="{{ old('regimen') }}" required>
                                                    <!-- <option value="" selected>-- Seleccionar --</option> -->
                                                    <option value="Efectivo">Efectivo</option>
                                                    <option value="T. Crédito">T. Crédito</option>
                                                    <option value="T. Débito">T. Débito</option>
                                                    <option value="Transferencia">Transferencia</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td halign="right" width="138"> <label for="">Empresa EPS </label> </td>
                                            <td><input type="text" name="documento" id="documento" class="form-control form-control-mb" readonly></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col"> col 1</div>
                                
                            </div>
                            <br>
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
                                                    @include('admin.financiero.factura-demo.tablas.table-procedimientos')
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="custom-tabs-one-consulta" role="tabpanel" aria-labelledby="custom-tabs-one-consulta-tab">
                                            <div class="card-body">

                                                @include('admin.financiero.factura-demo.tablas.table-medicamento')

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>