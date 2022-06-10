<?php
    session_start();
    $db = mysqli_connect('localhost:3306', 'root', '', 'bidforme');
    if(! $db ) {
        die('Could not connect to the database: ' . mysqli_connect_error());
    }

//----------------------------------------------------------------------
    // Login User
    if (isset($_POST['user'], $_POST['userlog'])) {
        $user = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['user'])));
        $userpazz = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['userlog'])));
        $role = '3';
        
        
        if (!empty($user) && !empty($userpazz)){
            $user_check_query = "SELECT * FROM `users` WHERE `email`='$user' AND `role`='3' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            $count = mysqli_num_rows($result);

            if ($count == 0) {
                
                echo "Invalid Login details!";

            }elseif ($count == 1) {
                if(password_verify($userpazz, $user['password'])){
                    
                    if ($user['verified'] == 0) {

                        echo "Verify your email first!";
                        $_SESSION['verid'] = $user['user_id'];
                        $_SESSION['name'] = $user['name'];
                        $_SESSION['user'] = $_SESSION['name'];
        
                    }elseif ($user['verified'] == 1) {
                        echo "Login Successful!";
                        $_SESSION['name'] = $user['name'];
                        $_SESSION['user'] = $_SESSION['name'];
                        $_SESSION['user_id'] = $user['user_id'];    
                    }

                } else {
                    echo "Incorrect Password, try again!";
                }
            };

        };
    };

//-------------------------------------------------------------------------
    //Register User
    if (isset($_POST['uname'], $_POST['email'], $_POST['phone'], $_POST['password'], $_POST['conpassword'])){
        $name = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['uname'])));
        $email = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['email'])));
        $phone = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['phone'])));
        $password = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['password'])));
        $conpassword = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['conpassword'])));
        $role = '3';

        $code = substr(md5(mt_rand()), 0, 20);
        $verified = '0';
        $referral_code = substr($code, 0, 15);
        $verification_code = substr((mt_rand()), 0, 5);
        $user_id = 'AW -'.$verification_code;

        $options = array("cost" == 8);
          
        if (!empty($password) && !empty($name)){
                        
            if ($conpassword != $password){
                echo 'Passwords do not match';
            } else {
                $query = "SELECT * FROM `users` WHERE `name` = '".$name."' LIMIT 1";
                $results = mysqli_query($db, $query);
                $user = mysqli_fetch_assoc($results);
    
                if ($user) {
                    echo 'Sorry, name is already registered!<br>';
                }else{
                    
                    $querym = "SELECT * FROM `users` WHERE `email` = '".$email."' LIMIT 1";
                    $resultsm = mysqli_query($db, $querym);
                    $reach = mysqli_fetch_assoc($resultsm);
    
                    if ($reach) {
                        echo 'Sorry, email is already registered!<br>';
                    }else {

                        $queryp = "SELECT * FROM `users` WHERE `phone` = '".$phone."' LIMIT 1";
                        $resultsp = mysqli_query($db, $queryp);
                        $caxa = mysqli_fetch_assoc($resultsp);
    
                        if ($caxa) {
                            echo 'Sorry, phone number is already registered!<br>';
                        }else{
                            $pass_hashed = password_hash($password, PASSWORD_BCRYPT, $options);

                            $query = mysqli_query($db, "INSERT INTO `users` (`name`, `user_id`, `email`, `phone`, `password`, `role`, `verification_code`, `verified`, `referral_code`)
                                    VALUES('$name', '$user_id', '$email', '$phone', '$pass_hashed', '$role', '$verification_code', '$verified', '$referral_code')");
            
                            /*if(isset($_SESSION['referee'])){
                                $referee = $_SESSION['referee'];
                                $referral_id = $_SESSION['referral_id'];
                                $refer = "INSERT INTO `referrals`(`referee`, `referral_id`, `referred`) VALUES ('$referee','$referral_id','$name')";
                                mysqli_query($db, $refer);
                                unset($_SESSION["referee"]);
                                unset($_SESSION["referral_id"]);
                            }*/
            
                            /*$to = $email;
                            $subject = "Please verify you account!";
                            $headers = "From: no-reply@firstmedtradeafrica.com\r\n";
                            $headers .= "MIME-Version: 1.0\r\n";
                            $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
                            
                            $message = '<html><body>';
                            $message .= '<img src = "https://test.firstmedtradeafrica.com/config/assets/images/logo-variant.png" alt="CoinKrypt logo" width="130" height="100"/>';
                            $message .= '<table rules="all" style="border-color: #888888; background: #eeeeeee;" cellpadding="10">';
                            $message .= "<tr style='border: none;'><td>Hi $name. Thank you for joining our community. Your registration was successful! Your User Id is $user_id.<br>One last thing; click on the button below to verify your email and gain full access to your account.</td></tr>";
                            $message .= "<tr style='border: none;'><td><a href='/files/demo.firstmedtradeafrica.com/coinkrypt-db/config/verify.php?user=$name&code=$verification_code'>Verify Email</a></td></tr>";
                            $message .= "<tr style='border: none;'><td>Cheers,<br/>CoinKrypt.</td></tr>";
                            $message .= '</table>';
                            $message .= '</body></html>';
                            
                            mail($to, $subject, $message, $headers);*/
                
                            $_SESSION['user'] = "$name";
                            $_SESSION['verid']= "$user_id";
            
                            echo 'Successful!';
                            exit();            
                        }
                    }
                }
            }
        }
    }

