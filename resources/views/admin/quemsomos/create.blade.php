@extends('admin.main')

@section('page-caminho')
  Quem Somos
@endsection

@section('page-title')
  Novo Cliente
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="col-12">
  <div class="card-box">
    {{ Form::open(['route' => 'quemsomos.store']) }}

        @if(!isset($quemsomos->id))
        <p id="req-cad">
          As informações da empresa ainda não foram cadastradas,
          <a id="cad" class="text-success" href="#">Realizar Cadastro</a>
        </p>
        <div id="form-cad" class="col-sm-12 col-xs-12" style="display:none">
          <form method="post" action="{{ action('QuemSomosController@store') }}">
            @else
            <div id="form-cad" class="col-sm-12 col-xs-12">
              <form method="post" action="{{ action('QuemSomosController@update',['id'=>$quemsomos->id]) }}">
                {{ method_field('PUT') }}
                @endif

      <div class="row">
        <div class="col-md-3">
          {{ Form::label('razaosocial', 'Razão Social') }}
          {{ Form::text('razaosocial', null, array('class' => 'form-control')) }}
        </div>
        <div class="col-md-3">
          {{ Form::label('nomefantasia', 'Nome Fantasia') }}
          {{ Form::text('nomefantasia', null, array('class' => 'form-control')) }}
        </div>
        <div class="col-md-3">
          {{ Form::label('cnpj', 'CNPJ') }}
          {{ Form::text('cnpj', null, array('class' => 'form-control')) }}
        </div>
        <div class="col-md-3">
          {{ Form::label('ie', 'Inscrição Estadual') }}
          {{ Form::text('ie', null, array('class' => 'form-control')) }}
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          {{ Form::label('email', 'E-mail') }}
          {{ Form::text('missao', null, array('class' => 'form-control')) }}
        </div>
        <div class="col-md-3">
          {{ Form::label('telefone', 'Telefone') }}
          {{ Form::text('telefone', null, array('class' => 'form-control')) }}
        </div>
        <div class="col-md-3">
          {{ Form::label('fax', 'FAX') }}
          {{ Form::text('fax', null, array('class' => 'form-control')) }}
        </div>
        <div class="col-md-3">
          {{ Form::label('sac', 'SAC') }}
          {{ Form::text('sac', null, array('class' => 'form-control')) }}
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          {{ Form::label('endereco', 'Endereço') }}
          {{ Form::text('endereco', null, array('class' => 'form-control')) }}
        </div>
        <div class="col-md-3">
          {{ Form::label('bairro', 'Bairro') }}
          {{ Form::text('bairro', null, array('class' => 'form-control')) }}
        </div>
        <div class="col-md-3 ">
          {{ Form::label('estado', 'Estado') }}
          <br>
          <select class="js-example-basic-single" name="estado">
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
          </select>
        </div>
        <div class="col-md-3">
          {{ Form::label('cidade', 'Cidade') }}
          {{ Form::text('cidade', null, array('class' => 'form-control')) }}
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          {{ Form::label('cep', 'CEP') }}
          {{ Form::text('cep', null, array('class' => 'form-control')) }}
        </div>
        <div class="col-md-3">
          {{ Form::label('facebook', 'Facebook') }}
          {{ Form::text('facebook', null, array('class' => 'form-control')) }}
        </div>
        <div class="col-md-3">
          {{ Form::label('instagram', 'Instagram') }}
          {{ Form::text('instagram', null, array('class' => 'form-control')) }}
        </div>
        <div class="col-md-3">
          {{ Form::label('youtube', 'YouTube') }}
          {{ Form::text('youtube', null, array('class' => 'form-control')) }}
        </div>
      </div>
      <div class="row">
        <div class="col-md-12" style="margin-top: 20px">
          {!! Form::label('missao', 'Missão') !!}
          {!! Form::textarea('missao', null, array('class' => 'form-control')) !!}
        </div>
      </div>
      <div class="row">
        <div class="col-md-12" style="margin-top: 20px">
          {!! Form::label('visao', 'Visão') !!}
          {!! Form::textarea('visao', null, array('class' => 'form-control')) !!}
        </div>
      </div>
      <div class="row">
        <div class="col-md-12" style="margin-top: 20px">
          {!! Form::label('valores', 'Valores') !!}
          {!! Form::textarea('valores', null, array('class' => 'form-control')) !!}
        </div>
      </div>
      <div class="row">
        <div class="col-md-12" style="margin-top: 20px">
          {!! Form::label('quemsomos', 'Quem Somos') !!}
          {!! Form::textarea ('quemsomos', null, array('class' => 'form-control', 'style' => 'min-height:500px')) !!}
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 offset-md-4" style="margin-top: 15px">
          <div class="col-6 col-md-6" style="float: left">
            {{ Form::submit('Enviar', array('class' => 'btn btn-success btn-block')) }}
          </div>
          <div class="col-6 col-md-6" style="float: left">
            {{ Html::linkRoute('quemsomos.index', 'Cancelar', null, ['class' => 'btn btn-danger btn-block']) }}
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
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

<script>
jQuery(function($){
  $('.js-example-basic-single').select2();
  $("#cnpj").mask("99.999.999/9999-99");
  $("#telefone").mask("(99) 99999-9999");
  $("#cep").mask("99.999-999");
});
</script>

<script type="text/javascript">
  $(document).ready(function () {
    if($("#quemsomos").length > 0){
      tinymce.init({
        selector: "textarea",
        theme: "modern",
        height:200,
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
