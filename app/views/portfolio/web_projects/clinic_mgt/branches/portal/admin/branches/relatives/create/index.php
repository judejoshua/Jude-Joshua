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

                <title>Add management</title>

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
                                <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="create">
                                    <div class="form-content">
                                        <div class="messages">
                                            <div class="form-group">
                                                <h1 id="adminpage-title">Create New Staff</h1>
                                                <p><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/management/" id="viewadmin">View List</a>
                                            </div>
                                            <div class="form-group">
                                                <label for="adminuser">Enter Name</label><br>
                                                <input type="text" name="adminname" placeholder="Enter Name" size="20" minlength="5" maxlength="50" value="<?php if(isset($_POST['create'])){ echo $adminname ;} ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="adminuser">Gender</label><br>
                                                <input type="text" name="adminsex" placeholder="Enter Gender" size="20" minlength="3" maxlength="10" value="<?php if(isset($_POST['create'])){ echo $adminsex ;} ?>" required list="sex">
                                                <datalist id="sex">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </datalist>
                                            </div>
                                            <div class="form-group">
                                                <label for="adminuser">Enter Email</label><br>
                                                <input type="email" name="adminmail" placeholder="Enter Email" size="20" minlength="5" maxlength="50" value="<?php if(isset($_POST['create'])){ echo $adminmail ;} ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="adminuser">Enter Phone</label><br>
                                                <input type="tel" name="adminphone" placeholder="Enter Phone" size="20" minlength="5" maxlength="20" value="<?php if(isset($_POST['create'])){ echo$adminphone ;} ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="adminuser">Select Role</label><br>
                                                <input type="text" name="adminrole" placeholder="Choose Role" size="20" minlength="5" maxlength="50" value="<?php if(isset($_POST['create'])){ echo$adminrole ;} ?>" required list="role">
                                                <datalist id="role">
                                                    <option value="Doctor">Staff</option>
                                                    <option value="Receptionist">Admin</option>
                                                    <option value="Lab_assistant">Staff</option>
                                                    <option value="Pharmacist">Staff</option>
                                                    <option value="Nurse">Staff</option>
                                                </datalist>
                                            </div>
                                            <div class="form-group">
                                                <label for="adminpass">Set Password</label><br>
                                                <input type="password" name="adminpass" placeholder="Set Password" size="20" minlength="8" maxlength="50" required pattern="[0-1][Aa-Zz]">
                                            </div>
                                            <div class="form-group error-hold" style="border-top: none; padding: 0px;">
                                                <?php include('../../../config/errors.php'); ?>
                                                <?php include('../../../config/success.php'); ?>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="create">Create User<i class="mdi mdi-save"></i></button>
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