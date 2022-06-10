<?php
    session_start();
    $errors = array(); 
    $successes = array();
    $db = mysqli_connect('localhost', 'judegniz_web_projects', 'web_projects234#', 'judegniz_cms');
    if(! $db ) {
        die('Could not connect to the database: ' . mysqli_connect_error());
    }
//---------------------------------------------------------------------
    // Login staff
    if (isset($_POST['login'])) {
        $staffuser = stripslashes(mysqli_real_escape_string($db, $_POST['staffuser']));
        $staffpassword = stripslashes(mysqli_real_escape_string($db, $_POST['staffpassword']));
    
        if (empty($staffuser)) {
            array_push($errors, "Id or Email is required");
        }
        if (empty($staffpassword)) {
            array_push($errors, "Password is required");
        }
    
        if (count($errors) == 0) {
            $query = "SELECT `name`, `password`, `verified`, `role`, `phone`, `email` FROM `management` WHERE `staff_id` = '".$staffuser."' OR  `email` = '".$staffuser."' LIMIT 1";
            $results = mysqli_query($db, $query);
            $user = mysqli_fetch_assoc($results);
            $count = mysqli_num_rows($results);

            if($count == 1){
                if(password_verify($staffpassword, $user['password'])){
                    if($user['verified'] == '0'){
                        $_SESSION['staffusername'] = $user['name'];
                        $_SESSION['staffuid'] = $_SESSION['staffusername'];
            
                        header('location: ../profiles/');
                        exit();
                    }else{
                        $_SESSION['staffusername'] = $user['name'];
                        $_SESSION['staffid']= $_SESSION['staffusername'];
                        $_SESSION['staffrole'] = $user['role'];
            
                        header('location: ../../');
                        exit();
                    };
                }else{
                    array_push($errors, "Incorrect Password, try again!!");
                };
            }else{
               array_push($errors, "Incorrect input, credentials not found!!");
            };
        };
    };
//---------------------------------------------------------------------
    //Update pass
    if (isset($_POST['change'])) {
        $staffold = stripslashes(mysqli_real_escape_string($db, $_POST['staffold']));
        $staffnew = stripslashes(mysqli_real_escape_string($db, $_POST['staffnew']));
        $staffconfirm = stripslashes(mysqli_real_escape_string($db, $_POST['staffconfirm']));

        $options = array("cost" == 8);
        $staffnew_hashed = password_hash($staffnew, PASSWORD_BCRYPT, $options);


        $user_check_query = " SELECT `name`, `password` FROM `management` WHERE `name`= '{$_SESSION['staffid']}' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            if(password_verify($staffold, $user['password'])){
                if(password_verify($staffnew, $user['password'])){
                    array_push($errors, "Sorry, new password cannot be same with old password!");
                }else{
                    if(password_verify($staffconfirm, $staffnew_hashed)){
                        $change = "UPDATE `management` SET `password`= '$staffnew_hashed' WHERE `name` = '{$_SESSION['staffid']}'";
                        $changedone = mysqli_query($db, $change);
                        array_push($successes, "Password changed successfully!");
                    }else{
                        array_push($errors, "Passwords do not match!");
                    }
                }
            }else{
                array_push($errors, "Old password is incorrect! Try again!");
            }
        }else{
            array_push($errors, "Error! Try again!");
        }
        
    };
