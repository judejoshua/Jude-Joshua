<?php
    session_start();
    $errors = array();
    $successes = array();
    $db = mysqli_connect('localhost:3306', 'root', '', 'cypressenergy');
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
            $query = "SELECT `name`, `password`, `role` FROM `users` WHERE `name` = '".$adminuser."' LIMIT 1";
            $results = mysqli_query($db, $query);
            $user = mysqli_fetch_assoc($results);
            $count = mysqli_num_rows($results);

            if ($count == 1) {
                if(password_verify($adminpassword, $user['password'])){
                    $roles = $user['role'];
                    $roler = mysqli_query($db, "SELECT `id` FROM `roles` WHERE `id` = '".$roles."' ");
                    $counter = mysqli_num_rows($results);

                    if ($counter == 1) {
                        $_SESSION['adminusername'] = $user['name'];
                        $_SESSION['adminid']= $_SESSION['adminusername'];

                        header('location: ../../');
                        exit();
                    }else{
                        array_push($errors, "Fatal login error!");
                    }

                }
                else{
                    array_push($errors, "Incorrect password! try again!!");
                }
            }else{
                    array_push($errors, "Incorrect input! Access denied!!");
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


        $user_check_query = " SELECT `name`, `password` FROM `users` WHERE `name`= '{$_SESSION['adminid']}' LIMIT 1";
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
    //Update gallery
    if(isset($_POST['save-gallery'])){
      $projectName = stripslashes(mysqli_real_escape_string($db, $_POST['projectName']));
      $projectDate = stripslashes(mysqli_real_escape_string($db, $_POST['projectDate']));
      $projectDes = stripslashes(mysqli_real_escape_string($db, $_POST['projectDes']));

      $image_name = $_FILES["projectimg"]["name"];
      $user_dir = "../../../../config/assets/images/gallery/";
      $dir = base64_encode($user_dir);

      if (move_uploaded_file($_FILES["projectimg"]["tmp_name"],"$user_dir".$image_name)){

          $setup_complete = mysqli_query($db, "INSERT INTO `gallery` (`i_name`, `i_loc`, `name`, `date`, `des`)
          VALUES('".$image_name."', '".$dir."', '".$projectName."', '".$projectDate."', '".$projectDes."') ");

          if($setup_complete){
              header('location: ./');
          }else{
              array_push($errors, 'Error uploading project into Gallery!!');
          }
        }else{
            array_push($errors, 'Could not upload file! Try with another file!!');
        }
    }
//---------------------------------------------------------------------------------------------------
    $s_count = "SELECT `id` FROM `subscriptions`";
    $s_query = mysqli_query($db, $s_count);
    $s_sub = mysqli_num_rows($s_query);

?>
