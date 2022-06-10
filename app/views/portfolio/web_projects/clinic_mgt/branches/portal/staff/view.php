<?php

    include('./config/server.php');

    if (!isset($_SESSION['search_id'])){
        header('location:./');
    }else{


        $sql = "SELECT * FROM `management` WHERE `name`= '".$_SESSION['staffid']."' ";
        $querys = mysqli_query($db, $sql);
        $view = mysqli_fetch_assoc($querys);

        $name = $view['name'];
        $email = $view['email'];
        $phone = $view['phone'];
        $staff_id = $view['staff_id'];
        $role = $view['role'];
        $sex = $view['sex'];

        if($sql){
            $details = mysqli_query($db, "SELECT * FROM `patients` WHERE `p_id`='".$_SESSION['search_id']."'");
            $row = mysqli_fetch_assoc($details);
            
            $p_name = $row['name'];
            $p_id = $row['p_id'];
    
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

                    <title>Profile Information - <?php echo $name ?></title>

                    <link rel="icon" href="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/images/logo-mini.png"/>
                    <link rel="stylesheet" type="text/css" media="screen" href="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/css/main.css" />
                    <link rel="stylesheet" type="text/css" media="screen" href="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/css/materialdesignicons.min.css" />
                    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
                </head>
                <body>
                    <div class="admin staff <?php echo $role?> divwrap">
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
                                        <p><i class="mdi mdi-account-outline"></i><?php echo $_SESSION['staffusername']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="profilebody-left">
                                <div class="profilebody-bottom-left">
									<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="profile" class="inhouse">
										<div class="messages">
                                            <div class="form-content">
                                                <div class="form-group">
                                                    <h3><span>Name:</span> <?php echo $p_name?></h3>
                                                    <h3><span>Patient id:</span> <?php echo $p_id?></h3>
													<?php
														if($sql){
															$details = mysqli_query($db, "SELECT * FROM `appointments` WHERE `p_id`='".$_SESSION['search_id']."'");
															if(mysqli_num_rows($details) > 0){
																$row = mysqli_fetch_assoc($details);
																echo'
																	<h3><span>Appointment date:</span> '.$row['appointment_date'].' </h3>
																	<h3><span>Appointment time:</span> '.$row['appointment_time'].' </h3>
																	<h3><span>Specialty:</span> '.$row['specialty'].' </h3>
																	<h3><span>Appointment status:</span> '.$row['request_status'].' </h3>
																	<h3><span>Doctor:</span> '.$row['doctor'].'</h3>
																';
															}else{
																echo '
																	<h3 id="alert">This patient has no appointments.</h3>
																';
															}													
														}
													?>
                                                </div>
											</div>
										</div>
										<div class="form-group">
										<?php echo '
											<a href="./config/checkin.php/?id='.$p_id.'" id="view" class="delete">Check In</a>
											<a href="./config/leave.php" id="view">Back</a>
											';
										?>
										</div>
									</form>
								</div>
                            </div>
                        </div>
                    </div>
                </body>
            </html>
        <?php
        }else{
            echo 'Error fetching data! <a href="./">Back</a>';
        };
    
    };
?>