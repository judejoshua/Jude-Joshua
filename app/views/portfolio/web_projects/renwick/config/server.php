<?php

$errors = array();
$successes = array();
$db = mysqli_connect('localhost', 'judegniz_web_projects', 'web_projects234#', 'judegniz_bidforme');
if(! $db ) {
    die('Could not connect to the database: ' . mysqli_connect_error());
}
//-------------------------------------------------------------------
    if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['message'])){
        $name = stripslashes(mysqli_real_escape_string($db, $_POST['name']));
        $email = stripslashes(mysqli_real_escape_string($db, $_POST['email']));
        $phone = stripslashes(mysqli_real_escape_string($db, $_POST['phone']));
        $message = base64_encode(stripslashes(mysqli_real_escape_string($db, $_POST['message'])));
        $new = '1';
        $reply = '0';

        $send = mysqli_query($db, "INSERT INTO `messages`(`name`, `email`, `phone`, `message`, `new`, `reply`) VALUES ('".$name."', '".$email."', '".$phone."', '".$message."', '".$new."', '".$reply."')");

        if($send){
            echo 'Successful!';
            exit();
        }else{
            echo 'Error sending message!';
        }

    }
//---------------------------------------------------------------------
    $request = mysqli_query($db, "SELECT `about`, `location`, `city`, `state`, `country`, `email`, `phone` FROM `contact_info`");
    $show = mysqli_fetch_assoc($request);

    $about = base64_decode($show['about']);
    $loc = $show['location'];
    $city = $show['city'];
    $state = $show['state'];
    $country = $show['country'];
    $email = $show['email'];
    $tel = $show['phone'];
//----------------------------------------------------------------
if (isset($_POST['newsEmail'])){
    $eEmail = stripslashes(mysqli_real_escape_string($db, $_POST['newsEmail']));

    $email_check = mysqli_query($db, "SELECT `email` FROM `subscriptions` WHERE `email` = '".$eEmail."' ");
    $user = mysqli_fetch_assoc($email_check);
    $redk = mysqli_num_rows($email_check);

    if ($redk == 0){
        $send = mysqli_query($db, "INSERT INTO `subscriptions`(`email`) VALUES ('".$eEmail."')");

        if($send){
            echo 'Successful!';
            exit();
        }else{
            echo 'Error while subscribing, try again!';
        }
    }else{
        echo 'You have already subscribed to our emailing list!';
    }
}
//------------------------------------------------------------------


?>
