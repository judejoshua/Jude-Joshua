<?php

    include('../../../config/server.php');

    $id = $_GET['id'];

    $sql = mysqli_query($db, "SELECT * FROM `contacts` WHERE `id`='".$id."'");
    $view = mysqli_fetch_array($sql);

    $name = $view['name'];
    $email = $view['email'];
    $phone = $view['phone'];
    $message = base64_decode($view['message']);
    $reply = $view['reply'];

    if(isset($_POST['reply-save'])){
        $contactreply = stripslashes( mysqli_real_escape_string($db, $_POST['reply']));
        $reply = base64_encode($contactreply);

        $query = "UPDATE `contacts` SET `reply`='1' WHERE `contacts`.`name`='".$name."' ";
        $sent = mysqli_query($db, $query);
        if ($sent){
            $to = $email;
            $subject = "Response!";
            $headers = "From: no-reply@firstmedtradeafrica.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
            
            $message = '<html><body>';
            $message .= '<img src = "/config/assets/images/logo-variant.png" alt="CoinKrypt logo" width="130" height="100"/>';
            $message .= '<table rules="all" style="border-color: #888888; background: #eeeeeee;" cellpadding="10">';
            $message .= "<tr style='border: none;'><td>Dear $name,<br/>$contactreply</td></tr>";
            $message .= "<tr style='border: none;'><td>Cheers,<br/>Caritas university Clinic.</td></tr>";
            $message .= '</table>';
            $message .= '</body></html>';
            
            mail($to, $subject, $message, $headers);

            header('location: ../');
            exit();
        }else{
            array_push($errors, "Message could not be sent, please try again.");
        }
    };

    if($sql){
        echo '
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <meta name="author" content="mite-systems">
                <meta name="description" content="">
                <meta name="format-detection" content="telephone=no">
                <meta name="keywords" content="">

                <title>Contact Messages</title>

                <link rel="icon" href="/config/assets/images/logo-mini.png"/>
                <link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/main.css" />
                <link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/materialdesignicons.min.css" />
                <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
            </head>
            <body>
                <div class="admin divwrap">
                    <div class="side-nav">
                        ';include_once('../../../config/nav.php'); echo'
                    </div>
                    <div class="profile-right">
						<div class="profile-nav">
							<div class="nav">
								<div class="navlinks-holder">
									<div id="mobile-opener">
										<i class="mdi mdi-menu"></i>
									</div>
									<div id="logo_class">
										<div class="block"></div>
										<div class="logo_nav_options">
											<img src="/config/assets/images/logo.jpeg" alt="Logo"/>
										</div>
									</div>
								</div>
								<div class="profilenav-right">
									<div class="welcome-user">
										<p><i class="mdi mdi-account-outline"></i>'; echo $_SESSION['adminusername'].'<i class="mdi mdi-menu-down"></i></p>
										'; include_once('../../../config/user_options.php'); echo'
									</div>
								</div>
							</div>
						</div>
                        <div class="profilebody-left">
                            <div class="profilebody-bottom-left">
                                <div class="form-content contact">
                                    <div class="messages">
                                        <div>
                                            <a href="../">Back</a>
                                        </div>
                                        <div id="message_who">
                                            <div>
                                                <h3>'.$name.'</h3>
                                            </div>
                                            <div>
                                                <h3>'.$email.'</h3>
                                            </div>
                                            <div>
                                                <h3>'.$phone.'</h3>
                                            </div>
                                            <div>
                                                <p>'.$message.'</p>
                                            </div>
                                        </div>
                                    ';?>
                                    <?php
                                    if($reply == '0'){
                                        echo'
                                            <form id="sender" method="post" action="../view.php/?id='.$id.'">
                                                <div class="form-group">
                                                    <textarea name="reply" placeholder="Type your reply" cols="4" maxlength="500" required></textarea>
                                                </div>
                                                <div class="form-group error-hold" style="border-top: none; padding: 0px;">
                                                    '; include('../../../config/errors.php');
                                                        include('../../../config/success.php'); echo'
                                                </div>    
                                                <div class="form-group">
                                                    <button type="submit" name="reply-save">Reply</button>
                                                </div>    
                                            </form>
                                        </div>
                                        ';
                                    }else{
                                        echo '<p id="sent">You have replied this message!!</p>';
                                    };
                                    echo'
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="/config/assets/js/jquery-2.0.3.min.js"></script>
            <script src="/config/assets/js/landing.js"></script>
        </html>
        ';
    }else{
        echo 'Error fetching message! <a href="../">Back</a>';
    };

?>