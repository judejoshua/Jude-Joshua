<?php
if(!empty($_POST["officialenroll"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All Fields are required";
		break;
		}
	}
	/* Email Validation */
	if(!isset($error_message)) {
		if (!filter_var($_POST["oe-email"], FILTER_VALIDATE_EMAIL)) {
		$error_message = "Invalid Email Address";
		}
	}

    if(!isset($error_message)) {
		require_once("../dbcontroller.php");
		$db_handle = new DBController();
		$query = "INSERT INTO officials ( firstname, lastname, email, phone, address, city, country, officeposition, officeaddress, officecity, officecountry) VALUES
		('" . $_POST["oe-fname"] . "', '" . $_POST["oe-lname"] . "', '" . $_POST["oe-phone"] . "', '" . $_POST["oe-email"] . "', '" . $_POST["oe-address"] . "', '" . $_POST["oe-city"] . "', '" . $_POST["oe-country"] . "', '" . $_POST["oe-position"] . "', '" . $_POST["oe-officeaddress"] . "', '" . $_POST["oe-officecity"] . "', '" . $_POST["oe-officecountry"] . "')";
		$result = $db_handle->insertQuery($query);
		if(!empty($result)) {
			$error_message = "";
			$success_message = "You have registered successfully!";	
			unset($_POST);
		} else {
			$error_message = "Problem in registration. Try Again!";	
		}
	}
}
if(!empty($_POST["driverenroll"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$derror_message = "All Fields are required";
		break;
		}
	}
	/* Email Validation */
	if(!isset($derror_message)) {
		if (!filter_var($_POST["de-email"], FILTER_VALIDATE_EMAIL)) {
		$derror_message = "Invalid Email Address";
		}
	}

    if(!isset($derror_message)) {
		require_once("../dbcontroller.php");
		$db_handle = new DBController();
		$query = "INSERT INTO drivers ( firstname, lastname, email, phone, address, occupation, city, country, platenumber, license) VALUES
		('" . $_POST["de-fname"] . "', '" . $_POST["de-lname"] . "', '" . $_POST["de-phone"] . "', '" . $_POST["de-email"] . "', '" . $_POST["de-address"] . "', '" . $_POST["de-occupation"] . "', '" . $_POST["de-city"] . "', '" . $_POST["de-country"] . "', '" . $_POST["de-plate-number"] . "', '" . $_POST["de-license"] . "')";
		$result = $db_handle->insertQuery($query);
		if(!empty($result)) {
			$derror_message = "";
			$dsuccess_message = "You have registered successfully!";	
			unset($_POST);
		} else {
			$derror_message = "Problem in registration. Try Again!";	
		}
	}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Online Car registration </title>
        <link href="../../assets/css/enroll.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="../../assets/css/materialdesignicons.min.css" />
    </head>

    <body>
        <div class="wrapper">
            <div class="container" id="header">
                <div class="navbar">
                    <div id="navlink"><a href="../../">Home</a></div>
                    <div id="navlink"><a href="../../#product">Products</a></div>
                    <div id="navlink"><a href="../../#testimonial">Testimonials</a></div>
                    <div id="navlink">
                        <a id="nav-link" href="#">Road Officials <i class="mdi mdi-chevron-down" aria-hidden="true"></i></a>
                        <div class="navlink-drop">
                            <div id="navlink"><a href="../booking/">Booking</a></div>
                            <div id="navlink"><a href="../verification/">Verification</a></div>
                        </div>
                    </div>
                    <div id="navlink"><a href="../offence/">Offences / Penalties</a></div>
                    <div id="navlink"><a href="../../#contact">Contact</a></div>
                    <div id="acctlink"><a href="#">Enrollment</a></div>
                </div>
            </div>

            <div class="" id="body">
                <div class="container" id="cont1">
                    <h1>Enrollment</h1>
                </div>

                <div class="container" id="booker_form">
                    <p>Driver's Enrollment</p>
                    <form name="driverEnroll_book" method="POST" action="">
                        <?php if(!empty($dsuccess_message)) { ?>	
                            <div class="success-message"><?php if(isset($dsuccess_message)) echo $dsuccess_message; ?></div>
                        <?php } ?>
                        <?php if(!empty($derror_message)) { ?>	
                            <div class="error-message"><?php if(isset($derror_message)) echo $derror_message; ?></div>
                        <?php } ?>
                        <div class="form-group">
                            <input type="text" name="de-fname" placeholder="First Name" value="<?php if(isset($_POST['de-fname'])) echo $_POST['de-fname']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="de-lname" placeholder="Last Name" value="<?php if(isset($_POST['de-lname'])) echo $_POST['de-lname']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="tel" name="de-phone" placeholder="Phone" value="<?php if(isset($_POST['de-phone'])) echo $_POST['de-phone']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="email" name="de-email" placeholder="Email" value="<?php if(isset($_POST['de-email'])) echo $_POST['de-email']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="de-address" placeholder="Address" value="<?php if(isset($_POST['de-address'])) echo $_POST['de-address']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="de-occupation" placeholder="Occupation" value="<?php if(isset($_POST['de-occupation'])) echo $_POST['de-occupation']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="de-city" placeholder="City" value="<?php if(isset($_POST['de-city'])) echo $_POST['de-city']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="de-country" placeholder="Country" value="<?php if(isset($_POST['de-country'])) echo $_POST['de-country']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="de-plate-number" placeholder="Car Plate Number" value="<?php if(isset($_POST['de-plate-number'])) echo $_POST['de-plate-number']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="de-license" placeholder="License Number" value="<?php if(isset($_POST['de-license'])) echo $_POST['de-license']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Enroll" name="driverenroll">
                        </div>
                    </form>
                </div>
                <div class="container" id="booker_form" >
                    <p>Road Official's Enrollment</p>
                    <form name="officerEnroll_book" method="POST" action="">
                        <?php if(!empty($success_message)) { ?>	
                            <div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
                        <?php } ?>
                        <?php if(!empty($error_message)) { ?>	
                            <div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
                        <?php } ?>
                        <div class="form-group">
                            <input type="text" name="oe-fname" placeholder="First Name" value="<?php if(isset($_POST['oe-fname'])) echo $_POST['oe-fname']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="oe-lname" placeholder="Last Name" value="<?php if(isset($_POST['oe-lname'])) echo $_POST['oe-lname']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="tel" name="oe-phone" placeholder="Phone" value="<?php if(isset($_POST['oe-phone'])) echo $_POST['oe-phone']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="email" name="oe-email" placeholder="Email" value="<?php if(isset($_POST['oe-email'])) echo $_POST['oe-email']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="oe-address" placeholder="Address" value="<?php if(isset($_POST['oe-address'])) echo $_POST['oe-address']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="oe-city" placeholder="City" value="<?php if(isset($_POST['oe-city'])) echo $_POST['oe-city']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="oe-country" placeholder="Country" value="<?php if(isset($_POST['oe-country'])) echo $_POST['oe-country']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="oe-position" placeholder="Office Position" value="<?php if(isset($_POST['oe-position'])) echo $_POST['oe-position']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="oe-officeaddress" placeholder="Office Address" value="<?php if(isset($_POST['oe-officeaddress'])) echo $_POST['oe-officeaddress']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="oe-officecity" placeholder="Office City" value="<?php if(isset($_POST['oe-officecity'])) echo $_POST['oe-officecity']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="oe-officecountry" placeholder="Office Country" value="<?php if(isset($_POST['oe-officecountry'])) echo $_POST['oe-officecountry']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Enroll" name="officialenroll">
                        </div>
                    </form>
                </div>

                <div class="container" id="support">
                    <ul>
                        <h3>About Us</h3>
                        <li></li><p>dvdjvbjbdjvbjdsvsdvn vjdsv dsjbv vjdsdjvnv ddjdjsdjsdj vjvnsdjvd dsjndfnv sdvsvsd vjdjdsjvjd vjd vjdnna a cjnd aj djd j djdjdd cjdj cjccjc cjdnjd dj dj djd js dje kamsamsa cckc cckjcnc cnncjccnncjjcn cjc cjc ajwejk ckdkdmkc ckcmckd. jvnvjsdvn vjdsv.</p></li>
                        <div class="contactsocialinks">
                            <a class="mdi mdi-facebook" href="#"></a>
                            <a class="mdi mdi-instagram" href="#"></a>
                            <a class="mdi mdi-linkedin" href="#"></a>
                        </div>
                    </ul>
                    <ul>
                        <h3>Explore</h3>
                        <div class="aleft">
                            <li><a href="../../#home">Home</a></li>
                            <li><a href="../../#contact">Help</a></li>
                            <li><a href="../booking/">Booking</a></li>
                            <li><a href="../offence/">Penalties</a></li>
                        </div>
                        <div class="aright">
                            <li><a href="../../#product">Products</a></li>
                            <li><a href="../../verification/">License Validation</a></li>
                        </div>
                    </ul>
                    <ul>
                        <h3>Contact Us</h3>
                        <iframe id="map-canvas" scrolling="no" marginheight="0" marginwidth="0" src=""></iframe>
                    </ul>
                </div>
            </div>
            <div class="container" id="footer">
                <p>Copyright &copy; Kizito Technologies. All rights reserved</p>
            </div>
        </div>

        <script src="../../assets/js/jquery-2.0.3.min.js"></script>
        <script src="../../assets/js/index.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
    </body>
</html>

