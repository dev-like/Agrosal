<footer id="contatenos">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h4>Encontre-nos</h4>
                <div class="info">
                    <img src="{{ asset('assets/images/casa.png') }}" alt="">
                    {{$quemsomos->endereco}},
                    {{$quemsomos->bairro}} - {{$quemsomos->cidade}} - {{$quemsomos->estado}}
                    CEP: {{$quemsomos->cep}}
                </div>
                <div class="info">
                    <img src="{{ asset('assets/images/telefone.png') }}" alt="">
                    {{$quemsomos->telefone}}
                </div>
                <div class="info">
                    <img src="{{ asset('assets/images/email.png') }}" alt="">
                    {{$quemsomos->email}}
                </div>
                <div class="info">
                    <a href="#">
                        <img src="{{ asset('assets/images/messenger.png') }}" alt="">
                        @agrosaloficial
                    </a>
                    <a href="#" class="whats">
                        <img src="{{ asset('assets/images/whatsapp.png') }}" alt="">
                        (99) 9 9155-4321
                    </a>
                </div>
            </div>
            <div class="col-lg-4 meio">
                <h4>Facebook</h4>
                <div class="facebook">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fagrosaloficial%2F&tabs=timeline&width=300&height=220&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=true&appId" width="100%" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
            </div>
            <div class="col-lg-4">
                <form action="." method="post">
                    <h4>Contate-nos</h4>
                    <input type="text"  name="nome" placeholder="Nome">
                    <input type="email" name="email" placeholder="E-mail">
                    <input type="text"  name="mensagem" placeholder="Mensagem">
                    <button type="button" name="button">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</footer>
<div class="copy">
    Copyright 2018 &copy; AgroSal.
    <span>
        Desenvolvido por:
        <a href="http://www.likepublicidade.com" target="_blank">
            <img src="{{ asset('assets/images/like.png') }}" alt="Like">
        </a>
    </span>
</div>

<script src="js/main.js"></script>
</body>
</html>
