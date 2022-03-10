<?php

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
                $email = htmlspecialchars($_POST['email']);
                $msg = htmlspecialchars($_POST['message']);
            
                // Set up parameters
                $to = "hello@judejoshua.me, officialuby@gmail.com";
                $subject = "I HAVE AN ENQUIRY TO YOUR WEBSITE";
                $message = "<p>Hello Jude,</p>
                <p>".$msg."</p>
                <p>Kind regards,<br/>".$name."</p>
                ";
                $from = $email;
                $headers = "MIME-Version: 1.0" . "\n";
                $headers .= "Content-type:text/html;charset=iso-8859-1" . "\n";
                $headers .= "From: $from" . "\n";
       
                // Inform the user
                if(mail($to, $subject, $message, $headers)){
                    $to = $email;
                    $subject = "I HAVE RECIEVED YOUR MESSAGE";
                    $message = "<p>Hello ".$name.",</p>
                    <p>So nice for you to reach out. I promise I won't take too long and will reply you soon.</p>
                    <p>Kind regards,<br/>Jude Joshua.</p>
                    ";
                    $from = "hello@judejoshua.me";
                    $headers = "MIME-Version: 1.0" . "\n";
                    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\n";
                    $headers .= "Jude Joshua < $from >" . "\n";
                  
                  	mail($to,$subject,$message,$headers);
                    echo 'success=sent';
                }else{
                    echo 'error=failed';
                }
            break;
        }
    break;

    case isset($_POST['pname']):
        switch (true) {
            case empty($_POST['pname']):
                echo 'What\'s your name?';
                break;
            case empty($_POST['email']):
                echo 'What\'s your email address?';
                break;
            case (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):
                echo 'Your email address is not a valid email.';
                break;
            case empty($_POST['project']):
                echo 'Select the type of project needed...';
                break;
            case empty($_POST['pages']):
                echo 'Enter the number of pages for your project...';
                break;
            case empty($_POST['budget']):
                echo 'Please enter your budget...';
                break;
            case empty($_POST['currency']):
                echo 'Please select your budget currency...';
                break;
            default:
                $name = htmlspecialchars($_POST['pname']);
                $email = htmlspecialchars($_POST['email']);
                $project = htmlspecialchars($_POST['project']);
                $pages = htmlspecialchars($_POST['pages']);
                $budget = htmlspecialchars($_POST['currency']).' '.htmlspecialchars($_POST['budget']);
                $msg = htmlspecialchars($_POST['message']);
            
                // Set up parameters
                $to = "hello@ubyjude.me, ubyjudeh@outlook.com";
                $subject = "I HAVE A PROJECT TO WORK ON";
                $message = "<p>Hello Jude,</p>
                <p>I have a project I'd like you to work on. See the details below;</p>
                <p>Project type: ".$project."</p>
                <p>No. of pages: ".$pages."</p>
                <p>Budget: ".$budget."</p>
                <p>Additional info: ".$msg."</p>
                <p>Kind regards,<br/>".$name."</p>
                ";
                $from = $email;
                $headers = "MIME-Version: 1.0" . "\n";
                $headers .= "Content-type:text/html;charset=iso-8859-1" . "\n";
                $headers .= "From: $from" . "\n";

                // Inform the user
                if(mail($to,$subject,$message,$headers)){
                    $to = $email;
                    $subject = "I HAVE RECEIVED YOUR MESSAGE";
                    $message = "<p>Hello ".$name.",</p>
                    <p>So nice for you to reach out. I'm excited to learn about your project!</br> I promise I won't take too long and will reply you soon.</p>
                    <p>While you wait, kindly go through my onboarding process. Click the link below to view it.</p>
                    <a href='https://ubyjude.me/assets/files/onboarding-process.pdf' download>Client Onboarding Process</a>
                    <p>Kind regards,<br/>UbyJude Josh.</p>
                    ";
                    $from = "hello@ubyjude.me";
                    $headers = "MIME-Version: 1.0" . "\n";
                    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\n";
                    $headers .= "From: Jude Joshua < $from >" . "\n";
                  
                  	mail($to,$subject,$message,$headers);
                    echo 'Successful!';
                }else{
                    echo 'Oops! I couldn\'t send your message. Please try again in a few minutes.';
                }
                break;
        }
    break;

}
