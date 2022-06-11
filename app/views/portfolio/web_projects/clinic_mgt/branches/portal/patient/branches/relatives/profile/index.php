<?php

    include('../../../../../../config/server.php');

    if (!isset($_SESSION['patientid'])){
        header('location: ../../../branches/profiles/');
    }else{

        $count = "SELECT * FROM `patients` WHERE `p_id` = '".$_SESSION['patientid']."' ";
        $query = mysqli_query($conn, $count);
        $user = mysqli_fetch_assoc($query);

        $name = $user['name'];
        $email= $user['email'];
        $phone = $user['phone'];
        $dob = $user['date_of_birth'];
        $sex = $user['sex'];
        $blood_group= $user['blood group'];
        $genotype = $user['genotype'];
        $height = $user['height'];


        if($count){
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
					
					<link rel="icon" href="/config/assets/images/logo-mini.png"/>
					<link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/main.css" />
					<link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/materialdesignicons.min.css" />
					<link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
                </head>
                <body>
                    <div class="admin patient divwrap">
						<div class="side-nav">
							<?php include_once('../../../config/nav.php') ?>
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
											<img src="/config/assets/images/logo.jpeg" alt="Logo"/>
										</div>
									</div>
								</div>
								<div class="profilenav-right">
									<div class="welcome-user">
										<p><i class="mdi mdi-account-outline"></i><?php echo $_SESSION['patientid']?><i class="mdi mdi-menu-down"></i></p>
										<?php include_once('../../../config/user_options.php') ?>
									</div>
								</div>
							</div>
                            <div class="profilebody-left">
                                <div class="profilebody-bottom-left">
                                    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="profile" class="inhouse">
										<div class="form-group header">
											<h1 id="adminpage-title">My Data</h1>
										</div>
										<div class="messages body">
                                            <div class="form-group">
                                                <h3>Name: <span><?php echo $name?></span></h3>
                                                <h3>Sex: <span><?php echo $sex?></span></h3>
                                                <h3>Patient Id: <span><?php echo $_SESSION['patientid'] ?></span></h3>
                                                <h3>Date of birth: <span><?php echo $dob ?></span></h3>
                                                <h3>Blood Group: <span><?php echo $blood_group ?></span></h3>
                                                <h3>Genotype: <span><?php echo $genotype ?></span></h3>
                                                <h3>Height: <span><?php echo $height ?></span></h3>
                                            <?php
                                                $type = mysqli_query($conn, "SELECT * FROM `inhouse` WHERE `p_id` = '".$_SESSION['patientid']."' ");
                                                $found = mysqli_fetch_assoc($type);
                                                if($found){
                                                    $position = $found['student_or_staff'];
                                                    $department = $found['department'];
                                                    $faculty = $found['faculty'];
                                                    echo'
														<h3><span>'.$position.'</span></h3>
														<h3>Department: <span>'.$department.'</span> </h3>
														<h3>Faculty: <span>'. $faculty.'</span> </h3>
                                                    ';
                                                }else{
                                                    $typeb = mysqli_query($conn, "SELECT * FROM `visiting` WHERE `p_id` = '".$_SESSION['patientid']."' ");
                                                    $foundb = mysqli_fetch_assoc($typeb);
                                                    if($foundb){
                                                        $city = $foundb['city'];
                                                        $state = $foundb['state'];
                                                        $nationality = $foundb['nationality'];
                                                        echo'
															<h3>City: <span>'.$city.'</span></h3>
															<h3>State: <span>'.$state.'</span> </h3>
															<h3>Country of Origin: <span>'. $nationality.'</span> </h3>
                                                        ';
                                                    }

                                                };
                                            ?>
                                                <h3>Email: <input type="email" value="<?php echo $email?>" required name="patientemail" placeholder="Email"/></h3>
                                                <h3>Phone: <input type="tel" value="<?php echo $phone?>" required name="patientphone" placeholder="Phone"/></h3>
                                            <div class="form-group error-hold" style="border-top: none; padding: 0px;">
                                                <?php include('../../../../../../config/errors.php'); ?>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="profile">Save Profile<i class="mdi mdi-save"></i></button>
                                            </div>
                                        </div>
									</from>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
            </html>
        <?php
        }else{
            echo 'Error fetching data! <a href="../">Back</a>';
        };
    
    };
?>