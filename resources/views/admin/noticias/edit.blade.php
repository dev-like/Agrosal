@extends('admin.main')

@section('page-title')
  NOTÍCIAS
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
    <span class="card-title">Editar notícias</span><br>

    {!! Form::model($noticia, array('route' => ['noticias.update', $noticias->id], 'method' => 'PUT', 'files' => true)) !!}
    <div class="row">
      <div class="col-md-10 offset-md-1">
        {!! Form::label('título', 'Titulo:') !!}
        {!! Form::text('título', $noticia->titulo, array('class' => 'form-control')) !!}
      </div>
      <div class="col-md-10 offset-md-1">
        {!! Form::label('descrição', 'Descrição:') !!}
        {!! Form::text('descrição', $noticia->descricao, array('class' => 'form-control')) !!}
      </div>
      <div class="col-md-10 offset-md-1">
        {!! Form::label('data_de_publicação', 'Data de publicação:') !!}
        {!! Form::date('data_de_publicação', $noticia->data_publicacao, array('class' => 'form-control')) !!}
      </div>

        <div class="col-md-10 offset-md-1">
          {!! Form::label('capa', 'Enviar Imagem') !!}
          <input type="file" name="capa" class="filestyle" data-placeholder="Enviar imagem" data-btnClass="btn-light">
        </div>

        <div class="col-12" style="margin-top: 20px">
          {{ Form::textarea('conteúdo', $noticia->conteudo, array('class' => 'form-control standard-top-spacing', 'style' => 'height:400px')) }}
        </div>
      </div>


      <div class="row" style="margin-top: 20px">
        <div class="col-12">
          <div class="text-right">
            <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Salvar</button>
            <a href="{{ route('noticia.show', $noticia->id) }}" class="btn btn-danger"><i class="fa fa-window-close m-r-5"></i> Cancelar</a>
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

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

<script>
var editor_config = {
  path_absolute : "/",
  selector: "textarea",
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
