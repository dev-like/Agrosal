@extends('admin.main')

@section('page-title')
  NOTÍCIAS
@endsection

@section('content')
<div class="card-box">
  <div class="box-header with-border">
      <div class="row">
        <div class="col-md-12">
            <h2>{{ $noticia->titulo }}</h2>
            <h6>{{ $noticia->descricao }}</h6>
            <hr>
            @if($noticia->capa)
            <img src="{{ asset('noticias/imagens/'. $noticia->capa) }}" style="width: 70%">
            <hr>
            @endif

            <p>{!! $noticia->conteudo !!}</p>
        </div>
      </div>
      <div class="row">
          <div class="col-md-4 offset-md-4" style="margin-top: 20px">
            {{ Html::linkRoute('noticias.index', 'Voltar', [], array('class' => 'btn btn-light btn-block')) }}
          </div>
      </div>
  </div>
</div>

@endsection
