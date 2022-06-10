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

			<title>My Appointments - <?php echo $name ?></title>
			
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
									<input name="expiry" type="date" placeholder="Expiry Date" required>
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
					<div class="profilebody-left">
					<div class="profilebody-bottom-left">
						<h1 id="adminpage-title">My appointments</h1>
						<table>
							<?php
								$result = mysqli_query($conn,"SELECT * FROM `appointments` WHERE `p_id` = '".$_SESSION['patientid']."' ");
								if(mysqli_num_rows($result) > 0){
									echo'
										<tr>
											<th></th>
											<th>Date</th>
											<th>Time</th>
											<th>Specialty</th>
											<th>Doctor</th>
											<th>Status</th>
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
													<h3>'.$return['appointment_date'].'</h3>
												</td>
												<td class="email" id="input-holder-hold">
													<h3>'.$return['appointment_time'].'</h3>
												</td>
												<td class="email" id="input-holder-hold">
													<h3>'.$return['specialty'].'</h3>
												</td>
												<td class="email" id="input-holder-hold">
													<h3>'.$return['doctor'].'</h3>
												</td>
												<td class="reply" id="input-holder-hold">
													<h3>'.$return['request_status'].'</h3>
												</td>
												';
													if($return['request_status'] == 'Awaiting payment'){
														echo '
															<td class="reply" id="input-holder-hold">
																<a href="#" id="view" class="delete pay">Pay</a>
															</td>
														';
													}
												'
											</tr>
										';
									}
								}else{
									echo '
										<div class="inhouse">
											<h3 id="alert">There are no appointments for you. <a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/patient/branches/relatives/appointments/">Book a new Appointment</a></h3>
										</div>
									';
								}
								mysqli_close($conn);
							?>
						</table>
					</div>
				</div>
			</div>
		</body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/js/jquery-2.0.3.min.js"></script>
		<script src="https://ubyjude.bitbucket.io/clinic_mgt/config/assets/js/landing.js"></script>
	</html>
<?php
    };
?>