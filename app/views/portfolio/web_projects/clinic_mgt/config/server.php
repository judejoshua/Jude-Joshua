<?php
    session_start();
    
    $errors = array();
    $successes = array();
    
    $conn = mysqli_connect('localhost', 'judegniz_web_projects', 'web_projects234#', 'judegniz_cms');
    if(! $conn ) {
        die('Could not connect to the database: ' . mysqli_connect_error());
    }
//---------------------------------------------------------------------
    // Send Contact message
	if(isset($_POST['contact-submit'])){
		$contactname = stripslashes( mysqli_real_escape_string($conn, $_POST['name']));
		$contactemail = stripslashes( mysqli_real_escape_string($conn, $_POST['email']));
		$contactphone = stripslashes( mysqli_real_escape_string($conn, $_POST['phone']));
		$contactmessage = stripslashes( mysqli_real_escape_string($conn, $_POST['message']));
		$message = base64_encode($contactmessage);

		if (empty($contactname)) {
			array_push($errors, "Your name is required");
		}
		if (empty($contactemail)) {
			array_push($errors, "Your email is required");
		}
		if (empty($contactphone)) {
			array_push($errors, "Your phone is required");
		}
		if (empty($contactmessage)) {
			array_push($errors, "Your message is required");
		}

		if (count($errors) == 0) {
			$query = "INSERT INTO `contacts` (`name`, `email`, `phone`, `message`) VALUES ('".$contactname."', '".$contactemail."', '".$contactphone."', '".$message."')";
			$sent = mysqli_query($conn, $query);
			if ($sent){
				array_push($successes, "Your message was sent successfully.");
			}else{
				array_push($errors, "Message could not be sent, please try again.");
			}
		}
	}
//---------------------------------------------------------------------
    // Login Patient
    if (isset($_POST['login'])) {
        $patientuser = stripslashes(mysqli_real_escape_string($conn, $_POST['patientuser']));
        $patientpassword = stripslashes(mysqli_real_escape_string($conn, $_POST['patientpassword']));
    
        if (empty($patientuser)) {
            array_push($errors, "Your Id is required");
        }
        if (empty($patientpassword)) {
            array_push($errors, "Password is required");
        }
    
        if (count($errors) == 0) {
            $query = "SELECT `p_id`, `password` FROM `patients` WHERE `p_id` = '".$patientuser."' LIMIT 1";
            $results = mysqli_query($conn, $query);
            $user = mysqli_fetch_assoc($results);
            $count = mysqli_num_rows($results);
            
            if ($count == 1) {
                if(password_verify($patientpassword, $user['password'])){
                    $_SESSION['patientusername'] = $patientuser;
                    $_SESSION['patientid']= $_SESSION['patientusername'];
        
                    header('location: ../portal/patient/');
                    exit();
                }
                else{
                    array_push($errors, "Incorrect Password, try again!!");
                }
            }else{
                array_push($errors, "Incorrect input, credentials not found!!");
            };
        };
    };
