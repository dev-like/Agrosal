@extends('admin.main')

@section('page-caminho')
Quem Somos
@endsection

@section('page-title')
Quem Somos
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="col-12">
  <div class="card-box">

      @if(!isset($quemsomos->id))
        <p id="req-cad">
          As informações da empresa ainda não foram cadastradas,
          <a id="cad" class="text-success" href="#">Clique aqui para Realizar Cadastro</a>
        </p>
        <div id="form-cad" class="col-sm-12 col-xs-12" style="display:none">
          {{ Form::open(['route' => 'quemsomos.store']) }}
      @else
          <div id="form-cad" class="col-sm-12 col-xs-12">
          {{ Form::model($quemsomos, ['route' => ['quemsomos.update', $quemsomos->id], 'method' => 'PUT']) }}
      @endif

      <div class="row">
        <div class="form-group col-md-3">
          {{ Form::label('razaosocial', 'Razão Social') }}
          {{ Form::text('razaosocial', null, array('class' => 'form-control','maxlength' => '255')) }}
        </div>
        <div class="form-group col-md-3">
          {{ Form::label('nomefantasia', 'Nome Fantasia') }}
          {{ Form::text('nomefantasia', null, array('class' => 'form-control','maxlength' => '255','required')) }}
        </div>
        <div class="form-group col-md-3">
          {{ Form::label('cnpj', 'CNPJ') }}
          {{ Form::text('cnpj', null, array('class' => 'form-control','maxlength' => '18')) }}
        </div>
        <div class="form-group col-md-3">
          {{ Form::label('ie', 'Inscrição Estadual') }}
          {{ Form::text('ie', null, array('class' => 'form-control','maxlength' => '45')) }}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-3">
          {{ Form::label('email', 'E-mail') }}
          {{ Form::email('email', null, array('class' => 'form-control','maxlength' => '255','required')) }}
        </div>
        <div class="form-group col-md-3">
          {{ Form::label('telefone', 'Telefone') }}
          {{ Form::text('telefone', null, array('class' => 'form-control','maxlength' => '20')) }}
        </div>
        <div class="form-group col-md-3">
          {{ Form::label('fax', 'FAX') }}
          {{ Form::text('fax', null, array('class' => 'form-control','maxlength' => '20')) }}
        </div>
        <div class="form-group col-md-3">
          {{ Form::label('sac', 'SAC') }}
          {{ Form::text('sac', null, array('class' => 'form-control','maxlength' => '20')) }}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-3">
          {{ Form::label('endereco', 'Endereço') }}
          {{ Form::text('endereco', null, array('class' => 'form-control','maxlength' => '255')) }}
        </div>
        <div class="form-group col-md-3">
          {{ Form::label('bairro', 'Bairro') }}
          {{ Form::text('bairro', null, array('class' => 'form-control','maxlength' => '255')) }}
        </div>

        <div class="form-group col-md-3 ">
          {{ Form::label('estado', 'Estado') }}
          <br>
          <select class="js-example-basic-single" name="estado">
            <option value="AC" {{ ($quemsomos->estado=="AC")?'selected':''}}>Acre</option>
            <option value="AL" {{ ($quemsomos->estado=="AL")?'selected':''}}>Alagoas</option>
            <option value="AP" {{ ($quemsomos->estado=="AP")?'selected':''}}>Amapá</option>
            <option value="AM" {{ ($quemsomos->estado=="AM")?'selected':''}}>Amazonas</option>
            <option value="BA" {{ ($quemsomos->estado=="BA")?'selected':''}}>Bahia</option>
            <option value="CE" {{ ($quemsomos->estado=="CE")?'selected':''}}>Ceará</option>
            <option value="DF" {{ ($quemsomos->estado=="DF")?'selected':''}}>Distrito Federal</option>
            <option value="ES" {{ ($quemsomos->estado=="ES")?'selected':''}}>Espírito Santo</option>
            <option value="GO" {{ ($quemsomos->estado=="GO")?'selected':''}}>Goiás</option>
            <option value="MA" {{ ($quemsomos->estado=="MA")?'selected':''}}>Maranhão</option>
            <option value="MT" {{ ($quemsomos->estado=="MT")?'selected':''}}>Mato Grosso</option>
            <option value="MS" {{ ($quemsomos->estado=="MS")?'selected':''}}>Mato Grosso do Sul</option>
            <option value="MG" {{ ($quemsomos->estado=="MG")?'selected':''}}>Minas Gerais</option>
            <option value="PA" {{ ($quemsomos->estado=="PA")?'selected':''}}>Pará</option>
            <option value="PB" {{ ($quemsomos->estado=="PB")?'selected':''}}>Paraíba</option>
            <option value="PR" {{ ($quemsomos->estado=="PR")?'selected':''}}>Paraná</option>
            <option value="PE" {{ ($quemsomos->estado=="PE")?'selected':''}}>Pernambuco</option>
            <option value="PI" {{ ($quemsomos->estado=="PI")?'selected':''}}>Piauí</option>
            <option value="RJ" {{ ($quemsomos->estado=="RJ")?'selected':''}}>Rio de Janeiro</option>
            <option value="RN" {{ ($quemsomos->estado=="RN")?'selected':''}}>Rio Grande do Norte</option>
            <option value="RS" {{ ($quemsomos->estado=="RS")?'selected':''}}>Rio Grande do Sul</option>
            <option value="RO" {{ ($quemsomos->estado=="RO")?'selected':''}}>Rondônia</option>
            <option value="RR" {{ ($quemsomos->estado=="RR")?'selected':''}}>Roraima</option>
            <option value="SC" {{ ($quemsomos->estado=="SC")?'selected':''}}>Santa Catarina</option>
            <option value="SP" {{ ($quemsomos->estado=="SP")?'selected':''}}>São Paulo</option>
            <option value="SE" {{ ($quemsomos->estado=="SE")?'selected':''}}>Sergipe</option>
            <option value="TO" {{ ($quemsomos->estado=="TO")?'selected':''}}>Tocantins</option>
          </select>
        </div>
        <div class="form-group col-md-3">
          {{ Form::label('cidade', 'Cidade') }}
          {{ Form::text('cidade', null, array('class' => 'form-control','maxlength' => '255')) }}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-3">
          {{ Form::label('cep', 'CEP') }}
          {{ Form::text('cep', null, array('class' => 'form-control','maxlength' => '10')) }}
        </div>
        <div class="form-group col-md-3">
          {{ Form::label('facebook', 'Facebook') }}
          {{ Form::url('facebook', null, array('class' => 'form-control','maxlength' => '255')) }}
        </div>
        <div class="form-group col-md-3">
          {{ Form::label('instagram', 'Instagram') }}
          {{ Form::url('instagram', null, array('class' => 'form-control','maxlength' => '255')) }}
        </div>
        <div class="form-group col-md-3">
          {{ Form::label('youtube', 'YouTube') }}
          {{ Form::url('youtube', null, array('class' => 'form-control','maxlength' => '255')) }}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4" style="margin-top: 20px">
          {!! Form::label('missao', 'Missão') !!}
          {!! Form::textarea('missao', null, array('class' => 'form-control','maxlength' => '2500','rows'=>'8')) !!}
        </div>
        <div class="form-group col-md-4" style="margin-top: 20px">
          {!! Form::label('visao', 'Visão') !!}
          {!! Form::textarea('visao', null, array('class' => 'form-control','maxlength' => '2500')) !!}
        </div>
        <div class="form-group col-md-4" style="margin-top: 20px">
          {!! Form::label('valores', 'Valores') !!}
          {!! Form::textarea('valores', null, array('class' => 'form-control','maxlength' => '2500')) !!}
      </div>
    </div>
      <div class="row">
        <div class="form-group col-md-12" style="margin-top: 20px">
          {!! Form::label('quemsomos', 'Quem Somos') !!}
          {!! Form::textarea('quemsomos', null, array('class' => 'form-control')) !!}
        </div>
      </div>

      <div class="row" style="margin-top: 20px">
        <div class="col-12">
          <div class="text-center">
            <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Salvar</button>
            <a href="{{ route('quemsomos.index') }}" class="btn btn-danger"><i class="dripicons-cross"></i> Cancelar</a>
          </div>
        </div>
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
<script src="{{ asset('template/plugins/tinymce/tinymce.min.js') }}"></script>

<script>
jQuery(function($){
  $('.js-example-basic-single').select2();
  $("#cnpj").mask("99.999.999/9999-99");
  $("#telefone").mask("(99) 9999-9999");
  $("#fax").mask("(99) 9999-9999");
  $("#cep").mask("99.999-999");
});
</script>

<script type="text/javascript">
  $(document).ready(function () {
    $("#cad").click(function(event){
      event.preventDefault();
      $("#req-cad").slideUp();
      $("#form-cad").slideDown();
    });
    $("#can-cad").click(function(event){
      if($("#cad").length > 0) {
      event.preventDefault();
      $("#form-cad").slideUp();
      $("#req-cad").slideDown();
      }
    });
  });
</script>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea#quemsomos",
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
