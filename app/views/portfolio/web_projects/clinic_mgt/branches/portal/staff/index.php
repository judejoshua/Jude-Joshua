<?php

    include ('./config/server.php');
    
    if (!isset($_SESSION['staffid'])){
        header('location: ./branches/profiles/');
    }else{
        $count = "SELECT `password`, `role`, `phone`, `email` FROM `management` WHERE `name` = '".$_SESSION['staffid']."' ";
        $query = mysqli_query($db, $count);
        $user = mysqli_fetch_assoc($query);
        $staffpassword= $user['password'];
        $staffemail= $user['email'];
        $staffrole = $user['role'];
        $staffphone= $user['phone'];

        if($count){
			$details = mysqli_query($db, "SELECT * FROM `$staffrole` WHERE `name`='".$_SESSION['staffid']."'");
			$row = mysqli_fetch_assoc($details);
			
			$target_file = $row['photo_name'];
			$target_dir = base64_decode($row['photo_loc']);
			$nationality = $row['nationality'];
			$address = $row['address'];
			$state_of_residence = $row['state_of_residence'];
			$country_of_residence = $row['country_of_residence'];
			$state_of_origin = $row['state_of_origin'];

           
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

                    <title>Dashboard - <?php echo $_SESSION['staffid']?></title>

                    <link rel="icon" href="/config/assets/images/logo-mini.png"/>
                    <link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/main.css" />
                    <link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/materialdesignicons.min.css" />
                    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
                </head>
                <body>
                    <div class="admin staff <?php echo $staffrole?> divwrap">
                        <?php include_once('./config/nav.php') ?>
                        <div class="profile-right">
                            <div class="nav">
								<div class="navlinks-holder">
									<div id="mobile-opener">
										<i class="mdi mdi-menu"></i>
									</div>
									<div id="logo_class">
										<div class="block"></div>
										<div class="logo_nav_options">
											<img src="/config/assets/images/logo.jpeg" alt="Logo"/>
										</div>
									</div>
								</div>
                                <div class="profilenav-right">
                                    <div class="welcome-user">
                                        <p><i class="mdi mdi-account-outline"></i><?php echo $_SESSION['staffusername']?><i class="mdi mdi-menu-down"></i></p>
                                        <?php include_once('./config/user_options.php') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="profilebody-left">
                                <div class="profilebody-bottom-left">
                                    <?php
										if($staffrole=='Doctor'){
                                            echo'
												<div class="investlinks">
													<a href="/branches/portal/staff/branches/relatives/appointments/"><i class="mdi mdi-briefcase"></i><h3>Appointments</h3></a>
													<a href="/branches/portal/staff/branches/relatives/profile/"><i class="mdi mdi-account-outline"></i><h3>My profile</h3></a>
												</div>
                                            ';
                                        }elseif($staffrole=='Receptionist'){
                                            echo'
                                                <div class="messages password">
                                                    <form method="POST" action="'; echo htmlentities($_SERVER['PHP_SELF']); echo'" name="recep">
                                                        <div class="form-content">
                                                            <div class="form-group">
                                                                <h1>Enter Patient ID</h1>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" name="checkpatient" placeholder="Enter Patient ID" size="20" minlength="5" maxlength="15" required>
                                                            </div>
                                                            <div class="form-group error-hold" style="border-top: none; padding: 0px;">
                                                                ';include('../../../config/errors.php'); 
                                                                include('../../../config/success.php'); echo'
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" name="recep-check">Search Patient<i class="mdi mdi-save"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            ';
                                        }else{
                                            echo'
												<div class="messages password">
                                                    <form method="POST" action="'; echo htmlentities($_SERVER['PHP_SELF']); echo'" name="recep">
                                                        <div class="form-content">
                                                            <div class="form-group">
                                                                <h1>Enter Patient ID</h1>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" name="checkpatient" placeholder="Enter Patient ID" size="20" minlength="5" maxlength="15" required>
                                                            </div>
                                                            <div class="form-group error-hold" style="border-top: none; padding: 0px;">
                                                                ';include('../../../config/errors.php'); 
                                                                include('../../../config/success.php'); echo'
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" name="lab-check">Check<i class="mdi mdi-save"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            ';
                                        };
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
            </html>
<?php
        }
    }
?>