/*------------------------------------------------accordion FQA------------------------------*/
$(document).ready(function () {

    $(".accordion .answer").hide().prev().click(function () {
        $(this).parents(".accordion").find(".answer").not(this).slideUp(300).prev().removeClass("active");
        $(this).next().not(":visible").slideDown(300).prev().addClass("active");
    });
});


/*----------------------------- FANCYBOX --------------------------*/

$(document).ready(function () {
    $(".lightbox a").fancybox({
        ajax: {
            type: "POST"
        }
    });
});

/*----------------------------- HEADER -----------------------------*/
$(document).ready(function () {
    $("#sticker").sticky({topSpacing: 0});
});

/*----------------------------- MENU -----------------------------*/
$(document).ready(function () {
    $('a[href^="#"]').bind('click.smoothscroll', function (e) {
        e.preventDefault();

        var target = this.hash,
            $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 900, 'swing', function () {
            window.location.hash = target;
        });
    });
});
/*----------------------------- NAVIGATION -----------------------*/
$(document).ready(function () {
    $('#toggle').click(function () {
        $(this).toggleClass('active');
        $('.menu-menu1-container, .menu-menu2-container').toggleClass('open');
    });
    $('.menu-item').click(function () {
        $('#toggle').removeClass('active');
        $('.menu-menu1-container, .menu-menu2-container').removeClass('open');
    });
});

/* --------------------------- PROJECTS (LOAD MORE) ------------------------------------*/

$(document).ready(function () {
    $('.load-more').click( function(){
        $('.project').show('fast');
        $(this).css('display', 'none');
        $('.turn').css('display', 'block');
    });
    $('.turn').click(function() {
        $('.project:nth-child(n+5)').hide('fast');
        $(this).css('display', 'none');
        $(".load-more").css('display', 'block');
    })
});


/* --------------------------- EVENTS (LOAD MORE) ------------------------------------*/

$(document).ready(function () {
    $('.event-load-more').click( function(){
        $('.home-event').show('fast');
        $(this).css('display', 'none');
        $('.event-turn').css('display', 'flex');
    });
    $('.event-turn').click(function() {
        $('.home-event:nth-child(n+9)').hide('fast');
        $(this).css('display', 'none');
        $(".event-load-more").css('display', 'flex');
    })
});