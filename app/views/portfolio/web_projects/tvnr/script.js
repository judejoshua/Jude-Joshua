$(document).ready(function() {
    //--------------------------------------------------------------------navigationLinks
    $('a[href^="#"]').click(function() {
        let target = $(this).attr('href');
        if (target.length) {
            $('html, body').animate({
                scrollTop: $(target).offset().top
            }, 500);
        }
        return false;
    });
    //--------------------------------------------------------------------alert Box
    $('form.newsletter_ctA .ctaButton, .contact-form_ctA .ctaButton').click(function() {
        if (!$(this).parent().children("input").val()) {
            $(".alert h2").text("Error!");
            $(".alert p").text("Your action could not be completed successfully. Please try again.");
            $(".alert").addClass("show error");
            setTimeout('$(".alert").removeClass("show error")', 4500);
        } else {
            $(".alert h2").text("Success!");
            $(".alert p").text("Your action was completed succesfully. Our team will reach out to you soon. Thank you.");
            $(".alert").addClass("show");
            setTimeout('$(".alert").removeClass("show")', 4500);
        }
    });
    //--------------------------------------------------------------------alert Box
    $('.mobile-toggler').click(function() {
      $('.navLinks').toggle();
    });

})
