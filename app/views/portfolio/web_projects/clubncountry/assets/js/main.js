$(document).ready(function() {
    ///-----------------------------------------------------------------------------
    //Scrolldown---------------------------------------------------------------
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('.back-to-top').fadeIn('100');
        } else {
            $('.back-to-top').fadeOut('100');
        }
    });
    $('.back-to-top').on("click", function() {
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    });
    ///-----------------------------------------------------------------------------
    //Send contact us---------------------------------------------------------------
    $("#send-msg").on('click', function(e) {
        e.preventDefault();
        $('body').prepend('<span id = "recha"><i class="mdi mdi-48px mdi-spin mdi-loading"></i></span>');
        let data = $('#msg-form').serialize();
        $.ajax({
            url: 'mail.php',
            type: "POST",
            data: data,
            success: function(response) {
                if (response.trim() == 'Successful!') {
                    $('#recha').remove();
                    $('#error').html('').removeClass('shower');
                    $('#success').html(
                        'Thank you. We\'ll get back to you shortly!'
                    ).addClass('shower');
                    $('#msg-form')[0].reset();
                    setTimeout(reloadDart, 4500);

                    function reloadDart() {
                        $('#success').removeClass('shower');
                    }
                } else {
                    $('#recha').remove();
                    $('#error').html(response).addClass('shower');
                    $('#success').html('');
                    setTimeout(reloadDart, 4500);

                    function reloadDart() {
                        $('#error').removeClass('shower');
                    }
                }
            }
        });
    });
});