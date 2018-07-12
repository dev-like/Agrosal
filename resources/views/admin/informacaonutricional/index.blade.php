@extends('admin.main')

@section('page-caminho')
  Informacaonutricionals
@endsection

@section('page-title')
Informacaonutricionals
@endsection

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Sweet Alert css -->
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="col-12">

  <div class="card-box">
    <a href="{{ route('informacaonutricional.create',$produto) }}" style="margin-bottom: 15px" class="btn btn-info waves-effect waves-light pull-right"><i class="fa fa-plus m-r-5"></i> Adicionar</a>
      <h4 class="m-t-0 header-title">Listagem de Informacaonutricionals</h4>

    <table class="table table-striped">
        <thead>
        <tr>
          <th width="5%">#</th>
          <th>Elemento</th>
          <th>Valor</th>
        </tr>
        </thead>
        <tbody>
          @forelse($informacaonutricional as $informacaonutricional)
            <tr>
                <td>{{ $informacaonutricional -> id }}</td>
                <td>{{ $informacaonutricional -> elemento }}</td>
                <td>{{ $informacaonutricional -> valores }}</td>
                <td width="10%">
                    <span class="hint--top" aria-label="Editar Informacaonutricional"><a href="{{ route('informacaonutricional.edit', $informacaonutricional->id) }}" style="border-radius: 50%" class="btn btn-warning waves-effect"> <i class="fa fa-pencil m-r-5"></i></a></span>
                    <span class="hint--top" aria-label="Deletar Informacaonutricional"><button type="button" onclick="goswet({{$informacaonutricional->id}}, '{{$informacaonutricional->nome}}')" style="border-radius: 50%" class="btn btn-danger waves-effect"> <i class="fa fa-trash m-r-5"></i></button></span>
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
          url: "{{ url('admin/informacaonutricional') }}/"+id,
          data: {'id': id},
          success: function(data){
            swal({
             title: "informacaonutricional deletado!",
             type: "success",
             timer: 2000,
             showConfirmButton: false
           }).then(
             function () {
             },
             function(){
               window.location = "{{ route('informacaonutricional.index',$produto) }}";
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
