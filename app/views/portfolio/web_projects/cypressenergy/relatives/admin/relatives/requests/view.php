<?php

    include('../../config/server.php');


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

    $id = $_GET['id'];

    $sql = mysqli_query($db, "SELECT * FROM `requests` WHERE `id`='".$id."'");
    $view = mysqli_fetch_array($sql);

    $name = $view['name'];
    $email = $view['email'];
    $phone = $view['phone'];
    $service = $view['service'];
    $product = $view['product'];
    $state = $view['state'];
    $country = $view['country'];
    $city = $view['city'];
    $req = $view['additional info'];


    if($sql){
        $dot = mysqli_query($db, "UPDATE `requests` SET `new`='0' WHERE `id`= '$id'");
        echo '
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
                <title>Client Requests</title>

                <link rel="stylesheet" type="text/css" media="screen" href="/relatives/admin/config/assets/css/admin.css" />
                <link rel="stylesheet" type="text/css" media="screen" href="/relatives/admin/config/assets/css/materialdesignicons.min.css" />
                <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
            </head>
            <body>
                <div class="divWrap">
                    <div class="side-nav">
                        ';include_once('../../config/nav.php'); echo'
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
                                    <p><i class="mdi mdi-account-outline"></i></i></p>
                                    '; include_once('../../config/user_options.php'); echo'
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="profilebody-left">
                          <div class="profilebody-top">
                              <h1>Client Requests</h1>
                              <p>'.$uname.'</p>
                          </div>
                            <div class="profilebody-bottom">
                                <div class="form-content contact">
                                    <div class="form change">
                                        <form name="change">
                                            <div class="form-content">
                                                <div class="messages view">
                                                  <a href="../"><button type="button"><i class="mdi mdi-arrow-left"></i></button></a>
                                                  <div class="form-group">
                                                      <label for="adminoldpass">Name</label><br>
                                                      <h3>'.$name.'</h3>
                                                  </div><br>
                                                  <div class="form-group">
                                                      <label for="adminoldpass">Email</label><br>
                                                      <h3>'.$email.'</h3>
                                                  </div><br>
                                                  <div class="form-group">
                                                      <label for="adminoldpass">Phone</label><br>
                                                      <h3>'.$phone.'</h3>
                                                  </div><br>
                                                  <div class="form-group">
                                                      <label for="adminoldpass">Service</label><br>
                                                      <h3>'.$service.'</h3>
                                                  </div><br>
                                                  <div class="form-group">
                                                      <label for="adminoldpass">Product</label><br>
                                                      <h3>'.$product.'</h3>
                                                  </div><br>
                                                  <div class="form-group">
                                                      <label for="adminoldpass">State</label><br>
                                                      <h3>'.$state.'</h3>
                                                  </div><br>
                                                  <div class="form-group">
                                                      <label for="adminoldpass">City</label><br>
                                                      <h3>'.$city.'</h3>
                                                  </div><br>
                                                  <div class="form-group">
                                                      <label for="adminoldpass">Country</label><br>
                                                      <h3>'.$country.'</h3>
                                                  </div><br>
                                                  <div class="form-group">
                                                      <label for="adminconfirm">Additional Message</label><br>
                                                      <h3>'.$req.'</h3>
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
        ';
    }else{
        echo 'Error fetching request! <a href="../">Back</a>';
    };

?>
