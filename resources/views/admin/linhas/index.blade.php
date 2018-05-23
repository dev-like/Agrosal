@extends('admin.main')

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Sweet Alert css -->
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
  Linhas
@endsection

@section('content')

<div class="col-12">
  <div class="card-box">
    <a href="{{ route('linha.create') }}" style="margin-bottom: 15px" class="btn btn-info waves-effect waves-light pull-right"><i class="fa fa-plus m-r-5"></i> Adicionar</a>
      <h4 class="m-t-0 header-title">Cadastro de Linhas</h4>

    <table class="table table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>Nome</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
          @forelse($linha as $linha)
            <tr>
                <td>{{ $linha -> id }}</td>
                <td>{{ $linha -> nome }}</td>
                <td width="15%">
                    <span class="hint--top" aria-label="Editar Linha"><a href="{{ route('linha.edit', $linha->id) }}" style="border-radius: 50%" class="btn btn-warning waves-effect"> <i class="fa fa-pencil m-r-5"></i></a></span>
                    <span class="hint--top" aria-label="Visualizar Linha"><a href="{{ route('linha.show', $linha->slug) }}" style="border-radius: 50%" class="btn btn-info waves-effect hint--bottom" aria-label="Thank you!" > <i class="fa fa-eye"></i></a></span>
                    <span class="hint--top" aria-label="Deletar Linha"><button type="button" onclick="goswet({{$linha->id}}, '{{$linha->nome}}')" style="border-radius: 50%" class="btn btn-danger waves-effect"> <i class="fa fa-trash m-r-5"></i></button></span>
                </td>
            </tr>
          @empty
            <tr>
                <td colspan="5" class="text-center">Nenhum Item cadastrado</td>
            </tr>
          @endforelse
        </tbody>
    </table>
  </div>
</div>
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
          url: "{{ url('admin/linha') }}/"+id,
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
               window.location = "{{ route('linha.index') }}";
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
