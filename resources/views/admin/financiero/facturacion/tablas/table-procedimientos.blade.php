@php
$iduser = Session()->get('usuario');
$id= Session()->get('usuario_id');
@endphp

<div class="card card-info p-1">
    <div>
        <!-- Modal -->
        <button type="button" class="btn btn-primary" name="agregar_cups" id="agregar_cups" data-toggle="modal" data-target="#modal-u"><i class="fa fa-plus-circle"></i> Agregar</button>
    </div>

    <div class="x_panel">
        <div class="card-body with-border">

            <div class="card-body table-responsive p-2">
                <table id="tcups" class="table table-hover  text-nowrap">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Profesional</th>
                            <th>Servicio</th>
                            <th>Procedimiento</th>
                            <th>Contrato</th>
                            <th>Cantidad</th>
                            <th>Unitario</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <td>{{$iduser ?? ''}}</td> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
