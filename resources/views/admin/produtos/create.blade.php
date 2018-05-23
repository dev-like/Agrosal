@extends('admin.main')

@section('page-caminho')
  Produtos
@endsection

@section('page-title')
  Novo Produto
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
    {{ Form::open(['route' => 'produto.store', 'files' => true]) }}
            <div class="row">
              <div class="form-group col-md-4">
                  {{ Form::label('nome', 'Nome') }}
                  {{ Form::text('nome', null, array('class' => 'form-control', 'maxlength' => '255')) }}
              </div>

              <div class="form-group col-md-4" >
                {{ Form::label('linha', 'Linha') }}
                <select class="js-example-basic-multiple" data-style="form-control" name="linha_id" id="linha" required="required">
                  @forelse ($linhas as $linha)
                    <option value="{{ $linha->id }}">{{ $linha->nome }}</option>
                  @empty
                    <option value="">Nenhum item cadastrado</option>
                  @endforelse
                </select>
              </div>

              <div class="form-group col-md-4" >
                {!! Form::label('imagem', 'Imagem') !!}
                <input type="file" name="imagem" class="filestyle" data-placeholder="Enviar imagem" data-btnClass="btn-light">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                  {{ Form::label('descricao', 'Descrição') }}
                  {{ Form::text('descricao', null, array('class' => 'form-control')) }}
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                  {{ Form::label('indicacoes', 'Indicações') }}
                  {{ Form::textarea('indicacoes', null, array('class' => 'form-control')) }}
              </div>
              <div class="form-group col-md-6">
                  {{ Form::label('mododeusar', 'Modo de Usar') }}
                  {{ Form::textarea('mododeusar', null, array('class' => 'form-control')) }}
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
                  {{ Form::text('calcio', null, array('class' => 'form-control in')) }}
              </div>
              <div class="form-group col-md-3">
                  {{ Form::label('fosfo', 'Fosforo') }}
                  {{ Form::text('fosforo', null, array('class' => 'form-control in')) }}
              </div>
              <div class="form-group col-md-3">
                  {{ Form::label('enxofre', 'Enxofre') }}
                  {{ Form::text('enxofre', null, array('class' => 'form-control in')) }}
              </div>
              <div class="form-group col-md-3">
                  {{ Form::label('magnesio', 'Magnesio') }}
                  {{ Form::text('magnesio', null, array('class' => 'form-control in')) }}
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-3">
                  {{ Form::label('zinco', 'Zinco') }}
                  {{ Form::text('zinco', null, array('class' => 'form-control en')) }}
              </div>
              <div class="form-group col-md-3">
                  {{ Form::label('manganes', 'Manganes') }}
                  {{ Form::text('manganes', null, array('class' => 'form-control en')) }}
              </div>

              <div class="form-group col-md-3">
                  {{ Form::label('cobre', 'Cobre') }}
                  {{ Form::text('cobre', null, array('class' => 'form-control en')) }}
              </div>
              <div class="form-group col-md-3">
                  {{ Form::label('cobalto', 'Cobalto') }}
                  {{ Form::text('cobalto', null, array('class' => 'form-control en')) }}
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-3">
                  {{ Form::label('iodo', 'Iodo') }}
                  {{ Form::text('iodo', null, array('class' => 'form-control en')) }}
              </div>
              <div class="form-group col-md-3">
                  {{ Form::label('selenio', 'Selenio') }}
                  {{ Form::text('selenio', null, array('class' => 'form-control en')) }}
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
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
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

<script type="text/javascript">
$(document).ready(function () {
  if($("#mododeusar").length > 0){
    tinymce.init({
      selector: "textarea",
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
