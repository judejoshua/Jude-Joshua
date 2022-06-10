<?php

    include ('../../../../../../config/server.php');
    
    if (!isset($_SESSION['patientid'])){
        header('location:../../../../../login/');
    }else{
        $count = "SELECT * FROM `patients` WHERE `p_id` = '".$_SESSION['patientid']."' ";
        $query = mysqli_query($conn, $count);
        $row = mysqli_fetch_assoc($query);

        $name = $row['name'];
        $email= $row['email'];
        $phone = $row['phone'];
        $dob = $row['date_of_birth'];
        $sex = $row['sex'];
        $blood_group= $row['blood group'];
        $genotype = $row['genotype'];
        $height = $row['height'];

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

			<title>Book an Appointment - <?php echo $name ?></title>
			
			<link rel="icon" href="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/images/logo-mini.png"/>
			<link rel="stylesheet" type="text/css" media="screen" href="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/css/main.css" />
			<link rel="stylesheet" type="text/css" media="screen" href="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/css/materialdesignicons.min.css" />
			<link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
		</head>
		<body>
			<div class="payment fade">
				<div>
					<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="inhouse">
						<a href="#" id="exit"><i class="mdi mdi-close"></i></a>
						<div class="messages pays">
							<div class="form-group">
								<label for="card_number">Card Number</label>
								<input name="card_number" type="tel" maxlength="19" placeholder="Card Number" required>
								<input name="name" type="hidden" value="<?php echo $name?>">
							</div>
							<div class="form-group">
								<div class="form-group-minor">
									<label for="expiry">Expiry date</label>
									<input name="expiry" type="date" min="09/08/2019" placeholder="Expiry Date" required>
								</div>
								<div class="form-group-minor">
									<label for="ccv">CCV</label>
									<input name="ccv" type="tel" maxlength="3" placeholder="CCV" required>
								</div>
							</div>
							<div class="form-group error-hold" style="border-top: none; padding: 0px;">
								<?php include('../../../../../../config/errors.php'); ?>
							</div>
							<div class="form-group">
								<button type="submit" name="pay_now">Pay Now<span>1, 500NGN</span></button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="admin divwrap patient">
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
								<p><i class="mdi mdi-account-outline"></i><?php echo $_SESSION['patientid']?><i class="mdi mdi-menu-down"></i></p>
								<?php include_once('../../../config/user_options.php') ?>
							</div>
						</div>
					</div>
						<?php
							$user_checker = "SELECT `p_id`, `request_status` FROM `appointments` WHERE `p_id` = '".$_SESSION['patientid']."' AND `request_status` = 'Awaiting approval'";
							$result = mysqli_query($conn, $user_checker);
							$user = mysqli_fetch_assoc($result);        
							if ($user) {
								$status = $user['request_status'];
								echo '
									<div class="profilebody-left">
										<div class="profilebody-bottom-left">
											<form class="inhouse">
												<h3 id="alert">Your appointment request was submitted successfully and is '; echo $status.'. Please check again in few minutes.</h3>
											</form>
										</div>
									</div>
								';
							}else{
								$user_checker = "SELECT `p_id`, `request_status` FROM `appointments` WHERE `p_id` = '".$_SESSION['patientid']."' AND `request_status` = 'Awaiting payment'";
								$result = mysqli_query($conn, $user_checker);
								$user = mysqli_fetch_assoc($result);
								if ($user) {
									echo'
										<div class="profilebody-left">
											<div class="profilebody-bottom-left">
												<form class="inhouse">
													<h3 id="alert">Your appointment request has been approved and is currently '; echo $user['request_status'].'.</h3>
													<p>Click <a id="wait" href="#" class="pay">here</a> to make payment.</p>
												</form>
											</div>
										</div>
									';
								}else{
									$type = mysqli_query($conn, "SELECT * FROM `inhouse` WHERE `p_id` = '".$_SESSION['patientid']."' ");
									$found = mysqli_fetch_assoc($type);
									if($found){
										$position = $found['student_or_staff'];
										$department = $found['department'];
										$faculty = $found['faculty'];
										$typ = 'Inhouse';
										echo'
											<div class="profilebody-left">
												<div class="profilebody-bottom-left">
													<form method="POST" action="./" name="login" class="inhouse">
														<div class="form-group header">
															<h1 id="adminpage-title">Book an Appointment</h1>
															<p><span>Note: </span>We charge 1, 500 NGN as appointment fee for all our appointments.<a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/patient/branches/relatives/appointments/view.php">View appointments</a></p>
														</div>
														<div class="messages body">
															<div class="form-group">
																<label>Name:</label>
																<input required type="text"  value="'; if(isset($_POST['iappointment-submit'])){ echo $_POST['name']; }else{ echo $name; } echo'" name="name" placeholder="Name" readonly>
																<i class="mdi mdi-account"></i>
															</div>
															<div class="form-group">
																<label>ID:</label>
																<input required type="text"  value="'; if(isset($_POST['iappointment-submit'])){ echo $_POST['p_id']; }else{ echo $_SESSION['patientid']; } echo'" name="p_id" placeholder="Patient ID" readonly>
																<i class="mdi mdi-account"></i>
															</div>
															<div class="form-group">
																<label>Position:</label>
																<input required type="text" value="'; if(isset($_POST['iappointment-submit'])){ echo $_POST['position']; }else{ echo $position; } echo'" name="position" readonly placeholder="Position">
																<i class="mdi mdi-account-multiple"></i>
															</div>
															<div class="form-group">
																<label>Department:</label>
																<input required type="text" value="'; if(isset($_POST['iappointment-submit'])){ echo $_POST['department']; }else{ echo $department; } echo'" name="department" readonly placeholder="Department">
																<i class="mdi mdi-school"></i>
															</div>
															<div class="form-group">
																<label>Faculty:</label>
																<input required type="text" value="'; if(isset($_POST['iappointment-submit'])){ echo $_POST['faculty']; }else{ echo $faculty; } echo'" name="faculty" readonly placeholder="Faculty">
																<i class="mdi mdi-home-city"></i>
															</div>
															<div class="form-group">
																<label>Email:</label>
																<input required type="email" value="'; if(isset($_POST['iappointment-submit'])){ echo $_POST['email']; }else{ echo $email; } echo'" name="email" placeholder="Email">
																<i class="mdi mdi-email"></i>
															</div>
															<div class="form-group">
																<label>Phone:</label>
																<input required type="tel" value="'; if(isset($_POST['iappointment-submit'])){ echo $_POST['phone']; }else{ echo $phone; } echo'" name="phone" placeholder="Phone">
																<i class="mdi mdi-phone"></i>
															</div>
															<div class="form-group">
																<label>Appointment Date:</label>
																<input required type="date" value="'; if(isset($_POST['iappointment-submit'])){ echo $_POST['date']; } echo'" name="date" placeholder="Choose Date">
																<i class="mdi mdi-calendar"></i>
															</div>
															<div class="form-group">
																<label>Appointment Time:</label>
																<input required type="time" name="time" value="'; if(isset($_POST['iappointment-submit'])){ echo $_POST['time']; } echo'" placeholder="Choose Time">
																<i class="mdi mdi-clock"></i>
															</div>
															<div class="form-group">
																<label>Specialty:</label>
																<input required type="text" value="'; if(isset($_POST['iappointment-submit'])){ echo $_POST['specialty']; } echo'" name="specialty" list="specialty" placeholder="Choose Specialty">
																<datalist id= "specialty">
																	'; include('../../../../../../config/check.php');'
																</datalist>
																<i class="mdi mdi-file-tree"></i>
															</div>
															<div class="form-group success-hold" style="padding: 0px;">
																'; include('../../../../../../config/errors.php'); echo'
															</div>
															<button name="iappointment-submit" type="submit">Submit<i class="mdi mdi-arrow-right"></i></button>
														</div>
													</form>
												</div>
											</div>
										';
									}else{
										$typeb = mysqli_query($conn, "SELECT * FROM `visiting` WHERE `p_id` = '".$_SESSION['patientid']."' ");
										$foundb = mysqli_fetch_assoc($typeb);
										if($foundb){
											$city = $foundb['city'];
											$state = $foundb['state'];
											$nationality = $foundb['nationality'];
											$typ = 'Visiting';
											echo'
												<div class="profilebody-left">
													<div class="profilebody-bottom-left">
														<form method="POST" action="./" class="visiting">
															<div class="form-group header">
																<h1 id="adminpage-title">Book an Appointment</h1>
																<p><span>Note: </span>We charge 1, 500 NGN as appointment fee for all our appointments.<a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/patient/branches/relatives/appointments/view.php">View appointments</a></p>
															</div>
															<div class="messages body">
																<div class="form-group">
																	<label>Name:</label>
																	<input required type="text"  value="'; if(isset($_POST['vappointment-submit'])){ echo $_POST['name']; }else{ echo $name; } echo'" name="name" placeholder="Name" readonly>
																	<input required type="hidden"  value="'; echo $typ; echo'" name="type" readonly>
																	<i class="mdi mdi-account"></i>
																</div>
																<div class="form-group">
																	<label>ID:</label>
																	<input required type="text"  value="'; if(isset($_POST['vappointment-submit'])){ echo $_POST['p_id']; }else{ echo $_SESSION['patientid']; } echo'" name="p_id" placeholder="Patient ID" readonly>
																	<i class="mdi mdi-account"></i>
																</div>
																<div class="form-group">
																	<label>Email:</label>
																	<input required type="email" value="'; if(isset($_POST['vappointment-submit'])){ echo $_POST['email']; }else{ echo $email; } echo'" name="email" placeholder="Email">
																	<i class="mdi mdi-email"></i>
																</div>
																<div class="form-group">
																	<label>Phone:</label>
																	<input required type="tel" value="'; if(isset($_POST['vappointment-submit'])){ echo $_POST['phone']; }else{ echo $phone; } echo'" name="phone" placeholder="Phone">
																	<i class="mdi mdi-phone"></i>
																</div>
																<div class="form-group">
																	<label>City:</label>
																	<input required type="text" value="'; if(isset($_POST['vappointment-submit'])){ echo $_POST['city']; }else{ echo $city; } echo'" name="city" readonly placeholder="City">
																	<i class="mdi mdi-account-multiple"></i>
																</div>
																<div class="form-group">
																	<label>State:</label>
																	<input required type="text" value="'; if(isset($_POST['vappointment-submit'])){ echo $_POST['state']; }else{ echo $state; } echo'" name="state" readonly placeholder="State">
																	<i class="mdi mdi-school"></i>
																</div>
																<div class="form-group">
																	<label>Nationality:</label>
																	<input required type="text" value="'; if(isset($_POST['vappointment-submit'])){ echo $_POST['nationality']; }else{ echo $nationality; } echo'" name="nationality" readonly placeholder="Nationlity">
																	<i class="mdi mdi-home-city"></i>
																</div>
																<div class="form-group">
																	<label>Appointment Date:</label>
																	<input required type="date" value="'; if(isset($_POST['vappointment-submit'])){ echo $_POST['date']; } echo'" name="date" placeholder="Choose Date">
																	<i class="mdi mdi-calendar"></i>
																</div>
																<div class="form-group">
																	<label>Appointment Time:</label>
																	<input required type="time" name="time" value="'; if(isset($_POST['vappointment-submit'])){ echo $_POST['time']; } echo'" placeholder="Choose Time">
																	<i class="mdi mdi-clock"></i>
																</div>
																<div class="form-group">
																	<label>Specialty:</label>
																	<input required type="text" value="'; if(isset($_POST['vappointment-submit'])){ echo $_POST['specialty']; } echo'" name="specialty" list="specialty" placeholder="Choose Specialty">
																	<datalist id= "specialty">
																		'; include('../../../../../../config/check.php');'
																	</datalist>
																	<i class="mdi mdi-file-tree"></i>
																</div>
																<div class="form-group success-hold" style="padding: 0px;">
																	'; include('../../../../../../config/errors.php'); echo'
																</div>
																<button name="vappointment-submit" type="submit">Submit<i class="mdi mdi-arrow-right"></i></button>
															</div>
														</form>
													</div>
												</div>
											';
										}
									};
								?>
				<?php
								}
				?>
			</div>
			</div>
		</body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/js/jquery-2.0.3.min.js"></script>
		<script src="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/js/landing.js"></script>
	</html>
<?php
        }
    };
?>