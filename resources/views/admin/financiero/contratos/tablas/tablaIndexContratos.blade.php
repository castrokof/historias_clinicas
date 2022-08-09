<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.form-mensaje')
        <div class="card card-info">
            <div class="card-header with-border">
                <h3 class="card-title">Contratos</h3>
                <div class="card-tools pull-right">
                        <button type="button" class='btn crear_contrato btn-default' title='Agregar un contrato' name="crear_contrato" id="crear_contrato">
                        <i class="fa fa-fw fa-plus-circle"></i>Agregar</button>
                        <!-- <button type="button" class="btn crear_contrato btn-default" title='Editar datos del contrato' name="crear_contrato" id="crear_contrato">
                        <i class="fa fa-fw fa-edit"></i>Editar</button> -->
                </div>
            </div>
            <div class="card-body table-responsive p-2">

                <table id="listasGeneral" class="table table-hover  text-nowrap">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Contrato</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            </form>
        </div>
    </div>
</div>