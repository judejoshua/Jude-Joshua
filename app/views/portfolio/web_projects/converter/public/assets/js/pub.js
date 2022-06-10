$(document).ready(function() {


    $("#converter-form").on('keyup change paste submit', function(e) {
        e.preventDefault();
        var data = $('#converter-form').serialize();
        $.ajax({
            url: './assets/conv.php',
            type: 'POST',
            data: data,
            success: function(response) {
                $('#coverted').html(response);
            }

        });
    });


});