<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgroSal</title>
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
    <link rel="stylesheet" href="{{ asset('assets/css/noticias.css') }}">

    <!-- Librarys JavaScrip -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
</head>
<body>
    <!-- Menu -->
    @include('front.partials._menu')

    <!-- Cabeçalho -->
    <header class="noticia">
        <!-- Banners -->
        <div class="banner" style="background-image: url({{ asset('noticias/imagens/'. $noticia->capa) }})">
            <div class="container">
                <h1>
                    <div class="container">
                      {{$noticia->titulo}}
                     </div>
                </h1>
            </div>
        </div>
    </header>

    <!-- Conteúdo -->
    <section class="bg-tp1 noticia-descricao">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <time datetime="{{ date('d/m/y g:ia', strtotime($noticia->datapublicacao)) }}">{{ date('d/m/y g:ia', strtotime($noticia->datapublicacao)) }}</time>
                    <p>{!!$noticia->conteudo!!}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Rodapé -->
    @include('front.partials._bottom')

    <script src="{{ asset('assets/js/pages.js') }}"></script>
</body>
