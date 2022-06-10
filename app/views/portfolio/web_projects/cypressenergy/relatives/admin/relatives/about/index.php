<?php

    include ('../../config/server.php');

    if (!isset($_SESSION['adminid'])){
        header('location:../../login/');
    }else{

      $requests = "SELECT `id` FROM `requests`";
      $query = mysqli_query($db, $requests);
      $c_requests = mysqli_num_rows($query);

      $request_result = mysqli_query($db, "SELECT `name`, `additional info`, `new` FROM `requests` WHERE `new` = '1'");
      $count_requests = mysqli_num_rows($request_result);


      $messages = "SELECT `id` FROM `messages`";
      $query = mysqli_query($db, $messages);
      $c_messages = mysqli_num_rows($query);

      $message_result = mysqli_query($db, "SELECT `name`, `message`, `new` FROM `messages` WHERE `new` = '1'");
      $count_messages = mysqli_num_rows($message_result);


      $reviews = "SELECT `id` FROM `reviews`";
      $query = mysqli_query($db, $reviews);
      $c_reviews = mysqli_num_rows($query);

      $reviews_result = mysqli_query($db, "SELECT `id`, `name`, `review`, `new` FROM `reviews` WHERE `new` = '1'");
      $count_reviews = mysqli_num_rows($reviews_result);


      $uname = $_SESSION['adminid'];

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
                <title>About Info</title>

                <link rel="stylesheet" type="text/css" media="screen" href="/relatives/admin/config/assets/css/admin.css" />
                <link rel="stylesheet" type="text/css" media="screen" href="/relatives/admin/config/assets/css/materialdesignicons.min.css" />
                <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
            </head>
            <body>
                <div class="divWrap">
                    <div class="side-nav">
                        <?php include_once('../../config/nav.php') ?>
                    </div>
                    <div class="profile-right">
          						<div class="profile-nav">
          							<div class="nav">
          								<div class="navlinks-holder">
          									<div id="mobile-opener">
          										<i class="mdi mdi-menu"></i>
          									</div>
          								</div>
          								<div class="profilenav-right">
          									<div class="welcome-user">
          										<p><i class="mdi mdi-account-outline"></i></p>
          										<?php include_once('../../config/user_options.php') ?>
          									</div>
          								</div>
          							</div>
          						</div>
                        <div class="profilebody-left">
                            <div class="profilebody-top">
                                <h1>About info</h1>
                                <?php echo "<p>$uname</p>" ?>
                            </div>
                            <div class="profilebody-bottom">
                              <div class="form change about">
                                <div class="form-content">
                                    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="contact">
                                        <fieldset>
                                            <legend>Contact Info</legend>
                                            <?php
                                                $contact_query = mysqli_query($db, "SELECT * FROM `contact_info`");
                                                $contact = mysqli_fetch_assoc($contact_query);

                                                $location = $contact['location'];
                                                $city = $contact['city'];
                                                $state = $contact['state'];
                                                $country = $contact['country'];
                                                $email = $contact['email'];
                                                $phone = $contact['phone'];
                                            ?>
                                            <div class="form-group">
                                                <label for="adminloc">Location</label><br>
                                                <input type="text" name="adminloc" placeholder="Enter Location" value="<?php echo $location?>" size="20" minlength="5" maxlength="50" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="admincity">City</label><br>
                                                <input type="text" name="admincity" placeholder="Enter city" value="<?php echo $city?>" size="20" minlength="5" maxlength="50" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="adminstate">State</label><br>
                                                <input type="text" name="adminstate" placeholder="Enter state" value="<?php echo $state?>" size="20" minlength="5" maxlength="50" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="admincount">Country</label><br>
                                                <input type="text" name="admincount" placeholder="Enter country" value="<?php echo $country?>" size="20" minlength="5" maxlength="50" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="adminmail">Email</label><br>
                                                <input type="email" name="adminmail" placeholder="Enter Email" value="<?php echo $email?>" size="20" minlength="5" maxlength="50" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="adminphone">Phone</label><br>
                                                <input type="tel" name="adminphone" placeholder="Enter Phone" value="<?php echo $phone?>" size="20" minlength="5" maxlength="20" required>
                                            </div>
                                            <div class="form-group">
                                                <h3>Save</h3>
                                                <button type="submit" name="save-contact"><i class="mdi mdi-arrow-right"></i></button>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="about">
                                        <fieldset>
                                            <legend>About Info</legend>
                                            <?php
                                                $about_query = mysqli_query($db, "SELECT `about` FROM `contact_info`");
                                                $about = mysqli_fetch_assoc($about_query);

                                                $about_us = $about['about'];
                                                $about_us = base64_decode($about_us);
                                            ?>
                                            <div class="form-group">
                                                <textarea name="about" placeholder="About" cols="4" minlength="50" maxlength="1500" required><?php echo $about_us ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <h3>Save</h3>
                                                <button type="submit" name="save-about"><i class="mdi mdi-arrow-right"></i></button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                  </div>
            </body>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="/relatives/admin/config/assets/js/jquery-2.0.3.min.js"></script>
            <script src="/relatives/admin/config/assets/js/landing.js"></script>
        </html>
<?php
    }
?>
