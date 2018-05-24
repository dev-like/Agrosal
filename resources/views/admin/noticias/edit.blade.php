@extends('admin.main')

@section('page-caminho')
  Notícias
@endsection

@section('page-title')
  Editar Notícia
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
    <span class="card-title">Editar notícias</span><br>

    {!! Form::model($noticia, array('route' => ['noticia.update', $noticia->id], 'method' => 'PUT', 'files' => true)) !!}
    <div class="row">
      <div class="form-group col-md-12">
        @if($noticia->capa)
        <img src="{{ asset('noticias/imagens/'. $noticia->capa) }}" style="width: 70%">
        <hr>
        @endif
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md-8">
        {!! Form::label('titulo', 'Titulo:') !!}
        {!! Form::text('título', $noticia->titulo, array('class' => 'form-control','maxlength' => '255','required')) !!}
      </div>
      <div class="form-group col-md-4">
        {!! Form::label('datapublicacao', 'Data de publicação:') !!}
        {!! Form::date('datapublicação', $noticia->datapublicacao, array('class' => 'form-control','required')) !!}
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        {{ Form::label('palavraschave', 'Palavras Chave') }}
        {!! Form::text('palavraschave', $noticia->palavraschave, array('class' => 'form-control','maxlength' => '255', 'data-role' => 'tagsinput')) !!}
      </div>
      <div class="form-group col-md-6">
        {!! Form::label('capa', 'Enviar Imagem') !!}
        <input type="file" name="capa" class="filestyle" data-placeholder="Enviar imagem" data-btnClass="btn-light">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-12">
        {!! Form::label('descricao', 'Descrição:') !!}
        {!! Form::textarea('descricao', $noticia->descricao, array('class' => 'form-control')) !!}
      </div>
    </div>
    <div class="row">
      <div class="col-12" style="margin-top: 20px">
        {!! Form::label('conteudo', 'Conteudo:') !!}
        {{ Form::textarea('conteudo', $noticia->conteudo, array('class' => 'form-control standard-top-spacing','maxlength' => '500', 'style' => 'height:400px','required')) }}
      </div>
    </div>

    <div class="row" style="margin-top: 20px">
      <div class="col-12">
        <div class="text-center">
          <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Atualizar</button>
          <a href="{{ route('noticia.index') }}" class="btn btn-danger"><i class="fa fa-window-close m-r-5"></i> Cancelar</a>
        </div>
      </div>
    </div>

      {!! Form::close() !!}

  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('template/js/pages/form_elements.js') }}"></script>
<script src="{{ asset('template/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('template/plugins/tinymce/tinymce.min.js') }}"></script>

<script>
var editor_config = {
  path_absolute : "/",
  selector: "textarea#conteudo",
  plugins: [
    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen",
    "insertdatetime media nonbreaking save table contextmenu directionality",
    "emoticons template paste textcolor colorpicker textpattern"
  ],
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  relative_urls: false,
  file_browser_callback : function(field_name, url, type, win) {
    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
    if (type == 'image') {
      cmsURL = cmsURL + "&type=Images";
    } else {
      cmsURL = cmsURL + "&type=Files";
    }

    tinyMCE.activeEditor.windowManager.open({
      file : cmsURL,
      title : 'Filemanager',
      width : x * 0.8,
      height : y * 0.8,
      resizable : "yes",
      close_previous : "no"
    });
  }
};

  tinymce.init(editor_config);
</script>
@endsection
