@extends('admin.main')

@section('page-title')
  QUEM SOMOS
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
    <h4 class="m-t-0 header-title"><b>Editar Quem Somos</b></h4>

        {{ Form::open($cliente, ['route' => ['cliente.update', $cliente->id], 'method' => 'PUT']) }}
            <div class="row">
              <div class="col-md-6">
                  {{ Form::label('email', 'Email') }}
                  {{ Form::text('email', null, array('class' => 'form-control')) }}
              </div>
              <div class="col-md-6">
                  {{ Form::label('facebook', 'Facebook') }}
                  {{ Form::text('facebook', null, array('class' => 'form-control')) }}
              </div>
              <div class="col-md-6">
                  {{ Form::label('intagram', 'Instagram') }}
                  {{ Form::text('intagram', null, array('class' => 'form-control')) }}
              </div>
              <div class="col-md-6">
                  {{ Form::label('youtube', 'Youtube') }}
                  {{ Form::text('youtube', null, array('class' => 'form-control')) }}
              </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ Form::label('descricao', 'Descrição') }}
                    {{ Form::textarea('descricao', null, array('class' => 'form-control', 'style' => 'height:400px')) }}
                </div>
            </div>
            <div class="row">
              <div class="col-md-4 offset-md-4" style="margin-top: 15px">
                <div class="col-6 col-md-6" style="float: left">
                  {{ Html::linkRoute('cliente.index', 'Cancelar', null, ['class' => 'btn btn-danger btn-block']) }}
                </div>
                <div class="col-6 col-md-6" style="float: left">
                  {{ Form::submit('Enviar', array('class' => 'btn btn-success btn-block')) }}
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
