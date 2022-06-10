$(document).ready(function() {
    var stickyNav = function() {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > 100) {
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
$(window).scroll(function() {
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
}).scroll();

//------------------------------------------------------------------------------
//active working links
$('#view_button').click(function() {
    $('.section_card_ball_content1').addClass('shield');
    $('body').css('overflow', 'hidden');
})
$('#close_button').click(function() {
    $('.section_card_ball_content1').removeClass('shield');
    $('body').css('overflow', 'auto');
})

$('#view_button2').click(function() {
    $('.section_card_ball_content2').addClass('shield');
    $('body').css('overflow', 'hidden');
})
$('#close_button2').click(function() {
    $('.section_card_ball_content2').removeClass('shield');
    $('body').css('overflow', 'auto');
})

$('#view_button3').click(function() {
    $('.section_card_ball_content3').addClass('shield');
    $('body').css('overflow', 'hidden');
})
$('#close_button3').click(function() {
    $('.section_card_ball_content3').removeClass('shield');
    $('body').css('overflow', 'auto');
})

//------------------------------------------------------------------------------
//requestor
$('#requester').click(function() {
    event.preventDefault();
    $('.request-form').addClass('reshow');
    $('#bod').addClass('boxed');
})
$('#requester2').click(function() {
    event.preventDefault();
    $('.request-form').addClass('reshow');
    $('#bod').addClass('boxed');
})
$('#requester3').click(function() {
    event.preventDefault();
    $('.request-form').addClass('reshow');
    $('#bod').addClass('boxed');
})
$('#requester-close').click(function() {
    $('.request-form').removeClass('reshow');
    $('#bod').removeClass('boxed');
})

//--------------------------------------------------------------------------------
//tag
$('#set_one').click(function() {
    $('div#leadership').toggleClass('tag');
})
$('#set_two').click(function() {
    $('div#services').toggleClass('tag');
})
$('#set_three').click(function() {
    $('div#products').toggleClass('tag');
})

//--------------------------------------------------------------------------------
//tag
$('#mobile-opener').click(function() {
    $('div#links_class').addClass('showed');
})
$('#exitpa').click(function() {
    $('div#links_class').removeClass('showed');
})





//Preloader
var myLoad;

function pLoader() {
    myLoad = setTimeout(showPage, 5500);
}

function showPage() {
    document.getElementById("loading").style.display = "none";
    document.getElementById("wrapper").style.display = "block";
}