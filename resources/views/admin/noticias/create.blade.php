@extends('admin.main')

@section('page-title')
  NOTÍCIAS
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
    <h4 class="m-t-0 header-title"><b>Cadastro de notícias</b></h4>

      {{ Form::open(['route' => 'noticias.store', 'files' => true]) }}
        <div class="row">
          <div class="form-group col-md-8">
            {!! Form::label('titulo', 'Titulo:') !!}
            {!! Form::text('titulo', null, array('class' => 'form-control')) !!}
          </div>
          <div class="form-group col-md-4">
            {!! Form::label('datapublicacao', 'Data de publicação:') !!}
            {!! Form::date('datapublicacao', null, array('class' => 'form-control')) !!}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            {!! Form::label('capa', 'Capa da notícia') !!}
            <input type="file" name="capa" class="filestyle" data-placeholder="Enviar imagem" data-btnClass="btn-light">
          </div>
          <div class="form-group col-md-6">
            {{ Form::label('palavraschave', 'Palavras Chave') }}
            {{ Form::text('palavraschave', null, array('class' => 'palavraschave form-control', 'data-role' => 'tagsinput')) }}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            {!! Form::label('descicao', 'Descrição:') !!}
            {!! Form::textarea('descricao', null, array('class' => 'form-control')) !!}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12" style="margin-top: 20px">
            {!! Form::label('conteudo', 'Conteudo') !!}
            {!! Form::textarea ('conteudo', null, array('class' => 'form-control')) !!}
          </div>
        </div>
        <div class="row" style="margin-top: 20px">
          <div class="form-group col-12">
            <div class="text-center">
              <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Salvar</button>
              <a href="{{ route('noticia.index') }}" class="btn btn-danger"><i class="fa fa-window-close m-r-5"></i> Cancelar</a>
            </div>
          </div>
        </div>
      {{ Form::close() }}
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('template/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('template/js/pages/form_elements.js') }}"></script>
<script src="{{ asset('template/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
  if($("#conteudo").length > 0){
    tinymce.init({
      selector: "textarea#conteudo",
      theme: "modern",
      height:300,
      plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template paste textcolor"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
      style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
      ]
    });
  }
});
</script>
@endsection
