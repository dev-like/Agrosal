@extends('admin.main')

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Sweet Alert css -->
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
  Clientes
@endsection

@section('content')

<div class="col-12">

  <div class="card-box">
    <a href="{{ route('cliente.create') }}" style="margin-bottom: 15px" class="btn btn-info waves-effect waves-light pull-right"><i class="fa fa-plus m-r-5"></i> Adicionar</a>
      <h4 class="m-t-0 header-title">Cadastro de Clientes</h4>

    <table class="table table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>Razão Social</th>
          <th>CPF/CNPJ</th>
          <th>Telefone</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
          @forelse($cliente as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->razaosocial }}</td>
                <td>{{ $cliente->cpfcnpj }}</td>

                <td>
                  @isset($cliente->primeirotelefone->telefone)
                    {{ $cliente->primeirotelefone->telefone}}
                  @endisset
                </td>

                <td>
                   <!-- Form::model($example, ['route' => ['example.destroy', $example->id], 'method' => 'DELETE'])  -->
                    <span class="hint--top" aria-label="Editar Cliente"><a href="{{ route('cliente.edit', $cliente->id) }}" style="border-radius: 50%" class="btn btn-warning waves-effect"> <i class="fa fa-pencil m-r-5"></i></a></span>
                    <span class="hint--top" aria-label="Deletar Cliente"><button type="button" onclick="goswet({{$cliente->id}}, '{{$cliente->razaosocial}}')" style="border-radius: 50%" class="btn btn-danger waves-effect"> <i class="fa fa-trash m-r-5"></i></button></span>
                </td>
            </tr>
          @empty
            <tr>
                <td colspan="5" class="text-center">Nenhum Item cadastrado</td>
            </tr>
          @endforelse
        </tbody>
    </table>

@endsection

@section('scripts')
<script>
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  function goswet(id, nome){
    swal.setDefaults({
      reverseButtons: true
    })
    swal({
        title: "Deseja excluir "+nome+"?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Deletar"
    }).then(
      function(){
        $.ajax({
          type: "DELETE",
          url: "{{ url('admin/cliente') }}/"+id,
          data: {'id': id},
          success: function(data){
            swal({
             title: "Cliente deletado!",
             type: "success",
             timer: 2000,
             showConfirmButton: false
           }).then(
             function () {
             },
             function(){
               window.location = "{{ route('cliente.index') }}";
             }
           );
          },
          error: function(xhr,status, data) {
            swal("Não foi possível deletar item");
          }

        });
      }
    );
  }
</script>
@endsection
