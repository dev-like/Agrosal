@extends('admin.main')

@section('page-title')
  NOTÍCIAS
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
      <div class="row">
        <div class="col-md-12">
          @if($produto->imagem)
          <img src="{{ asset('produtos/imagens/'. $produto->imagem) }}" style="width: 50%">
          <hr>
          @endif
            <h2>{{ $produto->nome }}</h2>
            <hr>
            <p>{!! $produto->descricao !!}</p>
        
          </div>
      </div>
      <div class="row">
          <div class="col-md-4 offset-md-4" style="margin-top: 20px">
            {{ Html::linkRoute('produto.index', 'Voltar', [], array('class' => 'btn btn-light btn-block')) }}
          </div>
      </div>
  </div>
</div>

@endsection
