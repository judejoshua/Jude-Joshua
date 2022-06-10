<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Firstmedtrade Africa">
        <meta name="description" content="First Medtrade Africa is an online marketplace for the promotion of medical tourism, sales and distribution of medical services, equipment, disposables and pharmaceutical products. We are here to consistently deliver quality medical supplies and services of the latest technology to Africa, with the sole purpose of improving the quality of healthcare.">
        <meta name="format-detection" content="telephone=no">
        <meta name="keywords" content="">

        <title>demo.firstmedtradeafrica.com</title>
        
        <link rel="icon" href="/config/assets/images/logo-mini.png"/>
        <link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/fmain.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/fmedia.css" />
        <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.5.95/css/materialdesignicons.min.css">
    </head>
    <body>
        <div id="mobile_navlinks">
            <div class="links">
                <a href="/">Home</a>
                <a href="#" class="nav_active">Find Doctors</a>
                <a href="/search/hospitals/">Find Hospitals</a>
                <a href="/branches/contact/">Contact us</a>
                <a href="/branches/login/" id="userlinks">Login</a>
                <a href="/branches/registration/" id="userlinks">Register</a>
                <div class="home_social">
                    <a href="https://web.facebook.com/FirstMedtradeAfrica/?modal=admin_todo_tour" target="_blank"><i class="mdi mdi-facebook"></i></a>
                    <a href="https://www.linkedin.com/company/first-medtrade-africa/" target="_blank"><i class="mdi mdi-linkedin"></i></a>
                    <a href="https://www.instagram.com/firstmedtrade/" target="_blank"><i class="mdi mdi-instagram"></i></a>
                    <a href="mailto:info@firstmedtradeafrica.com"><i class="mdi mdi-email"></i></a>
                    <a id="ussd" href="tel:*190#">*190#</a>
                </div>
            </div>
        </div>
        <div class="divWrap">
            <div class="container" id="fdoctorshome">
                <div class="navigation">
                    <div class="nav">
                        <div id="logo_class">
                            <div class="block"></div>
                            <div class="img">
                                <img src="/config/assets/images/logo-full.png"/>
                            </div>
                        </div>
                        <?php include('../../config/nav.php');?>
                        <div id="mobile_links_class">
                            <div class="links-bar">
                                <div class="bar1"></div>
                                <div class="bar2"></div>
                                <div class="bar3"></div>
                            </div>
                        </div>
                    </div>
                </div>        
                <div id="homecontent">
                    <div class="item">
                        <div class="fill">
                            <div class="slider-form-padding">
                                <div class="slider-form">
                                    <h3>Find Doctors and Book Appointments</h3>
                                    <form name="search" method="POST" action="">
                                        <div class="form-group">
                                            <input type="email" name="email_input" placeholder="Find by specialty, name or hospital.." maxlength="45" minlength="9">
                                            <input type="email" name="email_input" placeholder="Location.." maxlength="45" minlength="9">
                                            <input type="submit" value="Search" name="search">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="nav-pagination">
                                <a href="/">Home</a><span>/</span><a href="#" id="active">Find Doctors</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" id="fdoctorsbody">
                <section id="success_story">
                    <div class="fillers">
                        <div class="circle" id="big"></div>
                        <div class="circle" id="medium"></div>
                        <div class="circle" id="small"></div>
                        <div class="circle" id="right"></div>
                    </div>
                    <h2>How it works</h2>
                    <div class="success_box">
                        <h3><i class="mdi mdi-magnify"></i></h3>
                        <h5>Search</h5>
                    </div>
                    <div class="success_box">
                        <h3><i class="mdi mdi-hand-pointing-up"></i></h3>
                        <h5>Choose a Doctor</h5>
                    </div>
                    <div class="success_box">
                        <h3><i class="mdi mdi-calendar-multiselect"></i></h3>
                        <h5>Book Appointment</h5>
                    </div>
                    <div class="success_box">
                        <h3><i class="mdi mdi-bell-alert"></i></h3>
                        <h5>Stay Updated</h5>
                    </div>
                </section>
                <section id="hospitals">
                    <div class="hospitals">
                        <div class="options">
                            <div id="options-body">
                                <h2>Looking for Hospitals?<span>Gain access to search the best hospitals and get quality healthcare.</span></h2>
                                <a href="/search/hospitals/" class="options-icon"><i class="mdi mdi-chevron-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="container" id="testimonial">
                    <div class="fillers">
                        <div class="circle" id="big"></div>
                        <div class="circle" id="medium"></div>
                        <div class="circle" id="small"></div>
                        <div class="circle" id="left"></div>
                        <div class="circle" id="right"></div>
                    </div>
                    <div class="clientslider carousel slide" id="clientCarousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="fill">
                                    <div class="clientheader">   
                                        <div class="talkheader">
                                            <img src="">
                                        </div>
                                    </div>
                                   <div class="testbody">
                                       <div id="body">
                                           <p>I love to have extra money. If I have time, I invest by myself, but sometimes you want to have time for your family or friends, especially when you are on holidays. It’s great to come back rested, tanned etc and with extra money in your accounts. Good work, guys!</p>
                                       </div>
                                       <div id="talkfooter">
                                           <p id="talkwho">Karl Manfred.</p>
                                       </div>
                                   </div>
                               </div>
                            </div>
                            <div class="item">
                                <div class="fill">
                                    <div class="clientheader">   
                                        <div class="talkheader">
                                            <img src="">
                                        </div>
                                    </div>
                                   <div class="testbody">
                                       <div id="body">
                                           <p>I love to have extra money. If I have time, I invest by myself, but sometimes you want to have time for your family or friends, especially when you are on holidays. It’s great to come back rested, tanned etc and with extra money in your accounts. Good work, guys!</p>
                                       </div>
                                       <div id="talkfooter">
                                           <p id="talkwho">Karl Manfred.</p>
                                       </div>
                                   </div>
                               </div>
                            </div>
                            <div class="item">
                                <div class="fill">
                                    <div class="clientheader">   
                                        <div class="talkheader">
                                            <img src="">
                                        </div>
                                    </div>
                                   <div class="testbody">
                                       <div id="body">
                                           <p>I love to have extra money. If I have time, I invest by myself, but sometimes you want to have time for your family or friends, especially when you are on holidays. It’s great to come back rested, tanned etc and with extra money in your accounts. Good work, guys!</p>
                                       </div>
                                       <div id="talkfooter">
                                           <p id="talkwho">Dr. Karl Manfred.</p>
                                       </div>
                                   </div>
                               </div>
                            </div>
                            <div class="item">
                                <div class="fill">
                                    <div class="clientheader">   
                                        <div class="talkheader">
                                            <img src="">
                                        </div>
                                    </div>
                                   <div class="testbody">
                                       <div id="body">
                                           <p>I love to have extra money. If I have time, I invest by myself, but sometimes you want to have time for your family or friends, especially when you are on holidays. It’s great to come back rested, tanned etc and with extra money in your accounts. Good work, guys!</p>
                                       </div>
                                       <div id="talkfooter">
                                           <p id="talkwho">Mrs. Karl Manfred.</p>
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
                        <ol class="carousel-indicators">
                            <li data-target="#clientCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#clientCarousel" data-slide-to="1"></li>
                            <li data-target="#clientCarousel" data-slide-to="2"></li>
                            <li data-target="#clientCarousel" data-slide-to="3"></li>
                        </ol>
                    </div>
                </section>
                <section id="newsletter">
                    <div class="newsletter_action">
                        <div class="newsletter-text">
                            <h4>Newsletter</h4>
                            <p>Subscribe to our newsletter and get weekly updates about new services and other promotions.</p>
                        </div>
                        <form name="subscribe" method="POST" action="">
                            <div class="form-group">
                                <input type="email" name="email_input" placeholder="Enter your email.." maxlength="45" minlength="9">
                                <input type="submit" value="subscribe" name="subscribe">
                            </div>
                        </form>
                    </div>
                    <div class="newsletter_add">
                        <i class="mdi mdi-email-outline"></i>
                    </div>
                </section>
            </div>
            <div class="container" id="footer">
                <div class="fillers">
                    <div class="circle" id="big"></div>
                    <div class="circle" id="medium"></div>
                    <div class="circle" id="small"></div>
                    <div class="circle" id="left"></div>
                    <div class="circle" id="right"></div>
                </div>
                <h3>Explore</h3>
                <ul class="footer_left">
                    <div class="footer_left_top">
                        <ul class="aleft">
                            <li><a href="/">Home</a></li>
                            <li><a href="/branches/contact/">Support</a></li>
                            <li><a href="/branches/login/">Login</a></li>
                            <li><a href="/branches/registration/">Register</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Policy</a></li>
                            <li><a href="#">Terms and conditions</a></li>
                        </ul>
                        <ul class="aleft">
                            <li><span>Patients</span></li>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Chat with a physician</a></li>
                            <li><a href="#">Book an appointment</a></li>
                            <li><a href="#">Make a referral</a></li>
                        </ul>
                        <ul class="aleft">
                            <li><span>Doctors</span></li>
                            <li><a href="#">Set schedule</a></li>
                            <li><a href="#">Check appointment</a></li>
                            <li><a href="#">Update profile</a></li>
                        </ul>
                        <ul class="aleft">
                            <li><span>Hospitals</span></li>
                            <li><a href="#">Check patient's referrals</a></li>
                            <li><a href="#">Update profile</a></li>
                        </ul>
                        <ul class="aleft">
                            <li><span>Email:</span><a href="mailto:info@firstmedtradeafrica.com">info@firstmedtradeafrica.com</a></li>
                            <li><span>Address:</span><a>No. 1D Club road, Ikoyi, Lagos, Nigeria.</a></li>
                            <li><span>Phone:</span><a href="tel:+234 701 236 7770">+234 701 236 7770</a></li>
                            <li>
                                <a href="https://web.facebook.com/FirstMedtradeAfrica/?modal=admin_todo_tour" target="_blank"><i class="mdi mdi-facebook"></i></a>
                                <a href="https://www.linkedin.com/company/first-medtrade-africa/" target="_blank"><i class="mdi mdi-linkedin"></i></a>
                                <a href="https://www.instagram.com/firstmedtrade/" target="_blank"><i class="mdi mdi-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="apayment">
                        <div></div>
                        <img src="/config/assets/images/paystack-accepted-payments.png"/>
                    </div>
                </ul>
            </div>
            <div class="container" id="copyright">
                <p>Copyright &copy; 2019 Firstmedtrade.com. All rights reserved.</p>
            </div>
            <a href="#fdoctorshome" class="to-top">
                <i class="mdi mdi-chevron-up"></i>   
                <p>TOP</p>
            </a>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="/config/assets/js/flanding.js"></script>
        <script src="/config/assets/js/bootstrap.min.js"></script>
        <script>
            $('.clientslider.carousel').carousel({
                interval: 7500,
            })
        </script>

    </body>
</html>