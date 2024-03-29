<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.form-mensaje')
        <div class="card card-info">
            <div class="card-header with-border">
                <h3 class="card-title">Profesionales</h3>
                <div class="card-tools pull-right">
                    <button type="button" class="btn create_listas btn-default" name="create_listas" id="create_listas"><i class="fa fa-fw fa-plus-circle"></i>Agregar</button>
                </div>
            </div>
            <div class="card-body table-responsive p-2">

                <table id="listasGeneral" class="table table-hover  text-nowrap">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Especialidad</th>
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