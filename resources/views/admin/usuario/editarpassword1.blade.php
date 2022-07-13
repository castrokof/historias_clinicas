@extends("theme.$theme.layout")
@section('titulo')
 Editar Usuario
@endsection

@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/usuario/crear.js")}}" type="text/javascript"></script>    
@endsection

@section('contenido')
<div class="row">
<div class="col-lg-12">    
  @include('includes.form-error')
  @include('includes.form-mensaje')
<div class="card card-warning">
    <div class="card-header">
    <h3 class="card-title">Editar Contraseña del usuario:{{$data->usuario}}</h3>
      <div class="card-tools pull-right">
        <a href="{{route('tablero')}}" type="button" class="btn btn-block btn-info btn-sm">
              <i class="fa fa-fw fa-reply-all"></i> Volver al tablero de control
        </a>
        </div>
    </div>
  <form action="{{route('actualizar_password1', ['id' => $data->id])}}" id="form-general-pass1" class="form-horizontal" method="POST">
    @csrf @method('put')
    <div class="card-body">
                      @include('admin.usuario.form-password')
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                      <div class="col-lg-3"></div>
                      <div class="col-lg-6">
                      @include('includes.boton-form-editar')
                  </div>
                   </div>
                  <!-- /.card-footer -->
                </form>
             

    
  </div>
</div>
</div>
@endsection