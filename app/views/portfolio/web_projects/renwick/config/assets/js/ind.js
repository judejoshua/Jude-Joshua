$(document).ready(function() {
    var stickyNav = function() {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > 70) {
            $('.bottom-nav').addClass('scrolled');
            $('.to-top').addClass('to-topview');
        } else {
            $('.bottom-nav').removeClass('scrolled');
            $('.to-top').removeClass('to-topview');
        }
    };
    stickyNav();
    // and run it again every time you scroll
    $(window).scroll(function() {
        stickyNav();
    });

});

//------------------------------------------------------------------------------
//links
$('a[href^="#"]').on('click', function(event) {
    var target = $(this.getAttribute('href'));
    if (target.length) {
        event.preventDefault();
        $('html, body').stop().animate({
            scrollTop: target.offset().top
        }, 500);
    }
});

//------------------------------------------------------------------------------
//active working links
/*$(window).scroll(function() {
    var windscroll = $(window).scrollTop();
    if (windscroll > 100) {
        //$('.interests .workings_body').addClass('scrolled');
        $('#body section').each(function(i) {
            if ($(this).position().top <= windscroll - 530) {
                $('.navigation .bottom-nav #links_class .left-links a.active').removeClass('active');
                $('.navigation .bottom-nav #links_class .left-links a').eq(i).addClass('active');
            }
        });
    } else {
        //$('.interests .workings_body').removeClass('scrolled');
        $('.navigation .bottom-nav #links_class .left-links a.active').removeClass('active');
        $('.navigation .bottom-nav #links_class .left-links a:first').addClass('active');
    }
}).scroll();*/

//------------------------------------------------------------------------------
//search form
$('#searchtip').click(function() {
    event.preventDefault();
    $('.search').addClass('reshow');
    $('#bod').addClass('boxed');
})
$('#searchclose').click(function() {
    event.preventDefault();
    $('.search').removeClass('reshow');
    $('#bod').removeClass('boxed');
})


//--------------------------------------------------------------------------------
//tag
$('#mobile-opener').click(function() {
    $('div#links_class').addClass('showed');
})
$('#exitpa').click(function() {
    $('div#links_class').removeClass('showed');
})


//--------------------------------------------------------------------------------
//