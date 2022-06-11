<?php

    include('../../../config/server.php');

    if (!isset($_SESSION['staffid'])){
        header('location:../../login/');
    }else{
        $role = $_SESSION['staffrole'];

        $sql = "SELECT * FROM $role WHERE `name`= '".$_SESSION['staffid']."' ";
        $querys = mysqli_query($db, $sql);
        $view = mysqli_fetch_assoc($querys);

        $name = $view['name'];
        if($role == 'Doctor'){
            $specialty = $view['specialty'];
        }
        
        if($sql){

                $details = mysqli_query($db, "SELECT `photo_name`,`photo_loc` FROM `$role` WHERE `name`='".$_SESSION['staffid']."'");
                $row = mysqli_fetch_assoc($details);
                
                $target_file = $row['photo_name'];
                $target_dir = base64_decode($row['photo_loc']);
    
    
    
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

                    <title>Appointments - <?php echo $name ?></title>

                    <link rel="icon" href="/config/assets/images/logo-mini.png"/>
                    <link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/main.css" />
                    <link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/materialdesignicons.min.css" />
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
											<img src="/config/assets/images/logo.jpeg" alt="Logo"/>
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
                                    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="appointments">
                                        <fieldset>
                                            <legend>New requests</legend>
                                                <?php
                                                    $new_query = mysqli_query($db, "SELECT `p_id`,`appointment_date`,`appointment_time`,`specialty` FROM `appointments` WHERE `request_status`='awaiting approval' AND `specialty`='".$specialty."' ORDER BY `appointment_date` ASC");
                                                    if(mysqli_num_rows($new_query) > 0){
                                                        echo'
                                                        <table>
                                                            <tr>
                                                                <th>Patient</th>
                                                                <th>Date</th>
                                                                <th>Time</th>
                                                                <th></th>
                                                            </tr>    
                                                        ';
                                                        while($return = mysqli_fetch_array($new_query)){
                                                            echo'
                                                                <tr>
                                                                    <td class="p_id" id="input-holder-hold">
                                                                        <h3>'.$return['p_id'].'</h3>
                                                                    </td>
                                                                    <td class="date" id="input-holder-hold">
                                                                        <h3>'.$return['appointment_date'].'</h3>
                                                                    </td>
                                                                    <td class="time" id="input-holder-hold">
                                                                        <h3>'.$return['appointment_time'].'</h3>
                                                                    </td>
                                                                    <td class="reply" id="input-holder-hold">
                                                                        <a id="view" href="approve.php/?id='.$return['p_id'].'">Approve</a>
                                                                    </td>
                                                                </tr>
                                                            ';
                                                        }
                                                    }else{
                                                        echo'
                                                            <tr>
                                                                <h3 id="alert">There are currently no appointment requests for your specialty.</h3>
                                                            </tr>
                                                        ';
                                                    }
                                                ?>
                                            </table>
                                        </fieldset>
                                        <fieldset>
                                            <legend>My Appointments</legend>
                                            <table>
                                                <?php
                                                    $new_query = mysqli_query($db, "SELECT `p_id`,`appointment_date`,`appointment_time`, `doctor`, `request_status` FROM `appointments` WHERE `doctor`='".$name."' AND `request_status`!='awaiting approval' AND `request_status`!='completed' ORDER BY `appointment_date` ASC");
                                                    if(mysqli_num_rows($new_query) > 0){
                                                        echo'
                                                            <tr>
                                                                <th>Patient</th>
                                                                <th>Date</th>
                                                                <th>Time</th>
                                                                <th>Status</th>
                                                                <th></th>
                                                            </tr>    
                                                        ';
                                                        while($return = mysqli_fetch_array($new_query)){
                                                            echo'
                                                                <tr>
                                                                    <td class="p_id" id="input-holder-hold">
                                                                        <h3>'.$return['p_id'].'</h3>
                                                                    </td>
                                                                    <td class="date" id="input-holder-hold">
                                                                        <h3>'.$return['appointment_date'].'</h3>
                                                                    </td>
                                                                    <td class="time" id="input-holder-hold">
                                                                        <h3>'.$return['appointment_time'].'</h3>
                                                                    </td>
                                                                    <td class="status" id="input-holder-hold">
                                                                        <h3>'.$return['request_status'].'</h3>
                                                                    </td>
                                                                    <td class="reply" id="input-holder-hold">
                                                                        <a id="view" href="view.php/?id='.$return['p_id'].'">View</a>
                                                                    </td>
                                                                </tr>
                                                            ';
                                                        }
                                                    }else{
                                                        echo'
                                                            <tr>
                                                                <h3 id="alert">You do not have any ongoing appointments.</h3>
                                                            </tr>
                                                        ';
                                                    }
                                                ?>
                                            </table>
                                        </fieldset>
                                        <fieldset>
                                            <legend>My Past Sessions</legend>
                                                <?php
                                                    $new_query = mysqli_query($db, "SELECT `p_id`,`appointment_date`,`appointment_time`, `doctor`, `request_status` FROM `appointments` WHERE `request_status`='completed' AND `doctor`='".$name."' ORDER BY `appointment_date` ASC");
                                                    if(mysqli_num_rows($new_query) > 0){
                                                        echo'
                                                        <table>
                                                            <tr>
                                                                <th>Patient</th>
                                                                <th>Date</th>
                                                                <th>Time</th>
                                                                <th>Status</th>
                                                            </tr>    
                                                        ';
                                                        while($return = mysqli_fetch_array($new_query)){
                                                            echo'
                                                                <tr>
                                                                    <td class="p_id" id="input-holder-hold">
                                                                        <h3>'.$return['p_id'].'</h3>
                                                                    </td>
                                                                    <td class="date" id="input-holder-hold">
                                                                        <h3>'.$return['appointment_date'].'</h3>
                                                                    </td>
                                                                    <td class="time" id="input-holder-hold">
                                                                        <h3>'.$return['appointment_time'].'</h3>
                                                                    </td>
                                                                    <td class="status" id="input-holder-hold">
                                                                        <h3>'.$return['request_status'].'</h3>
                                                                    </td>
                                                                </tr>
                                                            ';
                                                        }
                                                    }else{
                                                        echo'
                                                            <tr>
                                                                <h3 id="alert">You do not have any past appointments.</h3>
                                                            </tr>
                                                        ';
                                                    }
                                                ?>
                                            </table>
                                        </fieldset>
                                    </form>
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