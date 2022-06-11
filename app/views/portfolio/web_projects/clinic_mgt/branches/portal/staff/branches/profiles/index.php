<?php

    include ('../../config/server.php');
    
    if (!isset($_SESSION['staffuid'])){
        header('location: ../login/');
    }else{
        $count = "SELECT `s/n`, `password`, `role`, `phone`, `email` FROM `management` WHERE `name` = '".$_SESSION['staffuid']."' ";
        $query = mysqli_query($db, $count);
        $user = mysqli_fetch_assoc($query);

        $staffpassword = $user['password'];
        $staffid = $user['s/n'];
        $staffemail = $user['email'];
        $staffrole = $user['role'];
        $staffphone = $user['phone'];

           
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

                    <title>Account Setup</title>
					
					<link rel="icon" href="/config/assets/images/logo-mini.png"/>
					<link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/main.css" />
					<link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/materialdesignicons.min.css" />
					<link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
                </head>
                <body>
                    <div class="admin staff divwrap">
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
									<p><i class="mdi mdi-account-outline"></i><?php echo $_SESSION['staffuid']?><i class="mdi mdi-menu-down"></i></p>
									<div class="user-options">
										<ul>
											<li><a href="/branches/portal/staff/config/logout.php"><i class="mdi mdi-logout"></i>Logout</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="login-form">
							<div id="reg-holder">
								<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" class="inhouse">
									<div class="form-content">
										<div class="form-group">
											<h1>Account Setup</h1>
										</div>
										<div class="form-group error-hold" style="border-top: none; padding: 0px;">
											<?php include('../../config/errors.php'); ?>
										</div>
										<div class="form-group">
											<label for="staffpic">Upload profile image:</label>
											<input type="file" name="staffpic" accept="image/*" required/>
										</div>
										<div class="form-group">
											<input type="hidden" name="staffid" value="<?php echo $staffid ?>" readonly>
										</div>
										<div class="form-group">
											<label for="staffname">Name:</label>
											<input required type="text" name="staffname" value="<?php echo $_SESSION['staffuid'] ?>">
										</div>
										<div class="form-group">
											<label for="staffphone">Phone:</label>
											<input required type="tel" name="staffphone" value="<?php echo $staffphone ?>" minlength="5" maxlength="20">
										</div>
										<div class="form-group">
											<label for="staffemail">Email:</label>
											<input required type="email" name="staffemail" value="<?php echo $staffemail ?>" minlength="5" maxlength="40">
										</div>
										<div class="form-group">
											<label for="staffstate">State of Origin:</label>
											<input required type="text" name="staffstate" value="<?php if(isset($_POST['save-data'])){ echo $_POST['staffstate']; } ?>" placeholder="Enter your State of origin" minlength="5" maxlength="30">
										</div>
										<div class="form-group">
											<label for="staffcountry">Nationality:</label>
											<input required type="text" name="staffcountry" value="<?php if(isset($_POST['save-data'])){ echo $_POST['staffcountry']; } ?>" placeholder="Enter your Nationality" minlength="5" maxlength="30">
										</div>
										<div class="form-group">
											<label for="staffaddress">Address:</label>
											<input required type="text" name="staffaddress" value="<?php if(isset($_POST['save-data'])){ echo $_POST['staffaddress']; } ?>" placeholder="Enter your address" minlength="5" maxlength="50">
										</div>
										<div class="form-group">
											<label for="staffaddress_state">State of Residence:</label>
											<input required type="text" name="staffaddress_state" value="<?php if(isset($_POST['save-data'])){ echo $_POST['staffaddress_state']; } ?>" placeholder="Enter your state of residence" minlength="5" maxlength="50">
										</div>
										<div class="form-group">
											<label for="staffaddress_country">Country of Residence:</label>
											<input required type="text" name="staffaddress_country" value="<?php if(isset($_POST['save-data'])){ echo $_POST['staffaddress_country']; } ?>" placeholder="Enter your country of residence" minlength="5" maxlength="50">
										</div>
										<div class="form-group">
											<label for="staffrole">Role:</label>
											<input required type="text" name="staffrole" value="<?php echo $staffrole ?>" readonly>
										</div>
										<?php
											if($staffrole == 'Doctor'){
												echo'
													<div class="form-group">
														<label for="staffspecialty">Specialty:</label>
														<input required type="text" name="staffspecialty" value="'; if(isset($_POST['save-data'])){ echo $_POST['staffspecialty']; } echo'" placeholder="" list="specialty"/>
													</div>
													<div class="form-group">
														<label for="stafflicense">Medical License Number:</label>
														<input required type="text" name="stafflicense" value="'; if(isset($_POST['save-data'])){ echo $_POST['stafflicense']; } echo'" placeholder="Enter your Medical License Number" minlength="5" maxlength="15">
													</div>        
												';
											};
										?>
										<datalist id= "specialty">
											<?php include('./check.php');?>
										</datalist>
										<div class="form-group">
											<label for="staffpassword">Enter a new password</label>
											<input required type="password" name="staffpassword" placeholder="Type in a new Password" size="20" minlength="8" maxlength="50" pattern="[0-1][Aa-Zz]">
										</div>
										<div class="form-group">
											<button type="submit" name="save-data">Save data</button>
										</div>
									</div>
								</form>
							</div>
                        </div>
                    </div>
                </body>
            </html>
<?php
    }
?>