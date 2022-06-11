
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
            <title>Account access area</title>

            <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
            <link rel="stylesheet" type="text/css" media="screen" href="/relatives/app/config/assets/css/min.css" />
            <link rel="stylesheet" type="text/css" media="screen" href="/relatives/app/config/assets/css/materialdesignicons.min.css" />
                
        </head>
        <body>
            <div class="divWrap fade">
                <div class="container" id="body">
                    <?php include('../../../config/nav.php');?>
                    <div class="form login">
                        <div class="card">
                            <div class="front">
                                <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="login-form" id="login-form">
                                    <div class="form-content">
                                        <div class="form-group header">
                                            <h1>Login</h1>
                                            <p>Please enter your login details below...</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="useruser"></label>
                                            <input required type="email" id="user" name="user" placeholder="Enter your Email" size="10" minlength="5" maxlength="50" >
                                        </div>
                                        <div class="form-group">
                                            <label for="userpassword"></label>
                                            <input required type="password" id="userlog" name="userlog" placeholder="Enter your Password" size="20" minlength="8" maxlength="20">
                                        </div>
                                        <div class="form-group error-hold fader" style="border-top: none; padding: 0px;">
                                            <div class="error">
                                                <p id="error"></p>
                                                <p id="success"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="login" id="log-button"><i class="mdi mdi-arrow-right"></i></button>
                                        </div>
                                        <div class="form-group forget">
                                            <p id="led">Register Here</p>
                                            <a href="#">Forgot Password</a>
                                            <a href="../verify">verify</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="back">
                                <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="reg-form" id="reg-form">
                                    <div class="form-content">
                                        <div class="form-group header">
                                            <h1>Register</h1>
                                            <p>Kindly enter your details in the form below...</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="uname"></label>
                                            <input required type="text" id="uname" name="uname" placeholder="Name" size="10" minlength="5" maxlength="50" >
                                        </div>
                                        <div class="form-group">
                                            <label for="email"></label>
                                            <input required type="email" id="email" name="email" placeholder="Email Address" size="10" minlength="5" maxlength="50" >
                                        </div>
                                        <div class="form-group">
                                            <label for="phone"></label>
                                            <input required type="tel" id="phone" name="phone" placeholder="Phone Number" size="10" minlength="5" maxlength="30" >
                                        </div>
                                        <div class="form-group">
                                            <label for="userpassword"></label>
                                            <input required type="password" name="password" placeholder="Password" size="20" minlength="8" maxlength="20">
                                        </div>
                                        <div class="form-group">
                                            <label for="userpassword"></label>
                                            <input required type="password" name="conpassword" placeholder="Confirm your Password" size="20" minlength="8" maxlength="20">
                                        </div>
                                        <div class="form-group error-hold fader" style="border-top: none; padding: 0px;">
                                            <div class="error">
                                                <p id="r-error"></p>
                                                <p id="r-success"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="register" id="reg-button"><i class="mdi mdi-arrow-right"></i></button>
                                        </div>
                                        <div class="form-group forget">
                                            <p id="reg">Login Here</p>
                                            <a href="#">Forgot Password</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container" id="footer">
                    <?php include('../../../config/footer.php') ?>
                    <a href="#home" class="to-top">
                        <i class="mdi mdi-chevron-up"></i>
                    </a>
                    <div class="search">
                        <a class="mdi mdi-close" id="searchclose"></a>
                        <form id="search-form" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="search-form">
                            <div class="form-group">
                                <input id="search" placeholder="What are you looking for?..." name="search" type="search" size="20" minlength="5" maxlength="50" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="search-submit" id="search-submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="/relatives/app/config/assets/js/jquery-2.0.3.min.js"></script>
            <script src="/relatives/app/config/assets/js/landing.js"></script>
            <script src="/config/assets/js/ind.js"></script>
            <script>
                $(document).ready(function(){
                    $("#login-form").on('submit', function(e){
                        e.preventDefault();
                        var data = $('#login-form').serialize();
                        $.ajax({
                            url: '../config/server.php',
                            type: 'POST',
                            data: data,
                            success: function(response){
                                if(response=='Login Successful!'){
                                    $('#error').html('');
                                    $('.divWrap').html('<span id="recha">Successful! Logging you in...</span>');
                                    setTimeout('window.location.href = "../"', 2800);
                                }else if(response=='Verify your email first!'){
                                    $('#error').html('');
                                    $('.divWrap').html('<span id="recha">Redirecting to the verification page...</span>');
                                    setTimeout('window.location.href = "../verify/"', 2800);
                                }else{
                                    $('#error').html(response);
                                }
                            }

                        });
                    });
                    $("#reg-form").on('submit', function(e){
                        e.preventDefault();
                        var data = $('#reg-form').serialize();
                        $.ajax({
                            url: '../config/server.php',
                            type: 'POST',
                            data: data,
                            success: function(response){
                                if(response=='Successful!'){
                                    $('#r-error').html('');
                                    $('.divWrap').html('<span id="recha">Your registration was successful! Redirecting...</span>');
                                    setTimeout('window.location.href = "../verify/"', 2800);
                                }else{
                                    $('#r-error').html(response);
                                }
                            }

                        });
                    });

                });
            </script>

  </html>
