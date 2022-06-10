<?php

    include ('./config/server.php');
    
    if (!isset($_SESSION['adminid'])){
        header('location:./branches/login/');
    }else{
        $count = "SELECT `id` FROM `patients`";
        $query = mysqli_query($db, $count);
        $patients = mysqli_num_rows($query);
        
        $countb = "SELECT `s/n` FROM `management`";
        $queryb = mysqli_query($db, $countb);
        $staff = mysqli_num_rows($queryb);
              
        $countc = "SELECT `id` FROM `reviews`";
        $queryc = mysqli_query($db, $countc);
        $reviews = mysqli_num_rows($queryc);
        
        $countd = "SELECT `id` FROM `appointments`";
        $queryd = mysqli_query($db, $countd);
        $appointments = mysqli_num_rows($queryd);

        $counte = "SELECT `id` FROM `contacts`";
        $querye = mysqli_query($db, $counte);
        $contacts = mysqli_num_rows($querye);
           
?>
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

                    <link rel="icon" href="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/images/logo-mini.png"/>
                    <link rel="stylesheet" type="text/css" media="screen" href="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/css/main.css" />
                    <link rel="stylesheet" type="text/css" media="screen" href="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/css/materialdesignicons.min.css" />
                    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
                </head>
                <body>
                    <div class="admin divwrap">
                        <div class="side-nav">
                            <?php include_once('./config/nav.php') ?>
                        </div>
                        <div class="profile-right">
                            <div class="nav">
								<div class="navlinks-holder">
									<div id="mobile-opener">
										<i class="mdi mdi-menu"></i>
									</div>
									<div id="logo_class">
										<div class="block"></div>
										<div class="logo_nav_options">
											<img src="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/images/logo.jpeg" alt="Logo"/>
										</div>
									</div>
								</div>
                                <div class="profilenav-right">
                                    <div class="welcome-user">
                                        <p><i class="mdi mdi-account-outline"></i><?php echo $_SESSION['adminusername']?><i class="mdi mdi-menu-down"></i></p>
                                        <?php include_once('./config/user_options.php') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="profilebody-left">
                                <div class="profilebody-bottom-left">
                                    <div class="investlinks">
                                        <a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/patients/"><?php echo "<h5>$patients</h5>" ?>Patients</a>
                                        <a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/management/"><?php echo "<h5>$staff</h5>" ?>Staff</a>
                                        <a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/appointments/"><?php echo "<h5>$appointments</h5>" ?>Appointments</a>
                                        <a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/reviews/"><?php echo "<h5>$reviews</h5>" ?>Reviews</a>
                                        <a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/contacts/"><?php echo "<h5>$contacts</h5>" ?>Contact Messages</a>
                                        <a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/financials/"><i class="mdi mdi-currency-ngn"></i><h3>Financials</h3></a>
                                        <a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/thesaurus/about/"><i class="mdi mdi-dictionary"></i><h3>Thesaurus</h3></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                <script src="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/js/jquery-2.0.3.min.js"></script>
                <script src="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/js/landing.js"></script>
            </html>
<?php
    }
?>