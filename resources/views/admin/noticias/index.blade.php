@extends('admin.main')

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title')
  NOTÍCIAS
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
    <a href="{{ route('noticias.create') }}" style="margin-bottom: 15px" class="btn btn-info waves-effect waves-light pull-right"><i class="fa fa-plus m-r-5"></i> Adicionar</a>
    <h4 class="m-t-0 header-title">Listagem de notícias</h4>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Data de Publicação</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
          @forelse($noticias as $noticia)
            <tr>
                <td>{{ $noticias->id }}</td>
                <td>{{ substr(strip_tags($noticias->titulo), 0, 25) }}{{ (strlen(strip_tags($noticia->titulo)) > 25 ? "..." : "") }}</td>
                <td>{{ date('d/m/y g:ia', strtotime($noticia->datapublicacao)) }}</td>
                <td>
                    <span class="hint--top" aria-label="Editar notícia"><a href="{{ route('noticias.edit', $noticia->id) }}" style="border-radius: 50%" class="btn btn-warning waves-effect"> <i class="fa fa-pencil m-r-5"></i></a></span>
                    <span class="hint--top" aria-label="Visualizar notícia"><a href="{{ route('noticias.show', $noticia->id) }}" style="border-radius: 50%" class="btn btn-info waves-effect hint--bottom" aria-label="Thank you!" > <i class="fa fa-sticky-note-o m-r-5"></i></a></span>
                    <span class="hint--top" aria-label="Deletar noticia"><button type="button" onclick="goswet({{$noticias->id}}, '{{$noticias->titulo}}')" style="border-radius: 50%" class="btn btn-danger waves-effect"> <i class="fa fa-trash m-r-5"></i></button></span>
                </td>
            </tr>
          @empty
            <tr>
                <td colspan="4" class="text-center">Nenhum Item cadastrado</td>
            </tr>
          @endforelse
        </tbody>
    </table>
    @if ($noticias->lastPage() > 1)
        <ul class="pagination ml-auto">
            <li class="{{ ($noticias->currentPage() == 1) ? ' disabled' : '' }} page-item">
                <a class=" page-link " href="{{ $noticias->url(1) }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            @for ($i = 1; $i <= $noticias->lastPage(); $i++)
                <li class="{{ ($noticias->currentPage() == $i) ? ' active' : '' }} page-item">
                    <a class=" page-link " href="{{ $noticias->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="{{ ($noticias->currentPage() == $noticias->lastPage()) ? ' disabled' : '' }} page-item">
                <a href="{{ $noticias->url($noticias->currentPage()+1) }}" class="page-link" aria-label="Next">
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
      swal({
          title: "Deseja excluir "+nome+"?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          cancelButtonText: "Cancelar",
          confirmButtonText: "Deletar",
          closeOnConfirm: false
      }).then(
        function(){
          $.ajax({
            type: "DELETE",
            url: "{{ url('admin/noticias') }}/"+id,
            data: {'id': id},
            success: function(data){
              swal({
               title: "Item deletado!",
               type: "success",
               timer: 2000,
               showConfirmButton: false
             }).then(
               function () {
               },
               function(){
                 window.location = "{{ route('noticias.index') }}";
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
