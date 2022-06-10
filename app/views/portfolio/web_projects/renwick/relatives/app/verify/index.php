  <!DOCTYPE html>
  <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <meta name="author" content="Mite Systems">
            <meta name="description" content="">
            <meta name="format-detection" content="telephone=no">
            <meta name="keywords" content="">

            <link rel="icon" href="/relatives/app/config/assets/images/logo-mini.png"/>
            <title>Verify your account</title>

            <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
            <link rel="stylesheet" type="text/css" media="screen" href="/relatives/app/config/assets/css/min.css" />
            <link rel="stylesheet" type="text/css" media="screen" href="/relatives/app/config/assets/css/materialdesignicons.min.css" />
        
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="/relatives/app/config/assets/js/jquery-2.0.3.min.js"></script>
            <script src="/relatives/app/config/assets/js/landing.js"></script>
            <script>
                $(document).ready(function(){
                    $("#ver-form").on('submit', function(e){
                        e.preventDefault();
                        var data = $('#ver-form').serialize();
                        $.ajax({
                            url: '../config/server.php',
                            type: 'POST',
                            data: data,
                            success: function(response){
                                if(response=='Ready!'){
                                    $('#r-error').html('');
                                    $('#r-success').html('<span id="recha">User verified! Now logging you in...</span>');
                                    setTimeout('window.location.href = "../"', 2800);
                                }else{
                                    $('#r-error').html(response);
                                }
                            }

                        });
                    });

                });
            </script>
        
        
        </head>
        <body>
            <div class="divWrap fade">
                <div class="form login verify">
                    <div class="id">
                        <p>Demo User</p>
                        <a href="/relatives/app/auth/"><i class="mdi mdi-power"></i></a>
                    </div>
                    <div class="card verify">
                        <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="ver-form" id="ver-form">
                            <div class="form-content">
                                <div class="form-group header">
                                    <h1>Please Verify!</h1>
                                    <p>A verification code was sent to your email address, kindly enter it to proceed.</p>
                                </div>
                                <div class="form-group">
                                    <label for="useruser"></label>
                                    <input required type="tel" id="verf" name="verf" size="10" minlength="3" maxlength="5" >
                                </div>
                                <div class="form-group error-hold fader" style="border-top: none; padding: 0px;">
                                    <div class="error">
                                        <p id="r-error"></p>
                                        <p id="r-success"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="verify" id="ver-button"><i class="mdi mdi-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>
  </html>
