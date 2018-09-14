<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgroSal | {{$produto->nome}}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

    <!-- Fonts e Animations -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animates.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-grid.min.css') }}">

    <!-- Styles Sheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header-pages.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/produtos.css') }}">

    <!-- Librarys JavaScrip -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
</head>
<body>
    <!-- Menu -->
    @include('front.partials._menu')
    <!-- Conteúdo -->
    <section class="bg-tp1 produto-descricao">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <span class="way">
                        Produto da <a href="linhas.html">{{$produto->linha->nome}}</a>
                    </span>
                    <h2>{{$produto->nome}}</h2>
                    <p>
                        <strong>Indicações:</strong>
                        {!!$produto->indicacoes!!}
                    </p>
                    <p>
                        <strong>Modo de Usar:</strong>
                      {!!$produto->mododeusar!!}
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('produtos/imagens/'.$produto->imagem) }}" alt="Embalagem"/>
                        </div>
                        <div class="col-md-6">
                            <span class="niveis">NÍVEIS DE GARANTIA POR KG DO PRODUTO</span>
                            <div class="table">
                              @forelse($informacaonutricional as $in)
                                <div class="row">
                                    <div class="col-6">{{$in->elemento}}</div>
                                    <div class="col-6">{{$in->valores}}</div>
                                </div>
                                @empty
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Rodapé -->
    @include('front.partials._bottom')

    <script src="{{ asset('assets/js/pages.js') }}"></script>
</body>
