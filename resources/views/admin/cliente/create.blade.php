@extends('admin.main')

@section('page-caminho')
  Cliente
@endsection

@section('page-title')
  Novo Cliente
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />

<script type="text/javascript">
  $(document).ready(function() {


      $('.js-example-basic-single').select2();
      $('.cpfcnpj').mask('00.000.000/0000-00', {reverse: true});
      $('.cpf').mask('000.000.000-00', {reverse: true});
    //  $('.bootstrap-tagsinput').mask('(00) 00000-0000');
      $('.cep').mask('00000-000');

    })


  function buscarCNPJ() {

      var url = "https://www.receitaws.com.br/v1/cnpj/"+$('.cpfcnpj').cleanVal(); // the script where you handle the form input.

      $.ajax({
             type: "POST",
             dataType: 'jsonp',
             url: url,
             data: $("#idForm").serialize(), // serializes the form's elements.
             success: function(data)
             {
                 console.log(data); // show response from the php script.
                 document.getElementById("cpfcnpj").value = data.cnpj;
                 document.getElementById("razaosocial").value = data.nome;
                 document.getElementById("nomefantasia").value = data.fantasia;
                 document.getElementById("cep").value = data.cep;
                 document.getElementById("logradouro").value = data.logradouro;
                 document.getElementById("numero").value = data.numero;
                 document.getElementById("complemento").value = data.complemento;
                 document.getElementById("bairro").value = data.bairro;
                 document.getElementById("cidade").value = data.municipio;
                 $('input#telefone').tagsinput('add', data.telefone);
                 $('input#email').tagsinput('add', data.email);

             }
           });

      return false; // avoid to execute the actual submit of the form.
  }

</script>
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">

        {{ Form::open(['route' => 'cliente.store']) }}
            <div class="row">
              <div class="form-group col-md-2">
                  {{ Form::label('cpfcnpj', 'CNPJ') }}
                  {{ Form::text('cpfcnpj', null, array('class' => 'cpfcnpj form-control', 'onfocusout' => 'buscarCNPJ()', 'autofocus')) }}
              </div>
              <div class="form-group col-md-5">
                  {{ Form::label('razaosocial', 'Nome/Razão Social') }}
                  {{ Form::text('razaosocial', null, array('class' => 'razaosocial form-control')) }}
              </div>
              <div class="form-group col-md-4">
                  {{ Form::label('nomefantasia', 'Nome Fantasia') }}
                  {{ Form::text('nomefantasia', null, array('class' => 'nomefantasia form-control')) }}
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-2">
                  {{ Form::label('cep', 'CEP') }}
                  {{ Form::text('cep', null, array('class' => 'cep form-control')) }}
              </div>
              <div class="form-group col-md-3">
                  {{ Form::label('logradouro', 'Endereço') }}
                  {{ Form::text('logradouro', null, array('class' => 'form-control')) }}
              </div>

              <div class="form-group col-md-2">
                  {{ Form::label('numero', 'Número') }}
                  {{ Form::text('numero', null, array('class' => 'form-control')) }}
              </div>

              <div class="form-group col-md-3">
                  {{ Form::label('bairro', 'Bairro') }}
                  {{ Form::text('bairro', null, array('class' => 'form-control')) }}
              </div>
              <div class="form-group col-md-2">
                {{ Form::label('complemento', 'Complemento') }}
                {{ Form::text('complemento', null, array('class' => 'form-control')) }}
              </div>
            </div>
            <div class="row">
                <div class="col-md-2 ">
                    {{ Form::label('uf', 'Estado') }}
                    <br>
                    <select class="js-example-basic-single" name="uf">
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
                <div class="form-group col-md-3">
                    {{ Form::label('cidade', 'Cidade') }}
                    {{ Form::text('cidade', null, array('class' => 'form-control')) }}
                </div>
              <div class="form-group col-md-2">
                {{ Form::label('rep_cpf', 'CPF do Representante') }}
                {{ Form::text('rep_cpf', null, array('class' => 'cpf form-control')) }}
              </div>
              <div class="form-group col-md-5">
                   {{ Form::label('rep_nome', 'Nome do Representante') }}
                   {{ Form::text('rep_nome', null, array('class' => 'form-control')) }}
              </div>
              <div class="form-group col-md-6">
                   {{ Form::label('email', 'E-mail') }}
                   {{ Form::text('email', null, array('class' => 'email form-control', 'data-role' => 'tagsinput')) }}
              </div>
              <div class="form-group col-md-6 ">
                    {{ Form::label('telefone', 'Telefone') }}
                    {{ Form::text('telefone', null, array('class' => 'telefone form-control', 'data-role' => 'tagsinput')) }}
              </div>
              <div class="col-md-12">
                    {{ Form::label('obs', 'Observação') }}
                    {{ Form::textarea('obs', null, array('class' => 'obs form-control')) }}
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 offset-md-4" style="margin-top: 15px">
                <div class="col-6 col-md-6" style="float: left">
                  {{ Html::linkRoute('cliente.index', 'Cancelar', null, ['class' => 'btn btn-danger btn-block']) }}
                </div>
                <div class="col-6 col-md-6" style="float: left">
                  {{ Form::submit('Enviar', array('class' => 'btn btn-success btn-block')) }}
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
@endsection
