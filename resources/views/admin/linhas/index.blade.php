@extends('admin.main')

@section('page-caminho')
  Linhas
@endsection

@section('page-title')
Linhas Cadastradas
@endsection
@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Sweet Alert css -->
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')

<div class="col-12">
  <div class="card-box">
    <a href="{{ route('linha.create') }}" style="margin-bottom: 15px" class="btn btn-info waves-effect waves-light pull-right"><i class="fa fa-plus m-r-5"></i> Adicionar</a>

    <table class="table table-striped">
        <thead>
        <tr>
          <th>Nome</th>
          <th>Ações</th>
        </tr>
        </thead>
        <tbody>
          @forelse($linhas as $linha)
            <tr>
                <td>{{ $linha -> nome }}</td>
                <td width="10%">
                    <span class="hint--top" aria-label="Editar Linha"><a href="{{ route('linha.edit', $linha->id) }}" style="border-radius: 50%" class="btn btn-warning waves-effect"> <i class="fa fa-pencil m-r-5"></i></a></span>
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
    @if ($linhas->lastPage() > 1)
          <ul class="pagination ml-auto">
              <li class="{{ ($linhas->currentPage() == 1) ? ' disabled' : '' }} page-item">
                  <a class=" page-link " href="{{ $linhas->url(1) }}" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                  </a>
              </li>
              @for ($i = 1; $i <= $linhas->lastPage(); $i++)
                  <li class="{{ ($linhas->currentPage() == $i) ? ' active' : '' }} page-item">
                      <a class=" page-link " href="{{ $linhas->url($i) }}">{{ $i }}</a>
                  </li>
              @endfor
              <li class="{{ ($linhas->currentPage() == $linhas->lastPage()) ? ' disabled' : '' }} page-item">
                  <a href="{{ $linhas->url($linhas->currentPage()+1) }}" class="page-link" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                  </a>
              </li>
          </ul>
      @endif
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
             title: "Linha deletada!",
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
