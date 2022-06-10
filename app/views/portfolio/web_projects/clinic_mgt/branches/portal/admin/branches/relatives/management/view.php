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

            <title>System - Staff Details</title>

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
                                        $id = $_GET['name'];

                                        $sql = mysqli_query($db, "SELECT * FROM `management` WHERE `name`='".$id."'");
                                        $view = mysqli_fetch_array($sql);

                                        $name = $view['name'];
                                        $email = $view['email'];
                                        $phone = $view['phone'];
                                        $staff_id = $view['staff_id'];
                                        $role = $view['role'];
                                        $sex = $view['sex'];

                                        if($sql){
                                            $details = mysqli_query($db, "SELECT * FROM $role WHERE `name`='".$id."'");
												$row = mysqli_fetch_array($details);
												$target_file = $row['photo_name'];
												$target_dir = base64_decode($row['photo_loc']);
												$state_of_origin = $row['state_of_origin'];
												$nationality = $row['nationality'];
												$address = $row['address'];
												$state_of_residence = $row['state_of_residence'];
												$country_of_residence = $row['country_of_residence'];
                                        
                                            if($view['verified']=='0'){
                                                $verified = 'No';
                                            }else{
                                                $verified = 'Yes';
                                            }
                                            echo '
                                                <div>
                                                    <div>
                                                        <a href="../">Back</a>
                                                    </div>
                                                    <div>
                                                        <div id="image">
                                                            <div></div>
                                                            <img src="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/staff/config/assets/'.$target_dir.$target_file.'" />
                                                        </div>
                                                        <div>
                                                            <h3><span>Name</span>: '.$name.'</h3>
                                                            <h3><span>Sex</span>: '.$sex.'</h3>
                                                        </div>
                                                        <div>
                                                            <h3><span>Email</span>: '.$email.'</h3>
                                                        </div>
                                                        <div>
                                                            <h3><span>Phone</span>: '.$phone.'</h3>
                                                        </div>
                                                        <div>
                                                            <h3><span>Staff Id</span>: '.$staff_id.'</h3>
                                                        </div>
                                                        <div>
                                                            <h3><span>Role</span>: '.$role.'</h3>
                                                        </div>';
                                                        if($role=='Doctor'){
                                                            $specialty = $row['specialty'];
                                                            $license_no = $row['license_number'];
                                                        echo'
                                                            <div>
                                                                <h3><span>Specialty</span>: '.$specialty.' </h3>
                                                            </div>
                                                            <div>
                                                                <h3><span>License</span> Number: '. $license_no.' </h3>
                                                            </div>';
                                                        };
                                                        echo'
                                                        <div>
                                                            <h3><span>Verified</span>: '.$verified.'</h3>
                                                        </div>
                                                        <div>
                                                            <h3><span>State of Origin</span>: '.$state_of_origin.'</h3>
                                                        </div>
                                                        <div>
                                                            <h3><span>Country</span>: '.$nationality.'</h3>
                                                        </div>
                                                        <div>
                                                            <h3><span>Address</span>: '.$address.', '.$state_of_residence.', '.$country_of_residence.' </h3>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <a id="view" class="delete" href="../delete.php/?id='.$name.'">Delete</a>
                                                        <a id="view" href="../query.php/?name='.$name.'&email='.$email.'">Query</a>
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


