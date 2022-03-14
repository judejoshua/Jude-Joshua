<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer(true);

switch($_POST) {
    case isset($_POST['name']):
        switch (true) {
            // case empty($_POST['name']):
            //     echo 'error=name';
            //     break;
            // case empty($_POST['email']):
            //     echo 'error=email';
            //     break;
            // case (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):
            //     echo 'error=email=invalid';
            //     break;
            // case empty($_POST['message']):
            //     echo 'error=message';
            //     break;
            default:
                // $name = htmlspecialchars($_POST['name']);
                // $email = htmlspecialchars($_POST['email']);
                // $msg = htmlspecialchars($_POST['message']);
 
                //Enable SMTP debugging.
                $mail->SMTPDebug = 3;                               
                //Set PHPMailer to use SMTP.
                $mail->isSMTP();            
                //Set SMTP host name                          
                $mail->Host = "judejoshua.me";
                //Set this to true if SMTP host requires authentication to send email
                $mail->SMTPAuth = true;                          
                //Provide username and password     
                $mail->Username = "_mainaccount@judejoshua.me";         
                $mail->Password = "Felenous12#";//store this in the database                    
                //If SMTP requires TLS encryption then set it
                $mail->SMTPSecure = "tls";
                //Set TCP port to connect to
                $mail->Port = 465;                                   

                $mail->From = "hello@judejoshua.me";
                $mail->FromName = "Jude Joshua";

                $mail->addAddress("officialuby@gmail.com", "Jude test");

                $mail->isHTML(true);

                $mail->Subject = "Subject Text";
                $mail->Body = "<i>Mail body in HTML</i>";
                $mail->AltBody = "This is the plain text version of the email content";

                try {
                    $mail->send();
                    echo "Message has been sent successfully";
                } catch (Exception $e) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                }

            
                // // Set up parameters
                // $to = "hello@judejoshua.me, officialuby@gmail.com";
                // $subject = "I HAVE AN ENQUIRY TO YOUR WEBSITE";
                // $message = "<p>Hello Jude,</p>
                // <p>".$msg."</p>
                // <p>Kind regards,<br/>".$name."</p>
                // ";
                // $from = $email;
                // $headers = "MIME-Version: 1.0" . "\n";
                // $headers .= "Content-type:text/html;charset=iso-8859-1" . "\n";
                // $headers .= "From: $from" . "\n";
       
                // // Inform the user
                // if(mail($to, $subject, $message, $headers)){
                //     $to = $email;
                //     $subject = "I HAVE RECIEVED YOUR MESSAGE";
                //     $message = "<p>Hello ".$name.",</p>
                //     <p>So nice for you to reach out. I promise I won't take too long and will reply you soon.</p>
                //     <p>Kind regards,<br/>Jude Joshua.</p>
                //     ";
                //     $from = "hello@judejoshua.me";
                //     $headers = "MIME-Version: 1.0" . "\n";
                //     $headers .= "Content-type:text/html;charset=iso-8859-1" . "\n";
                //     $headers .= "Jude Joshua < $from >" . "\n";
                  
                //   	mail($to,$subject,$message,$headers);
                //     echo 'success=sent';
                // }else{
                //     echo 'error=failed';
                // }
            break;
        }
    break;

   
}
