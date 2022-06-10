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

                <title>Change Password</title>

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
						</div>
                        <div class="profilebody-left">
                            <div class="profilebody-bottom-left">
                                <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="change">
                                    <div class="form-content">
                                        <div class="messages">
                                            <div class="form-group">
                                            <h1 id="adminpage-title">Change your password</h1>
                                            </div>
                                            <div class="form-group">
                                                <label for="adminoldpass">Enter Old Password</label><br>
                                                <input type="password" name="adminold" placeholder="Enter Old password" size="20" minlength="5" maxlength="50" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="adminnewpass">Enter New Password</label><br>
                                                <input type="password" name="adminnew" placeholder="Enter new password" size="20" minlength="5" maxlength="50" required  pattern="[0-1][Aa-Zz]">
                                            </div>
                                            <div class="form-group">
                                                <label for="adminconfirm">Confirm New Password</label><br>
                                                <input type="password" name="adminconfirm" placeholder="Confirm new Password" size="20" minlength="8" maxlength="50" required  pattern="[0-1][Aa-Zz]">
                                            </div>
                                            <div class="form-group error-hold" style="border-top: none; padding: 0px;">
                                                <?php include('../../../config/errors.php'); ?>
                                                <?php include('../../../config/success.php'); ?>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="change">Save Password<i class="mdi mdi-save"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
        </html>
<?php
    }
?>