<?php

    include ('../../../config/server.php');
    
    if (!isset($_SESSION['adminid'])){
        header('location:../../login/');
    }else{
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

                <title>System - Financials</title>

                <link rel="icon" href="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/images/logo-mini.png"/>
                <link rel="stylesheet" type="text/css" media="screen" href="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/css/main.css" />
                <link rel="stylesheet" type="text/css" media="screen" href="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/css/materialdesignicons.min.css" />
                <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">

            </head>
            <body>
                <div class="admin divwrap">
                    <div class="side-nav">
                        <?php include_once('../../../config/nav.php') ?>
                    </div>
                    <div class="profile-right">
						<div class="profile-nav">
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
										<?php include_once('../../../config/user_options.php') ?>
									</div>
								</div>
							</div>
							<div class="profilenav-right">
								<div class="welcome-user">
									<p><i class="mdi mdi-account-outline"></i><?php echo $_SESSION['adminusername']?><i class="mdi mdi-menu-down"></i></p>
									<?php include_once('../../../config/user_options.php') ?>
								</div>
							</div>
						</div>
                        <div class="profilebody-left">
                            <div class="profilebody-bottom-left">
                                <h1 id="adminpage-title">Clinic Financials</h1>
                                <table>
                                    <?php
                                        $result = mysqli_query($db,"SELECT * FROM `transactions` ");
                                        if(mysqli_num_rows($result) > 0){
                                            echo'
                                                <tr>
                                                    <th></th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th>Date paid</th>
                                                    <th>Name of patient</th>
                                                </tr>
                                            ';
                                            //output data of each row
                                            while($return = mysqli_fetch_array($result)){
                                                echo'
                                                    <tr>
                                                        <td class="email" id="input-holder-hold">
                                                            <h3>*</h3>
                                                        </td>
                                                        <td class="email" id="input-holder-hold">
                                                            <h3>'.$return['type'].'</h3>
                                                        </td>
                                                        <td class="email" id="input-holder-hold">
                                                            <h3>'.$return['amount'].'</h3>
                                                        </td>
                                                        <td class="email" id="input-holder-hold">
                                                            <h3>'.$return['date_paid'].'</h3>
                                                        </td>
                                                        <td class="phone" id="input-holder-hold">
                                                            <h3>'.$return['name'].'</h3>
                                                        </td>
                                                    </tr>
                                                ';
                                            }
                                        }else{
                                            echo '
                                                <h1 id="adminpage-title">No transactions has been carried out yet.</h1>
                                            ';
                                        }
                                        mysqli_close($db);
                                    ?>
                                </table>
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