<?php

    include ('../../config/server.php');
	
	$read = "SELECT * FROM `contact_info`";
    $reader = mysqli_query($conn, $read);
    $show = mysqli_fetch_assoc($reader);

    $about = base64_decode($show['about']);
    $loc = $show['location'];
    $city = $show['city'];
    $state = $show['state'];
    $country = $show['country'];
    $email = $show['email'];
    $tel = $show['phone'];


    if (isset($_SESSION['patientid'])){
        header('location:../portal/patient/');
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

                    <title>Patient Registration</title>
        
                    <link rel="icon" href="/config/assets/images/logo-mini.png"/>
                    <link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/main.css" />
                    <link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/materialdesignicons.min.css" />
                    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
                </head>
                <body>
                    <div class="divWrap fade">
                        <div class="login-form register">
							<div class="navigation">
								<div class="bottom-nav">
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
										<div id="links_class">
											<span id="exitpa"><i class="mdi mdi-close"></i></span>
											<div class="left-links">
												<a href="/">Home</a>
												<a href="/#two">About</a>
												<a href="/#services">Services</a>
												<a href="/#doctors">Doctors</a>
												<a href="/#contact">Contact Us</a>
											</div>
											<div class="right-links">
												<a id="mil" href="#">Patient Portal</a>
											</div>
										</div>
									</div>
								</div>
							</div>
                            <div id="reg-holder">
                                <div class="inhouse">
									<div class="form-group header">
										<h1>Register</h1>
										<p id="register">Already Registered? <a href="/branches/login/">Login here</a></p>
									</div>
                                    <div class="form-content fir fade">
										<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >
											<div class="head">
												<p id="warning">Visiting Patient? <span id="visiting-go">click here</span></p>
											</div>
											<div class="body">
												<div class="form-group">
													<label>Name</label>
												   <input minlength="3" value="<?php if(isset($_POST['inreg'])){ echo $_POST['name']; } ?>" maxlength="40" required type="text" name="name" placeholder="Your full name">
													<i class="mdi mdi-account"></i>
												</div>
												<div class="form-group">
													<label>Email</label>
												  <input value="<?php if(isset($_POST['inreg'])){ echo $_POST['email']; } ?>" minlength="5" maxlength="40" required type="email" name="email" placeholder="Your Email">
													<i class="mdi mdi-email"></i>
												</div>
												<div class="form-group">
													<label>Phone</label>
													<input value="<?php if(isset($_POST['inreg'])){ echo $_POST['phone']; } ?>" minlength="8" maxlength="40" required type="tel" name="phone" placeholder="Your Phone">
													<i class="mdi mdi-phone"></i>
												</div>
												<div class="form-group">
													<label>Date of birth</label>
													<input value="<?php if(isset($_POST['inreg'])){ echo $_POST['dob']; } ?>" required type="date" name="dob" placeholder="Date of Birth">
													<i class="mdi mdi-calendar"></i>
												</div>
												<div class="form-group">
													<label>Sex</label>
												   <input value="<?php if(isset($_POST['inreg'])){ echo $_POST['sex']; } ?>" minlength="3" maxlength="40" required type="text" name="sex" list="sex" placeholder="Your Gender">
													<i class="mdi mdi-sex"></i>
													<datalist id="sex">
														<option value="Male">Male</option>
														<option value="Female">Female</option>
													</datalist>
												</div>
												<div class="form-group">
													<label>Blood group</label>
													<input value="<?php if(isset($_POST['inreg'])){ echo $_POST['bloodgroup']; } ?>" minlength="5" maxlength="40" required type="text" name="bloodgroup" list="blood-group" placeholder="Your Blood-group">
													<i class="mdi mdi-gender"></i>
													<datalist id="blood-group">
														<option value="O-Positive">O-Positive</option>
														<option value="O-Negative">O-Negative</option>
														<option value="A-Positive">A-Positive</option>
														<option value="A-Negative">A-Negative</option>
														<option value="B-Positive">B-Positive</option>
														<option value="B-Negative">B-Negative</option>
														<option value="AB-Positive">AB-Positive</option>
														<option value="AB-Negative">AB-Negative</option>
													</datalist>
												</div>
												<div class="form-group">
													<label>Genotype</label>
													<input value="<?php if(isset($_POST['inreg'])){ echo $_POST['genotype']; } ?>" minlength="1" maxlength="40" required type="text" name="genotype" list="genotype" placeholder="Your Genotype">
													<i class="mdi mdi-gender"></i>
													<datalist id="genotype">
														<option value="AA">AA</option>
														<option value="AS">AS</option>
														<option value="SS">SS</option>
														<option value="AC">AC</option>
													</datalist>
												</div>
												<div class="form-group">
													<label>Height</label>
													<div class="form-group-minor">
														<div class="form-group-minor-box">
															<select required name="feet">
																<option disabled selected>Please select a value</option>
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
																<option value="5">5</option>
																<option value="6">6</option>
																<option value="7">7</option>
															</select>
															<span>ft</span>
														</div>
														<div class="form-group-minor-box">
															<select required name="inches">
																<option disabled selected>Please select a value</option>
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
																<option value="5">5</option>
																<option value="6">6</option>
																<option value="7">7</option>
																<option value="8">8</option>
																<option value="9">9</option>
																<option value="10">10</option>
																<option value="11">11</option>
																<option value="12">12</option>
															</select>
															<span>inches</span>
														</div>
													</div>
													<i class="mdi mdi-gender"></i>
												</div>
												<div class="form-group">
													<label>Student/staff</label>
													<input value="<?php if(isset($_POST['inreg'])){ echo $_POST['position']; } ?>" minlength="5" maxlength="40" required type="text" name="position" list="position" placeholder="Position">
													<i class="mdi mdi-account-multiple"></i>
													<datalist id="position">
														<option value="Student">Student</option>
														<option value="Staff">Staff</option>
													</datalist>
												</div>
												<div class="form-group">
													<label>Department</label>
													<input value="<?php if(isset($_POST['inreg'])){ echo $_POST['department']; } ?>" minlength="4" maxlength="40" required type="text" name="department" placeholder="Department">
													<i class="mdi mdi-school"></i>
												</div>
												<div class="form-group">
													<label>Faculty</label>
													<input value="<?php if(isset($_POST['inreg'])){ echo $_POST['faculty']; } ?>" minlength="4" maxlength="40" required type="text" name="faculty" placeholder="Faculty">
													<i class="mdi mdi-home-city"></i>
												</div>
												<div class="form-group">
													<label>Password</label>
													<input minlength="5" maxlength="40" required type="password" name="password" placeholder="Enter a password">
													<i class="mdi mdi-lock"></i>
												</div>
											</div>
										    <div class="form-group error-hold" style="border-top: none; padding: 0px;">
												<?php include('../../config/errors.php'); ?>
											</div>
											<p id="warning">By clicking register, I hereby agree to the terms and conditions of using this website.</p>
											<div class="form-group">
												<button type="submit" name="inreg">Register</button>
											</div>
										</form>
                                    </div>
                                    <div class="form-content vi sec fade">
										<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >
											<div class="head">
												<p id="warning">University community? <span id="visiting-exit">click here</span></p>
											</div>
											<div class="body">
												<div class="form-group">
													<label>Name</label>
												   <input minlength="3" value="<?php if(isset($_POST['vireg'])){ echo $_POST['name']; } ?>" maxlength="40" required type="text" name="name" placeholder="Your full name">
													<i class="mdi mdi-account"></i>
												</div>
												<div class="form-group">
													<label>Email</label>
												  <input value="<?php if(isset($_POST['vireg'])){ echo $_POST['email']; } ?>" minlength="5" maxlength="40" required type="email" name="email" placeholder="Your Email">
													<i class="mdi mdi-email"></i>
												</div>
												<div class="form-group">
													<label>Phone</label>
													<input value="<?php if(isset($_POST['vireg'])){ echo $_POST['phone']; } ?>" minlength="8" maxlength="40" required type="tel" name="phone" placeholder="Your Phone">
													<i class="mdi mdi-phone"></i>
												</div>
												<div class="form-group">
													<label>Date of birth</label>
													<input value="<?php if(isset($_POST['vireg'])){ echo $_POST['dob']; } ?>" required type="date" name="dob" placeholder="Date of Birth">
													<i class="mdi mdi-calendar"></i>
												</div>
												<div class="form-group">
													<label>Sex</label>
												   <input value="<?php if(isset($_POST['vireg'])){ echo $_POST['sex']; } ?>" minlength="3" maxlength="40" required type="text" name="sex" list="sex" placeholder="Your Gender">
													<i class="mdi mdi-gender"></i>
													<datalist id="sex">
														<option value="Male">Male</option>
														<option value="Female">Female</option>
													</datalist>
												</div>
												<div class="form-group">
													<label>Blood group</label>
													<input value="<?php if(isset($_POST['vireg'])){ echo $_POST['bloodgroup']; } ?>" minlength="5" maxlength="40" required type="text" name="bloodgroup" list="blood-group" placeholder="Your Blood-group">
													<i class="mdi mdi-gender"></i>
													<datalist id="blood-group">
														<option value="O-Positive">O-Positive</option>
														<option value="O-Negative">O-Negative</option>
														<option value="A-Positive">A-Positive</option>
														<option value="A-Negative">A-Negative</option>
														<option value="B-Positive">B-Positive</option>
														<option value="B-Negative">B-Negative</option>
														<option value="AB-Positive">AB-Positive</option>
														<option value="AB-Negative">AB-Negative</option>
													</datalist>
												</div>
												<div class="form-group">
													<label>Genotype</label>
													<input value="<?php if(isset($_POST['vireg'])){ echo $_POST['genotype']; } ?>" minlength="1" maxlength="40" required type="text" name="genotype" list="genotype" placeholder="Your Genotype">
													<i class="mdi mdi-gender"></i>
													<datalist id="genotype">
														<option value="AA">AA</option>
														<option value="AS">AS</option>
														<option value="SS">SS</option>
														<option value="AC">AC</option>
													</datalist>
												</div>
												<div class="form-group">
													<label>Height</label>
													<div class="form-group-minor">
														<div class="form-group-minor-box">
															<select required name="feet">
																<option disabled selected>Please select a value</option>
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
																<option value="5">5</option>
																<option value="6">6</option>
																<option value="7">7</option>
															</select>
															<span>ft</span>
														</div>
														<div class="form-group-minor-box">
															<select required name="inches">
																<option disabled selected>Please select a value</option>
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
																<option value="5">5</option>
																<option value="6">6</option>
																<option value="7">7</option>
																<option value="8">8</option>
																<option value="9">9</option>
																<option value="10">10</option>
																<option value="11">11</option>
																<option value="12">12</option>
															</select>
															<span>inches</span>
														</div>
													</div>
													<i class="mdi mdi-gender"></i>
												</div>
												<div class="form-group">
													<label>City</label>
													<input value="<?php if(isset($_POST['vireg'])){ echo $_POST['city']; } ?>" minlength="5" maxlength="40" required type="text" name="city" placeholder="City">
													<i class="mdi mdi-city"></i>
												</div>
												<div class="form-group">
													<label>State</label>
													<input value="<?php if(isset($_POST['vireg'])){ echo $_POST['state']; } ?>" minlength="4" maxlength="40" required type="text" name="state" placeholder="State">
													<i class="mdi mdi-city-variant"></i>
												</div>
												<div class="form-group">
													<label>Nationality</label>
													<input value="<?php if(isset($_POST['vireg'])){ echo $_POST['nationality']; } ?>" minlength="4" maxlength="40" required type="text" name="nationality" placeholder="Nationality">
													<i class="mdi mdi-earth"></i>
												</div>
												<div class="form-group">
													<label>Password</label>
													<input minlength="5" maxlength="40" required type="password" name="password" placeholder="Enter a password">
													<i class="mdi mdi-lock"></i>
												</div>
											</div>
											<div class="form-group error-hold" style="border-top: none; padding: 0px;">
												<?php include('../../config/errors.php'); ?>
											</div>
											<p id="warning">By clicking register, I hereby agree to the terms and conditions of using this website.</p>
											<div class="form-group">
												<button type="submit" name="vireg">Register</button>
											</div>
										</form>
									</div>
                                </div>
                            </div>
                        </div>
						<div class="container" id="support">
							<ul>
								<h3>Connect with us</h3>
								<div class="contactsocialinks">
									<a class="mdi mdi-facebook" href="#"></a>
									<a class="mdi mdi-instagram" href="#"></a>
									<a class="mdi mdi-twitter" href="#"></a>
									<a class="mdi mdi-youtube" href="#"></a>
									<a class="mdi mdi-linkedin" href="#"></a>
								</div>
								<div class="aleft full">
									<li><a href="mailto: <?php echo $email ?>"><?php echo $email ?></a></li>
									<li><a href="tel: <?php echo $tel ?>"><?php echo $tel ?></a></li>
									<li><?php echo $loc.', '.$city.', '.$state.', '.$country ?></li>
								</div>
							</ul>
							<ul>
								<h3>Explore</h3>
								<div class="aleft">
									<li><a href="#home">Home</a></li>
									<li><a href="#two">About us</a></li>
									<li><a href="#services">Services</a></li>
								</div>
								<div class="aleft">
									<li><a href="/branches/portal/staff/">Staff Portal</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Terms of use</a></li>
								</div>
								<div class="aright">
									<li><a href="#doctors">Doctors</a></li>
									<li><a href="#contact">Contact Us</a></li>
								</div>
							</ul>
						</div>
						<div class="container" id="copyright">
							<p>&copy; Copyright <a href="https://instagram.com/official_uby">Mite designs</a>, 2019. All rights reserved.</p>
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