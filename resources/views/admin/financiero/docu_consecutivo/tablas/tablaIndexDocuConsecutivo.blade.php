<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.form-mensaje')
        <div class="card card-info">
            <div class="card-header with-border">
                <h3 class="card-title">Consecutivos</h3>
                <div class="card-tools pull-right">
                    <button type="button" class="btn crear_consecutivos btn-default" name="crear_consecutivos" id="crear_consecutivos"><i class="fa fa-fw fa-plus-circle"></i>Agregar</button>
                </div>
            </div>
            <div class="card-body table-responsive p-2">

                <table id="tconsecutivo" class="table table-hover  text-nowrap">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Código</th>
                            <th>Documento</th>
                            <th>Consecutivo</th>
                            <th>Sede</th>
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