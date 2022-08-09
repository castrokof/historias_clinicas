<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.form-mensaje')
        <div class="card card-info">
            <div class="card-header with-border">
                <h3 class="card-title">Documentos Financieros</h3>
                <div class="card-tools pull-right">
                    <button type="button" class="btn crear_documento btn-default" name="crear_documento" id="crear_documento"><i class="fa fa-fw fa-plus-circle"></i>Agregar</button>
                </div>
            </div>
            <div class="card-body table-responsive p-2">

                <table id="tdocumento" class="table table-hover  text-nowrap">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            </form>
            <!-- /.card-body -->
        </div>
    </div>
</div>