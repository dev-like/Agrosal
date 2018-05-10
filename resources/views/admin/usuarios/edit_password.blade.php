@extends('admin.main')

@section('page-title')
  Usuários
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
    <h4 class="m-t-0 header-title"><b>Editar senha de {{ $usuario->nome }}</b></h4>

        {{ Form::model($usuario, ['route' => ['usuario.atualizar_senha', $usuario->id], 'method' => 'POST', 'id' => 'sendForm']) }}
            <div class="row">
                <div class="col-md-6 offset-md-3">
                  {{ Form::label('password', 'Nova Senha') }}
                  {{ Form::password('password', ['class' => 'form-control']) }}
                </div>
                <div class="col-md-6 offset-md-3">
                  {{ Form::label('password_confirmation', 'Confirmar Nova Senha') }}
                  {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                </div>

                <div class="col-md-6 offset-md-3">
                  {{ Form::label('password_user', 'Digite sua senha de usuário, para confirmar alteração') }}
                  {{ Form::password('password_user', ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="row">
              <div class="col-md-4 offset-md-4" style="margin-top: 15px">                
                <div class="col-6 col-md-6" style="float: left">
                  {{ Form::submit('Enviar', array('class' => 'btn btn-success btn-block')) }}
                </div>
                <div class="col-6 col-md-6" style="float: left">
                  {{ Html::linkRoute('usuario.index', 'Cancelar', null, ['class' => 'btn btn-danger btn-block']) }}
                </div>
              </div>
            </div>
        {{ Form::close() }}

  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('template/js/pages/form_elements.js') }}"></script>
@endsection
