<?php

    include ('../../config/server.php');
	
	$read = "SELECT * FROM `contact_info`";
    $reader = mysqli_query($db, $read);
    $show = mysqli_fetch_assoc($reader);

    $about = base64_decode($show['about']);
    $loc = $show['location'];
    $city = $show['city'];
    $state = $show['state'];
    $country = $show['country'];
    $email = $show['email'];
    $tel = $show['phone'];


    if (isset($_SESSION['staffid'])){
        header('location:../../');
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

                    <title>Staff Login</title>
					
					<link rel="icon" href="/config/assets/images/logo-mini.png"/>
					<link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/main.css" />
					<link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/materialdesignicons.min.css" />
					<link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
                </head>
                <body>
                    <div class="divwrap fade">
                        <div class="login-form">
							<div id="reg-holder">
								<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="login" class="inhouse">
									<div class="form-content">
										<div class="form-group">
											<h1>Staff Login</h1>
										</div>
										<div class="form-group">
											<label for="staffuser"></label>
											<input required type="text" name="staffuser" value="<?php if(isset($_POST['login'])){ echo $_POST['staffuser']; } ?>" placeholder="Enter Staff_id or email" size="20" minlength="5" maxlength="50" >
										</div>
										<div class="form-group">
											<label for="staffpassword"></label>
											<input required type="password" name="staffpassword" placeholder="Type your Password" size="20" minlength="8" maxlength="50" pattern="[0-1][Aa-Zz]">
										</div>
										<div class="form-group error-hold" style="border-top: none; padding: 0px;">
											<?php include('../../config/errors.php'); ?>
										</div>
										<div class="form-group">
											<button type="submit" name="login">Log in</button>
										</div>
									</div>
								</form>
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
									<li><a href="/">Home</a></li>
									<li><a href="/#two">About us</a></li>
									<li><a href="/#services">Services</a></li>
								</div>
								<div class="aleft">
									<li><a href="/branches/portal/staff/">Staff Portal</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Terms of use</a></li>
								</div>
								<div class="aright">
									<li><a href="/#doctors">Doctors</a></li>
									<li><a href="/#contact">Contact Us</a></li>
								</div>
							</ul>
						</div>
						<div class="container" id="copyright">
							<p>&copy; Copyright <a href="https://instagram.com/official_uby">Mite designs</a>, 2019. All rights reserved.</p>
						</div>
                    </div>
                </body>
            </html>
<?php
    }
?>