<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgroSal | {{$linha->nome}}</title>
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
    <link rel="stylesheet" href="{{ asset('assets/css/linhas.css') }}">

    <!-- Librarys JavaScrip -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
</head>
<body>
    <!-- Menu -->
    @include('front.partials._menu')

    <!-- Cabeçalho -->
    <header>
        <!-- Banners -->
        <div class="banner" style="background-image: url({{ asset('linhas/imagens/'. $linha->capa) }})">
            <div class="container">
                <h1>
                  <br>
                    <strong>{{$linha->nome}}</strong>
                </h1>
            </div>
        </div>
    </header>

    <!-- Conteúdo -->
    <section class="bg-tp1 linha-descricao">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>{!!$linha->descricao!!}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-tp2 linha-produtos">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 esquerda">
                  @forelse($produtoEsquerda as $pro)
                    <ul>
                        <li>
                            <a href="{{ route('produto.item', $pro->slug) }}">
                                <span>{{$pro->nome}}</span>
                                <small>
                                  {{$pro->descricao}}
                                </small>
                            </a>
                        </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('linhas/imagens/'.$linha->embalagem) }}" alt="Embalagem">
                </div>
                <div class="col-lg-4 direita">
                  @forelse($produtoDireita as $pro2)
                    <ul>
                        <li>
                          <a href="{{ route('produto.item', $pro2->slug) }}">
                                <span>{{$pro2->nome}}</span>
                                <small>
                                  {{$pro2->descricao}}
                                </small>
                            </a>
                        </li>
                      </ul>
                      @empty
                      @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- Rodapé -->
    @include('front.partials._bottom')

    <script src="{{ asset('assets/js/pages.js') }}"></script>
</body>