//---------------------------------------------------------------------
    // Register Patient
    if (isset($_POST['inreg'])) {
        $name = stripslashes(mysqli_real_escape_string($conn, $_POST['name']));
        $email = stripslashes(mysqli_real_escape_string($conn, $_POST['email']));
        $phone = stripslashes(mysqli_real_escape_string($conn, $_POST['phone']));
        $dob = stripslashes(mysqli_real_escape_string($conn, $_POST['dob']));
        $sex = stripslashes(mysqli_real_escape_string($conn, $_POST['sex']));
        $bloodgroup = stripslashes(mysqli_real_escape_string($conn, $_POST['bloodgroup']));
        $genotype = stripslashes(mysqli_real_escape_string($conn, $_POST['genotype']));
        $feet = stripslashes(mysqli_real_escape_string($conn, $_POST['feet']));
        $inches = stripslashes(mysqli_real_escape_string($conn, $_POST['inches']));
        $position = stripslashes(mysqli_real_escape_string($conn, $_POST['position']));
        $department = stripslashes(mysqli_real_escape_string($conn, $_POST['department']));
        $faculty = stripslashes(mysqli_real_escape_string($conn, $_POST['faculty']));
        $password = stripslashes(mysqli_real_escape_string($conn, $_POST['password']));
        $height = $feet.'"'.$inches;
        $id = substr(md5(mt_rand()), 0, 3);
        $pat_id = 'Patient-'.$id;
        $options = array("cost" == 8);
        $pass_hashed = password_hash($password, PASSWORD_BCRYPT, $options);


        $user_checker = "SELECT `name`,`email` FROM `patients` WHERE `name` = '".$name."' OR `email` = '".$email."' LIMIT 1";
        $result = mysqli_query($conn, $user_checker);
        $user = mysqli_fetch_assoc($result);
        if($user){
            if ($user['name'] == $name) {
                array_push($errors, 'Sorry, name is already registered!');
            };
            if ($user['email'] == $email) {
                array_push($errors, 'Sorry, email is already taken!');
            };
        }else{
            $query_reg = mysqli_query($conn, "INSERT INTO `patients`(`p_id`, `name`, `email`, `phone`, `date_of_birth`, `sex`, `blood group`, `genotype`, `height`, `password`) VALUES ('".$pat_id."', '".$name."', '".$email."', '".$phone."', '".$dob."', '".$sex."', '".$bloodgroup."', '".$genotype."', '".$height."', '".$pass_hashed."') ");
            if($query_reg){
                $set_inpatient = mysqli_query($conn, "INSERT INTO `inhouse`(`p_id`, `student_or_staff`, `department`, `faculty`) VALUES ('".$pat_id."', '".$position."', '".$department."', '".$faculty."')");
                //$to = $email;
                //$subject = "CoinKrypt Verification Email!";
                //$headers = "From: no-reply@firstmedtradeafrica.com\r\n";
                //$headers .= "MIME-Version: 1.0\r\n";
                //$headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
                
                //$message = '<html><body>';
                //$message .= '<img src = "https://ubyjude.bitbucket.io/clinic_mgt/config/assets/images/logo-variant.png" alt="CoinKrypt logo" width="130" height="100"/>';
                //$message .= '<table rules="all" style="border-color: #888888; background: #eeeeeee;" cellpadding="10">';
                //$message .= "<tr style='border: none;'><td>Hi $full_name. Thank you for joining our community. Your registration was successful! Your User Id is $user_id.<br>One last thing; click on the button below to verify your email and gain full access to your account.</td></tr>";
                //$message .= "<tr style='border: none;'><td><a href='https://demo.firstmedtradeafrica.com/coinkrypt-db/config/verify.php?user=$first_name&code=$email_verification_code'>Verify Email</a></td></tr>";
                //$message .= "<tr style='border: none;'><td>Cheers,<br/>CoinKrypt.</td></tr>";
                //$message .= '</table>';
                //$message .= '</body></html>';
                
                //mail($to, $subject, $message, $headers);

                $_SESSION['patientusername'] = $pat_id;
                $_SESSION['patientid']= $_SESSION['patientusername'];

                header('location: ../portal/patient/');
                exit();
            }else{
                array_push($errors, 'An error occured during registrtation, please try again!');
            }
        }
    }
    //***********
    if (isset($_POST['vireg'])) {
        $name = stripslashes(mysqli_real_escape_string($conn, $_POST['name']));
        $email = stripslashes(mysqli_real_escape_string($conn, $_POST['email']));
        $phone = stripslashes(mysqli_real_escape_string($conn, $_POST['phone']));
        $dob = stripslashes(mysqli_real_escape_string($conn, $_POST['dob']));
        $sex = stripslashes(mysqli_real_escape_string($conn, $_POST['sex']));
        $bloodgroup = stripslashes(mysqli_real_escape_string($conn, $_POST['bloodgroup']));
        $genotype = stripslashes(mysqli_real_escape_string($conn, $_POST['genotype']));
        $feet = stripslashes(mysqli_real_escape_string($conn, $_POST['feet']));
        $inches = stripslashes(mysqli_real_escape_string($conn, $_POST['inches']));
        $city = stripslashes(mysqli_real_escape_string($conn, $_POST['city']));
        $state = stripslashes(mysqli_real_escape_string($conn, $_POST['state']));
        $nationality = stripslashes(mysqli_real_escape_string($conn, $_POST['nationality']));
        $password = stripslashes(mysqli_real_escape_string($conn, $_POST['password']));
        $height = $feet.'"'.$inches;
        $id = substr(md5(mt_rand()), 0, 3);
        $pat_id = 'Patient-'.$id;
        $options = array("cost" == 8);
        $pass_hashed = password_hash($password, PASSWORD_BCRYPT, $options);


        $user_checker = "SELECT `name`,`email` FROM `patients` WHERE `name` = '".$name."' OR `email` = '".$email."' LIMIT 1";
        $result = mysqli_query($conn, $user_checker);
        $user = mysqli_fetch_assoc($result);
        if($user){
            if ($user['name'] == $name) {
                array_push($errors, 'Sorry, name is already registered!');
            };
            if ($user['email'] == $email) {
                array_push($errors, 'Sorry, email is already taken!');
            };
        }else{
            $query_reg = mysqli_query($conn, "INSERT INTO `patients`(`p_id`, `name`, `email`, `phone`, `date_of_birth`, `sex`, `blood group`, `genotype`, `height`, `password`) VALUES ('".$pat_id."', '".$name."', '".$email."', '".$phone."', '".$dob."', '".$sex."', '".$bloodgroup."', '".$genotype."', '".$height."', '".$pass_hashed."') ");
            if($query_reg){
                $set_inpatient = mysqli_query($conn, "INSERT INTO `visiting`(`p_id`, `city`, `state`, `nationality`) VALUES ('".$pat_id."', '".$city."', '".$state."', '".$nationality."')");
                //$to = $email;
                //$subject = "CoinKrypt Verification Email!";
                //$headers = "From: no-reply@firstmedtradeafrica.com\r\n";
                //$headers .= "MIME-Version: 1.0\r\n";
                //$headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
                
                //$message = '<html><body>';
                //$message .= '<img src = "https://ubyjude.bitbucket.io/clinic_mgt/config/assets/images/logo-variant.png" alt="CoinKrypt logo" width="130" height="100"/>';
                //$message .= '<table rules="all" style="border-color: #888888; background: #eeeeeee;" cellpadding="10">';
                //$message .= "<tr style='border: none;'><td>Hi $full_name. Thank you for joining our community. Your registration was successful! Your User Id is $user_id.<br>One last thing; click on the button below to verify your email and gain full access to your account.</td></tr>";
                //$message .= "<tr style='border: none;'><td><a href='https://demo.firstmedtradeafrica.com/coinkrypt-db/config/verify.php?user=$first_name&code=$email_verification_code'>Verify Email</a></td></tr>";
                //$message .= "<tr style='border: none;'><td>Cheers,<br/>CoinKrypt.</td></tr>";
                //$message .= '</table>';
                //$message .= '</body></html>';
                
                //mail($to, $subject, $message, $headers);
                $_SESSION['patientusername'] = $pat_id;
                $_SESSION['patientid']= $_SESSION['patientusername'];

                header('location: ../portal/patient/');
                exit();
            }else{
                array_push($errors, 'An error occured during registrtation, please try again!');
            }
        }
    }
