$(document).ready(function() {
    //=================================================================================================
    //                           N A V I G A T I O N
    //=================================================================================================
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 24) {
            $("nav").addClass("fixed");
        } else {
            $("nav").removeClass("fixed");
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

    $(document).on("click", '.add-more-images', function() {


        let img_container = $(this).siblings('#img-container');
        let type = img_container.data('type');

        var i = img_container.children().length;

        ++i;

        img_container.append('<div class="input-field col-100"><span id="tag-single" class="close-image">X</span><input type="file" id="' + type + '_img-' + i + '" name="' + type + '_img[]" class="form-input p4 col-100" accept="image/webp" onchange="document.getElementById(\'' + type + '-imagePreview-' + i + '\').src = window.URL.createObjectURL(this.files[0])"/><label for="' + type + '_img-' + i + '" class="choose-img-label col-100"><div class="project col-100"><img id="' + type + '-imagePreview-' + i + '" alt="' + type + ' image"/></div></label></div>');
    })

    $(document).on("click", ".close-image", function() {
        $(this).parent('.input-field').remove();
    })

    $(document).on("click", ".close-div", function() {
        $(this).parent().remove();
        if ($(this).parent().parent('.process-list').children().length == 0) {
            $('#process_filled').val('');
        }
    })

    $('.add-process').click(function() {
        $('#process_filled').val('1');
        var input = $(this).siblings().children('#fieldset_title').val();
        if (input == '') {
            $('.success-message').addClass('show error');
            $('.success-message i').removeClass().addClass('las la-alert-outline');
            $('.success-message p').text('Please enter a title for your process step.');
            setTimeout(removePop, 5000);
        } else {
            let add_process = $(this).parent().siblings('.process-list');

            let step = input.split(' ');
            if (step[1] == undefined) {
                step[1] = ''
                process = step[0]
            } else {
                step[1] = '_' + step[1];
            }
            process_step = step[0] + step[1];
            process = process_step;

            add_process.append('<fieldset class="col-100"><span id="tag-single" class="close-div">X</span><legend>' + input + '</legend><div class="field-button-group d-flex d-flex-row flex-align-start col-100"><div class="title-text"><div class="form-group"><label for="' + process_step + '-summary" id="to-title" class="h4"></label><div class="input-group"><div class="input-field"><textarea type="text" id="' + process_step + '-summary" name="' + process_step + '-summary" class="form-input p4 form-area" maxlength="1000"></textarea><div class="labels"><p class="p5 placeholder">What little summary can you give about the ' + input + ' process?</p><p class="p5 error" data-error="' + process_step + '-summary"></p></div></div></div></div></div><div class="form-group"><div class="labels"><p class="p5 error" data-error="' + process + '_img"></p></div><div class="col-100 img-upload input-group d-flex flex-wrap"><div class="d-flex flex-wrap col-100" id="img-container" data-type="' + process + '"><div class="input-field col-100" id="' + process + '_img"><input type="file" id="' + process + '_img-1" name="' + process + '_img[]" class="form-input p4 col-100" accept="image/webp" onchange="document.getElementById(\'' + process + '-imagePreview-1\').src = window.URL.createObjectURL(this.files[0])"/><label for="' + process + '_img-1" class="choose-img-label col-100"><div class="project col-100"><img id="' + process + '-imagePreview-1" alt="' + process + ' image" /></div></label></div></div><span id="tag-single" class="add-more-images">Add another image</span></div></div></div></fieldset>');

            $(this).siblings().children('#fieldset_title').val('');
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
    //                        D E L E T E   P R O J E C T   F U N C T I O N
    //=================================================================================================
    $('.delete').click(function(e) {
        e.preventDefault();
        $('.preloader').addClass('recha');
        $(".preloader").fadeIn("slow");

        let link = '/public/config/deleteProject.php?id=' + $(this).data('id');

        $.ajax({
            url: link,
            type: "POST",
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