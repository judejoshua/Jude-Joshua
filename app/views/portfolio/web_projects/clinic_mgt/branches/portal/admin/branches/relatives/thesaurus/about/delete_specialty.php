<?php

    include('../../../../config/server.php');

    $id = $_GET['id'];

    $confirmrows = mysqli_query($db, "SELECT * FROM `specialties`");
    if (mysqli_num_rows($confirmrows) < 2){
        echo '
            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <meta name="author" content="mite-systems">
                    <meta name="description" content="">
                    <meta name="format-detection" content="telephone=no">
                    <meta name="keywords" content="">

                    <title>System dashboard</title>

                    <link rel="icon" href="/config/assets/images/logo-mini.png"/>
                    <link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/main.css" />
                    <link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/materialdesignicons.min.css" />
                    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
                </head>
                <body>
                    <div class="admin divwrap">
                        <div class="side-nav">
                            '; include_once('../../../../config/nav.php'); echo'
                        </div>
                        <div class="profile-right">
                            <div class="nav">
                                <div id="logo_class">
                                    <div class="block"></div>
                                    <div class="logo_nav_options">
                                        <div class="logo_nav_options_left"><i class="mdi mdi-hospital-building"></i></div>
                                        <div class="logo_nav_options_right">
                                            <h3>Caritas University</h3>
                                            <p>Clinic</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="profilenav-right">
                                    <div class="welcome-user">
                                        <p><i class="mdi mdi-account-outline"></i> '.$_SESSION['adminusername'].' <i class="mdi mdi-menu-down"></i></p>
                                        '; include_once('../../../../config/user_options.php'); echo'
                                    </div>
                                </div>
                            </div>
                            <div class="profilebody-left">
                                <div class="profilebody-bottom-left">
                                    <p id="view_error">
                                        Must have atleast one specialty defined. Click <a href="../">here</a> to go back.;
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                <script src="/config/assets/js/jquery-2.0.3.min.js"></script>
                <script src="/config/assets/js/landing.js"></script>
            </html>
        ';
        mysqli_close($db);
    }else{
        $sql = mysqli_query($db, "DELETE FROM `specialties` WHERE `id`='".$id."' ");
        if($sql){
            $reset = mysqli_query($db, "ALTER TABLE `specialties` AUTO_INCREMENT = 1");
            header('Location: ../');
        }
    }

?>