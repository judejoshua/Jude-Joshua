<?php

    include('../../../config/server.php');

        $name = $_GET['name'];
        $email = $_GET['email'];


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

        header('location: ../');
        //exit();







?>