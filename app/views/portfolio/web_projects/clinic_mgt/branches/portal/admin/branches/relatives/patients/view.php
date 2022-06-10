<?php

include ('../../../config/server.php');

if (!isset($_SESSION['adminid'])){
    header('location:../../login/');
}else{

$id = $_GET['id'];

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

            <title>System - School patients</title>

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
                            <div class="form-content contact">
                                <div class="messages">
                                    <?php
                                        $id = $_GET['id'];

                                        $sql = mysqli_query($db, "SELECT * FROM `patients` WHERE `p_id`='".$id."'");
                                        $view = mysqli_fetch_array($sql);

                                        $name = $view['name'];
                                        $p_id = $view['p_id'];
                                        $email = $view['email'];
                                        $phone = $view['phone'];
                                        $date_of_birth = $view['date_of_birth'];
                                        $sex = $view['sex'];
                                        $blood_group = $view['blood group'];
                                        $genotype = $view['genotype'];
                                        $height = $view['height'];

                                        if($sql){
                                            echo '
                                                <div>
                                                    <div>
                                                        <a href="../">Back</a>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <h3><span>Name:</span> '.$name.'</h3>
                                                            <h3><span>Patient Id:</span> '.$p_id.'</h3>
                                                            <h3><span>Sex:</span> '.$sex.'</h3>
                                                            <h3><span>Email:</span> '.$email.'</h3>
                                                            <h3><span>Phone:</span> '.$phone.'</h3>
                                                            <h3><span>Date of birth:</span> '.$date_of_birth.'</h3>
                                                            <h3><span>Blood group:</span> '.$blood_group.'</h3>
                                                            <h3><span>Genotype:</span> '.$genotype.'</h3>
                                                            <h3><span>Height:</span> '.$height.'</h3>
                                                        </div>';
                                                        $details = mysqli_query($db, "SELECT * FROM `inhouse` WHERE `p_id`='".$id."' LIMIT 1");
                                                        $count_details = mysqli_num_rows($details);
                                                        if($count_details == 1){
                                                            $show = mysqli_fetch_array($details);
                                                            $position = $show['student_or_staff'];
                                                            $department = $show['department'];
                                                            $faculty = $show['faculty'];            
                                                            echo'
                                                                <h3><span>Position:</span> '.$position.'</h3>
                                                                <h3><span>Department:</span> '.$department.'</h3>
                                                                <h3><span>Faculty:</span> '.$faculty.'</h3>
                                                            ';
                                                        }else{
                                                            $x_details = mysqli_query($db, "SELECT * FROM `visiting` WHERE `p_id`='".$id."' LIMIT 1");
                                                            $show_x = mysqli_fetch_array($x_details);
                                                            $city = $show_x['city'];
                                                            $state = $show_x['state'];
                                                            $nationality = $show_x['nationality'];
                                                            echo'
                                                                <h3><span>City:</span> '.$city.'</h3>
                                                                <h3><span>State:</span> '.$state.'</h3>
                                                                <h3><span>Nationality:</span> '.$nationality.'</h3>
                                                            ';
                                                        }
                                                        echo'
                                                    </div>
                                                </div>
                                            ';
                                        }else{
                                            echo 'Error fetching data! <a href="../">Back</a>';
                                        };

                                    ?>
                                </div>
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