//------------------------------------------------------------------------------------
//Create Store
    if (isset($_POST['store'])){
        $store = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['store'])));
        $us_name = $_SESSION['user'];
        $user_id = $_SESSION['user_id'];

        if (!empty($store)){
            $query = mysqli_query($db, "SELECT * FROM `store` WHERE `store_name`= '.$store.' ");
            $user = mysqli_fetch_assoc($query);
            $num = mysqli_num_rows($query);

            $store_ad = substr($store, 0, 2);
            $id = substr((mt_rand()), 0, 5);
            $store_id = $store_ad.'-'.$id;

            if ($num > 0){
                echo 'Store name already exists!';
            }else{
                $query = mysqli_query($db, "INSERT INTO `store` (`store_name`, `store_id`, `store_owner`, `owner_id`)
                VALUES('".$store."', '".$store_id."', '".$us_name."', '".$user_id."')");
                if($query){
                    echo 'Successful!';
                    exit();
                }else{
                    echo 'Error creating store! Try again..';
                }
            }
        }
    }

//------------------------------------------------------------------------------------
//Add product
    if(isset($_POST['productName'], $_POST['producttype'], $_POST['productDate'], $_POST['productXDate'], $_POST['productbatch'], $_POST['productprice'])){
        
        $productName = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['productName'])));
        $producttype = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['producttype'])));
        $productDate = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['productDate'])));
        $productXDate = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['productXDate'])));
        $productbatch = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['productbatch'])));
        $productprice = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['productprice'])));

        if (!empty($productName) && !empty($producttype) && !empty($productDate) && !empty($productXDate) && !empty($productbatch) && !empty($productprice)){
            $image_name = $_FILES["productimg"]["name"];
            $user_dir = "./assets/images/products/";
            $dir = base64_encode($user_dir);

            $store = mysqli_query($db, "SELECT `store_name` FROM `store` WHERE `store_owner`= '{$_SESSION['user']}' ");
            $see = mysqli_fetch_assoc($store);  
            $store_name = $see['store_name'];

            $product_ad = substr($productName, 0, 3);
            $store_ad = substr($store_name, 0, 3);
            $id = substr((mt_rand()), 0, 5);
            $product_id = $product_ad.'-'.$id.'/'.$store_ad;
            $productprice = '$'.$productprice;

            if (move_uploaded_file($_FILES["productimg"]["tmp_name"],"$user_dir".$image_name)){

                $setup_complete = mysqli_query($db, "INSERT INTO `products`(`store_name`, `product_name`, `product_id`, `product_cat`, `product_price`, `product_man`, `product_exp`, `batch_num`, `product_img`, `img_loc`)
                VALUES('".$store_name."','".$productName."','".$product_id."','".$producttype."','".$productprice."', '".$productDate."', '".$productXDate."', '".$productbatch."', '".$image_name."', '".$dir."') ");

                if($setup_complete){
                    echo 'Successful!';
                    exit();
                }else{
                    echo 'Error adding new product!!';
                }

            }else{
                echo 'Could not upload image! Try with another image!!';
            };
        }
    }

//------------------------------------------------------------------------------------
//Change Password
    if (isset($_POST['userold'], $_POST['usernew'], $_POST['userconfirm'])) {
        $userold = stripslashes(mysqli_real_escape_string($db, $_POST['userold']));
        $usernew = stripslashes(mysqli_real_escape_string($db, $_POST['usernew']));
        $userconfirm = stripslashes(mysqli_real_escape_string($db, $_POST['userconfirm']));

        $options = array("cost" == 8);
        $usernew_hashed = password_hash($usernew, PASSWORD_BCRYPT, $options);

        $user_check_query = " SELECT `name`, `password` FROM `users` WHERE `name`= '{$_SESSION['user']}' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            if(password_verify($userold, $user['password'])){
                if(password_verify($usernew, $user['password'])){
                    array_push($errors, "Sorry, new password cannot be same with old password!");
                }else{
                    if(password_verify($userconfirm, $usernew_hashed)){
                        $change = "UPDATE `users` SET `password`= '$usernew_hashed' WHERE `name` = '{$_SESSION['user']}'";
                        $changedone = mysqli_query($db, $change);
                        echo "Successful!";
                    }else{
                        echo "Passwords do not match!";
                    }
                }
            }else{
                echo "Old password is incorect! Try again!";
            }
        }
    };

//----------------------------------------------------------------------
// Verify User
    if (isset($_POST['verf'])) {
        $code = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['verf'])));        
        
        if (!empty($code)){
            $user_check_query = "SELECT * FROM `users` WHERE `verification_code`='$code' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            $count = mysqli_num_rows($result);
            $name = $user['name'];

            if ($count == 1) {
                $query = mysqli_query($db,"UPDATE `users` SET `verification_code`= NULL, `verified`='1' WHERE `name` = '$name'");
                if ($query) {
                    echo "Ready!";

                    $_SESSION['name'] = $name;
                    $_SESSION['user'] = $_SESSION['name'];    
                }else{
                    echo 'An error occured!';
                }

            }else {
                echo "Invalid verification code!";
            } 
        };

    };


?>