//----------------------------------------------------------------------
    //Update pass
    if (isset($_POST['change'])) {
        $patientold = stripslashes(mysqli_real_escape_string($conn, $_POST['patientold']));
        $patientnew = stripslashes(mysqli_real_escape_string($conn, $_POST['patientnew']));
        $patientconfirm = stripslashes(mysqli_real_escape_string($conn, $_POST['patientconfirm']));

        $options = array("cost" == 8);
        $patientnew_hashed = password_hash($patientnew, PASSWORD_BCRYPT, $options);


        $user_check_query = " SELECT `name`, `password` FROM `patients` WHERE `p_id`= '{$_SESSION['patientid']}' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);

        
        if ($count == 1) {
            if(password_verify($patientold, $user['password'])){
                if(password_verify($patientnew, $user['password'])){
                    array_push($errors, "Sorry, new password cannot be same with old password!");
                }else{
                    if(password_verify($patientconfirm, $patientnew_hashed)){
                        $change = "UPDATE `patients` SET `password`= '$patientnew_hashed' WHERE `user` = '{$_SESSION['patientid']}'";
                        $changedone = mysqli_query($conn, $change);
                        array_push($successes, "Password changed successfully!");
                    }else{
                        array_push($errors, "Passwords do not match!");
                    }
                }
            }else{
                array_push($errors, "Old password is incorect! Try again!");
            }
        }else{
            array_push($errors, "An error occured while updating records!!");
        }
        
    };
