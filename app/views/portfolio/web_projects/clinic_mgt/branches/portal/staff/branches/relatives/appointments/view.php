<?php

    include ('../../../config/server.php');
    
    if (!isset($_SESSION['staffid'])){
        header('location:../../../login/');
    }else{
		$id = $_GET['id'];
		
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

                <title>Appointment Information</title>

                <link rel="icon" href="http://localhost/cms/config/assets/images/logo-mini.png"/>
                <link rel="stylesheet" type="text/css" media="screen" href="http://localhost/cms/config/assets/css/main.css" />
                <link rel="stylesheet" type="text/css" media="screen" href="http://localhost/cms/config/assets/css/materialdesignicons.min.css" />
                <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
            </head>
            <body>
                <div class="admin staff <?php echo $role?> divwrap">
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
											<img src="http://localhost/cms/config/assets/images/logo.jpeg" alt="Logo"/>
										</div>
									</div>
								</div>
								<div class="profilenav-right">
									<div class="welcome-user">
										<p><i class="mdi mdi-account-outline"></i><?php echo $_SESSION['staffid']?><i class="mdi mdi-menu-down"></i></p>
										<?php include_once('../../../config/user_options.php') ?>
									</div>
								</div>
							</div>
						</div>
                        <div class="profilebody-left">
                            <div class="profilebody-bottom-left">
                                <div class="form-content">
									<div>
									<?php echo'
										<a href="../end.php/?id='.$id.'" id="view" class="delete">End</a>
										<a href="../request.php/?id='.$id.'" id="view" class="delete">Request test</a>
										<a href="../start.php/?id='.$id.'" id="view">Start</a>
										<a href="../" id="view">Cancel</a>
										';
									?>
									</div>
									<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="contact" class="inhouse">
										<?php
											$contact_query = mysqli_query($db, "SELECT `p_id`, `name` FROM `patients` WHERE `p_id` = '".$id."'");
											$contact = mysqli_fetch_assoc($contact_query);

											$p_name = $contact['name'];
											$p_id = $contact['p_id'];
										?>
										<h3><span>Name:</span> <?php echo $p_name?></h3>
										<h3><span>Patient id:</span> <?php echo $p_id?></h3>
									</form>
									<div class="form-group">
										<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="work">
											<fieldset>
												<legend>Test Results</legend>
												<?php
													$lab_query = mysqli_query($db, "SELECT `attendant`, `result` FROM `lab_results` WHERE `p_id` = '".$id."' AND `doctor`='".$_SESSION['staffid']."' ");
													$lab = mysqli_fetch_assoc($lab_query);

													$attendant = $lab['attendant'];
													$results = base64_decode($lab['results']);
													
													if(mysqli_num_rows($lab_query) > 0){
														foreach ($results as $lab_result){
															echo '<p>'.$lab_result.'</p>';
														}
													}else{
														echo '
															<h3 id="alert">Sorry, patient has no lab results for this appointment.</h3>
														';
													}
												?>
											</fieldset>
										</form>
										<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="about">
											<fieldset>
												<legend>Diagnosis</legend>
												<?php
													$diag_query = mysqli_query($db, "SELECT `diagnosis` FROM `medical_history` WHERE `p_id` = '".$id."' AND `doctor`='".$_SESSION['staffid']."' ");
													$diag = mysqli_fetch_assoc($diag_query);

													$results = base64_decode($diag['diagnosis']);
													
													if(mysqli_num_rows($diag_query) > 0){
														foreach ($results as $diagnosis_result){
															echo '<p><input type="text" name="diagnosis[]" value="'.$diagnosis_result.'"></p>';
														}
													}else{
														echo '
															<h3 id="alert">Sorry, no diagnosis yet.</h3>
														';
													}
												?>
												<div class="form-group">
													<input type="text" name="diagnosis[]" required>
													<input type="text" name="diagnosis[]" required>
													<input type="text" name="diagnosis[]" required>
												</div>
												<div class="form-group">
													<button type="submit" name="save-diag">Save</button>
												</div>
											</fieldset>
										</form>
										<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="specialties">
											<fieldset>
												<legend>Prescription</legend>
												<?php
													$presc_query = mysqli_query($db, "SELECT `prescriptions` FROM `medical_history` WHERE `p_id` = '".$id."' AND `doctor`='".$_SESSION['staffid']."' ");
													$presc = mysqli_fetch_assoc($presc_query);

													$results = base64_decode($presc['prescription']);
													
													if(mysqli_num_rows($presc_query) > 0){
														foreach ($results as $prescription_result){
															echo '<p><input type="text" name="prescription[]" value="'.$prescription_result.'"></p>';
														}
													}else{
														echo '
															<h3 id="alert">Sorry, no prescription yet.</h3>
														';
													}
												?>
												<div class="form-group">
													<input type="text" name="prescription[]" required>
													<input type="text" name="prescription[]" required>
													<input type="text" name="prescription[]" required>
												</div>
												<div class="form-group">
													<button type="submit" name="save-presc">Save</button>
												</div>
											</fieldset>
										</form>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="http://localhost/cms/config/assets/js/jquery-2.0.3.min.js"></script>
            <script src="http://localhost/cms/config/assets/js/landing.js"></script>
        </html>
<?php
				}
    }
?>