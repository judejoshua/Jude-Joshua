$(document).ready(function() {
    
(function () {

      const link = document.querySelectorAll('a');
      const cursor = document.querySelector('.cursor');

      const animateit = function (e) {
        const span = this.querySelector('span');
        const { offsetX: x, offsetY: y } = e,
        { offsetWidth: width, offsetHeight: height } = this,

        move = 25,
        xMove = x / width * (move * 2) - move,
        yMove = y / height * (move * 2) - move;

        if (e.type === 'mouseleave') span.style.transform = '';
      };

      const editCursor = e => {
            const { clientX: x, clientY: y } = e;
            cursor.style.left = x + 'px';
            cursor.style.top = y + 'px';
      };

      link.forEach(b => b.addEventListener('mousemove', animateit));
      link.forEach(b => b.addEventListener('mouseleave', animateit));
      window.addEventListener('mousemove', editCursor);

})();
    //=================================================================================================
    //                           N A V I G A T I O N
    //=================================================================================================
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 24) {
            $("navigation").addClass("fixed");
        } else {
            $("navigation").removeClass("fixed");
        }
        if (window.location.href.indexOf("cv") > -1) {
            var scrollDivi = $('#divisor').offset().top;
            if (scroll >= scrollDivi) {
                $("a.download").fadeOut('slow');
            } else {
                $("a.download").fadeIn('slow');
            }
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
    $('a[href]:not([href^="#"], [href^="/#"])').click(function() {
        $(".preloader").fadeIn("fast");
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

    //=================================================================================================
    //                           C O N T E X T  M E N U
    //=================================================================================================

    // document.onclick = hideMenu;
    // document.oncontextmenu = rightClick;

    function hideMenu() {
        $("#contextMenu").hide()
    }

    function rightClick(e) {
        e.preventDefault();

        if ($(e.target).is('a, a *')) { //if current right click target is a link or link children
            if ($(e.target).is('a')) {
                var link = $(e.target).attr('href');
            } else {
                var link = $(e.target).closest('a').attr('href');
            }
            if ($("#contextMenu #new_tab").length) {
                $("#contextMenu #new_tab").remove()
            }
            $("#contextMenu ul:not(#inner-down)").prepend('<li id="new_tab"><a href="' + link + '" target="_blank">Open link in new tab</a></li>')
        } else {
            $("#contextMenu #new_tab").remove()
        }
        var menu = $("#contextMenu");
        menu.css({ "display": "table" });

        if (!(screen.width <= 820)) {
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
        } else {
            menu.css("left", ($(window).width() * 0.4 - 100) + "px");
            $('.context-menu ul li #inner-down').css({ "left": "0", "top": "100%" });
            menu.css("top", ($(window).height() * 0.4) + "px");
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


    //=================================================================================================
    //                           S E N D  E M A I L  F U N C T I O N
    //=================================================================================================
    $('button.btn').click(function(e) {
        e.preventDefault();
        $('.preloader').addClass('recha');
        $(".preloader").fadeIn("slow");

        let link = '/public/config/sendEmail.php';
        let form = $(this).closest('form')[0];
        let data = new FormData(form);

        $.ajax({
            url: link,
            type: "POST",
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                let status = response.split('=');
                $(".preloader").fadeOut("slow");
                if (status[0] === 'error') {
                    if (status[1] === 'name') {
                        $('.error[data-error="name"]').fadeIn(1000).text('You forgot to enter your name...');
                        $('html,body').animate({
                            scrollTop: $('#name').offset().top - 200
                        }, 500);
                        setTimeout(() => {
                            $('.error').fadeOut('slow').text('');
                        }, 5000);
                    } else if (status[1] === 'email' && status[2] === undefined) {
                        $('.error[data-error="email"]').fadeIn(1000).text('You forgot to enter your email...');
                        $('html,body').animate({
                            scrollTop: $('#email').offset().top - 200
                        }, 500);
                        setTimeout(() => {
                            $('.error').fadeOut('slow').text('');
                        }, 5000);
                    } else if (status[1] === 'email' && status[2] === 'invalid') {
                        $('.error[data-error="email"]').fadeIn(1000).text('You eneterd an invalid email...');
                        $('html,body').animate({
                            scrollTop: $('#email').offset().top - 200
                        }, 500);
                        setTimeout(() => {
                            $('.error').fadeOut('slow').text('');
                        }, 5000);
                    } else if (status[1] === 'message') {
                        $('.error[data-error="message"]').fadeIn(1000).text('Heyy! Don\'t forget to enter your message!');
                        $('html,body').animate({
                            scrollTop: $('#message').offset().top - 200
                        }, 500);
                        setTimeout(() => {
                            $('.error').fadeOut('slow').text('');
                        }, 5000);
                    } else if (status[1] === 'failed') {
                        $('.success-message').addClass('show error');
                        $('.success-message i').removeClass().addClass('las la-alert-outline');
                        $('.success-message p').text('Oops! Your message could not be sent. Please try again in a few minutes.');
                        setTimeout(removePop, 5000);
                    }
                } else {
                    $(form)[0].reset();
                    $('.success-message').addClass('show');
                    $('.success-message i').removeClass().addClass('las la-check');
                    $('.success-message p').text('Your form message was sent successfullly. Please expect my response in a few minutes.');

                    setTimeout(removePop, 5000);
                }
            },
            error: function(jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connected.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                $('.success-message').addClass('show error');
                $('.success-message i').removeClass().addClass('las la-alert-outline');
                $('.success-message p').text(msg);
                setTimeout(removePop, 5000);
            },
        })
    });

    //=================================================================================================
    //                           D O W N L O A D  B U T T O N
    //=================================================================================================
    $('.dwnld-btn').click(function(e) {
        e.preventDefault();

        $('.success-message').addClass('show');
        setTimeout(removePop, 3000);
        var link = $(this).attr('href');
        setTimeout(function() {
            var valFileDownloadPath = link;
            window.open(valFileDownloadPath, '_blank');
        }, 4000);

    });

    //=================================================================================================
    //                           R E M O V E  P O P U P  F U N C T I O N
    //=================================================================================================
    function removePop() {
        $('.success-message').removeClass('show error');
    }

    //=================================================================================================
    //                    A D D  T H E  L E T T E R  N A M E  F O R  T E S T I M O N I A L S
    //=================================================================================================
    if (window.location.href.indexOf("about") > -1) {

        $('.client-name-head').each(function() {
            $(this).text($(this).next('h4').text().charAt(0));
        })

    }

    //=================================================================================================
    //                    I M A G E  M O D A L  F O R  C A S E  S T U D Y
    //=================================================================================================
    if (window.location.href.indexOf("case_study") > -1) {

        zoomLevel = 1;
        if (!(screen.width <= 800)) {
            img_width = $('.img-holder').width();
            img_height = $('.modal img').height();
        } else {
            img_height = $('.img-holder').width();
            img_width = $('.modal img').height();
        }

        $('.row img').each(function() {
            $(this).click(function() {
                var img = $(this).attr('src');
                $('#larger').attr('src', img);

                $('html').addClass('no-scroll')

                $('.modal').removeClass('hideout');
                $('span#close').addClass('fixed');
                $('.zooms').addClass('fixed');
            });
        })

        $('span#close').click(function() {
            var img = $(this).attr('src');
            $('#larger').attr('src', img);

            $('html').removeClass('no-scroll')

            $('.modal').addClass('hideout');
            $('span#close').removeClass('fixed');
            $('.zooms').removeClass('fixed');

            $('.modal img').css({
                "width": img_width,
                "height": img_height,
            });
        });

        $('#zoom-out').click(function() {
            if (zoomLevel > 1) {
                updateZoom(-1);
            } else {
                $('.modal img').addClass('zoom-in');
            }
        })

        $('#zoom-in').click(function() {
            if (zoomLevel < 4) {
                updateZoom(1);
            } else {
                $('.modal img').removeClass('zoom-in');
            }
        })

        var updateZoom = function(zoom) {
            zoomLevel += zoom;
            width = zoomLevel * img_width;
            height = zoomLevel * img_height;
            $('.modal img').css({
                "width": width,
                "height": height,
            });
            return zoomLevel;
        }

    }


})