<?php

    include('../../../config/server.php');

    if (!isset($_SESSION['staffid'])){
        header('location:../../login/');
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
            $details = mysqli_query($db, "SELECT * FROM `$role` WHERE `name`='".$_SESSION['staffid']."'");
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

                    <title>Profile Information - <?php echo $name ?></title>

                    <link rel="icon" href="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/images/logo-mini.png"/>
                    <link rel="stylesheet" type="text/css" media="screen" href="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/css/main.css" />
                    <link rel="stylesheet" type="text/css" media="screen" href="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/css/materialdesignicons.min.css" />
                    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
                </head>
                <body>
                    <div class="admin staff <?php echo $role?> divwrap">
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
											<img src="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/images/logo.jpeg" alt="Logo"/>
										</div>
									</div>
								</div>
                                <div class="profilenav-right">
                                    <div class="welcome-user">
                                        <p><i class="mdi mdi-account-outline"></i><?php echo $_SESSION['staffusername']?><i class="mdi mdi-menu-down"></i></p>
                                        <?php include_once('../../../config/user_options.php') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="profilebody-left">
                                <div class="profilebody-bottom-left">
                                    <div class="messages">
                                        <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                            <div class="img form-group">
                                                <div></div>
                                                <input type="hidden" value="<?php echo $role?>" required name="staffrole"/>
                                                <input type="hidden" value="<?php echo $name?>" required name="staffname"/>
                                                <img src="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/staff/config/assets/<?php echo $target_dir.$target_file ?>" id="output"/>
                                                <input type="file" name="staffimg" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" required/>
                                            </div>
                                            <div class="form-group error-hold" style="border-top: none; padding: 0px;">
                                                <?php include('../../../config/errors.php'); ?>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="pichure">Save Photo<i class="mdi mdi-save"></i></button>
                                            </div>
                                        </form>
                                        <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="profile">
                                            <div class="form-content">
                                                <div class="form-group">
                                                    <h3><span>Name:</span> <?php echo $name?></h3>
                                                    <h3><span>Sex:</span> <?php echo $sex?></h3>
                                                    <h3><span>Email:</span> <input type="email" value="<?php echo $email?>" required name="staffemail" placeholder="Email"/></h3>
                                                    <input type="hidden" value="<?php echo $role?>" required name="staffrole"/>
                                                    <input type="hidden" value="<?php echo $name?>" required name="staffname"/>
                                                    <h3><span>Phone:</span> <input type="tel" value="<?php echo $phone?>" required name="staffphone" placeholder="Phone"/></h3>
                                                    <h3><span>Staff Id:</span> <?php echo $staff_id ?></h3>
                                                    <h3><span>Role:</span> <?php echo $role ?></h3>
                                                <?php
                                                if($_SESSION['staffrole']=='Doctor'){
                                                    $specialty = $row['specialty'];
                                                    $license_no = $row['license_number'];
                                                    echo'
                                                        <h3><span>Specialty:</span> '.$specialty.' </h3>
                                                        <h3><span>License Number:</span> '. $license_no.' </h3>
                                                    ';
                                                };?>
                                                    <h3><span>State of Origin:</span> <?php echo $state_of_origin ?></h3>
                                                    <h3><span>Country:</span> <?php echo $nationality ?></h3>
                                                    <h3><span>Address:</span> <input type="text" value="<?php echo $address?>" required name="staffaddress" placeholder="address"/></h3>
                                                    <h3><span>State:</span> <input type="text" value="<?php echo $state_of_residence?>" name="staffaddress_state" required placeholder="State of residence"/></h3>
                                                    <h3><span>Country:</span> <input type="text" value="<?php echo $country_of_residence?>" name="staffaddress_country" required placeholder="Country of residence"> </h3>
                                                </div>
                                                <div class="form-group error-hold" style="border-top: none; padding: 0px;">
                                                    <?php include('../../../config/errors.php'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="profile">Save Profile<i class="mdi mdi-save"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
            </html>
        <?php
        }else{
            echo 'Error fetching data! <a href="../../../">Back</a>';
        };
    
    };
?>