//----------------------------------------------------------------------
    //Appointments
    if (isset($_POST['iappointment-submit'])) {
        $p_id = stripslashes(mysqli_real_escape_string($conn, $_POST['p_id']));
        $date = stripslashes(mysqli_real_escape_string($conn, $_POST['date']));
        $time = stripslashes(mysqli_real_escape_string($conn, $_POST['time']));
        $specialty = stripslashes(mysqli_real_escape_string($conn, $_POST['specialty']));

        $typ = 'Inhouse';
        $status = 'awaiting approval';

        $uchecker = "SELECT `appointment_date`,`appointment_time`,`specialty` FROM `appointments` WHERE `appointment_date` = '".$date."' AND `appointment_time` = '".$time."' AND `specialty` = '".$specialty."' LIMIT 1";
        $result = mysqli_query($conn, $uchecker);
        $user = mysqli_fetch_assoc($result);
        if($user){
            array_push($errors, "Sorry, your appointment cannot be placed at that time!! Please choose another time.");
        }else{
            $query = "INSERT INTO `appointments` (`p_id`, `appointment_date`, `appointment_time`, `specialty`, `type_of_patient`, `request_date`, `request_status`) VALUES ('".$p_id."', '".$date."', '".$time."', '".$specialty."', '".$typ."',  CURRENT_TIMESTAMP(), '".$status."')";
            $sent = mysqli_query($conn, $query);
            if($sent){
                header('location: ./');
                exit();
            }else{
                array_push($errors, "An error occurred while booking your appointment, please try again!!");
            }
        }
    };
    if (isset($_POST['vappointment-submit'])) {
        $p_id = stripslashes(mysqli_real_escape_string($conn, $_POST['p_id']));
        $date = stripslashes(mysqli_real_escape_string($conn, $_POST['date']));
        $time = stripslashes(mysqli_real_escape_string($conn, $_POST['time']));
        $specialty = stripslashes(mysqli_real_escape_string($conn, $_POST['specialty']));

        $typ = 'Visiting';
        $status = 'awaiting approval';

        $uchecker = "SELECT `appointment_date`,`appointment_time`,`specialty` FROM `appointments` WHERE `appointment_date` = '".$date."' AND `appointment_time` = '".$time."' AND `specialty` = '".$specialty."' LIMIT 1";
        $result = mysqli_query($conn, $uchecker);
        $user = mysqli_fetch_assoc($result);
        if($user){
            array_push($errors, "Sorry, your appointment cannot be placed at that time!! Please choose another time.");
        }else{
            $query = "INSERT INTO `appointments` (`p_id`, `appointment_date`, `appointment_time`, `specialty`, `type_of_patient`, `request_date`, `request_status`) VALUES ('".$p_id."', '".$date."', '".$time."', '".$specialty."', '".$typ."', CURRENT_TIMESTAMP(), '".$status."')";
            $sent = mysqli_query($conn, $query);
            if($sent){
                header('location: ./');
                exit();
            }else{
                array_push($errors, "An error occurred while booking your appointment, please try again!!");
            }
        }
    };
//----------------------------------------------------------------------
//Payment
    if (isset($_POST['pay_now'])) {
        $card_no = stripslashes(mysqli_real_escape_string($conn, $_POST['card_number']));
        $expiry = stripslashes(mysqli_real_escape_string($conn, $_POST['expiry']));
        $ccv = stripslashes(mysqli_real_escape_string($conn, $_POST['ccv']));
		$name = stripslashes(mysqli_real_escape_string($conn, $_POST['name']));
		
		$uchecker = mysqli_query($conn, "SELECT `card_number`,`expiry`,`cvv` FROM `card` WHERE `card_number` = '".$card_no."'  AND `expiry` = '".$expiry."' AND `cvv` = '".$ccv."' LIMIT 1");
		if(mysqli_num_rows($uchecker) > 0){
			$sql = mysqli_query($conn, "UPDATE `appointments` SET `request_status`='Booked' WHERE `p_id`='".$_SESSION['patientid']."' ");
			if ($sql){
				$paid = mysqli_query($conn, "INSERT INTO `transactions`(`p_id`,`type`,`amount`,`name`) VALUES('".$_SESSION['patientid']."', 'Appointments', '1,500', '".$name."')");
				echo '
					<div class="payment modal fade">
						<div>
							<form method="POST" action="./" class="inhouse">
								<a href="./"><span id="exit"><i class="mdi mdi-close"></i></span></a>
								<div class="messages">
									<h3 id="alert" class="success">Payment was successful!!</h3>
								</div>
							</form>
						</div>
					</div>
				';
			}
		}else{
			echo '
				<div class="payment modal fade">
					<div>
						<form method="POST" action="./" class="inhouse">
							<a href="./"><span id="exit"><i class="mdi mdi-close"></i></span></a>
							<div class="messages">
								<h3 id="alert" class="error">Payment was unsuccessful!! Try again!!</h3>
							</div>
						</form>
					</div>
				</div>
			';
		}
	}
    
    
?>