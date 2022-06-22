$(document).ready(function() {
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
    //                           A D D   P R O J E C T   F U N C T I O N
    //=================================================================================================
    $('button.btn#add-project').click(function(e) {
        e.preventDefault();
        $('.preloader').addClass('recha');
        $(".preloader").fadeIn("slow");

        let link = '/public/config/addProject.php';
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
                    $('.error[data-error="' + status[1] + '"]').fadeIn(1000).text(status[2]);

                    $('html,body').animate({
                        scrollTop: $('#' + status[1]).offset().top - 200
                    }, 500);

                    setTimeout(() => {
                        $('.error').fadeOut('slow').text('');
                    }, 5000);

                } else if (status[0] === 'success') {
                    $(form)[0].reset();
                    $('img').attr('src', '');
                    $('.success-message').addClass('show');
                    $('.success-message i').removeClass().addClass('las la-check');
                    $('.success-message p').text('Your project was added successfully!');

                    setTimeout(removePop, 5000);

                    setTimeout(function() { location.href = "/portfolio" }, 5000);
                } else {
                    $('.success-message').addClass('show error');
                    $('.success-message i').removeClass().addClass('las la-alert-outline');
                    $('.success-message p').text(status[0]);

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

    $('.add-more-images').each(function() {

        let img_container = $(this).siblings('#img-container');
        let type = img_container.data('type');

        var i = img_container.children().length;

        $(this).click(function() {
            ++i;

            img_container.append('<div class="input-field"><span id="tag-single" class="close-image">X</span><input type="file" id="' + type + '_img-' + i + '" name="' + type + '_img[]" class="form-input p4" accept="image/webp" onchange="document.getElementById(\'' + type + '-imagePreview-' + i + '\').src = window.URL.createObjectURL(this.files[0])"/><label for="' + type + '_img-' + i + '" class="choose-img-label"><div class="project"><img id="' + type + '-imagePreview-' + i + '" alt="' + type + ' image"/></div></label></div>');
        })
    })

    $(document).on("click", ".close-image", function() {
        $(this).parent('.input-field').remove();
    })

    $('#project_type').change(function(e) {
        switch ($(this).val()) {
            case "UI/UX":
                if (!$("#web").hasClass('hidden')) {
                    $("#web").addClass('hidden');
                }
                if ($("#ui-ux").hasClass('hidden')) {
                    $("#ui-ux").removeClass('hidden');
                }
                break;

            case "Web design, Web development":
                if (!$("#ui-ux").hasClass('hidden')) {
                    $("#ui-ux").addClass('hidden');
                }
                if ($("#web").hasClass('hidden')) {
                    $("#web").removeClass('hidden');
                }
                break;

            default:
                if ($("#web").hasClass('hidden')) {
                    $("#web").removeClass('hidden');
                }
                if ($("#ui-ux").hasClass('hidden')) {
                    $("#ui-ux").removeClass('hidden');
                }
                break;
        }
    })

    //=================================================================================================
    //                           E D I T   P R O J E C T   F U N C T I O N
    //=================================================================================================
    $('button.btn#edit-project').click(function(e) {
        e.preventDefault();
        $('.preloader').addClass('recha');
        $(".preloader").fadeIn("slow");

        let link = '/public/config/editProject.php';
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
                    $('.error[data-error="' + status[1] + '"]').fadeIn(1000).text(status[2]);

                    $('html,body').animate({
                        scrollTop: $('#' + status[1]).offset().top - 200
                    }, 500);

                    setTimeout(() => {
                        $('.error').fadeOut('slow').text('');
                    }, 5000);

                } else if (status[0] === 'success') {
                    $('.success-message').addClass('show');
                    $('.success-message i').removeClass().addClass('las la-check');
                    $('.success-message p').text('Your project was added successfully!');

                    setTimeout(removePop, 5000);

                    setTimeout(function() { location.href = "/portfolio" }, 5000);
                } else {
                    $('.success-message').addClass('show error');
                    $('.success-message i').removeClass().addClass('las la-alert-outline');
                    $('.success-message p').text(status[0]);

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
    //                           R E M O V E  P O P U P  F U N C T I O N
    //=================================================================================================
    function removePop() {
        $('.success-message').removeClass('show error');
    }


})