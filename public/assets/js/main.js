function showFadeUp(element) {
    if($(this).scrollTop() <= $(element).offset().top-($(window).height()/4)*3)
    {
        $(element).css({
            'opacity':'0',
            'transform':'translateY(100px)',
        });

        setTimeout(function(){
            $(element).addClass('hideFadeDown');
        },100);

        $(window).scroll(function()
        {
            if($(this).scrollTop() > $(element).offset().top-($(window).height()/4)*3)
            $(element).removeAttr('style');
        });
    }
}

$(".missao .row div").css({
    'opacity':'0',
    'transform':'translateY(20px)',
});

$(document).ready(function(){
    $(window).scroll(function()
    {
        var yPos = -($(window).scrollTop() / 2);
        var bgpos = '50% '+ yPos + 'px';
        $("header .banner").css('background-position', bgpos);

        if($(this).scrollTop() > 0)
            $('nav').addClass('flutuar');
        else
            $('nav').removeClass('flutuar');
    });

    $('.menu-toggle').click(function(event){
        $(this).toggleClass('toggle');
        $('nav ul').slideToggle('fast');
    });

	$("nav ul li a").click(function (event)
	{
		event.preventDefault();
        $('.menu-toggle').removeClass('toggle');
        $('nav ul').slideUp('fast');
        if($(this).attr("href") == "#localizacao")
		var deslocamento = $($(this).attr("href")).offset().top-70;
        else
		var deslocamento = $($(this).attr("href")).offset().top-36;
		$('html, body').animate({ scrollTop: deslocamento }, 700);
	});

    var maisde3 = $(".linhas").length > 3 ? true : false;
    $('.carousel-linhas').owlCarousel({
        margin: 20,
        dots:false,
        nav:true,
        navText:[
            '<span class="prev-list"></span>',
            '<span class="next-list"></span>'
        ],
        responsiveClass:true,
        responsive:{
            0:{ items:1,loop:true,autoplay:true },
            992:{ items:3,loop:maisde3,autoplay:maisde3 },
        }
    });

    setTimeout(function(){
        $(".missao .row div").addClass('hideFadeDown');
        $(".missao .row div").removeAttr('style');
    },800);

    $('.carousel-parceiros').owlCarousel({
       loop: true,
       autoplay: true,
       margin: 100,
       dots:false,
       nav:true,
       navText:[
           '<span class="prev-list"></span>',
           '<span class="next-list"></span>'
       ],
       responsiveClass:true,
       responsive:{
           0:{ items:1},
           576:{ items:2},
           768:{ items: 3},
           992:{ items:4},
       }
   });

   $('.missao p.tradicao').readmore({
        heightMargin: 0,
        collapsedHeight: 48,
        moreLink: '<a class="read" href="#">Leia mais</a>',
        lessLink: '<a class="read" href="#">Fechar</a>'
    });
   $('.missao p.tecnologia').readmore({
        heightMargin: 0,
        collapsedHeight: 48,
        moreLink: '<a class="read" href="#">Leia mais</a>',
        lessLink: '<a class="read" href="#">Fechar</a>'
    });
   $('.missao p.inovacao').readmore({
        heightMargin: 0,
        collapsedHeight: 48,
        moreLink: '<a class="read" href="#">Leia mais</a>',
        lessLink: '<a class="read" href="#">Fechar</a>'
    });

    // showFadeUp('.sobre .embalagem-destaque');
    // showFadeUp('.produtos .linhas');
    // showFadeUp('.noticias .item');

    //altenancia de banners
    function mostrarBanner(){
		clearInterval(executar);

        if (banner == $('.banner .dots .item-dot').length)
            banner = 0;

        $('.banner .dots .item-dot').removeClass('active');
        $('.banner .dots .item-dot').eq(banner).addClass('active');

        var img = $('.banner .dots .item-dot').eq(banner).children('img').attr('src');

        $('.banner').css('background-image','url('+img+')');
        executar = setInterval(function(){ ++banner; mostrarBanner(); }, 5000);
	}

    var banner = 0;
    mostrarBanner();
    var executar = setInterval(function(){ ++banner; mostrarBanner(); }, 5000);

    $('.banner .dots .item-dot').click(function(){
        clearInterval(executar);
        banner = $(this).attr('data-indice');
        mostrarBanner();
    });
});
