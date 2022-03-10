$(document).ready(function() {

    //========================================================================================================================navigation
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

    //========================================================================================================================context-menu
    // document.onclick = hideMenu;
    // document.oncontextmenu = rightClick;

    // function hideMenu() {
    //     $("#contextMenu").hide()
    // }
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

    //========================================================================================================================submit form
    $('button.btn').click(function(e) {
        e.preventDefault();
        $('.preloader').addClass('recha');
        $(".preloader").fadeIn("slow");

        let link = '/components/sendEmail.php';
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
                    } else if (status[1] === 'email' && status[2] === undefined) {
                        $('.error[data-error="email"]').fadeIn(1000).text('You forgot to enter your email...');
                        $('html,body').animate({
                            scrollTop: $('#email').offset().top - 200
                        }, 500);
                    } else if (status[1] === 'email' && status[2] === 'invalid') {
                        $('.error[data-error="email"]').fadeIn(1000).text('You eneterd an invalid email...');
                        $('html,body').animate({
                            scrollTop: $('#email').offset().top - 200
                        }, 500);
                    } else if (status[1] === 'message') {
                        $('.error[data-error="message"]').fadeIn(1000).text('Heyy! Don\'t forget to enter your message!');
                        $('html,body').animate({
                            scrollTop: $('#message').offset().top - 200
                        }, 500);
                    } else if (status[1] === 'failed') {
                        $('.success-message').addClass('show error');
                        $('.success-message i').removeClass().addClass('mdi mdi-alert-outline');
                        $('.success-message p').text('Oops! Your message could not be sent. Please try again in a few minutes.');
                        setTimeout(removePop, 5000);
                    }
                } else {
                    $(form)[0].reset();
                    $('.success-message').addClass('show');
                    $('.success-message i').removeClass().addClass('mdi mdi-check');
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
                $('#post').html(msg);
            },
        })
    });

    //=================================================================================================================remove pop-up
    function removePop() {
        $('.success-message').removeClass('show error');
    }


})