//---------------------------------------------------------------------
    //Account Setup
    if (isset($_POST['save-data'])) {
        $staffid = stripslashes(mysqli_real_escape_string($db, $_POST['staffid']));
        $staffname = stripslashes(mysqli_real_escape_string($db, $_POST['staffname']));
        $staffemail = stripslashes(mysqli_real_escape_string($db, $_POST['staffemail']));
        $staffphone = stripslashes(mysqli_real_escape_string($db, $_POST['staffphone']));
        $staffstate = stripslashes(mysqli_real_escape_string($db, $_POST['staffstate']));
        $staffcountry = stripslashes(mysqli_real_escape_string($db, $_POST['staffcountry']));
        $staffaddress = stripslashes(mysqli_real_escape_string($db, $_POST['staffaddress']));
        $staffaddress_state = stripslashes(mysqli_real_escape_string($db, $_POST['staffaddress_state']));
        $staffaddress_country = stripslashes(mysqli_real_escape_string($db, $_POST['staffaddress_country']));
        $staffpassword = stripslashes(mysqli_real_escape_string($db, $_POST['staffpassword']));
        $staffrole = stripslashes(mysqli_real_escape_string($db, $_POST['staffrole']));

        $image_name = $_FILES["staffpic"]["name"];
        $target_dir = "../../config/assets/uploads/";
        $dir = base64_encode($target_dir);
        

        $options = array("cost" == 8);
        $staffpassword_hashed = password_hash($staffpassword, PASSWORD_BCRYPT, $options);

        if ($staffrole == 'Doctor'){
            $staffspecialty = stripslashes(mysqli_real_escape_string($db, $_POST['staffspecialty']));
            $stafflicense = stripslashes(mysqli_real_escape_string($db, $_POST['stafflicense']));

            $no = mysqli_query($db, "SELECT `license_number` FROM $staffrole");
            $users = mysqli_fetch_assoc($no);
            if($stafflicense == $users['license_number']){
                array_push($errors, 'License Number has already been used!!');
            }else{
                move_uploaded_file($_FILES["staffpic"]["tmp_name"],"$target_dir".$image_name);
            
                $setup_complete = mysqli_query($db, "INSERT INTO $staffrole (`name`, `state_of_origin`, `nationality`, `address`, `state_of_residence`, `country_of_residence`, `specialty`, `license_number`, `photo_name`, `photo_loc`)
                VALUES('".$staffname."', '".$staffstate."', '".$staffcountry."', '".$staffaddress."', '".$staffaddress_state."', '".$staffaddress_country."', '".$staffspecialty."', '".$stafflicense."', '".$image_name."', '".$dir."') ");    
                    
                if($setup_complete){
                    $update = mysqli_query($db, "UPDATE `management` SET `name`='".$staffname."', `email`='".$staffemail."', `phone`='".$staffphone."', `verified`='1', `password`='".$staffpassword_hashed."' WHERE `s/n`='".$staffid."' ");
                    if($update){
                        $_SESSION['staffid'] = $_SESSION['staffuid'];
                        $_SESSION['staffrole'] = $staffrole;
                        unset($_SESSION["staffuid"]);
        
                        header('location: ../../');
                    }else{
                        array_push($errors, 'Error');
                    }
                }else{
                    array_push($errors, 'Error setting up account!!');
                };
            }
        }else{
            move_uploaded_file($_FILES["staffpic"]["tmp_name"],"$target_dir".$image_name);
            $setup_complete = mysqli_query($db, "INSERT INTO $staffrole (`name`, `state_of_origin`, `nationality`, `address`, `state_of_residence`, `country_of_residence`, `photo_name`, `photo_loc`)
            VALUES('".$staffname."', '".$staffstate."', '".$staffcountry."', '".$staffaddress."', '".$staffaddress_state."', '".$staffaddress_country."', '".$image_name."', '".$dir."') ");

            if($setup_complete){
                $update = mysqli_query($db, "UPDATE `management` SET `name`='".$staffname."', `email`='".$staffemail."', `phone`='".$staffphone."', `verified`='1', `password`='".$staffpassword_hashed."' WHERE `s/n`='".$staffid."' ");
                if($update){
                    $_SESSION['staffid'] = $_SESSION['staffuid'];
                    $_SESSION['staffrole'] = $staffrole;
                    unset($_SESSION["staffuid"]);

                    header('location: ../../');
                }else{
                    array_push($errors, 'Error');
                }
            }else{
                array_push($errors, 'Error setting up account!!');
            };
        };

    };
//---------------------------------------------------------------------
    //Profile update
    if (isset($_POST['profile'])) {
        $staffemail = stripslashes(mysqli_real_escape_string($db, $_POST['staffemail']));
        $staffphone = stripslashes(mysqli_real_escape_string($db, $_POST['staffphone']));
        $staffaddress = stripslashes(mysqli_real_escape_string($db, $_POST['staffaddress']));
        $staffaddress_state = stripslashes(mysqli_real_escape_string($db, $_POST['staffaddress_state']));
        $staffaddress_country = stripslashes(mysqli_real_escape_string($db, $_POST['staffaddress_country']));
        $staffrole = stripslashes(mysqli_real_escape_string($db, $_POST['staffrole']));
        $staffid = stripslashes(mysqli_real_escape_string($db, $_POST['staffname']));

        $setup_complete = mysqli_query($db, "UPDATE $staffrole SET `address` = '".$staffaddress."', `state_of_residence` = '".$staffaddress_state."', `country_of_residence`='".$staffaddress_country."' WHERE `name`='".$staffid."' ");

        if($setup_complete){
            $update = mysqli_query($db, "UPDATE `management` SET `email`='".$staffemail."', `phone`='".$staffphone."' WHERE `name`='".$staffid."' ");
            header('location: ./');
        }else{
            array_push($errors, 'Error Updating Profile!!');
        };
    };
    
    if (isset($_POST['pichure'])){
        $staffrole = stripslashes(mysqli_real_escape_string($db, $_POST['staffrole']));
        $staffid = stripslashes(mysqli_real_escape_string($db, $_POST['staffname']));

        $image_name = $_FILES["staffimg"]["name"];
        $target_dir = "../../config/assets/uploads/";
        $real_target_dir = "../../../config/assets/uploads/";
        $dir = base64_encode($target_dir);

        move_uploaded_file($_FILES["staffimg"]["tmp_name"],"$real_target_dir".$image_name);

        $setup_complete = mysqli_query($db, "UPDATE $staffrole SET `photo_name` = '".$image_name."', `photo_loc` = '".$dir."' WHERE `name`='".$staffid."' ");

        if($setup_complete){
            header('location: ./');
        }else{
            array_push($errors, 'Error Updating Picture!!');
        };
    };
//---------------------------------------------------------------------
    //Patitent search
    if(isset($_POST['recep-check'])){
        $checkpatient = stripslashes(mysqli_real_escape_string($db, $_POST['checkpatient']));
        if(empty($checkpatient)){
            array_push($errors, "Please enter an ID");
        }else{
            $sql = mysqli_query($db, "SELECT `p_id` FROM `patients` WHERE `p_id`='".$checkpatient."' ");
            $check_num = mysqli_num_rows($sql);
            if($check_num == 1){
				$_SESSION['search_id'] = $checkpatient;
                header('location: ./view.php');
            }else{
                array_push($errors, "Patient could not be found!");
            }
        }
    }
?>