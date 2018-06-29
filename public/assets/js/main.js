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
$(".banner h1 span, .banner h1 strong, .banner h1 small").css({
    'opacity':'0',
    'transform':'translatex(20px)',
});

$(document).ready(function(){
    $(window).scroll(function()
    {
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


    setTimeout(function(){
        $(".missao .row div").addClass('hideFadeDown');
        $(".missao .row div").removeAttr('style');
    },1200);


    setTimeout(function(){
        $(".banner h1 span").addClass('hideFadeDown');
        $(".banner h1 span").removeAttr('style');
    },600);
    setTimeout(function(){
        $(".banner h1 strong").addClass('hideFadeDown');
        $(".banner h1 strong").removeAttr('style');
    },900);
    setTimeout(function(){
        $(".banner h1 small").addClass('hideFadeDown');
        $(".banner h1 small").removeAttr('style');
    },1000);

    showFadeUp('.sobre .embalagem-destaque');
    showFadeUp('.produtos .linhas');
    showFadeUp('.noticias .item');
});
