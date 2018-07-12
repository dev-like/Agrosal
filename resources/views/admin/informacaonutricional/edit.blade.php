@extends('admin.main')

@section('page-caminho')
  Produto
@endsection

@section('page-title')
Produtos
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('template/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
<link href="{{ asset('template/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
    <h4 class="m-t-0 header-title"><b>Edição de Produto</b></h4>

    {!! Form::model($produto, array('route' => ['produto.update', $produto->id], 'method' => 'PUT', 'files' => true)) !!}
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::label('nome', 'Nome') }}
              {{ Form::text('nome', null, array('class' => 'form-control', 'maxlength' => '255','required')) }}
          </div>
          <div class="form-group col-md-4" >
            {{ Form::label('linha', 'Linha') }}
            <select class="js-example-basic-multiple" data-style="form-control" name="linha_id" id="linha" required="required">
              @forelse ($linhas as $linha)
                <option value="{{ $linha->id }}" {{ ($linha->id==$produto->linha_id)?'selected':'' }}>{{ $linha->nome }}</option>
              @empty
                <option value="">Nenhum item cadastrado</option>
              @endforelse
            </select>
          </div>
          <div class="form-group col-md-4">
            {!! Form::label('imagem', 'Enviar Imagem') !!}
            <input type="file" name="imagem" class="filestyle" data-placeholder="Enviar imagem" data-btnClass="btn-light">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            {!! Form::label('descricao', 'Descrição:') !!}
            {!! Form::text('descricao', $produto->descricao, array('class' => 'form-control')) !!}
          </div>
          <div class="form-group col-md-6">
            {!! Form::label('informacoesnutricionais', 'Informações Nutricionais') !!}
            <input type="file" name="informacoesnutricionais" class="filestyle" data-placeholder="Enviar imagem" data-btnClass="btn-light">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
              {{ Form::label('indicacoes', 'Indicações') }}
              {{ Form::textarea('indicacoes', $produto->indicacoes, array('class' => 'form-control')) }}
          </div>
          <div class="form-group col-md-6">
              {{ Form::label('mododeusar', 'Modo de Usar') }}
              {{ Form::textarea('mododeusar', $produto->mododeusar, array('class' => 'form-control')) }}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12">
              {{ Form::label('Informações Nutricionais') }}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-3">
              {{ Form::label('calcio', 'Calcio') }}
              {{ Form::text('calcio', $produto->calcio, array('class' => 'form-control in')) }}
          </div>
          <div class="form-group col-md-3">
              {{ Form::label('fosfo', 'Fosforo') }}
              {{ Form::text('fosforo', $produto->fosforo, array('class' => 'form-control in')) }}
          </div>
          <div class="form-group col-md-3">
              {{ Form::label('enxofre', 'Enxofre') }}
              {{ Form::text('enxofre', $produto->enxofre, array('class' => 'form-control in')) }}
          </div>
          <div class="form-group col-md-3">
              {{ Form::label('magnesio', 'Magnesio') }}
              {{ Form::text('magnesio', $produto->magnesio, array('class' => 'form-control in')) }}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-3">
              {{ Form::label('manganes', 'Manganes') }}
              {{ Form::text('manganes', $produto->manganes, array('class' => 'form-control en')) }}
          </div>
          <div class="form-group col-md-3">
              {{ Form::label('zinco', 'Zinco') }}
              {{ Form::text('zinco', $produto->zinco, array('class' => 'form-control en')) }}
          </div>
          <div class="form-group col-md-3">
              {{ Form::label('cobre', 'Cobre') }}
              {{ Form::text('cobre', $produto->cobre, array('class' => 'form-control en')) }}
          </div>
          <div class="form-group col-md-3">
              {{ Form::label('cobalto', 'Cobalto') }}
              {{ Form::text('cobalto', $produto->cobalto, array('class' => 'form-control en')) }}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-3">
              {{ Form::label('iodo', 'Iodo') }}
              {{ Form::text('iodo', $produto->iodo, array('class' => 'form-control en')) }}
          </div>
          <div class="form-group col-md-3">
              {{ Form::label('selenio', 'Selenio') }}
              {{ Form::text('selenio', $produto->Selenio, array('class' => 'form-control en')) }}
          </div>
        </div>

        <div class="row" style="margin-top: 20px">
          <div class="form-group col-12">
            <div class="text-center">
              <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Salvar</button>
              <a href="{{ route('produto.index') }}" class="btn btn-danger"><i class="fa fa-window-close m-r-5"></i> Cancelar</a>
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
<script src="{{ asset('template/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="assets/pages/jquery.form-advanced.init.js"></script>
<script src="{{ asset('template/plugins/tinymce/tinymce.min.js') }}"></script>

<script>
    $(document).ready(function() {
      $('.js-example-basic-multiple').select2();
    });

    $(".in").TouchSpin({
      min: 0,
      max: 999999,
      step: 0.1,
      decimals: 2,
      boostat: 5,
      maxboostedstep: 10,
      postfix: 'g'
    });
    $(".en").TouchSpin({
      min: 0,
      max: 99999999,
      step: 0.1,
      decimals: 2,
      boostat: 5,
      maxboostedstep: 10,
      postfix: 'mg'
    });
</script>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea",
    height:300,
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
