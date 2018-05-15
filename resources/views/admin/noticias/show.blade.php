@extends('admin.main')

@section('page-title')
  NOTÍCIAS
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
      <div class="row">
        <div class="col-md-12">
            <h2>{{ $noticia->titulo }}</h2>
            <h5>{{ $noticia->descricao }}</h5>
            <h6>{{ $noticia->palavraschave }}</h6>
            <hr>
            @if($noticia->capa)
            <img src="{{ asset('noticias/imagens/'. $noticia->capa) }}" style="width: 50%">
            <hr>
            @endif
            <p>{!! $noticia->conteudo !!}</p>
        </div>
      </div>
      <div class="row">
          <div class="col-md-4 offset-md-4" style="margin-top: 20px">
            {{ Html::linkRoute('noticia.index', 'Voltar', [], array('class' => 'btn btn-light btn-block')) }}
          </div>
      </div>
  </div>
</div>

@endsection
