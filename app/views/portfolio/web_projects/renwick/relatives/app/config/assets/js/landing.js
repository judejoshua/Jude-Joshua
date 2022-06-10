$(document).ready(function() {
    //------------------------------------side-options
    $('div#mobile-opener').click(function() {
        $('.side-nav').addClass('show');
    });
    $('.exita').click(function() {
        $('.side-nav').removeClass('show');
    });
    //---------------------------------------user-data
    $('.welcome-user p:nth-of-type(2)').click(function() {
        $('.user-options').addClass('shower');
    });
    $('.exiter').click(function() {
        $('.user-options').removeClass('shower');
    });
    //---------------------------------------flips
    $('#led').click(function() {
        $('.card').toggleClass('flipped');
    });
    $('#reg').click(function() {
        $('.card').toggleClass('flipped');
    });


});