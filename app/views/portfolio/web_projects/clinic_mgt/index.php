<?php

    include ('./config/server.php');

    $count = "SELECT `id` FROM `patients`";
    $query = mysqli_query($conn, $count);
    $patients = mysqli_num_rows($query);

    $countb = "SELECT `s/n` FROM `management` WHERE `role`='Doctor'";
    $queryb = mysqli_query($conn, $countb);
    $doctor = mysqli_num_rows($queryb);

    $countc = "SELECT `s/n` FROM `management` WHERE `role`!='Doctor'";
    $queryc = mysqli_query($conn, $countc);
    $staff = mysqli_num_rows($queryc);

    $read = "SELECT * FROM `contact_info`";
    $reader = mysqli_query($conn, $read);
    $show = mysqli_fetch_assoc($reader);

    $about = base64_decode($show['about']);
    $loc = $show['location'];
    $city = $show['city'];
    $state = $show['state'];
    $country = $show['country'];
    $email = $show['email'];
    $tel = $show['phone'];
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="format-detection" content="telephone=no">
        <meta name="keywords" content="">

        <title>CMS</title>

        <link rel="icon" href="/config/assets/images/logo-mini.png"/>
        <link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/main.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/materialdesignicons.min.css" />
        <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
    </head>
    <body>
        <div class="divWrap fade">
            <div class="container" id="home">
                <?php include('config/nav.php');?>
                <div id="homecontent">
                    <div class="slider-text">
                        <h1>Welcome to<br><span>Caritas University</span> Clinic</h1>
                        <p>We are here to provide reliable services to our students and staff, with our renowned doctors and world class facilities raking among the top 10 in our region.<br>We are simply the best at what we do.</p>
                        <a href="#services">Book An Appointment</a>
                    </div>
                    <span id="more"><i class="mdi mdi-chevron-double-down"></i></span>
                </div>
                    <div id="two"></div>
            </div>
            <div class="container" id="body">
                <section id="about">
                    <div id="traped">
                        <div class="success">
                            <div class="success_mini">
                                <h3><?php echo $doctor?></h3>
                                <h5>Qualified Doctors</h5>
                            </div>
                            <div class="success_mini">
                                <h3><?php echo $patients?>+</h3>
                                <h5>Patients Treated</h5>
                            </div>
                        </div>
                        <div class="success">
                            <div class="success_mini">
                                <h3><?php echo $staff?>+</h3>
                                <h5>Nurses and other Staff</h5>
                            </div>
                            <div class="success_mini">
                                <h3>100%</h3>
                                <h5>Quality</h5>
                            </div>
                        </div>
                    </div>
                    <div id="traped_box">
                        <h2>About Us</h2>
                        <p><?php echo $about ?></p>
                    </div>
                </section>
                <section id="services">
                    <div class="servdivisor divisor">
                        <div id="one"></div>
                        <div id="two"></div>
                    </div>
                    <div class="services">
                        <div class="services_header">
                            <h1><span>Patient</span> Services</h1>
                        </div>
                        <div class="services_body">
                            <?php
                                $result = mysqli_query($conn,"SELECT * FROM `services_info` ");
                                if(mysqli_num_rows($result) > 0){
                                    //output data of each row
                                    while($return = mysqli_fetch_array($result)){
                                    echo'
                                        <div class="services_group">
                                            <div class="group_header">
                                                <h3><span><i class="mdi '.$return['icon'].'"></i></span>'.$return['title'].'</h3>
                                            </div>
                                            <div class="group_body">
                                                <p>'.base64_decode($return['text']).'</p>
                                            </div>
                                        </div>
                                    ';
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </section>
                <section id="work_info">
                    <div class="days">
                        <div class="table">
                            <div class="tr">
                                <?php
                                    $work = mysqli_query($conn, "SELECT `days` FROM `work_info`");
                                    while($relate = mysqli_fetch_assoc($work)){
                                        echo'
                                            <div class="th"><h4>'.$relate['days'].'</h4></div>
                                        ';
                                    }
                                ?>
                            </div>
                            <div class="tr">
                                <?php
                                    $work = mysqli_query($conn, "SELECT `start_time`, `endtime` FROM `work_info`");
                                    while($relate = mysqli_fetch_assoc($work)) {
                                        if ($relate['start_time'] != 'CLOSED' && $relate['endtime'] != 'CLOSED') {
                                            echo '<div class="td"><h5><span>' . $relate['start_time'] . '</span>to<span>' . $relate['endtime'] . '</span></h5></div>';
                                        } else {
                                            echo '<div class="td"><h5><span>Closed</span></h5></div>';
                                        }
                                    };
                                ?>
                                </div>
                            </div>
                    </div>
                </section>
                <section id="doctors">
                    <div class="doctors_header">
                        <h1>Our Doctors</h1>
                    </div>
                    <div class="doctors_body">
                        <div class="row">
                            <?php
                                $result = mysqli_query($conn,"SELECT * FROM `doctor` ");
                                if(mysqli_num_rows($result) > 0){
                                    while($return = mysqli_fetch_array($result)){
                                        $photo_loc = base64_decode($return['photo_loc']);
                                        $photo_name = $return['photo_name'];
                                        echo'
                                            <div class="doctor">
                                                <div class="doctor_img">
                                                    <div></div>
                                                    <img src="/branches/portal/staff/config/assets/uploads/'.$photo_loc.$photo_name.'">
                                                </div>
                                                <div class="doctor_details">
                                                    <h2>'.$return['name'].'</h2>
                                                    <h4>'.$return['position'].'</h4>
                                                    <h4>'.$return['specialty'].' unit</h4>
                                                </div>
                                            </div>
                                        ';
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </section>
                <section id="testimonial">
                    <h1>Testimonials</h1>
                    <div class="fm_client carousel slide" id="clientCarousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="fill">
                                    <div class="talk">

                                        <div id="body">
                                            <p>Words cannot describe my gratitude to the phenomenal staff for exceeding my expectations. The team is as responsive as they are professional, trying to fufill every request. Seemed like I was at a 5 star hotel rather than a hospital. </p>
                                        </div>
                                        <div id="talkfooter">
                                            <p id="talkwho">Joseph Ezeagugom</p>
                                        </div>
                                    </div>
                                    <div class="talk">
                                        <div id="body">
                                            <p>From the minute I arrive, I was treated with the utmost emphathy , kindness and respect.. I have nothing but praise for the care that I received as a patient at Caritas university clinic.</p>
                                        </div>
                                        <div id="talkfooter">
                                            <p id="talkwho">Simon Elijah</p>
                                        </div>
                                    </div>
                                    <div class="talk">

                                        <div id="body">
                                            <p>Thank you for providing me with a most perfect place to recover. I was so inspired by every single person that I came in contact with.</p>
                                        </div>
                                        <div id="talkfooter">
                                            <p id="talkwho">Chinaza Esther</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="fill">
                                    <div class="talk">
                                        <div id="body">
                                            <p>I just cant thank enough, each and every one of the staff for all of their dedication. I waas very impressed with the diginity and respect withwhich the nursing staff treated me during my stay. </p>
                                        </div>
                                        <div id="talkfooter">
                                            <p id="talkwho">Janet Ido</p>
                                        </div>
                                    </div>
                                    <div class="talk">
                                        <div id="body">
                                            <p>You have a difficult job, but a rewarding one. I hope that I hav been able in some smaall way to express what an important task you have in restoring health and mobility to grateful people like me, who come under your care for a brief time and find the rest of their lives improved by it.</p>
                                        </div>
                                        <div id="talkfooter">
                                            <p id="talkwho">Michael I. Ajah</p>
                                        </div>
                                    </div>
                                    <div class="talk">
                                        <div id="body">
                                            <p>The fact that I was treated with dignity, courtsey and respect is appluding. The staff was patient, knowledgeable, caring, competent, pleasant and kind. It seemed obvious that they are well trained. I particularly loved the car and appartment set-up that you had, so that I could be shown how to maneuver around those areas before going home.</p>
                                        </div>
                                        <div id="talkfooter">
                                            <p id="talkwho">Simon E. John</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="left carousel-control" data-target="#clientCarousel" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" data-target="#clientCarousel" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                </section>
            </div>
            <div class="container footer-class">
                <?php include('config/footer.php');?>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="/config/assets/js/jquery-2.0.3.min.js"></script>
        <script src="/config/assets/js/landing.js"></script>
        <script src="/config/assets/js/bootstrap.min.js"></script>
        <script>
            $('.carousel').carousel({
                interval: 6500,
            })
        </script>
    </body>
</html>
