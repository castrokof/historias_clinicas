<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.form-mensaje')
        <div class="card card-info">
            <div class="card-body table-responsive p-2">

                <table id="trelmedicamento" class="table table-hover  text-nowrap">

                    <thead>
                        <tr>
                            <!-- <th>Acciones</th> -->
                            <th class="width40"><input id="selectallm" type="checkbox" class="select-all" /> Des/Seleccione Todos</th>
                            <th>Código</th>
                            <th>Medicamento</th>
                            <th>CUMS</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
