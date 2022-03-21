<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer(true);

switch($_POST) {
    case isset($_POST['name']):
        switch (true) {
            case empty($_POST['name']):
                echo 'error=name';
                break;
            case empty($_POST['email']):
                echo 'error=email';
                break;
            case (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):
                echo 'error=email=invalid';
                break;
            case empty($_POST['message']):
                echo 'error=message';
                break;
            default:
                $name = htmlspecialchars($_POST['name']);
                $firstname = explode(" ",$name)[0];
                $email = htmlspecialchars($_POST['email']);
                $msg = htmlspecialchars($_POST['message']);
 
                //Enable SMTP debugging.
                $mail->SMTPDebug = 3;                               
                //Set PHPMailer to use SMTP.
                $mail->isSMTP();            
                //Set SMTP host name                          
                $mail->Host = "judejoshua.me";
                //Set this to true if SMTP host requires authentication to send email
                $mail->SMTPAuth = true;                          
                //Provide username and password     
                $mail->Username = "hello@judejoshua.me";//store this in the database    
                $mail->Password = "Felenous12#";//store this in the database                    
                //If SMTP requires TLS encryption then set it
                $mail->SMTPSecure = "tls";
                //Set TCP port to connect to
                $mail->Port = 26;                                   

                $mail->From = "hello@judejoshua.me";
                $mail->FromName = "Jude Joshua";

                $mail->addAddress($email, $name);

                $mail->isHTML(true);

                $mail->Subject = "I HAVE RECEIVED YOUR MESSAGE";
                $mail->Body = "<p>Hi ".$firstname.",</p>
                     <p>You reached out to me via my website contact form.<br/>This is an automated response to let you know that I have recieved your message and I will reply you soon.<br/>Don't worry, I promise I won't take long.</p>
                     <p>Warm regards,<br/>Jude Joshua.</p>";
                try {
                    $mail->send();
                    
                    $mail->ClearAddresses();  // each AddAddress add to list
                    $mail->ClearCCs();
                    $mail->ClearBCCs();
                    
                    $mail->addAddress("hello@judejoshua.me");
                    $mail->AddCC("officialuby@gmail.com");
                    $mail->Subject = "New Contact Form Message";
                    $mail->Body = "<p>You have a new message from <i>".$name."</i>.</p>
                     <p><b>Their email is: </b><br/><i>".$email."</i></p>
                     <p><b>Here is their message: </b><br/><i>".$msg."</i></p>";
                     $mail->send();
                    echo 'success=sent';
                    // echo "Message has been sent successfully";
                } catch (Exception $e) {
                    echo 'error=failed';
                    // echo "Mailer Error: " . $mail->ErrorInfo;
                }
            break;
        }
    break;  
}
