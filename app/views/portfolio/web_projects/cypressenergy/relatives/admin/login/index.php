<?php

    include ('../config/server.php');

?>
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

          <link rel="icon" href="/relatives/admin/config/assets/images/logo-mini.png"/>
          <title>System Log</title>

					<link rel="stylesheet" type="text/css" media="screen" href="/relatives/admin/config/assets/css/admin.css" />
					<link rel="stylesheet" type="text/css" media="screen" href="/relatives/admin/config/assets/css/materialdesignicons.min.css" />
					<link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
      </head>
      <body>
          <div class="divWrap fade">
              <div class="form login">
                  <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="login">
                      <div class="form-content">
                          <div class="form-group">
                              <h1>Welcome<br><span>Back!</span></h1>
                          </div>
                          <div class="form-group">
                              <label for="adminuser"></label>
                              <input required type="text" name="adminuser" placeholder="Admin ID" size="20" minlength="5" maxlength="50" required>
                          </div>
                          <div class="form-group">
                              <label for="adminpassword"></label>
                              <input required type="password" name="adminpassword" placeholder="Passcode" size="20" minlength="8" maxlength="50" required pattern="[0-1][Aa-Zz]">
                          </div>
                          <div class="form-group error-hold fader" style="border-top: none; padding: 0px;">
                              <?php include('../config/errors.php'); ?>
                          </div>
                          <div class="form-group">
                              <h3>Sign In</h3>
                              <button type="submit" name="login"><i class="mdi mdi-arrow-right"></i></button>
                          </div>
                          <div class="form-group">
                              <a href="#">Forgot Password</a>
                          </div>
                      </div>
                  </form>
                  <div class="misc"></div>
              </div>
          </div>
      </body>
  </html>
