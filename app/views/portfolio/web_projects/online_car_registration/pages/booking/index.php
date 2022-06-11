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
		$query = "INSERT INTO defaulters ( firstname, lastname, email, phone, address, city, country, officeposition, officeaddress, officecity, officecountry) VALUES
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
?>








<!DOCTYPE html>
<html>
    <head>
        <title> Online Car registration </title>
        <link href="../../assets/css/booking.css" type="text/css" rel="stylesheet">
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
                            <div id="navlink"><a href="#">Booking</a></div>
                            <div id="navlink"><a href="../verification/">Verification</a></div>
                        </div>
                    </div>
                    <div id="navlink"><a href="../offence/">Offences / Penalties</a></div>
                    <div id="navlink"><a href="../../#contact">Contact</a></div>
                    <div id="acctlink"><a href="../enroll/">Enrollment</a></div>
                </div>
            </div>

            <div class="" id="body">
                <div class="container" id="cont1">
                    <h1>Offence Booking</h1>
                </div>

                <div class="container" id="booker_form">
                    <p>Fill in the form below...</p>
                    <form name="book" method="POST" action="">
                        <fieldset>
                            <legend>Defaulter's Information</legend>
                            <div class="form-group">
                                <input type="text" name="d-name" placeholder="Name" value="<?php if(isset($_POST['oe-position'])) echo $_POST['oe-position']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="tel" name="d-phone" placeholder="Phone" value="<?php if(isset($_POST['oe-position'])) echo $_POST['oe-position']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="email" name="d-email" placeholder="Email" value="<?php if(isset($_POST['oe-position'])) echo $_POST['oe-position']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="d-address" placeholder="Address" value="<?php if(isset($_POST['oe-position'])) echo $_POST['oe-position']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="d-city" placeholder="City" value="<?php if(isset($_POST['oe-position'])) echo $_POST['oe-position']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="d-country" placeholder="Country" value="<?php if(isset($_POST['oe-position'])) echo $_POST['oe-position']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="d-license" placeholder="License Number" value="<?php if(isset($_POST['oe-position'])) echo $_POST['oe-position']; ?>">
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Operating Officer's Information</legend>
                            <div class="form-group">
                                <input type="text" name="o-name" placeholder="Name" value="<?php if(isset($_POST['oe-position'])) echo $_POST['oe-position']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="tel" name="o-phone" placeholder="Phone" value="<?php if(isset($_POST['oe-position'])) echo $_POST['oe-position']; ?>">
                            </div>
                            <div class="form-group" style="margin-bottom: 25px;">
                                <input type="text" name="o-address" placeholder="Address" value="<?php if(isset($_POST['oe-position'])) echo $_POST['oe-position']; ?>">
                            </div>
                            <div class="form-group">
                                <select name="o-offence">
                                    <option disabled selected>Type of Offence committed</option>
                                    <option>Overspeeding</option>
                                    <option>Expired License</option>
                                    <option>No proof of Ownership</option>
                                    <option>No Insurance</option>
                                </select>
                            </div>
                            <div class="form-group" style="margin-bottom: 25px;">
                                <input type="text" name="o-amount" placeholder="Amount due" readonly>
                            </div>
                            <div class="form-group">
                                <a href="#">Make Payment</a>
                                <span>OR</span>
                                <label for="o-p-date">Payment Due Date</label>
                                <input type="date" name="o-p-date" placeholder="Payment date" value="<?php if(isset($_POST['oe-position'])) echo $_POST['oe-position']; ?>">
                                <span id="warning">Please note that if date is expired and payment is not met, serious actions will be taken.</span>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <input type="submit" value="Submit" name="bookingsubmit">
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
                <p>Copyright &copy; 2018. All rights reserved.</p>
            </div>

        </div>

        <script src="../../assets/js/jquery-2.0.3.min.js"></script>
        <script src="../../assets/js/index.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
    </body>
</html>