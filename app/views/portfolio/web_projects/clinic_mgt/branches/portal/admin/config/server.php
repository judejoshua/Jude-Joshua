<?php
    session_start();
    $errors = array(); 
    $successes = array();
    $db = mysqli_connect('localhost', 'judegniz_web_projects', 'web_projects234#', 'judegniz_cms');
    if(! $db ) {
        die('Could not connect to the database: ' . mysqli_connect_error());
    }
//---------------------------------------------------------------------
    // Login Admin
    if (isset($_POST['login'])) {
        $adminuser = stripslashes(mysqli_real_escape_string($db, $_POST['adminuser']));
        $adminpassword = stripslashes(mysqli_real_escape_string($db, $_POST['adminpassword']));
    
        if (empty($adminuser)) {
            array_push($errors, "Username is required");
        }
        if (empty($adminpassword)) {
            array_push($errors, "Password is required");
        }
    
        if (count($errors) == 0) {
            $query = "SELECT `user`, `password` FROM `system` WHERE `user` = '".$adminuser."' LIMIT 1";
            $results = mysqli_query($db, $query);
            $user = mysqli_fetch_assoc($results);
            $count = mysqli_num_rows($results);
            
            if ($count == 1) {
                if(password_verify($adminpassword, $user['password'])){
                    $_SESSION['adminusername'] = $adminuser;
                    $_SESSION['adminid']= $_SESSION['adminusername'];
        
                    header('location: ../../');
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
    //Crete admin
    if (isset($_POST['create'])) {
        $adminname = stripslashes(mysqli_real_escape_string($db, $_POST['adminname']));
        $adminsex = stripslashes(mysqli_real_escape_string($db, $_POST['adminsex']));
        $adminmail = stripslashes(mysqli_real_escape_string($db, $_POST['adminmail']));
        $adminphone = stripslashes(mysqli_real_escape_string($db, $_POST['adminphone']));
        $adminpass = stripslashes(mysqli_real_escape_string($db, $_POST['adminpass']));
        $adminrole = stripslashes(mysqli_real_escape_string($db, $_POST['adminrole']));
        $verified = '0';
        if($adminrole == 'Doctor'){
            $adminname_full = 'Dr. '.$adminname;
        }else{
            $adminname_full = $adminname;
        }
        $options = array("cost" == 8);
        $adminpass_hashed = password_hash($adminpass, PASSWORD_BCRYPT, $options);
        $id_code = substr(md5(mt_rand()), 0, 3);
        $admin_id = $id_code.'-Admin';
    
        $user_checker = "SELECT `name`,`email` FROM `management` WHERE `name` = '".$adminname."' OR `email` = '".$adminmail."' LIMIT 1";
        $result = mysqli_query($db, $user_checker);
        $user = mysqli_fetch_assoc($result);
        if($user){
            if ($user['name'] == $adminname) {
                array_push($errors, 'Sorry, '.$adminrole.'&#39;s name is already saved! <a href="/branches/portal/admin/branches/relatives/management/" id="viewadmin">View</a>');
            };
            if ($user['email'] == $adminmail) {
                array_push($errors, 'Sorry, '.$adminrole.'&#39;s email is already saved! <a href="/branches/portal/admin/branches/relatives/management/" id="viewadmin">View</a>');
            };
        };

        if (count($errors) == 0) {
            $query = "INSERT INTO `management` ( `name`, `sex`, `email`, `phone`, `staff_id`, `verified`, `role`, `password`) VALUES ('".$adminname_full."','".$adminsex."', '".$adminmail."', '".$adminphone."', '".$admin_id."', '".$verified."', '".$adminrole."', '".$adminpass_hashed."')";
            $create = mysqli_query($db, $query);
            if($create){
                //$to = $email;
                //$subject = "CoinKrypt Verification Email!";
                //$headers = "From: no-reply@firstmedtradeafrica.com\r\n";
                //$headers .= "MIME-Version: 1.0\r\n";
                //$headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
                
                //$message = '<html><body>';
                //$message .= '<img src = "/config/assets/images/logo-variant.png" alt="CoinKrypt logo" width="130" height="100"/>';
                //$message .= '<table rules="all" style="border-color: #888888; background: #eeeeeee;" cellpadding="10">';
                //$message .= "<tr style='border: none;'><td>Hi $full_name. Thank you for joining our community. Your registration was successful! Your User Id is $user_id.<br>One last thing; click on the button below to verify your email and gain full access to your account.</td></tr>";
                //$message .= "<tr style='border: none;'><td><a href='https://demo.firstmedtradeafrica.com/coinkrypt-db/config/verify.php?user=$first_name&code=$email_verification_code'>Verify Email</a></td></tr>";
                //$message .= "<tr style='border: none;'><td>Cheers,<br/>CoinKrypt.</td></tr>";
                //$message .= '</table>';
                //$message .= '</body></html>';
                
                //mail($to, $subject, $message, $headers);
    
                header('location: ../management/');
                exit();
            }else{
                array_push($errors, 'Error creating '.$adminrole.', try again.');
            };
        };
    };

//---------------------------------------------------------------------
    //Update pass
    if (isset($_POST['change'])) {
        $adminold = stripslashes(mysqli_real_escape_string($db, $_POST['adminold']));
        $adminnew = stripslashes(mysqli_real_escape_string($db, $_POST['adminnew']));
        $adminconfirm = stripslashes(mysqli_real_escape_string($db, $_POST['adminconfirm']));

        $options = array("cost" == 8);
        $adminnew_hashed = password_hash($adminnew, PASSWORD_BCRYPT, $options);


        $user_check_query = " SELECT `user`, `password` FROM `system` WHERE `user`= '{$_SESSION['adminid']}' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);

        
        if ($count == 1) {
            if(password_verify($adminold, $user['password'])){
                if(password_verify($adminnew, $user['password'])){
                    array_push($errors, "Sorry, new password cannot be same with old password!");
                }else{
                    if(password_verify($adminconfirm, $adminnew_hashed)){
                        $change = "UPDATE `system` SET `password`= '$adminnew_hashed' WHERE `user` = '{$_SESSION['adminid']}'";
                        $changedone = mysqli_query($db, $change);
                        array_push($successes, "Password changed successfully!");
                    }else{
                        array_push($errors, "Passwords do not match!");
                    }
                }
            }else{
                array_push($errors, "Old password is incorect! Try again!");
            }

        }else{
            $user_check_query = "SELECT `id`, `password` FROM `management` WHERE `id` = '{$_SESSION['adminid']}' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);

            if ($user) {
                if(password_verify($adminold, $user['password'])){
                    if(password_verify($adminnew, $user['password'])){
                        array_push($errors, "Sorry, new password cannot be same with old password!");
                    }else{
                        if(password_verify($adminconfirm, $adminnew)){
                            $change = "UPDATE `management` SET `password`= '$adminnew_hashed' WHERE `id` = '{$_SESSION['adminid']}'";
                            $changedone = mysqli_query($db, $change);
                            array_push($successes, "Password changed successfully!");
                        }else{
                            array_push($errors, "Passwords do not match!");
                        }
                    }
                }else{
                    array_push($errors, "Old password is incorect! Try again!");
                }
            }
        }
        
    };
//---------------------------------------------------------------------
    //Update contact
    if (isset($_POST['save-contact'])){
        $location = stripslashes(mysqli_real_escape_string($db, $_POST['adminloc']));
        $city = stripslashes(mysqli_real_escape_string($db, $_POST['admincity']));
        $state = stripslashes(mysqli_real_escape_string($db, $_POST['adminstate']));
        $country = stripslashes(mysqli_real_escape_string($db, $_POST['admincount']));
        $email = stripslashes(mysqli_real_escape_string($db, $_POST['adminmail']));
        $phone = stripslashes(mysqli_real_escape_string($db, $_POST['adminphone']));

        $contact_check = mysqli_query($db, "SELECT * FROM `contact_info`");
        $contact_rows = mysqli_num_rows($contact_check);

        if ($contact_rows == 0){
            $contact_query = "INSERT INTO `contact_info`(`location`, `city`, `state`, `country`, `email`, `phone`) VALUES ('".$location."', '".$city."', '".$state."', '".$country."', '".$email."', '".$phone."')";
            $contact_update = mysqli_query($db, $contact_query);
            header('location: ./');
        }else{
            $contact_query = "UPDATE `contact_info` SET `location`='".$location."', `city`='".$city."', `state`='".$state."', `country`='".$country."', `email`='".$email."', `phone`='".$phone."' ";
            $contact_update = mysqli_query($db, $contact_query);   
            header('location: ./'); 
        }
    };
//---------------------------------------------------------------------
    //Update about
    if (isset($_POST['save-about'])){
        $about = stripslashes(mysqli_real_escape_string($db, $_POST['about']));
        $about = base64_encode($about);

        $contact_check = mysqli_query($db, "SELECT `about` FROM `contact_info`");
        $contact_rows = mysqli_num_rows($contact_check);

        if ($contact_rows == 0){
            $contact_query = "INSERT INTO `contact_info`(`about`) VALUES ('".$about."')";
            $contact_update = mysqli_query($db, $contact_query);
            header('location: ./');
        }else{
            $contact_query = "UPDATE `contact_info` SET `about`='".$about."' ";
            $contact_update = mysqli_query($db, $contact_query);
            header('location: ./');
        }

    };
//---------------------------------------------------------------------
    //Update work_time
    if (isset($_POST['days'])){
        foreach($_POST['days'] as $userID){
            if (isset($_POST['closed'][$userID])){
                $user_update_query = "UPDATE `work_info` SET `start_time` = '".$_POST['closed'][$userID]."', `endtime` = '".$_POST['closed'][$userID]."', `closed`='1' WHERE `days` = '".$_POST['days'][$userID]."'";
                $sqldone = mysqli_query($db, $user_update_query);
                header('location: ../about/');
            }else{
                $user_update_query = "UPDATE `work_info` SET `start_time` = '".$_POST['start_time'][$userID]."', `endtime` = '".$_POST['endtime'][$userID]."', `closed`='0' WHERE `days` = '".$_POST['days'][$userID]."'";
                $sqldone = mysqli_query($db, $user_update_query);
                header('location: ../about/');
            };
        };
    };
//---------------------------------------------------------------------
    //Update services
    if (isset($_POST['id'])){
        foreach($_POST['id'] as $userID){
            $text = base64_encode(stripslashes(mysqli_real_escape_string($db, $_POST['text'][$userID])));
            $user_update_query = "UPDATE `services_info` SET `icon` = '".$_POST['icon'][$userID]."', `title` = '".$_POST['title'][$userID]."', `text` = '".$text."' WHERE `id` = '".$_POST['id'][$userID]."'";
            $sqldone = mysqli_query($db, $user_update_query);
            header('location: ./');
        };
    };
//---------------------------------------------------------------------
    //Update plans
    if (isset($_POST['id'])){
        foreach($_POST['id'] as $userID){
            $price = $_POST['price'][$userID];
            $price = $price.' NGN';
            $user_update_query = "UPDATE `plans_info` SET `name` = '".$_POST['name'][$userID]."', `price` = '".$price."', `duration` = '".$_POST['duration'][$userID]."', `benefit` = '".$_POST['benefit'][$userID]."' WHERE `id` = '".$_POST['id'][$userID]."'";
            $sqldone = mysqli_query($db, $user_update_query);
            header('location: ./');
        };
    };
//---------------------------------------------------------------------
    //Update specialties
    if (isset($_POST['id'])){
        foreach($_POST['id'] as $userID){
            $user_update_query = "UPDATE `specialties` SET `specialty` = '".$_POST['specialty'][$userID]."' WHERE `id` = '".$_POST['id'][$userID]."'";
            $sqldone = mysqli_query($db, $user_update_query);
            header('location: ./');
        };
    };



?>