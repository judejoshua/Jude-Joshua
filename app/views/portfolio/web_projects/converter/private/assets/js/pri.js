$(document).ready(function() {


    $("#converter-form").on('submit', function(e) {
        e.preventDefault();
        var data = $('#converter-form').serialize();
        $.ajax({
            url: './assets/add.php',
            type: 'POST',
            data: data,
            success: function(response) {
                if (response == 'converter Successful!') {
                    $('#error').html('');
                    $('#success').html("Successful! Logging you in...");
                    setTimeout('window.location.href = "../"', 2500);
                } else {
                    $('#error').html(response);
                }
            }

        });
    });


});