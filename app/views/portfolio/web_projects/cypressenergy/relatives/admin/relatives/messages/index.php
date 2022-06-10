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

      $reviews_result = mysqli_query($db, "SELECT `name`, `review`, `new` FROM `reviews` WHERE `new` = '1'");
      $count_reviews = mysqli_num_rows($reviews_result);


      $uname = $_SESSION['adminid'];


      $msg_result = mysqli_query($db, "SELECT * FROM `messages` ORDER BY date_added desc");

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
                <title>Client Messages</title>

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
                              <h1>Client Messages</h1>
                              <?php echo "<p>$uname</p>" ?>
                          </div>
                            <div class="profilebody-bottom">
                                <div class="form change">
                                    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" id="contct" name="change">
                                      <div class="table messages display">
                                        <div class="form-content">
                                            <div id="messae">
                                              <table>
                                                  <?php
                                                      if(mysqli_num_rows($msg_result) > 0){
                                                          echo'
                                                              <tr>
                                                                  <th></th>
                                                                  <th>Name</th>
                                                                  <th>Message</th>
                                                                  <th></th>
                                                              </tr>
                                                          ';
                                                          while($return = mysqli_fetch_array($msg_result)){

                                                              $messages = $return['message'];
                                                              $message = base64_decode($messages);

                                                              echo'
                                                                  <tr>
                                                                      <td class="name" id="input-holder-hold">
                                                                          <h3>*</h3>
                                                                      </td>
                                                                      <td class="name" id="input-holder-hold">
                                                                          <h3>'.$return['name'].'</h3>
                                                                      </td>
                                                                      <td class="message" id="input-holder-hold">
                                                                          <p>'.$message.'</p>
                                                                      </td>
                                                                      <td class="reply" id="input-holder-hold">
                                                                          <a id="view" href="view.php/?id='.$return['id'].'">View</a>
                                                                      </td>
                                                                  </tr>
                                                              ';
                                                          }
                                                      }else{
                                                          echo "
                                                              <h3>There currently has not been any messages sent yet.</h3>
                                                          ";
                                                      }


                                                      mysqli_close($db);
                                                  ?>
                                              </table>
                                            </div>
                                        </div>
                                      </div>
                                    </form>
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
