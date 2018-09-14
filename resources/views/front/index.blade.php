<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgroSal</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

    <!--  href="fonts/fonts.css"> -->
    <!-- Fonts e Animations -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animates.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">

    <!-- Styles Sheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

    <!-- Librarys JavaScrip -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/owl.carousel.js') }}"></script>

</head>
<body>
    <!-- menu -->
    @include('front.partials._menuHome')

    <!-- Cabeçalho -->
    <header>
        <!-- Banners -->
        <div class="banner" id="inicio">
            <div class="container">
                <h1>
                    <span>Linha</span>
                    <strong>Nutrimais</strong>
                    <small>
                        O Nutrimais é indicado para suprir as deficiências
                        nutricionais de bovino de corte em geral mantidos a
                        pasto, exclusivamente durante o período da seca.
                    </small>
                </h1>
            </div>
        </div>

        <!-- Missão, Visão e Valores -->
        <section class="bg-tp1 missao">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="assets/images/missao.png" alt="Missão">
                        <h6>Tradição</h6>
                        <p>
                          {!! $quemsomos-> missao !!}
                        </p>
                    </div>
                    <div class="col-md-4">
                        <img src="assets/images/visao.png" alt="Visão">
                        <h6>Tecnologia</h6>
                        <p>
                          {!! $quemsomos-> visao !!}
                        </p>
                    </div>
                    <div class="col-md-4">
                        <img src="assets/images/valores.png" alt="Valores">
                        <h6>Inovação</h6>
                        <p>
                          {!! $quemsomos-> valores !!}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </header>

    <!-- Conteúdo -->
    <section class="bg-tp2 sobre" id="sobre">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="assets/images/embalagem-destaque.png" alt="AgroSal Embalagens" class="embalagem-destaque">
                </div>
                <div class="col-lg-6">
                    <h2>Pesquisa</h2>
                    {!!$quemsomos->quemsomos!!}
                    <!-- <a href="#" class="btn">Saiba Mais</a> -->
                </div>
            </div>
        </div>
    </section>
    <section class="bg-tp1 produtos" id="produtos">
        <div class="container">
            <h2>Produtos</h2>
            <div class="carousel-linhas owl-carousel owl-theme">
              @foreach($linha as $li)
                <div class="linhas">
                    <div style="background-image: url({{ asset('linhas/imagens/'. $li->capa) }})">
                        <span class="titulo">
                            {{$li->nome}}
                        </span>
                        <a href="{{ route('linha.item', $li->slug) }}" class="btn">Saiba Mais</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="bg-tp2 noticias" id="noticias">
        <div class="container">
            <h2>Notícias</h2>
            <div class="row carousel">
              @foreach($noticia as $noti)
                <div class="col-lg-6">
                    <div class="item">
                        <div style="background-image: url({{ asset('noticias/imagens/'. $noti->capa) }})" class="not-img"></div>
                        <div class="content">
                            <h3>{{$noti->titulo}}</h3>
                            <time>{{$noti->datapublicacao}}</time>
                            <a href="{{ route('noticia.item', $noti->slug) }}">continue lendo</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="bg-tp2 localizacao" id="localizacao">
        <h2>Localização</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.533870762572!2d-47.47271788503682!3d-5.487417596020775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x92c56019004f60a1%3A0x1dffc1f82b98d0f9!2sAgroSal+-+Nutri%C3%A7%C3%A3o+Animal!5e0!3m2!1spt-BR!2sbr!4v1529077278206" width="100%" height="480" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>
    @include('front.partials._bottom')
    <script src="{{ asset('assets/js/main.js') }}"></script>

    </body>
    </html>
