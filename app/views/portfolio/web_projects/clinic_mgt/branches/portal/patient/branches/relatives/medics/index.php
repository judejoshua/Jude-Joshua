<?php

    include ('../../../../../../config/server.php');
    
    if (!isset($_SESSION['patientid'])){
        header('location:../../../../../login/');
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

                <title>Medical History - <?php echo $name ?></title>
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
                                <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="change" class="inhouse">
                                    <div class="form-content">
										<div class="messages">
											<div class="form-group header">
												<h1 id="adminpage-title">Medical history</h1>
											</div>
											<table>
											<?php
												$result = mysqli_query($conn,"SELECT * FROM `medical_history` ");
												if(mysqli_num_rows($result) > 0){
													echo'
														<tr>
															<th></th>
															<th>Doctor</th>
															<th>Diagnosis</th>
															<th>Prescriptions</th>
														</tr>
													';
													//output data of each row
													while($return = mysqli_fetch_array($result)){
														echo'
															<tr>
																<td class="email" id="input-holder-hold">
																	<h3>*</h3>
																</td>
																<td class="email" id="input-holder-hold">
																	<h3>'.$return['doctor'].'</h3>
																</td>
																<td class="email" id="input-holder-hold">
																	<h3>'.$return['diagnosis'].'</h3>
																</td>
																<td class="email" id="input-holder-hold">
																	<h3>'.$return['prescriptions'].'</h3>
																</td>
															</tr>
														';
													}
												}else{
													echo '
														<h3 id="alert">You dont have any online records yet.</h3>
													';
												}
												mysqli_close($conn);
												?>
											</table>
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