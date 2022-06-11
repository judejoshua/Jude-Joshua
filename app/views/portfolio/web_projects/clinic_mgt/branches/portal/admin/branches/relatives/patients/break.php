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

            <title>System - Patients</title>

            <link rel="icon" href="/config/assets/images/logo-mini.png"/>
            <link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/main.css" />
            <link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/materialdesignicons.min.css" />
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
											<img src="/config/assets/images/logo.jpeg" alt="Logo"/>
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
                    <?php
                        if ($id=='inhouse'){
                            echo'
                                <div class="profilebody-left">
                                    <div class="profilebody-bottom-left">
                                        <h1 id="adminpage-title">School patients</h1>
                                        <table>';
                                            $result = mysqli_query($db,"SELECT * FROM $id ");
                                            if(mysqli_num_rows($result) > 0){
                                                echo'
                                                    <tr>
                                                        <th></th>
                                                        <th>Name</th>
                                                        <th>Patient ID</th>
                                                        <th>Role</th>
                                                        <th>Department</th>
                                                        <th>Faculty</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                ';
                                                while($return = mysqli_fetch_array($result)){
                                                    $p_result = mysqli_query($db,"SELECT * FROM `patients` WHERE `p_id`='".$return['p_id']."' ");
                                                    $p_return = mysqli_fetch_assoc($p_result);
                                                    $p_name = $p_return['name'];
                                                    echo'
                                                        <tr>
                                                            <td class="name" id="input-holder-hold">
                                                                <h3>*</h3>
                                                            </td>
                                                            <td class="name" id="input-holder-hold">
                                                                <h3>'.$p_name.'</h3>
                                                            </td>
                                                            <td class="email" id="input-holder-hold">
                                                                <h3>'.$return['p_id'].'</h3>
                                                            </td>
                                                            <td class="position" id="input-holder-hold">
                                                                <h3>'.$return['student_or_staff'].'</h3>
                                                            </td>
                                                            <td class="department" id="input-holder-hold">
                                                                <h3>'.$return['department'].'</h3>
                                                            </td>
                                                            <td class="faculty" id="input-holder-hold">
                                                                <h3>'.$return['faculty'].'</h3>
                                                            </td>
                                                            <td class="reply" id="input-holder-hold">
                                                                <a id="view" href="../view.php/?id='.$return['p_id'].'">View</a>
                                                            </td>
                                                            <td class="reply" id="input-holder-hold">
                                                                <a id="view" class="delete" href="../delete.php/?id='.$return['p_id'].'">Delete</a>
                                                            </td>
                                                        </tr>
                                                    ';
                                                }
                                            }else{
                                                echo '
                                                    <tr>
                                                        <td class="name" id="input-holder-hold">
                                                            <h3>There are currently no school patients.</h3>
                                                        </td>
                                                    </tr>
                                                ';
                                            }
                                            mysqli_close($db);
                                            '
                                        </table>
                                    </div>
                                </div>
                            ';
                        }elseif ($id=='visiting'){
                            echo'
                                <div class="profilebody-left">
                                    <div class="profilebody-bottom-left">
                                        <h1 id="adminpage-title">Visiting patients</h1>
                                        <table>';
                                            $result = mysqli_query($db,"SELECT * FROM $id ");
                                            if(mysqli_num_rows($result) > 0){
                                                echo'
                                                    <tr>
                                                        <th></th>
                                                        <th>Name</th>
                                                        <th>Patient ID</th>
                                                        <th>City</th>
                                                        <th>State</th>
                                                        <th>Nationality</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                ';
                                                while($return = mysqli_fetch_array($result)){
                                                    $p_result = mysqli_query($db,"SELECT * FROM `patients` WHERE `p_id`='".$return['p_id']."' ");
                                                    $p_return = mysqli_fetch_assoc($p_result);
                                                    $p_name = $p_return['name'];
                                                    echo'
                                                        <tr>
                                                            <td class="name" id="input-holder-hold">
                                                                <h3>*</h3>
                                                            </td>
                                                            <td class="name" id="input-holder-hold">
                                                                <h3>'.$p_name.'</h3>
                                                            </td>
                                                            <td class="email" id="input-holder-hold">
                                                                <h3>'.$return['p_id'].'</h3>
                                                            </td>
                                                            <td class="position" id="input-holder-hold">
                                                                <h3>'.$return['city'].'</h3>
                                                            </td>
                                                            <td class="department" id="input-holder-hold">
                                                                <h3>'.$return['state'].'</h3>
                                                            </td>
                                                            <td class="faculty" id="input-holder-hold">
                                                                <h3>'.$return['nationality'].'</h3>
                                                            </td>
                                                            <td class="reply" id="input-holder-hold">
                                                                <a id="view" href="../view.php/?id='.$return['p_id'].'">View</a>
                                                            </td>
                                                            <td class="reply" id="input-holder-hold">
                                                                <a id="view" class="delete" href="../delete.php/?id='.$return['p_id'].'">Delete</a>
                                                            </td>
                                                        </tr>
                                                    ';
                                                }
                                            }else{
                                                echo '
                                                    <tr>
                                                        <td class="name" id="input-holder-hold">
                                                            <h3>There are currently no visiting patients.</h3>
                                                        </td>
                                                    </tr>
                                                ';
                                            }
                                            mysqli_close($db);
                                            '
                                        </table>
                                    </div>
                                </div>
                            ';
                        }else{
                            echo'
                            <div class="profilebody-left">
                                <div class="profilebody-bottom-left">
                                    <h1 id="adminpage-title">There was an error retriving patient data!!</h1>
                                </div>
                            </div>
                            ';
                        }
                    ?>
                </div>
            </div>
        </body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="/config/assets/js/jquery-2.0.3.min.js"></script>
        <script src="/config/assets/js/landing.js"></script>
    </html>
<?php
}
?>