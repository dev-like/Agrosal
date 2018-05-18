@extends('admin.main')

@section('page-title')
  NOTÍCIAS
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
      <div class="row">
        <div class="col-md-12">
            <h2>{{ $linha->nome }}</h2>
            <h5>{!! $linha->descricao !!}</h5>
          </div>
      </div>
      <div class="row">
          <div class="col-md-4 offset-md-4" style="margin-top: 20px">
            {{ Html::linkRoute('linha.index', 'Voltar', [], array('class' => 'btn btn-light btn-block')) }}
          </div>
      </div>
  </div>
</div>

@endsection
