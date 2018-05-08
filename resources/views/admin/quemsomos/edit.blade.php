@extends('admin.main')

@section('page-title')
  QUEM SOMOS
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
    <h4 class="m-t-0 header-title"><b>Editar Quem Somos</b></h4>
        {{ Form::model($quemsomos, ['route' => ['quemsomos.update', $quemsomos->id], 'method' => 'PUT']) }}

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
                    {{ Form::label('descrição', 'Descrição') }}
                    {{ Form::textarea('descrição', $quemsomos->descricao, array('class' => 'form-control', 'style' => 'height:100px')) }}
                </div>
            </div>
            <div class="row" style="margin-top: 20px">
              <div class="col-12">
                <div class="text-right">
                  <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Salvar</button>
                  <a href="{{ route('quemsomos.index') }}" class="btn btn-danger"><i class="fa fa-window-close m-r-5"></i> Cancelar</a>
                </div>
              </div>
            </div>
        {{ Form::close() }}

  </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('template/js/pages/form_elements.js') }}"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
@endsection
