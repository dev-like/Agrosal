function showFadeUp(element) {
    if($(window).scrollTop() <= $(element).offset().top-$(window).height())
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
            if($(this).scrollTop() > $(element).offset().top-$(window).height())
            $(element).removeAttr('style');
        });
    }
}

$(".banner h1 span, .banner h1 strong, .banner h1 small").css({
    'opacity':'0',
    'transform':'translatex(20px)',
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

    setTimeout(function(){
        $(".banner h1 span").addClass('hideFadeDown');
        $(".banner h1 span").removeAttr('style');
    },600);
    setTimeout(function(){
        $(".banner h1 strong").addClass('hideFadeDown');
        $(".banner h1 strong").removeAttr('style');
    },900);

    showFadeUp("section.linha-produtos img");
    for (var i = 0; i < $("section.linha-produtos li").length; i++) {
        showFadeUp($("section.linha-produtos li").eq(i));
    }
});
