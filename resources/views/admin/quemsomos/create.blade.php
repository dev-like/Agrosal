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
</script>
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
    {{ Form::open(['route' => 'quemsomos.store']) }}

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
        <div class="col-md-4">
          {{ Form::label('missao', 'Missão') }}
          {{ Form::text('missao', null, array('class' => 'form-control')) }}
        </div>
        <div class="col-md-4">
          {{ Form::label('visao', 'Visão') }}
          {{ Form::text('visao', null, array('class' => 'form-control')) }}
        </div>
        <div class="col-md-4">
          {{ Form::label('valores', 'Valores') }}
          {{ Form::text('valores', null, array('class' => 'form-control')) }}
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
            <option selected value="MA">Maranhão</option>
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
        <div class="col-md-12">
          {{ Form::label('quemsomos', 'Quem Somos') }}
          {{ Form::textarea('quemsomos', null, array('class' => 'form-control', 'style' => 'height:150px')) }}
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
<script>
jQuery(function($){
$("#cnpj").mask("99.999.999/9999-99");
$("#telefone").mask("(99) 99999-9999");
$("#cep").mask("99.999-999");
});
</script>



<script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('template/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>
@endsection
