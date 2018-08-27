@extends('admin.main')

@section('page-caminho')
  Produtos
@endsection
@section('page-title')
Produtos Cadastrados
@endsection

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Sweet Alert css -->
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="col-12">

  <div class="card-box">
    <a href="{{ route('produto.create') }}" style="margin-bottom: 15px" class="btn btn-info waves-effect waves-light pull-right"><i class="fa fa-plus m-r-5"></i> Adicionar</a>

    <table class="table table-striped">
        <thead>
        <tr>
          <th>Nome</th>
          <th>Linha</th>
          <th>Ações</th>
        </tr>
        </thead>
        <tbody>
          @forelse($produtos as $produto)
            <tr>
                <td>{{ $produto -> nome }}</td>
                <td>{{ isset($produto -> linha) ? $produto -> linha->nome : 'Linha não cadastrada' }}</td>
                <td width="15%">
                    <span class="hint--top" aria-label="Informações Nutricionais"><a href="{{ route('informacaonutricional.index', $produto->id) }}" style="border-radius: 50%" class="btn btn-success waves-effect"> <i class="fa  fa-bar-chart-o"></i></a></span>
                    <span class="hint--top" aria-label="Editar produto"><a href="{{ route('produto.edit', $produto->id) }}" style="border-radius: 50%" class="btn btn-warning waves-effect"> <i class="fa fa-pencil m-r-5"></i></a></span>
                    <span class="hint--top" aria-label="Deletar produto"><button type="button" onclick="goswet({{$produto->id}}, '{{$produto->nome}}')" style="border-radius: 50%" class="btn btn-danger waves-effect"> <i class="fa fa-trash m-r-5"></i></button></span>
                </td>
            </tr>
          @empty
            <tr>
                <td colspan="5" class="text-center">Nenhum Item cadastrado</td>
            </tr>
          @endforelse
        </tbody>
    </table>

    @if ($produtos->lastPage() > 1)
          <ul class="pagination ml-auto">
              <li class="{{ ($produtos->currentPage() == 1) ? ' disabled' : '' }} page-item">
                  <a class=" page-link " href="{{ $produtos->url(1) }}" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                  </a>
              </li>
              @for ($i = 1; $i <= $produtos->lastPage(); $i++)
                  <li class="{{ ($produtos->currentPage() == $i) ? ' active' : '' }} page-item">
                      <a class=" page-link " href="{{ $produtos->url($i) }}">{{ $i }}</a>
                  </li>
              @endfor
              <li class="{{ ($produtos->currentPage() == $produtos->lastPage()) ? ' disabled' : '' }} page-item">
                  <a href="{{ $produtos->url($produtos->currentPage()+1) }}" class="page-link" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                  </a>
              </li>
          </ul>
      @endif

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
          url: "{{ url('admin/produto') }}/"+id,
          data: {'id': id},
          success: function(data){
            swal({
             title: "Produto deletado!",
             type: "success",
             timer: 2000,
             showConfirmButton: false
           }).then(
             function () {
             },
             function(){
               window.location = "{{ route('produto.index') }}";
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
