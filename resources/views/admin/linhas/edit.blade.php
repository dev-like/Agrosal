@extends('admin.main')

@section('page-caminho')
Linhas
@endsection
@section('page-title')
Editar Linha
@endsection


@section('content')
<div class="col-12">
  <div class="card-box">

        {{ Form::model($linha, ['route' => ['linha.update', $linha->id], 'method' => 'PUT', 'files' => true]) }}
        <div class="row">
          <div class="form-group col-md-12">
              {{ Form::label('nome', 'Nome') }}
              {{ Form::text('nome', null, array('class' => 'nome form-control','maxlength' => '255','required')) }}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            {{ Form::label('capa', 'Capa') }}
            <input type="file" name="capa" class="filestyle" data-placeholder="Enviar imagem" data-btnClass="btn-light">
          </div>
          <div class="form-group col-md-6">
            {{ Form::label('embalagem', 'Embalagem') }}
            <input type="file" name="embalagem" class="filestyle" data-placeholder="Enviar imagem" data-btnClass="btn-light">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12">
              {{ Form::label('descricao', 'Descrição') }}
              {{ Form::textarea('descricao', null, array('class' => 'nome form-control')) }}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-3">
            <hr>
            @if($linha->capa)
            <h6>Imagem Capa</h6>
            <img src="{{ asset('linhas/imagens/'. $linha->capa) }}" style="height: 220px">
            <hr>
            @endif
          </div>
          <div class="form-group col-md-3">
            <hr>
            @if($linha->capa)
            <h6>Imagem Embalagem</h6>
            <img src="{{ asset('linhas/imagens/'. $linha->embalagem) }}" style="height: 220px">
            <hr>
            @endif
          </div>
        </div>

        <div class="row" style="margin-top: 20px">
          <div class="form-group col-12">
            <div class="text-center">
              <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Salvar</button>
              <a href="{{ route('linha.index') }}" class="btn btn-danger"><i class="fa fa-window-close m-r-5"></i> Cancelar</a>
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
<script src="{{ asset('template/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/plugins/tinymce/tinymce.min.js') }}"></script>

<script>
var editor_config = {
  path_absolute : "/",
  selector: "textarea",
  height:350,
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
