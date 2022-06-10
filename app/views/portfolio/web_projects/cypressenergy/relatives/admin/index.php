<?php

    include ('./config/server.php');

    if (!isset($_SESSION['adminid'])){
        header('location:./login/');
    }else{
        $requests = "SELECT `id` FROM `requests`";
        $query = mysqli_query($db, $requests);
        $c_requests = mysqli_num_rows($query);

        $request_result = mysqli_query($db, "SELECT `id`, `name`, `additional info`, `new` FROM `requests` WHERE `new` = '1'");
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
                    <title>System dashboard</title>

                    <link rel="stylesheet" type="text/css" media="screen" href="/relatives/admin/config/assets/css/admin.css" />
                    <link rel="stylesheet" type="text/css" media="screen" href="/relatives/admin/config/assets/css/materialdesignicons.min.css" />
                    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
                </head>
                <body>
                    <div class="divWrap fade">
                        <div class="side-nav">
                            <?php include_once('./config/nav.php') ?>
                        </div>
                        <div class="profile-right">
                            <div class="nav">
                                <div class="navlinks-holder">
                                    <div id="mobile-opener">
                                            <i class="mdi mdi-menu"></i>
                                    </div>
                                </div>
                                <div class="profilenav-right">
                                    <div class="welcome-user">
                                        <p><i class="mdi mdi-account-outline"></i></p>
                                        <?php include_once('./config/user_options.php') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="profilebody-left">
                                <div class="profilebody-top">
                                    <h1>Welcome</h1>
                                    <?php echo "<p>$uname</p>" ?>
                                </div>
                                <div class="profilebody-bottom">
                                    <div class="tables">
                                        <div class="table request">
                                            <h1>Client Requests</h1>
                                            <ul class="counterss">
                                                <li><h5>New: <span><?php echo $count_requests ?></span></h5></li>
                                                <li><h5>All: <span><?php echo $c_requests ?></span></h5></li>
                                                <li><h5><a href="/relatives/admin/relatives/requests/">View all</a></h5></li>
                                            </ul>
                                            <table>
                                              <tbody>
                                                <?php
                                                    echo'
                                                        <tr>
                                                            <th></th>
                                                            <th>Name</th>
                                                            <th>Message</th>
                                                            <th></th>
                                                        </tr>
                                                    ';
                                                    if($count_requests > 0){
                                                        //output data of each row
                                                        while($return = mysqli_fetch_array($request_result)){
                                                            echo'
                                                                <tr>
                                                                    <td class="sn" id="input-holder-hold">
                                                                        <h3>*</h3>
                                                                    </td>
                                                                    <td class="name" id="input-holder-hold">
                                                                        <p>'.$return['name'].'</p>
                                                                    </td>
                                                                    <td class="email" id="input-holder-hold">
                                                                        <p>'.$return['additional info'].'</p>
                                                                    </td>
                                                                    <td class="reply" id="input-holder-hold">
                                                                        <a id="view" href="/relatives/admin/relatives/requests/view.php/?id='.$return['id'].'">View</a>
                                                                    </td>
                                                                </tr>
                                                            ';
                                                        }
                                                    }else{
                                                        echo "
                                                          <tr>
                                                            <td>
                                                              <h3>There are no new client requests...</h3>
                                                            </td>
                                                          <tr>
                                                        ";
                                                    }
                                                  ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="table messages">
                                            <h1>Client Messages</h1>
                                            <ul class="counterss">
                                                <li><h5>New: <span><?php echo $count_messages ?></span></h5></li>
                                                <li><h5>All: <span><?php echo $c_messages ?></span></h5></li>
                                                <li><h5><a href="/relatives/admin/relatives/messages/">View all</a></h5></li>
                                            </ul>
                                            <table>
                                              <tbody>
                                                <?php
                                                    echo'
                                                        <tr>
                                                            <th></th>
                                                            <th>Name</th>
                                                            <th>Message</th>
                                                            <th></th>
                                                        </tr>
                                                    ';
                                                    $result = mysqli_query($db, "SELECT `id`, `name`, `message`, `new` FROM `messages` WHERE `new` = '1'");
                                                    if(mysqli_num_rows($result) > 0){
                                                        //output data of each row
                                                        while($return = mysqli_fetch_array($result)){
                                                            echo'
                                                                <tr>
                                                                    <td class="sn" id="input-holder-hold">
                                                                        <h3>*</h3>
                                                                    </td>
                                                                    <td class="name" id="input-holder-hold">
                                                                        <p>'.$return['name'].'</p>
                                                                    </td>
                                                                    <td class="email" id="input-holder-hold">
                                                                        <p>'.base64_decode($return['message']).'</p>
                                                                    </td>
                                                                    <td class="reply" id="input-holder-hold">
                                                                        <a id="view" href="/relatives/admin/relatives/messages/view.php/?id='.$return['id'].'">View</a>
                                                                    </td>
                                                                </tr>
                                                            ';
                                                        }
                                                    }else{
                                                        echo '
                                                          <tr>
                                                            <td>
                                                              <h3>There are no new client messages...</h3>
                                                            </td>
                                                          </tr>
                                                        ';
                                                    }
                                                  ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--<div class="table reviews">
                                            <h1>Client Reviews</h1>
                                            <ul class="counterss">
                                                <li><h5>New: <span><?php echo $count_reviews ?></span></h5></li>
                                                <li><h5>All: <span><?php echo $c_reviews ?></span></h5></li>
                                                <li><h5><a href="/relatives/admin/relatives/reviews/">View all</a></h5></li>
                                            </ul>
                                            <table>
                                              <tbody>
                                                <?php
                                                    echo'
                                                        <tr>
                                                            <th></th>
                                                            <th>Name</th>
                                                            <th>Message</th>
                                                            <th></th>
                                                        </tr>
                                                    ';
                                                    $result = mysqli_query($db, "SELECT `id`, `name`, `review`, `new` FROM `reviews` WHERE `new` = '1'");
                                                    if(mysqli_num_rows($result) > 0){
                                                        //output data of each row
                                                        while($return = mysqli_fetch_array($result)){
                                                            echo'
                                                                <tr>
                                                                    <td class="sn" id="input-holder-hold">
                                                                        <h3>*</h3>
                                                                    </td>
                                                                    <td class="name" id="input-holder-hold">
                                                                        <p>'.$return['name'].'</p>
                                                                    </td>
                                                                    <td class="email" id="input-holder-hold">
                                                                        <p>'.base64_decode($return['review']).'</p>
                                                                    </td>
                                                                    <td class="reply" id="input-holder-hold">
                                                                        <a id="view" href="/relatives/admin/relatives/reviews/view.php/?id='.$return['id'].'">View</a>
                                                                    </td>
                                                                </tr>
                                                            ';
                                                        }
                                                    }else{
                                                        echo "
                                                          <tr>
                                                            <td>
                                                              <h3>There are no new client reviews...</h3>
                                                            </td>
                                                          <tr>
                                                        ";
                                                    }
                                                    mysqli_close($db);
                                                  ?>
                                                </tbody>
                                            </table>
                                        </div>-->
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
