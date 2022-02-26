$(document).ready(function() {

    //==============================================navigation
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 24) {
            $("navigation").addClass("fixed");
        } else {
            $("navigation").removeClass("fixed");
        }
    });
    $('a[href^="#"], a[href^="/#"]').click(function() {
        let target = $(this).attr('href');
        if (target.length) {
            $('html, body').animate({
                scrollTop: $(target).offset().top
            }, 500);
        }
        return false;
    });
    $('.mobile-nav-opener').click(function() {
        $('.mobile-nav').addClass('in');
        $('.mobile-nav-opener.close').addClass('out');
        $('.mobile-nav .nav-links').addClass('get-in');
        $('body').addClass('no-scroll');
    });
    $('.mobile-nav-opener.close').click(function() {
        $('.mobile-nav-opener.close').removeClass('out');
        $('.mobile-nav .nav-links').removeClass('get-in');
        $('body').removeClass('no-scroll');
        setTimeout(function() {
            $('.mobile-nav').removeClass('in');
        }, 300);
    });

    //==============================================context-menu
    document.onclick = hideMenu;
    document.oncontextmenu = rightClick;

    function hideMenu() {
        $("#contextMenu").hide()
    }

    function rightClick(e) {
        e.preventDefault();

        if ($(e.target).is('a, a *')) { //if current right click target is a link
            var link = $(e.target).attr('href')
            if ($("#contextMenu #new_tab").length) {
                $("#contextMenu #new_tab").remove()
            }
            $("#contextMenu ul").prepend('<li id="new_tab"><a href="' + link + '" target="_blank">Open link in new tab</a></li>')
        } else {
            $("#contextMenu #new_tab").remove()
        }
        var menu = $("#contextMenu");
        menu.show();
        if (e.pageX >= ($(window).width() - $('#contextMenu').width() - $('#contextMenu').width())) {
            menu.css("left", (e.pageX - ($('#contextMenu').width()) - 30) + "px");
            $('.context-menu ul li #inner-down').css("left", "-100%");
        } else {
            menu.css("left", e.pageX + "px");
            $('.context-menu ul li #inner-down').css("left", "100%");
        }
        if (e.clientY <= $('#contextMenu').height() + 30) {
            menu.css("top", e.pageY + "px");
        } else if (e.clientY >= (e.clientY - $('#contextMenu').height() - 30)) {
            menu.css("top", (e.pageY - ($('#contextMenu').height()) - 30) + "px");
        } else {
            menu.css("top", e.pageY + "px");
        }
    }

    $(window).keyup(function(event) {
        if (event.which === 27) {
            $('#contextMenu').hide();
        }
    });

    $(window).scroll(function() {
        if ($("#contextMenu").is(':visible')) {
            hideMenu();
        }
    });



})