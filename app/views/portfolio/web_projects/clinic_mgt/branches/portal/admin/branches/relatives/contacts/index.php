<?php

    include ('../../../config/server.php');
    
    if (!isset($_SESSION['adminid'])){
        header('location:../../login/');
    }else{
        $result = mysqli_query($db, "SELECT * FROM `contacts` ORDER BY date_added desc");

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

                <title>Contact Messages</title>

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
                                <div class="form-content contct">
                                    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" id="contct">
                                        <div class="form-content">
                                            <table>
                                                <?php
                                                    if(mysqli_num_rows($result) > 0){
                                                        echo'
                                                            <tr>
                                                                <th></th>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Phone Number</th>
                                                                <th>Message</th>
                                                                <th></th>
                                                            </tr>
                                                        ';
                                                        while($return = mysqli_fetch_array($result)){
                                                            
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
                                                                    <td class="email" id="input-holder-hold">
                                                                        <h3>'.$return['email'].'</h3>
                                                                    </td>
                                                                    <td class="phone" id="input-holder-hold">
                                                                        <h3>'.$return['phone'].'</h3>
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
                                                            <h3>There currently has not been any Messages sent yet.</h3>
                                                        ";
                                                    }


                                                    mysqli_close($db);
                                                ?>
                                            </table>
                                        </div>
                                    </form>
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